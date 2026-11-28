import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.12.0 (Group 57)", () => {
  it("bumps SPEC_VERSION and package.json to 0.12.0", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.12.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.12.0");
  });

  it("bumps CITATION.cff to 0.12.0", () => {
    const citation = readFileSync(resolve(root, "CITATION.cff"), "utf8");
    expect(citation).toContain("version: 0.12.0");
    expect(citation).toContain('date-released: "2026-11-28"');
  });

  it("records the 0.12.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.12.0] — 2026-11-28");
    expect(changelog).toContain("getYesilKartliSevkliHasta");
  });

  it("keeps the bundle counts and specVersion in lockstep", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as { specVersion: string; methods: unknown[]; dvos: unknown[] };
    expect(bundle.specVersion).toBe("0.12.0");
    expect(bundle.methods).toHaveLength(77);
    expect(bundle.dvos).toHaveLength(221);
  });

  it("ships the generated PHP package for 221 DVOs and 127 rules", () => {
    const enumDir = resolve(root, "dist", "php", "src", "Dto");
    const dtoFiles: string[] = [];
    for (const d of readdirSync(enumDir, { withFileTypes: true })) {
      if (!d.isDirectory()) continue;
      dtoFiles.push(
        ...readdirSync(resolve(enumDir, d.name)).filter((f) =>
          f.endsWith(".php"),
        ),
      );
    }
    expect(dtoFiles.length).toBe(221);

    const rulesDir = resolve(root, "dist", "php", "src", "Rules");
    const ruleFiles: string[] = [];
    for (const d of readdirSync(rulesDir, { withFileTypes: true })) {
      if (!d.isDirectory()) continue;
      ruleFiles.push(
        ...readdirSync(resolve(rulesDir, d.name)).filter((f) =>
          f.endsWith(".php"),
        ),
      );
    }
    expect(ruleFiles.length).toBe(127);
  });
});
