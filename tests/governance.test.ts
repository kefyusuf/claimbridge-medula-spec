import { readFileSync, existsSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("governance (Group 37)", () => {
  it("ships a security policy per the GitHub public-repo norm", () => {
    const p = resolve(root, "SECURITY.md");
    expect(existsSync(p), "SECURITY.md must exist").toBe(true);
    const text = readFileSync(p, "utf8");
    expect(text).toContain("Reporting a Vulnerability");
    expect(text).toContain("private");
  });

  it("ships contribution guidelines documenting the TDD PR workflow", () => {
    const p = resolve(root, "CONTRIBUTING.md");
    expect(existsSync(p), "CONTRIBUTING.md must exist").toBe(true);
    const text = readFileSync(p, "utf8");
    expect(text).toContain("TDD");
    expect(text).toContain("branch");
    expect(text).toContain("provenance");
  });

  it("ships a CITATION.cff for citable data norms", () => {
    const p = resolve(root, "CITATION.cff");
    expect(existsSync(p), "CITATION.cff must exist").toBe(true);
    const text = readFileSync(p, "utf8");
    expect(text).toContain("cff-version:");
    expect(text).toContain("title:");
    expect(text).toContain("version: 0.8.0");
  });

  it("configures Dependabot for dependency and action updates", () => {
    const p = resolve(root, ".github", "dependabot.yml");
    expect(existsSync(p), "dependabot.yml must exist").toBe(true);
    const text = readFileSync(p, "utf8");
    expect(text).toContain("package-ecosystem");
  });

  it("bumps SPEC_VERSION and package.json to the current release", () => {
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

  it("records the 0.3.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.3.0] — 2026-11-18");
  });
});
