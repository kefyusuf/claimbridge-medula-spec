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

describe("v0.3 composites (Group 16)", () => {
  it("registers KayitliIslemBilgisiDVO with its two pairing fields (4.2.1.m, s.235)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "KayitliIslemBilgisiDVO");
    expect(dvo, "KayitliIslemBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual(["hizmetSunucuRefNo", "islemSiraNo"]);
    expect(byName(dvo).get("hizmetSunucuRefNo")?.["length"]).toBe(20);
    expect(byName(dvo).get("islemSiraNo")?.["length"]).toBe(15);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":235');
  });

  it("registers OncekiIslemBilgisiDVO from Tablo 4.2.1.p (s.236)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "OncekiIslemBilgisiDVO");
    expect(dvo, "OncekiIslemBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "islemAdedi",
      "islemTarihi",
      "saglikTesisKodu",
      "tesisAdi",
    ]);
    expect(byName(dvo).get("saglikTesisKodu")?.["length"]).toBe(8);
    expect(byName(dvo).get("tesisAdi")?.["length"]).toBe(100);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":236');
  });

  it("registers FaturaCevapDetayDVO from Tablo 4.3.3.c (s.245-246)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "FaturaCevapDetayDVO");
    expect(dvo, "FaturaCevapDetayDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
    const names = fields.map((f) => f["name"] as string);
    expect(names).toEqual([
      "aciklama",
      "protokolNo",
      "taburcuKodu",
      "takipNo",
      "takipToplamTutar",
      "islemDetaylari",
    ]);
    expect(byName(dvo).get("taburcuKodu")?.["enumRef"]).toBe("taburcu-kodu");
    expect(byName(dvo).get("takipToplamTutar")?.["type"]).toBe("decimal");
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":245');
    expect(refs).toContain('"page":246');
  });

  it("resolves the nested placeholders that cited these composites", () => {
    const hatali = reg.dvos.find(
      (d) => d.data["id"] === "HataliIslemBilgisiDVO",
    );
    const onceki = byName(hatali).get("oncekiIslemBilgisi");
    expect(String(onceki?.["description"])).not.toContain("placeholder");
    expect(String(onceki?.["description"])).toContain(
      "OncekiIslemBilgisiDVO registry entity",
    );

    const okuCevap = reg.dvos.find((d) => d.data["id"] === "HizmetOkuCevapDVO");
    void okuCevap;
    const kayitliCevap = reg.dvos.find(
      (d) => d.data["id"] === "HizmetKayitCevapDVO",
    );
    const islemBilgileri = byName(kayitliCevap).get("islemBilgileri");
    expect(String(islemBilgileri?.["description"])).toContain(
      "KayitliIslemBilgisiDVO",
    );

    const oku = reg.dvos.find((d) => d.data["id"] === "FaturaOkuCevapDVO");
    const detay = byName(oku).get("faturaDetaylari");
    expect(String(detay?.["description"])).toContain(
      "FaturaCevapDetayDVO registry entity",
    );
    expect(String(detay?.["description"])).not.toContain("placeholder");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(59);
    expect(manifest.counts.enums).toBe(19);
  });
});
