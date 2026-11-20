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

describe("v0.3 tahlil-tipi (Group 33)", () => {
  it("registers the tahlilTipi catalog enum with the guide codes (s.229-231)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "tahlil-tipi");
    expect(e, "tahlil-tipi must exist").toBeTruthy();
    expect(e?.data["status"]).toBe("reviewed");
    const values = e?.data["values"] as Array<{ code: string; label: string }>;
    expect(values.length).toBe(72);
    expect(values[0]).toEqual({
      code: "0",
      label: "Diger",
      description: expect.anything(),
    });
    const codes = values.map((v) => v.code);
    expect(codes).toContain("HEM102");
    expect(codes).toContain("HEM121");
    expect(codes).toContain("IDR102");
    expect(codes).toContain("KGAZ01");
    expect(codes).toContain("KGAZ17");
    expect(codes).toContain("OGTT01");
    expect(codes).toContain("OGTT08");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":229');
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":231');
  });

  it("documents the guide's own numbering irregularities", () => {
    const e = reg.enums.find((x) => x.data["id"] === "tahlil-tipi");
    const notes = JSON.stringify(e?.data["sourceRefs"]);
    expect(notes).toContain("IDR114");
    expect(notes).toContain("IDR124");
  });

  it("binds TahlilBilgisiDVO tahlilTipi to the enum", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TahlilBilgisiDVO");
    const tahlilTipi = (
      dvo?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "tahlilTipi");
    expect(tahlilTipi?.["type"]).toBe("enum");
    expect(tahlilTipi?.["enumRef"]).toBe("tahlil-tipi");
  });

  it("updates the manifest enum count", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.enums).toBe(69);
    expect(manifest.counts.dvos).toBe(189);
  });
});
