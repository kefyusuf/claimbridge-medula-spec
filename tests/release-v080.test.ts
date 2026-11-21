import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.8.0 (Group 48)", () => {
  it("bumps SPEC_VERSION and package.json to 0.8.0", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.8.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.8.0");
  });

  it("bumps CITATION.cff to 0.8.0", () => {
    const citation = readFileSync(resolve(root, "CITATION.cff"), "utf8");
    expect(citation).toContain("version: 0.8.0");
    expect(citation).toContain('date-released: "2026-11-21"');
  });

  it("records the 0.8.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.8.0] — 2026-11-21");
    expect(changelog).toContain("Laravel validation rules codegen");
  });

  it("ships one validation rule class per input DVO", () => {
    const rulesDir = resolve(root, "dist", "php", "src", "Rules");
    const files: string[] = [];
    for (const d of readdirSync(rulesDir, { withFileTypes: true })) {
      if (!d.isDirectory()) continue;
      files.push(
        ...readdirSync(resolve(rulesDir, d.name))
          .filter((f) => f.endsWith(".php"))
          .map((f) => `${d.name}/${f}`),
      );
    }
    expect(files).toHaveLength(123);
    expect(files).toContain("HastaKabul/ProvizyonGirisDVORules.php");
  });

  it("keeps the guide-verified registry counts in the bundle", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as { specVersion: string; dvos: unknown[]; enums: unknown[] };
    expect(bundle.specVersion).toBe("0.8.0");
    expect(bundle.dvos).toHaveLength(212);
    expect(bundle.enums).toHaveLength(81);
  });
});
