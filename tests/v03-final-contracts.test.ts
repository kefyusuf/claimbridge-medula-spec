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

describe("v0.3 final contracts (Group 30)", () => {
  it("registers KemikIligiTCIleSorgu composites (4.1.20, s.184)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiTCIleOkuGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    expect(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["tcNo", "tesisKodu"]);
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiTCIleOkuCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    const cevapFields = (cevap?.data["fields"] ?? []) as Array<
      Record<string, unknown>
    >;
    expect(
      JSON.stringify(
        cevapFields.find((f) => f["name"] === "kemikIligiCevapDVO"),
      ),
    ).toContain("KemikIligiOkuCevapDVO");
    expect(JSON.stringify(cevap?.data["sourceRefs"])).toContain('"page":184');
  });

  it("registers the ekds dogrulama composites (4.1.21, s.185-186)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "BKDSDogrulamaKisiSorguGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    const detay = reg.dvos.find(
      (d) => d.data["id"] === "BKDSDogrulamaDetayDVO",
    );
    expect(detay?.data["status"]).toBe("reviewed");
    const names = (detay?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "dogrulananTckNo",
      "tesisKodu",
      "dogrulamaTarihi",
      "araciTckNo",
      "dogrulamaYontemi",
      "dogrulamaYontemAciklama",
      "takipReceteNo",
    ]);
    expect(JSON.stringify(detay?.data["sourceRefs"])).toContain('"page":186');
  });

  it("registers the EKDS belge sorgu composites (4.1.22, s.186-187)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "EKDSBelgeGerekenTakipSorguGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    expect(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["tesisKodu", "evrakID"]);
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "EKDSBelgeGerekenTakipCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(cevap?.data["sourceRefs"])).toContain('"page":187');
  });

  it("enriches IslemDuzeltmeCevapDVO with the s.184 tail fields", () => {
    const dvo = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiIslemDuzeltmeCevapDVO",
    );
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("yeniIslemKodu")).toBeTruthy();
    expect(byName.get("bildirimNo")).toBeTruthy();
    expect(
      JSON.stringify(byName.get("yeniIslemKodu")?.["sourceRefs"]),
    ).toContain('"page":184');
  });

  it("resolves the final three contracts — 25/25 methods reviewed", () => {
    const expectations: Array<[string, string, string]> = [
      [
        "medula.hastane.hasta-kabul.kemik-iligi-tc-ile-sorgu",
        "KemikIligiTCIleOkuGirisDVO",
        "KemikIligiTCIleOkuCevapDVO",
      ],
      [
        "medula.hastane.hasta-kabul.ekds-kisi-dogrulama-sorgu",
        "BKDSDogrulamaKisiSorguGirisDVO",
        "BKDSDogrulamaKisiSorguCevapDVO",
      ],
      [
        "medula.hastane.hasta-kabul.ekds-belge-gereken-takip-sorgu",
        "EKDSBelgeGerekenTakipSorguGirisDVO",
        "EKDSBelgeGerekenTakipCevapDVO",
      ],
    ];
    for (const [id, inputDvo, outputDvo] of expectations) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      expect(m?.data["contract"], `${id} contract`).toEqual({
        inputDvo,
        outputDvo,
      });
      expect(m?.data["status"], `${id} must be reviewed`).toBe("reviewed");
    }
    const reviewed = reg.methods.filter(
      (m) => m.data["status"] === "reviewed",
    ).length;
    expect(
      reviewed,
      "29/30 reviewed; the disabled HastaKabulKimlikDogrulama stays draft",
    ).toBe(60);
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(189);
    expect(manifest.counts.methods).toBe(61);
  });
});
