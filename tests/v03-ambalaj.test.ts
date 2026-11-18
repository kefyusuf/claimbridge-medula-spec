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

describe("v0.3 ambalaj-boyutu (Group 32)", () => {
  it("registers the ambalaj-boyutu enum with the thirty guide codes (s.200)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "ambalaj-boyutu");
    expect(e, "ambalaj-boyutu must exist").toBeTruthy();
    expect(e?.data["status"]).toBe("reviewed");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toHaveLength(30);
    expect(codes).not.toContain("20");
    expect(codes[0]).toBe("1");
    expect(codes[9]).toBe("10");
    expect(codes[10]).toBe("11");
    expect(codes[29]).toBe("31");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":200');
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain("kod 20");
  });

  it("binds MajistralIlacDVO ambalajBoyutu to the enum", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "MajistralIlacDVO");
    const ambalaj = (
      dvo?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "ambalajBoyutu");
    expect(ambalaj?.["type"]).toBe("enum");
    expect(ambalaj?.["enumRef"]).toBe("ambalaj-boyutu");
  });

  it("updates the manifest enum count", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.enums).toBe(23);
    expect(manifest.counts.dvos).toBe(70);
  });
});
