import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { parse } from "yaml";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");
const GUIDE_ID = "medula-hastane-guide-3-1-1-2026-10-19";

type RegistryEntry = { file: string; data: Record<string, unknown> };

let reg: ReturnType<typeof loadRegistry>;
let enums: RegistryEntry[];

beforeAll(() => {
  reg = loadRegistry(root);
  enums = reg.enums;
});

describe("guide-verification (Group 9)", () => {
  it("registers the acquired 3.1.1 guide edition with its sha256", () => {
    const guides = parse(
      readFileSync(resolve(root, "sources", "guide-versions.yml"), "utf8"),
    ) as {
      guides: Array<Record<string, string>>;
    };
    const entry = guides.guides.find((g) => g.id === GUIDE_ID);
    expect(entry, "verified guide edition must be registered").toBeTruthy();
    expect(entry?.sha256).toMatch(/^[0-9a-f]{64}$/);
    expect(entry?.fetchedAt).toBe("2026-11-15");
    expect(entry?.url).toContain("medula.sgk.gov.tr");
  });

  it("carries the guide-verified provizyonTipi codes (Tablo 4.1.1.a, s.156-157)", () => {
    const e = enums.find((x) => x.data["id"] === "provizyon-tipi");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual([
      "N",
      "I",
      "A",
      "T",
      "V",
      "M",
      "K",
      "C",
      "H",
      "R",
      "L",
      "G",
      "U",
      "D",
      "E",
      "S",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain(GUIDE_ID);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":156');
  });

  it("carries the guide-verified takipTipi codes (Tablo 4.1.1.a, s.157)", () => {
    const e = enums.find((x) => x.data["id"] === "takip-tipi");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual([
      "N",
      "E",
      "U",
      "K",
      "T",
      "Y",
      "P",
      "S",
      "C",
      "F",
      "B",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
  });

  it("carries the guide-verified takipDurumu codes (Tablo 4.1.2.b, s.166)", () => {
    const e = enums.find((x) => x.data["id"] === "takip-durumu");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual(["0", "1"]);
    expect(e?.data["status"]).toBe("reviewed");
  });

  it("carries the guide-verified tedaviTuru codes (Tablo 4.1.1.a, s.158)", () => {
    const e = enums.find((x) => x.data["id"] === "tedavi-turu");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual(["A", "Y", "G"]);
    expect(e?.data["status"]).toBe("reviewed");
  });

  it("aligns ProvizyonGirisDVO fields with Tablo 4.1.1.a (s.154-159)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "ProvizyonGirisDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
    const byName = new Map(fields.map((f) => [f["name"] as string, f]));

    expect(byName.get("bransKodu")?.["type"]).toBe("string");
    expect(byName.get("bransKodu")?.["length"]).toBe(4);
    expect(byName.get("ktsHbysKodu")?.["required"]).toBe(true);
    expect(byName.get("doktorTescilNo")?.["deprecatedIn"]).toBe("0.2.0");
    for (const guideField of [
      "sigortaliTuru",
      "devredilenKurum",
      "provizyonTarihi",
      "tedaviTipi",
      "istisnaiHal",
    ]) {
      expect(byName.has(guideField), `missing guide field ${guideField}`).toBe(
        true,
      );
    }
    const refs = JSON.stringify(fields.map((f) => f["sourceRefs"]));
    expect(refs).toContain(GUIDE_ID);
    expect(refs).toContain('"page":154');
  });

  it("aligns FaturaGirisDVO fields with Tablo 4.3.1.a (s.240)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "FaturaGirisDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
    const byName = new Map(fields.map((f) => [f["name"] as string, f]));
    expect(byName.get("trafikKazasiOdemeYuzdesi")?.["required"]).toBe(true);
    expect(byName.get("ilaveUcret")?.["required"]).toBe(true);
    expect(byName.get("muvafakatVar")?.["type"]).toBe("string");
    expect(String(byName.get("muvafakatVar")?.["description"])).toContain("E");
    expect(byName.get("faturaRefNo")?.["length"]).toBe(20);
  });

  it("promotes the three core kayit methods to reviewed with page references", () => {
    for (const id of [
      "medula.hastane.hasta-kabul.hasta-kabul",
      "medula.hastane.hizmet-kayit.hizmet-kayit",
      "medula.hastane.fatura-kayit.fatura-kayit",
    ]) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      expect(m?.data["status"], `${id} must be reviewed`).toBe("reviewed");
      const refs = JSON.stringify(m?.data["sourceRefs"]);
      expect(refs).toContain(GUIDE_ID);
      expect(refs).toContain('"page":149');
    }
  });

  it("keeps the other oku/iptal methods draft until Group 11 reads their tables", () => {
    for (const id of [
      "medula.hastane.hizmet-kayit.hizmet-kaydi-oku",
      "medula.hastane.hizmet-kayit.hizmet-kaydi-iptal",
      "medula.hastane.fatura-kayit.fatura-oku",
      "medula.hastane.fatura-kayit.fatura-iptal",
      "medula.hastane.fatura-kayit.fatura-tutar-oku",
    ]) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      expect(m?.data["status"]).toBe("draft");
    }
  });
});
