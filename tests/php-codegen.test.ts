import { execSync } from "node:child_process";
import { existsSync, readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");
const phpDir = resolve(root, "dist", "php");

let enumFiles: string[];
let dvoFiles: string[];

beforeAll(() => {
  execSync("pnpm generate", { cwd: root, stdio: "pipe" });
  enumFiles = listPhp(resolve(phpDir, "src", "Enum"));
  dvoFiles = listPhp(resolve(phpDir, "src", "Dto"));
});

function listPhp(dir: string): string[] {
  if (!existsSync(dir)) return [];
  const out: string[] = [];
  for (const entry of readdirSync(dir, { withFileTypes: true })) {
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

describe("php dto codegen (Group 47)", () => {
  it("emits a self-contained composer package into dist/php", () => {
    expect(existsSync(resolve(phpDir, "composer.json"))).toBe(true);
    const composer = JSON.parse(
      readFileSync(resolve(phpDir, "composer.json"), "utf8"),
    ) as { name: string; require: { php: string } };
    expect(composer["name"]).toBe("kefyusuf/claimbridge-medula-dto");
    expect(composer["require"]["php"]).toBe("^8.3");
    expect(existsSync(resolve(phpDir, "README.md"))).toBe(true);
  });

  it("generates one backed enum per registry enum", () => {
    expect(enumFiles).toHaveLength(81);
    expect(enumFiles).toContain("TakipTipi.php");
    expect(enumFiles).toContain("RaporTuru.php");
  });

  it("generates one readonly DTO class per registry DVO", () => {
    expect(dvoFiles.length).toBe(212);
    expect(dvoFiles).toContain("HastaKabul/ProvizyonGirisDVO.php");
    expect(dvoFiles).toContain("ImzaliRapor/MaluliyetRaporDVO.php");
    expect(dvoFiles).toContain("YardimciIslemler/IlacListDVO.php");
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
    expect(content).toContain("Tablo 4.1.1.a");
    expect(content).toContain("guideVersion 3.1.1");
  });

  it("keeps the generate command deterministic across runs", () => {
    const before = readFileSync(
      resolve(phpDir, "src", "Dto", "HastaKabul", "ProvizyonGirisDVO.php"),
      "utf8",
    );
    execSync("pnpm generate", { cwd: root, stdio: "pipe" });
    const after = readFileSync(
      resolve(phpDir, "src", "Dto", "HastaKabul", "ProvizyonGirisDVO.php"),
      "utf8",
    );
    expect(after).toBe(before);
  });
});
