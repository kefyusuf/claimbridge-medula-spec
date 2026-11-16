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

describe("v0.2 composites 3 (Group 15)", () => {
  it("registers HataliIslemBilgisiDVO from Tablo 4.2.1.n (s.235-236)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HataliIslemBilgisiDVO");
    expect(dvo, "HataliIslemBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "hataKodu",
      "hataMesaji",
      "hizmetSunucuRefNo",
      "oncekiIslemBilgisi",
    ]);
    expect(byName(dvo).get("hataKodu")?.["length"]).toBe(4);
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":235');
    expect(refs).toContain('"page":236');
  });

  it("registers the taburcu-kodu enum with the thirteen guide codes (s.241-242)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "taburcu-kodu");
    expect(e, "taburcu-kodu must exist").toBeTruthy();
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "10",
      "11",
      "12",
      "13",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":241');
  });

  it("aligns the invoice HizmetDetayDVO with Tablo 4.3.1.c (s.241-242)", () => {
    const dvo = reg.dvos.find(
      (d) =>
        d.data["id"] === "HizmetDetayDVO" &&
        d.data["domain"] === "fatura-kayit",
    );
    expect(dvo, "invoice HizmetDetayDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual(["aciklama", "protokolNo", "taburcuKodu", "takipNo"]);
    const taburcu = byName(dvo).get("taburcuKodu");
    expect(taburcu?.["type"]).toBe("enum");
    expect(taburcu?.["enumRef"]).toBe("taburcu-kodu");
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":241');
  });

  it("removes the PRD-modeled service-line HizmetDetayDVO (guide moves it to fatura)", () => {
    const dvo = reg.dvos.find(
      (d) =>
        d.data["id"] === "HizmetDetayDVO" &&
        d.data["domain"] === "hizmet-kayit",
    );
    expect(dvo, "service-line variant must be removed").toBeUndefined();
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(59);
    expect(manifest.counts.enums).toBe(19);
  });
});

function byName(dvo?: {
  data: Record<string, unknown>;
}): Map<string, Record<string, unknown>> {
  return new Map(
    ((dvo?.data["fields"] as Array<Record<string, unknown>>) ?? []).map((f) => [
      f["name"] as string,
      f,
    ]),
  );
}
