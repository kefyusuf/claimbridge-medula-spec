import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.2.0 (Group 34)", () => {
  it("keeps the pre-0.3.0 version history coherent (release superseded)", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.6.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.6.0");
  });

  it("documents the publicly available guide reference in the README", () => {
    const readme = readFileSync(resolve(root, "README.md"), "utf8");
    expect(readme).toContain("downloadable without credentials");
    expect(readme).toContain("claimbridge-medula-spec");
  });

  it("records the naming decision in the README", () => {
    const readme = readFileSync(resolve(root, "README.md"), "utf8");
    expect(readme).toContain("Naming");
    expect(readme).toContain("compatibility");
  });

  it("records the 0.2.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.2.0] — 2026-11-18");
  });
});
