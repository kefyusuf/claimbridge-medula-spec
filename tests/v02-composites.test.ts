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

describe("v0.2 composites (Group 13)", () => {
  it("registers TaniBilgisiDVO from Tablo 4.2.1.k (s.232)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TaniBilgisiDVO");
    expect(dvo, "TaniBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    expect(dvo?.data["domain"]).toBe("hizmet-kayit");
    expect(dvo?.data["direction"]).toBe("shared");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "islemSiraNo",
      "birincilTani",
      "hizmetSunucuRefNo",
      "taniKodu",
      "taniTipi",
      "ozelDurum",
      "cokluOzelDurum",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("birincilTani")?.["required"]).toBe(true);
    expect(String(byName.get("birincilTani")?.["description"])).toContain("E");
    expect(byName.get("taniKodu")?.["length"]).toBe(10);
    expect(byName.get("hizmetSunucuRefNo")?.["length"]).toBe(20);
    expect(String(byName.get("islemSiraNo")?.["description"])).toContain(
      "null",
    );
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":232');
    expect(JSON.stringify(byName.get("taniKodu")?.["sourceRefs"])).toContain(
      GUIDE_ID,
    );
  });

  it("registers the tani-tipi enum with the three guide codes (s.232)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "tani-tipi");
    expect(e, "tani-tipi must exist").toBeTruthy();
    const values = e?.data["values"] as Array<{ code: string; label: string }>;
    expect(values.map((v) => v.code)).toEqual(["1", "2", "3"]);
    expect(values.map((v) => v.label)).toEqual([
      "On tani",
      "Kesin tani",
      "Ayirici tani",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":232');
  });

  it("binds TaniBilgisiDVO taniTipi and HizmetKayitGirisDVO tanilar to the composite", () => {
    const tani = reg.dvos.find((d) => d.data["id"] === "TaniBilgisiDVO");
    const fields = tani?.data["fields"] as Array<Record<string, unknown>>;
    const tipi = fields.find((f) => f["name"] === "taniTipi");
    expect(tipi?.["type"]).toBe("enum");
    expect(tipi?.["enumRef"]).toBe("tani-tipi");

    const giris = reg.dvos.find((d) => d.data["id"] === "HizmetKayitGirisDVO");
    const tanilar = (
      giris?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "tanilar");
    expect(String(tanilar?.["description"])).toContain("TaniBilgisiDVO");
    expect(String(tanilar?.["description"])).toContain("4.2.1.k");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(23);
    expect(manifest.counts.enums).toBe(12);
  });
});
