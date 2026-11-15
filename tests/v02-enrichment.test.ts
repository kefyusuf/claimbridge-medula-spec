import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { parse } from "yaml";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");
const GUIDE_ID = "medula-hastane-guide-3-1-1-2026-10-19";

let reg: ReturnType<typeof loadRegistry>;

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("v0.2 enrichment (Group 10)", () => {
  it("registers TakipSil DVOs from Tablo 4.1.3.a/b (s.168)", () => {
    for (const id of ["TakipSilGirisDVO", "TakipSilCevapDVO"]) {
      const dvo = reg.dvos.find((d) => d.data["id"] === id);
      expect(dvo, `${id} must exist`).toBeTruthy();
      expect(dvo?.data["status"]).toBe("reviewed");
      const refs = JSON.stringify(dvo?.data["sourceRefs"]);
      expect(refs).toContain(GUIDE_ID);
      expect(refs).toContain('"page":168');
    }
    const giris = reg.dvos.find((d) => d.data["id"] === "TakipSilGirisDVO");
    const fields = (
      giris?.data["fields"] as Array<Record<string, unknown>>
    ).map((f) => f["name"]);
    expect(fields).toEqual(["saglikTesisKodu", "takipNo", "ktsHbysKodu"]);
    for (const f of giris?.data["fields"] as Array<Record<string, unknown>>) {
      expect(f["required"], `${String(f["name"])} required per guide`).toBe(
        true,
      );
    }
  });

  it("registers TakipOkuGirisDVO from Tablo 4.1.2.a (s.164-165)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TakipOkuGirisDVO");
    expect(dvo, "TakipOkuGirisDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"],
    );
    expect(names).toContain("saglikTesisKodu");
    expect(names).toContain("takipNo");
    expect(names).toContain("ktsHbysKodu");
  });

  it("resolves hasta-kabul-oku and hasta-kabul-iptal contracts (status reviewed)", () => {
    const oku = reg.methods.find(
      (m) => m.data["id"] === "medula.hastane.hasta-kabul.hasta-kabul-oku",
    );
    expect(oku?.data["contract"]).toEqual({
      inputDvo: "TakipOkuGirisDVO",
      outputDvo: "TakipDVO",
    });
    expect(oku?.data["status"]).toBe("reviewed");

    const iptal = reg.methods.find(
      (m) => m.data["id"] === "medula.hastane.hasta-kabul.hasta-kabul-iptal",
    );
    expect(iptal?.data["contract"]).toEqual({
      inputDvo: "TakipSilGirisDVO",
      outputDvo: "TakipSilCevapDVO",
    });
    expect(iptal?.data["status"]).toBe("reviewed");
  });

  it("registers the sigortali-turu enum with the four guide codes (s.154)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "sigortali-turu");
    expect(e, "sigortali-turu must exist").toBeTruthy();
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual(["1", "2", "3", "4"]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":154');
  });

  it("registers the tedavi-tipi enum with the guide codes 0-22 (s.158-159)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "tedavi-tipi");
    expect(e, "tedavi-tipi must exist").toBeTruthy();
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toHaveLength(22);
    expect(codes[0]).toBe("0");
    expect(codes).toContain("20");
    expect(codes).not.toContain("3");
    expect(codes[21]).toBe("22");
    expect(e?.data["status"]).toBe("reviewed");
  });

  it("binds ProvizyonGirisDVO sigortaliTuru and tedaviTipi to the new enums", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "ProvizyonGirisDVO");
    const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
    const sigortali = fields.find((f) => f["name"] === "sigortaliTuru");
    const tedaviTipi = fields.find((f) => f["name"] === "tedaviTipi");
    expect(sigortali?.["type"]).toBe("enum");
    expect(sigortali?.["enumRef"]).toBe("sigortali-turu");
    expect(tedaviTipi?.["type"]).toBe("enum");
    expect(tedaviTipi?.["enumRef"]).toBe("tedavi-tipi");
  });

  it("aligns HizmetKayitGirisDVO with Tablo 4.2.1.a (s.189-190)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HizmetKayitGirisDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"],
    );
    for (const guideField of [
      "ameliyatveGirisimBilgileri",
      "tanilar",
      "muayeneBilgisi",
      "triajBeyani",
      "hastaYatisBilgileri",
      "ktsHbysKodu",
    ]) {
      expect(names, `missing guide field ${guideField}`).toContain(guideField);
    }
    expect(names, "guide does not define taniBilgileri").not.toContain(
      "taniBilgileri",
    );
    expect(names, "guide does not define hizmetDetaylari").not.toContain(
      "hizmetDetaylari",
    );
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("hastaBasvuruNo")?.["required"]).toBe(false);
    expect(byName.get("takipNo")?.["required"]).toBe(true);
    expect(byName.get("ktsHbysKodu")?.["required"]).toBe(true);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":189');
  });

  it("aligns HizmetKayitCevapDVO with Tablo 4.2.1.b (s.190)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HizmetKayitCevapDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"],
    );
    expect(names).toEqual([
      "sonucKodu",
      "sonucMesaji",
      "takipNo",
      "hastaBasvuruNo",
      "saglikTesisKodu",
      "islemBilgileri",
      "hataliKayitlar",
    ]);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":190');
  });

  it("updates the manifest counts for the enlarged registry", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(41);
    expect(manifest.counts.enums).toBe(19);
    expect(manifest.counts.methods).toBe(10);
  });

  it("records the PRD 13.4 amendment for the guide-aligned names", () => {
    const prd = readFileSync(
      resolve(root, "docs", "CLAIMBRIDGE_MEDULA_SPEC_PRD.md"),
      "utf8",
    );
    expect(prd).toContain("Group 10 amendment");
    expect(prd).toContain("tanilar");
  });
});
