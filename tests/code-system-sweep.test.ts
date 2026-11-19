import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");

let reg: ReturnType<typeof loadRegistry>;

beforeAll(() => {
  reg = loadRegistry(root);
});

const SUT_FIELDS = new Set([
  "sutKodu",
  "islemKodu",
  "yeniIslemKodu",
  "malzemeKodu",
]);

const GS1_FIELDS = new Set(["barkod"]);

const ICD_FIELDS = new Set(["taniKodu"]);

function systemFor(fieldName: string): string | null {
  if (ICD_FIELDS.has(fieldName)) return "ICD-10-WHO";
  if (SUT_FIELDS.has(fieldName)) return "SUT";
  if (GS1_FIELDS.has(fieldName)) return "GS1";
  return null;
}

describe("code-system sweep (Group 42)", () => {
  it("declares codeSystem on every externally-coded field across all DVOs", () => {
    const missing: string[] = [];
    for (const dvo of reg.dvos) {
      for (const f of (dvo.data["fields"] as Array<Record<string, unknown>>) ??
        []) {
        const name = f["name"] as string;
        const expected = systemFor(name);
        if (expected === null) continue;
        if (f["codeSystem"] !== expected) {
          missing.push(
            `${dvo.data["id"]}.${name}: expected ${expected}, got ${String(f["codeSystem"])}`,
          );
        }
      }
    }
    expect(missing, `unannotated coded fields:\n${missing.join("\n")}`).toEqual(
      [],
    );
  });

  it("keeps codeSystem null on registry-enum-bound fields (mutual exclusion)", () => {
    for (const dvo of reg.dvos) {
      for (const f of (dvo.data["fields"] as Array<Record<string, unknown>>) ??
        []) {
        if (f["type"] === "enum") {
          expect(
            f["codeSystem"],
            `${dvo.data["id"]}.${f["name"]} is enum-bound; codeSystem must stay null`,
          ).toBeNull();
        }
      }
    }
  });

  it("sweeps every DVO in the registry", () => {
    expect(reg.dvos).toHaveLength(106);
  });

  it("keeps the manifest counts stable", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.enums).toBe(50);
    expect(manifest.counts.dvos).toBe(106);
  });
});
