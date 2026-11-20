import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");
const GUIDE_ID = "medula-hastane-guide-3-1-1-2026-10-19";

let reg: ReturnType<typeof loadRegistry>;

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("v0.3 hammadde catalog (Group 38)", () => {
  it("registers the majistral-ham-madde enum with the 620 guide codes (4.2.1.f.1.1.1, s.201-223)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "majistral-ham-madde");
    expect(e, "majistral-ham-madde must exist").toBeTruthy();
    expect(e?.data["status"]).toBe("reviewed");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toHaveLength(620);
    expect(codes[0]).toBe("1");
    expect(codes).not.toContain("619");
    expect(codes).toContain("618");
    expect(codes).toContain("620");
    const refs = JSON.stringify(e?.data["sourceRefs"]);
    expect(refs).toContain('"page":201');
    expect(refs).toContain("619");
  });

  it("keeps guide-anchored spot checks", () => {
    const e = reg.enums.find((x) => x.data["id"] === "majistral-ham-madde");
    const byCode = new Map(
      (e?.data["values"] as Array<{ code: string; label: string }>).map((v) => [
        v.code,
        v.label,
      ]),
    );
    expect(byCode.get("1")).toBe("Acetanilide");
    expect(byCode.get("9")).toBe("Acide Acetylsalicylique");
    expect(byCode.get("618")).toBe("Xylol");
    expect(byCode.get("620")).toBe("Sodyum dichloroacetate");
  });

  it("binds MajistralHamMaddeDVO majistralHamMaddeKodu to the catalog enum", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "MajistralHamMaddeDVO");
    const f = (dvo?.data["fields"] as Array<Record<string, unknown>>).find(
      (x) => x["name"] === "majistralHamMaddeKodu",
    );
    expect(f?.["type"]).toBe("enum");
    expect(f?.["enumRef"]).toBe("majistral-ham-madde");
  });

  it("updates the manifest enum count", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.enums).toBe(69);
    expect(manifest.counts.dvos).toBe(189);
  });
});
