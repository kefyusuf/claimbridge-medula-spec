import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("group 0 bootstrap", () => {
  it("declares a semver spec version", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toMatch(/^\d+\.\d+\.\d+$/);
  });

  it("keeps SPEC_VERSION and package.json version in sync", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as {
      version: string;
    };
    expect(pkg.version).toBe(specVersion);
  });

  it("declares the required package scripts", () => {
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as {
      scripts: Record<string, string>;
    };
    for (const script of [
      "validate",
      "generate",
      "check",
      "test",
      "format",
      "format:check",
    ]) {
      expect(
        pkg.scripts[script],
        `missing package script: ${script}`,
      ).toBeTruthy();
    }
  });

  it("does not ignore generated outputs (they are committed, PRD 18.4)", () => {
    const gitignore = readFileSync(resolve(root, ".gitignore"), "utf8");
    expect(gitignore).not.toMatch(/^dist\/\s*$/m);
    expect(gitignore).not.toMatch(/^docs\/generated\/\s*$/m);
    expect(gitignore).not.toMatch(/^diagrams\/generated\/\s*$/m);
  });
});
