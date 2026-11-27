import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.9.0 (Group 49, superseded by v0.11.0)", () => {
  it("keeps the pre-0.10.0 version history coherent (release superseded)", () => {
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

  it("records the 0.9.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.9.0] — 2026-11-27");
    expect(changelog).toContain("taahhut");
  });

  it("keeps the guide-verified registry counts in the bundle", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as {
      specVersion: string;
      rules: Array<{ id: string }>;
      scenarios: Array<{
        id: string;
        expected: { result: { sonucKodu: string } };
      }>;
      dvos: unknown[];
      enums: unknown[];
    };
    expect(bundle.specVersion).toBe("0.11.0");
    expect(bundle.rules).toHaveLength(7);
    expect(bundle.scenarios).toHaveLength(9);
    expect(bundle.dvos).toHaveLength(212);
    expect(bundle.enums).toHaveLength(81);
  });

  it("registers the two new-group rules with their sandbox-only codes", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as {
      rules: Array<{
        file: string;
        rules: Array<{ id: string; type: string }>;
      }>;
      scenarios: Array<{
        id: string;
        expected: { result: { sonucKodu: string } };
      }>;
    };
    const flat = bundle.rules.flatMap((r) => r.rules);
    const ruleIds = flat.map((r) => r.id);
    expect(ruleIds).toContain("taahhut-dis-annex7-restriction");
    expect(ruleIds).toContain("taahhut-ilce-province-mismatch");
    expect(ruleIds).toContain("takip-ara-window-limit");
    expect(
      flat.find((r) => r.id === "taahhut-dis-annex7-restriction")?.type,
    ).toBe("taahhut-rule");
    expect(flat.find((r) => r.id === "takip-ara-window-limit")?.type).toBe(
      "yardimci-rule",
    );

    const codes = bundle.scenarios.reduce<Record<string, string>>((acc, s) => {
      acc[s.id] = s.expected.result.sonucKodu;
      return acc;
    }, {});
    expect(codes["taahhut-dis-annex7-restriction"]).toBe("SANDBOX_4001");
    expect(codes["takip-ara-window-limit"]).toBe("SANDBOX_4002");
  });
});
