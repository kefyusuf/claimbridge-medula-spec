import { execSync } from "node:child_process";
import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";
import { parse } from "yaml";

const root = resolve(import.meta.dirname, "..");

describe("ci pipeline (Group 7)", () => {
  it("runs the full PRD 21 step sequence", () => {
    const doc = parse(
      readFileSync(resolve(root, ".github", "workflows", "ci.yml"), "utf8"),
    ) as {
      name: string;
      jobs: Record<string, { steps: Array<{ run?: string }> }>;
    };
    expect(doc.name).toBe("CI");
    const runs = (doc.jobs.validate?.steps ?? [])
      .map((s) => s.run ?? "")
      .filter((r) => r !== "");
    expect(runs).toContain("pnpm install --frozen-lockfile");
    const sequence = runs.filter(
      (r) => r.startsWith("pnpm ") && r !== "pnpm install --frozen-lockfile",
    );
    expect(sequence).toEqual([
      "pnpm format:check",
      "pnpm validate",
      "pnpm test",
      "pnpm check",
    ]);
  });

  it("passes format:check over the repository", () => {
    execSync("pnpm format:check", { cwd: root, stdio: "pipe" });
  });
});
