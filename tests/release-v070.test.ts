import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.7.0 (Group 47, superseded by v0.9.0)", () => {
  it("keeps the pre-0.9.0 version history coherent (release superseded)", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.9.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.9.0");
  });

  it("records the 0.7.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.7.0] — 2026-11-21");
    expect(changelog).toContain("PHP");
  });

  it("keeps the bundle specVersion in lockstep", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as { specVersion: string };
    expect(bundle.specVersion).toBe("0.9.0");
  });

  it("ships the generated PHP DTO package in the distribution", () => {
    const composer = JSON.parse(
      readFileSync(resolve(root, "dist", "php", "composer.json"), "utf8"),
    ) as { name: string; autoload: { "psr-4": Record<string, string> } };
    expect(composer["name"]).toBe("kefyusuf/claimbridge-medula-dto");
    expect(composer["autoload"]["psr-4"]["ClaimBridge\\Medula\\"]).toBe("src/");
    const enumDir = resolve(root, "dist", "php", "src", "Enum");
    const dtoDir = resolve(root, "dist", "php", "src", "Dto");
    expect(readdirSync(enumDir).filter((f) => f.endsWith(".php"))).toHaveLength(
      81,
    );
    const dtoFiles = readdirSync(dtoDir, { withFileTypes: true }).flatMap(
      (d) =>
        d.isDirectory()
          ? readdirSync(resolve(dtoDir, d.name)).map((f) => `${d.name}/${f}`)
          : [f.name],
    );
    expect(dtoFiles.filter((f) => f.endsWith(".php"))).toHaveLength(212);
  });
});
