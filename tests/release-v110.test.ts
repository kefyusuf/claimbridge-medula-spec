import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.11.0 (Group 54)", () => {
  it("bumps SPEC_VERSION and package.json to 0.11.0", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.11.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.11.0");
  });

  it("bumps CITATION.cff to 0.11.0", () => {
    const citation = readFileSync(resolve(root, "CITATION.cff"), "utf8");
    expect(citation).toContain("version: 0.11.0");
    expect(citation).toContain('date-released: "2026-11-28"');
  });

  it("records the 0.11.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.11.0] — 2026-11-28");
    expect(changelog).toContain("istisnaiHal");
  });

  it("keeps the bundle specVersion and registry counts in lockstep", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as {
      specVersion: string;
      enums: Array<{ id: string; values: Array<{ code: string }> }>;
      dvos: unknown[];
      scenarios: unknown[];
    };
    expect(bundle.specVersion).toBe("0.11.0");
    expect(bundle.dvos).toHaveLength(212);
    expect(bundle.scenarios).toHaveLength(9);
    const istisnai = bundle.enums.find((e) => e.id === "istisnai-hal");
    expect(istisnai?.values.map((v) => v.code)).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "I",
      "M",
      "B",
      "V",
    ]);
  });

  it("ships the corrected letter codes in the generated PHP enums", () => {
    const enumDir = resolve(root, "dist", "php", "src", "Enum");
    const files = readdirSync(enumDir).filter((f) => f.endsWith(".php"));
    expect(files.length).toBeGreaterThanOrEqual(81);
    const istisnai = readFileSync(resolve(enumDir, "IstisnaiHal.php"), "utf8");
    expect(istisnai).toContain('"I"');
    expect(istisnai).toContain('"V"');
    const devredilen = readFileSync(
      resolve(enumDir, "DevredilenKurum.php"),
      "utf8",
    );
    expect(devredilen).toContain('"149"');
    expect(devredilen).not.toContain('"V"');
  });
});
