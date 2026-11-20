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

describe("v0.3 entries 1 (Group 17)", () => {
  it("registers AmeliyatveGirisimBilgisiDVO from Tablo 4.2.1.c (s.190-192)", () => {
    const dvo = reg.dvos.find(
      (d) => d.data["id"] === "AmeliyatveGirisimBilgisiDVO",
    );
    expect(dvo, "AmeliyatveGirisimBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "aciklama",
      "adet",
      "ayniFarkliKesi",
      "bransKodu",
      "drTescilNo",
      "hizmetSunucuRefNo",
      "islemSiraNo",
      "islemTarihi",
      "sagSol",
      "sutKodu",
      "euroscore",
      "ozelDurum",
      "cokluOzelDurum",
      "raporTakipNo",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("drTescilNo")?.["length"]).toBe(16);
    expect(byName.get("sutKodu")?.["length"]).toBe(7);
    expect(byName.get("hizmetSunucuRefNo")?.["length"]).toBe(20);
    expect(byName.get("aciklama")?.["length"]).toBe(1000);
    expect(String(byName.get("islemSiraNo")?.["description"])).toContain(
      "null",
    );
    expect(byName.get("euroscore")?.["required"]).toBe(true);
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":190');
    expect(refs).toContain('"page":192');
  });

  it("registers DigerIslemBilgisiDVO from Tablo 4.2.1.d (s.192-193)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "DigerIslemBilgisiDVO");
    expect(dvo, "DigerIslemBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "adet",
      "bransKodu",
      "sutKodu",
      "drTescilNo",
      "hizmetSunucuRefNo",
      "islemSiraNo",
      "islemTarihi",
      "raporTakipNo",
      "ozelDurum",
      "ayniFarkliKesi",
      "cokluOzelDurum",
      "aciklama",
      "sagSol",
      "istemYapanDrTescilNo",
      "istemYapanDrBrans",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("raporTakipNo")?.["length"]).toBe(8);
    expect(byName.get("istemYapanDrTescilNo")?.["required"]).toBe(true);
    expect(byName.get("istemYapanDrBrans")?.["length"]).toBe(4);
    expect(String(byName.get("sagSol")?.["description"])).toContain("R");
    expect(String(byName.get("drTescilNo")?.["description"])).toContain(
      "530140",
    );
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":192');
  });

  it("registers the ayni-farkli-kesi and euroscore enums", () => {
    const kesi = reg.enums.find((x) => x.data["id"] === "ayni-farkli-kesi");
    expect(kesi?.data["status"]).toBe("reviewed");
    expect(
      (kesi?.data["values"] as Array<{ code: string }>).map((v) => v.code),
    ).toEqual(["1", "2", "3", "4", "5"]);
    const euro = reg.enums.find((x) => x.data["id"] === "euroscore");
    expect(euro?.data["status"]).toBe("reviewed");
    expect(
      (euro?.data["values"] as Array<{ code: string; label: string }>).map(
        (v) => v.label,
      ),
    ).toEqual(["Yok", "Dusuk risk", "Orta risk", "Yuksek risk"]);
    expect(JSON.stringify(kesi?.data["sourceRefs"])).toContain('"page":191');
    expect(JSON.stringify(euro?.data["sourceRefs"])).toContain('"page":191');
  });

  it("documents the sagSol divergence between the two tables", () => {
    const ameliyat = reg.dvos.find(
      (d) => d.data["id"] === "AmeliyatveGirisimBilgisiDVO",
    );
    const diger = reg.dvos.find((d) => d.data["id"] === "DigerIslemBilgisiDVO");
    const a = JSON.stringify(
      (ameliyat?.data["fields"] as Array<Record<string, unknown>>).find(
        (f) => f["name"] === "sagSol",
      ),
    );
    const d = JSON.stringify(
      (diger?.data["fields"] as Array<Record<string, unknown>>).find(
        (f) => f["name"] === "sagSol",
      ),
    );
    expect(a).toContain("1/2/3");
    expect(d).toContain("R (Sag)");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(176);
    expect(manifest.counts.enums).toBe(69);
  });
});
