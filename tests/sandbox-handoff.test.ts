import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("sandbox handoff (Group 40)", () => {
  it("ships the claimbridge-sandbox PRD per PRD §30", () => {
    const prd = readFileSync(
      resolve(root, "docs", "CLAIMBRIDGE_SANDBOX_PRD.md"),
      "utf8",
    );
    expect(
      prd.length,
      "the handoff PRD must have real content",
    ).toBeGreaterThan(2000);
    for (const section of [
      "Source of Truth",
      "State Model",
      "Scenario Engine",
      "Tech Stack",
      "Non-Goals",
      "Milestones",
    ]) {
      expect(prd, `missing section ${section}`).toContain(section);
    }
  });

  it("anchors the sandbox to the generated bundle, not the registry", () => {
    const prd = readFileSync(
      resolve(root, "docs", "CLAIMBRIDGE_SANDBOX_PRD.md"),
      "utf8",
    );
    expect(prd).toContain("dist/claimbridge-medula-spec.json");
    expect(prd).toContain("must not duplicate the registry");
  });

  it("marks the main PRD §30 handoff as fulfilled", () => {
    const prd = readFileSync(
      resolve(root, "docs", "CLAIMBRIDGE_MEDULA_SPEC_PRD.md"),
      "utf8",
    );
    expect(prd).toContain("Group 40 handoff");
    expect(prd).toContain("CLAIMBRIDGE_SANDBOX_PRD.md");
  });

  it("links the sandbox PRD from the README documentation map", () => {
    const readme = readFileSync(resolve(root, "README.md"), "utf8");
    expect(readme).toContain("CLAIMBRIDGE_SANDBOX_PRD.md");
  });
});
