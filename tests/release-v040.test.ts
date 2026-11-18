import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.4.0 (Group 43)", () => {
  it("bumps SPEC_VERSION and package.json to 0.4.0", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.4.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.4.0");
  });

  it("bumps CITATION.cff to 0.4.0", () => {
    const citation = readFileSync(resolve(root, "CITATION.cff"), "utf8");
    expect(citation).toContain("version: 0.4.0");
  });

  it("records the 0.4.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.4.0] — 2026-11-19");
    expect(changelog).toContain("codeSystem");
  });

  it("keeps the bundle specVersion in lockstep", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as { specVersion: string };
    expect(bundle.specVersion).toBe("0.4.0");
  });
});
