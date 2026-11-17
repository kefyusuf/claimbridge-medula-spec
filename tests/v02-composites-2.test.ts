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

describe("v0.2 composites 2 (Group 14)", () => {
  it("registers the odeme-sorgu-durum enum with the eight guide codes (s.238)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "odeme-sorgu-durum");
    expect(e, "odeme-sorgu-durum must exist").toBeTruthy();
    const values = e?.data["values"] as Array<{ code: string; label: string }>;
    expect(values.map((v) => v.code)).toEqual([
      "0",
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "X",
    ]);
    expect(values.map((v) => v.label)).toEqual([
      "Ilk Kayit",
      "Hatasiz",
      "Hatali",
      "Faturalandi",
      "Donem Sonlandirildi",
      "Incelendi",
      "Itiraz Incelendi",
      "Online diger islem talep",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":238');
  });

  it("registers the HizmetDVO composite from Tablo 4.2.2.c (s.237-238)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HizmetDVO");
    expect(dvo, "HizmetDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    expect(dvo?.data["direction"]).toBe("output");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    for (const field of [
      "ameliyatveGirisimBilgileri",
      "digerIslemBilgileri",
      "disBilgileri",
      "ilacBilgileri",
      "konsultasyonBilgileri",
      "malzemeBilgileri",
      "muayeneBilgisi",
      "tahlilBilgileri",
      "tanilar",
      "tetkikveRadyolojiBilgileri",
      "hastaYatisBilgileri",
      "takipNo",
      "odemeSorguDurum",
      "triajBeyani",
    ]) {
      expect(names, `missing guide field ${field}`).toContain(field);
    }
    const odeme = (dvo?.data["fields"] as Array<Record<string, unknown>>).find(
      (f) => f["name"] === "odemeSorguDurum",
    );
    expect(odeme?.["type"]).toBe("enum");
    expect(odeme?.["enumRef"]).toBe("odeme-sorgu-durum");
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":237');
    expect(refs).toContain('"page":238');
  });

  it("replaces the HizmetOkuCevapDVO hizmetler placeholder with the registry composite", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HizmetOkuCevapDVO");
    const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
    const hizmetler = fields.find((f) => f["name"] === "hizmetler");
    expect(String(hizmetler?.["description"])).toContain("HizmetDVO");
    expect(String(hizmetler?.["description"])).not.toContain("placeholder");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(63);
    expect(manifest.counts.enums).toBe(19);
  });
});
