import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { tmpdir } from "node:os";
import { describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";
import { writePhp } from "../tools/src/generatePhp.js";

const root = resolve(import.meta.dirname, "..");
const phpDir = resolve(root, "dist", "php");

function listPhp(dir: string): string[] {
  const out: string[] = [];
  let entries;
  try {
    entries = readdirSync(dir, { withFileTypes: true });
  } catch {
    return out;
  }
  for (const entry of entries) {
    if (entry.isDirectory()) {
      out.push(
        ...listPhp(resolve(dir, entry.name)).map((p) => `${entry.name}/${p}`),
      );
    } else if (entry.name.endsWith(".php")) {
      out.push(entry.name);
    }
  }
  return out.sort();
}

function dvoFiles(): string[] {
  return listPhp(resolve(phpDir, "src", "Dto"));
}

describe("php dto codegen (Group 47)", () => {
  it("emits a self-contained composer package into dist/php", () => {
    const composer = readFileSync(resolve(phpDir, "composer.json"), "utf8");
    expect(composer).toContain("kefyusuf/claimbridge-medula-dto");
    expect(composer).toContain('"php": "^8.3"');
    expect(readFileSync(resolve(phpDir, "README.md"), "utf8")).toContain(
      "regenerate",
    );
  });

  it("generates one backed enum per registry enum", () => {
    expect(listPhp(resolve(phpDir, "src", "Enum"))).toHaveLength(81);
    expect(listPhp(resolve(phpDir, "src", "Enum"))).toContain("TakipTipi.php");
    expect(listPhp(resolve(phpDir, "src", "Enum"))).toContain("RaporTuru.php");
  });

  it("generates one readonly DTO class per registry DVO", () => {
    expect(dvoFiles().length).toBe(221);
    expect(dvoFiles()).toContain("HastaKabul/ProvizyonGirisDVO.php");
    expect(dvoFiles()).toContain("ImzaliRapor/MaluliyetRaporDVO.php");
    expect(dvoFiles()).toContain("YardimciIslemler/IlacListDVO.php");
  });

  it("generates string-backed enums with sanitized case names", () => {
    const content = readFileSync(
      resolve(phpDir, "src", "Enum", "TakipTipi.php"),
      "utf8",
    );
    expect(content).toContain("enum TakipTipi: string");
    expect(content).toContain('case Normal = "N";');
    expect(content).toContain("strict_types=1");
    expect(content).toContain("@deprecated");
  });

  it("types enum-bound fields with the generated enum class", () => {
    const content = readFileSync(
      resolve(phpDir, "src", "Dto", "HastaKabul", "ProvizyonGirisDVO.php"),
      "utf8",
    );
    expect(content).toContain("public readonly ?TakipTipi $takipTipi");
    expect(content).toContain("TakipTipi::tryFrom(");
    expect(content).toContain("public static function fromArray(");
    expect(content).toContain("public function toArray(): array");
  });

  it("annotates guide provenance on every generated class", () => {
    const content = readFileSync(
      resolve(phpDir, "src", "Dto", "HastaKabul", "ProvizyonGirisDVO.php"),
      "utf8",
    );
    expect(content).toContain("guideVersion 3.1.1");
    expect(content).toContain("Tablo 4.1.1.a");
  });

  it("regenerates byte-identical output into a temp directory", () => {
    const temp = resolve(tmpdir(), `claimbridge-php-${process.pid}`);
    writePhp(loadRegistry(root), temp);
    for (const rel of [
      "src/Enum/TakipTipi.php",
      "src/Dto/HastaKabul/ProvizyonGirisDVO.php",
      "composer.json",
    ]) {
      expect(readFileSync(resolve(temp, rel), "utf8")).toBe(
        readFileSync(resolve(phpDir, rel), "utf8"),
      );
    }
  });

  it("coerces unknown enum codes to null via tryFrom", () => {
    const content = readFileSync(
      resolve(phpDir, "src", "Dto", "HastaKabul", "ProvizyonGirisDVO.php"),
      "utf8",
    );
    expect(content).toContain('tryFrom((string) $data["takipTipi"])');
    expect(content).not.toContain("::from(");
  });
});
