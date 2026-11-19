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

describe("v0.3 sevk + update (Group 27)", () => {
  it("registers SevkBildir DVOs from Tablo 4.1.8.a/b (s.173)", () => {
    const giris = reg.dvos.find((d) => d.data["id"] === "SevkBildirGirisDVO");
    expect(giris?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("takipNo")?.["required"]).toBe(true);
    expect(byName.get("sevkEdilisTarihi")?.["length"]).toBe(10);
    expect(byName.get("yesilKartSevkEdilenTedaviTipi")?.["type"]).toBe(
      "integer",
    );
    expect(byName.get("yesilKartSevkEdilenBransKodu")?.["required"]).toBe(
      false,
    );
    const sonuc = reg.dvos.find((d) => d.data["id"] === "SevkBildirSonucDVO");
    expect(sonuc?.data["status"]).toBe("reviewed");
    expect(
      (sonuc?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["takipNo", "sevkEdilisTarihi", "sonucKodu", "sonucMesaji"]);
    expect(JSON.stringify(giris?.data["sourceRefs"])).toContain('"page":173');
  });

  it("registers ProvizyonDegistir DVOs from Tablo 4.1.10.a/b (s.174)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "ProvizyonDegistirGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    expect(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["takipNo", "tesisKodu", "yeniProvizyonTipi"]);
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "ProvizyonDegistirCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    expect(
      (cevap?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual([
      "takipNo",
      "yeniProvizyonTipi",
      "hastaBasvuruNo",
      "sonucKodu",
      "sonucMesaji",
    ]);
    expect(JSON.stringify(cevap?.data["sourceRefs"])).toContain('"page":174');
  });

  it("resolves the sevk-bildir and update contracts", () => {
    const expectations: Array<[string, string, string]> = [
      [
        "medula.hastane.hasta-kabul.sevk-bildir",
        "SevkBildirGirisDVO",
        "SevkBildirSonucDVO",
      ],
      [
        "medula.hastane.hasta-kabul.update-tedavi-tipi",
        "TakipOkuGirisDVO",
        "TakipDVO",
      ],
      [
        "medula.hastane.hasta-kabul.update-provizyon-tipi",
        "ProvizyonDegistirGirisDVO",
        "ProvizyonDegistirCevapDVO",
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
  });

  it("notes the UpdateTedaviTipi zero-new-DVO reuse", () => {
    const m = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.update-tedavi-tipi",
    );
    const refs = JSON.stringify(m?.data["sourceRefs"]);
    expect(refs).toContain('"page":174');
    expect(refs).toContain("TakipOkuGirisDVO/TakipDVO yeniden kullanim");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(98);
    expect(manifest.counts.methods).toBe(32);
  });
});
