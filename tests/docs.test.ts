import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

const DOC_FILES = [
  "00-overview.md",
  "01-domain-model.md",
  "02-versioning.md",
  "03-workflows.md",
  "04-sandbox-contract.md",
  "05-code-generation.md",
];

const README_REQUIREMENTS = [
  "What this repository is",
  "What this repository is not",
  "## Architecture",
  "flowchart",
  "claimbridge-sandbox",
  "dist/claimbridge-medula-spec.json",
  "pnpm validate",
  "pnpm generate",
  "pnpm check",
  "Disclaimer",
  "not vendored",
];

describe("documentation (Group 8)", () => {
  it("ships the hand-written documentation set from PRD 22", () => {
    for (const name of DOC_FILES) {
      const text = readFileSync(resolve(root, "docs", name), "utf8");
      expect(text.length, `${name} should have real content`).toBeGreaterThan(
        500,
      );
      expect(text, `${name} should use markdown headings`).toContain("##");
    }
  });

  it("covers the PRD 22.1 README requirements", () => {
    const readme = readFileSync(resolve(root, "README.md"), "utf8");
    for (const requirement of README_REQUIREMENTS) {
      expect(readme, `README should contain "${requirement}"`).toContain(
        requirement,
      );
    }
  });

  it("records the 0.1.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.1.0] — 2026-11-15");
  });
});
