import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.10.0 (Group 50)", () => {
  it("bumps SPEC_VERSION and package.json to 0.10.0", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.10.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.10.0");
  });

  it("bumps CITATION.cff to 0.10.0", () => {
    const citation = readFileSync(resolve(root, "CITATION.cff"), "utf8");
    expect(citation).toContain("version: 0.10.0");
    expect(citation).toContain('date-released: "2026-11-27"');
  });

  it("records the 0.10.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.10.0] — 2026-11-27");
    expect(changelog).toContain("9000");
  });

  it("keeps the bundle specVersion and registry counts in lockstep", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as {
      specVersion: string;
      scenarios: unknown[];
      dvos: unknown[];
      enums: unknown[];
    };
    expect(bundle.specVersion).toBe("0.10.0");
    expect(bundle.scenarios).toHaveLength(9);
    expect(bundle.dvos).toHaveLength(212);
    expect(bundle.enums).toHaveLength(81);
  });

  it("ships the 9000 warning case in the generated PHP enum", () => {
    const enumDir = resolve(root, "dist", "php", "src", "Enum");
    const files = readdirSync(enumDir).filter((f) => f.endsWith(".php"));
    expect(files.length).toBeGreaterThanOrEqual(81);
    const sonuc = readFileSync(resolve(enumDir, "SonucKodu.php"), "utf8");
    expect(sonuc).toContain('"0000"');
    expect(sonuc).toContain('"9000"');
    expect(sonuc).toContain("UyariMesajiIleBasarili");
  });
});
