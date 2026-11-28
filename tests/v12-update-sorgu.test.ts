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

const FOUR_METHODS = [
  "medula.hastane.hasta-kabul.get-yesil-kartli-sevkli-hasta",
  "medula.hastane.hasta-kabul.update-tedavi-turu",
  "medula.hastane.hasta-kabul.update-takip-tipi",
  "medula.hastane.hasta-kabul.get-mustehaklik-kapsam-kodu",
];

describe("v0.12 update/sorgu metotlari (Group 57)", () => {
  it("registers the four remaining guide 4.1 methods", () => {
    for (const id of FOUR_METHODS) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      expect(m, `${id} must exist`).toBeTruthy();
      expect(m?.data["status"]).toBe("reviewed");
      expect(m?.data["sandbox"]).toMatchObject({ supported: true });
    }
  });

  it("lists the four methods on the hasta-kabul service", () => {
    const svc = reg.services.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul",
    );
    const methods = svc?.data["methods"] as string[];
    expect(methods).toHaveLength(22);
    for (const id of FOUR_METHODS) {
      expect(methods, `service list missing ${id}`).toContain(id);
    }
  });

  it("keeps the guide-anchored contract shapes (s.176-180)", () => {
    const giris = (id: string, fields: Array<[string, string, boolean]>) => {
      const dvo = reg.dvos.find((x) => x.data["id"] === id);
      expect(dvo, `${id} must exist`).toBeTruthy();
      const actual = (
        dvo?.data["fields"] as Array<Record<string, unknown>>
      ).map((f) => [f["name"], f["type"], f["required"] === true]);
      expect(actual).toEqual(fields.map(([n, t, r]) => [n, t, r]));
      expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain(GUIDE_ID);
    };

    giris("YesilKartliSevkliHastaGirisDVO", [
      ["hastaTCKNo", "string", true],
      ["tesisKodu", "integer", true],
    ]);
    giris("TedaviTuruDegistirGirisDVO", [
      ["takipNo", "string", true],
      ["tesisKodu", "integer", true],
      ["yeniTedaviTuru", "string", true],
      ["yatisBitisTarihi", "string", false],
    ]);
    giris("TakipTipiDegistirGirisDVO", [
      ["takipNo", "string", true],
      ["tesisKodu", "integer", true],
      ["yeniTakipTipi", "string", true],
    ]);
    giris("MustehaklikGirisDVO", [
      ["tcKimlikNo", "string", true],
      ["tarih", "string", true],
      ["saglikTesisKodu", "integer", true],
    ]);
  });

  it("keeps the answer DVO fields including the shakeli guide length", () => {
    const cevap = (id: string, fields: string[]) => {
      const dvo = reg.dvos.find((x) => x.data["id"] === id);
      expect(dvo, `${id} must exist`).toBeTruthy();
      const actual = (
        dvo?.data["fields"] as Array<Record<string, unknown>>
      ).map((f) => String(f["name"]));
      expect(actual).toEqual(fields);
    };
    cevap("YesilKartliSevkliHastaCevapDVO", [
      "yesilKartliHastaSevkBilgileriDVO",
      "hastaBilgileriDVO",
      "sonucKodu",
      "sonucMesaji",
    ]);
    cevap("TedaviTuruDegistirCevapDVO", [
      "takipNo",
      "yeniTedaviTuru",
      "hastaBasvuruNo",
      "sonucKodu",
      "sonucMesaji",
    ]);
    cevap("TakipTipiDegistirCevapDVO", [
      "takipNo",
      "yeniTakipTipi",
      "hastaBasvuruNo",
      "sonucKodu",
      "sonucMesaji",
    ]);
    cevap("MustehaklikCevapDVO", ["kapsamTuru", "sonucKodu", "sonucMesaji"]);

    // Guide prints hastaBasvuruNo as "String 4" in these response tables
    // (s.178/179) — a guide-side anomaly worth documenting.
    const dvo = reg.dvos.find(
      (x) => x.data["id"] === "TedaviTuruDegistirCevapDVO",
    );
    const basvuru = (
      dvo?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "hastaBasvuruNo");
    expect(JSON.stringify(basvuru)).toContain("guide anomaly");
  });

  it("keeps the sevk bilgi rows and kapsam turu typed", () => {
    const sevk = reg.dvos.find(
      (x) => x.data["id"] === "YesilKartliHastaSevkBilgileriDVO",
    );
    expect(sevk, "YesilKartliHastaSevkBilgileriDVO must exist").toBeTruthy();
    const names = (sevk?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => String(f["name"]),
    );
    expect(names).toEqual([
      "sevkEdilenBransKodu",
      "sevkEdenTesisKodu",
      "sevkEdilmeTarihi",
      "takipNo",
    ]);
    const mustehaklik = reg.dvos.find(
      (x) => x.data["id"] === "MustehaklikCevapDVO",
    );
    const kapsam = (
      mustehaklik?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "kapsamTuru");
    expect(kapsam?.["type"]).toBe("integer");
    expect(kapsam?.["enumRef"]).toBeNull();
  });

  it("grows the registry counts to 77 methods and 221 DVOs", () => {
    expect(reg.methods).toHaveLength(77);
    expect(reg.dvos).toHaveLength(221);
    expect(reg.enums).toHaveLength(81);
  });

  it("resolves the HastaKabul backlog item in the page map", () => {
    const pageMap = readFileSync(
      resolve(root, "tools", "extract", "guide-page-map.md"),
      "utf8",
    );
    expect(pageMap).not.toContain("New HastaKabul methods");
    expect(pageMap).toContain("G57");
  });
});
