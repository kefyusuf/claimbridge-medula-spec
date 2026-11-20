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

describe("v0.3 kemik-oku (Group 29)", () => {
  it("registers KemikIligiOku composites from Tablo 4.1.18.a/b (s.182)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiOkuGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    expect(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual([
      "hastaTcNo",
      "islemTarihi",
      "islemKodu",
      "saglikTesisKodu",
      "bildirimNo",
    ]);
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiOkuCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (cevap?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("aktifPasif")).toBeTruthy();
    expect(byName.get("bildirimNo")?.["type"]).toBe("integer");
    expect(JSON.stringify(cevap?.data["sourceRefs"])).toContain('"page":182');
  });

  it("registers KemikIligiIslemDuzeltme composites from Tablo 4.1.19.a/b (s.183)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiIslemDuzeltmeGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("islemKodu")?.["required"]).toBe(true);
    expect(byName.get("yeniIslemKodu")?.["required"]).toBe(true);
    expect(String(byName.get("islemKodu")?.["description"])).toContain("Eski");
    expect(String(byName.get("yeniIslemKodu")?.["description"])).toContain(
      "Yeni",
    );
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiIslemDuzeltmeCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(giris?.data["sourceRefs"])).toContain('"page":183');
  });

  it("resolves the kemik-iligi-oku and islem-duzeltme contracts", () => {
    const oku = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.kemik-iligi-oku",
    );
    expect(oku?.data["contract"]).toEqual({
      inputDvo: "KemikIligiOkuGirisDVO",
      outputDvo: "KemikIligiOkuCevapDVO",
    });
    expect(oku?.data["status"]).toBe("reviewed");
    const duzelt = reg.methods.find(
      (x) =>
        x.data["id"] ===
        "medula.hastane.hasta-kabul.kemik-iligi-islem-duzeltme",
    );
    expect(duzelt?.data["contract"]).toEqual({
      inputDvo: "KemikIligiIslemDuzeltmeGirisDVO",
      outputDvo: "KemikIligiIslemDuzeltmeCevapDVO",
    });
    expect(duzelt?.data["status"]).toBe("reviewed");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(189);
    expect(manifest.counts.methods).toBe(61);
  });
});
