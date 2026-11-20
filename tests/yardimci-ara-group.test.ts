import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { parse } from "yaml";
import { beforeAll, describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

function readYaml(rel: string): Record<string, unknown> {
  return parse(readFileSync(resolve(root, rel), "utf8")) as Record<
    string,
    unknown
  >;
}

type Yaml = Record<string, unknown>;

const METHOD_SLUGS = [
  "saglik-tesisi-ara",
  "doktor-ara",
  "takip-ara",
  "ilac-ara",
];
const DVO_NAMES = [
  "saglik-tesisi-ara-giris-dvo",
  "saglik-tesisi-ara-cevap-dvo",
  "saglik-tesisi-list-dvo",
  "doktor-ara-giris-dvo",
  "doktor-ara-cevap-dvo",
  "doktor-list-dvo",
  "takip-ara-giris-dvo",
  "takip-ara-cevap-dvo",
  "ilac-ara-giris-dvo",
  "ilac-ara-cevap-dvo",
  "ilac-list-dvo",
  "fiyat-list-dvo",
  "ilac-indirim-dvo",
];

let service: Yaml;
let methods: Map<string, Yaml>;
let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;

beforeAll(() => {
  service = readYaml("registry/services/yardimci-islemler.yml");
  methods = new Map(
    METHOD_SLUGS.map((slug) => [
      slug,
      readYaml(`registry/methods/yardimci-islemler/${slug}.yml`),
    ]),
  );
  dvos = new Map(
    DVO_NAMES.map((name) => [
      name,
      readYaml(`registry/dvos/yardimci-islemler/${name}.yml`),
    ]),
  );
  enums = new Map(
    ["odenme-durumu", "aktif-pasif"].map((name) => [
      name,
      readYaml(`registry/enums/${name}.yml`),
    ]),
  );
});

function fields(dvo: string): Array<Record<string, unknown>> {
  return (dvos.get(dvo)?.["fields"] as Array<Record<string, unknown>>) ?? [];
}

function field(dvo: string, name: string): Record<string, unknown> {
  const found = fields(dvo).find((f) => f["name"] === name);
  expect(found, `field ${dvo}.${name}`).toBeTruthy();
  return found as Record<string, unknown>;
}

function values(enumId: string): Array<Record<string, string>> {
  return (enums.get(enumId)?.["values"] as Array<Record<string, string>>) ?? [];
}

describe("yardimci search methods (G44a, guide s.283-290)", () => {
  it("registers the yardimci-islemler service with guide-verified wsdl", () => {
    expect(service["id"]).toBe("medula.hastane.yardimci-islemler");
    const wsdl = service["wsdl"] as Record<string, string>;
    expect(wsdl["production"]).toBe("wsdl.yardimci-islemler.production");
    expect(service["methods"] as string[]).toHaveLength(10);
    const manifest = readYaml("sources/wsdl-manifest.yml");
    const wsdls = manifest["wsdls"] as Array<Record<string, string>>;
    const yardimci = wsdls.filter((w) => w["service"] === "yardimci-islemler");
    expect(yardimci).toHaveLength(2);
    expect(yardimci[0]["url"]).toContain("yardimciIslemlerWS");
  });

  it("binds the four search method contracts", () => {
    const expected: Array<[string, string, string, number]> = [
      [
        "saglik-tesisi-ara",
        "SaglikTesisiAraGirisDVO",
        "SaglikTesisiAraCevapDVO",
        283,
      ],
      ["doktor-ara", "DoktorAraGirisDVO", "DoktorAraCevapDVO", 284],
      ["takip-ara", "TakipAraGirisDVO", "TakipAraCevapDVO", 286],
      ["ilac-ara", "IlacAraGirisDVO", "IlacAraCevapDVO", 287],
    ];
    for (const [slug, inputDvo, outputDvo, page] of expected) {
      const method = methods.get(slug)!;
      expect(method["contract"]).toEqual({ inputDvo, outputDvo });
      const refs = method["sourceRefs"] as Array<Record<string, unknown>>;
      expect(refs.some((r) => r["page"] === page)).toBe(true);
      expect((method["success"] as Record<string, string>)["successCode"]).toBe(
        "0000",
      );
    }
  });

  it("verifies the tesis and doktor search DVOs (4.5.1 / 4.5.2)", () => {
    expect(fields("saglik-tesisi-ara-giris-dvo")).toHaveLength(5);
    expect(
      field("saglik-tesisi-ara-giris-dvo", "saglikTesisKodu")["required"],
    ).toBe(true);
    expect(fields("saglik-tesisi-list-dvo")).toHaveLength(9);
    expect(
      String(field("saglik-tesisi-list-dvo", "tesisIlAdi")["description"]),
    ).toContain("artifact");

    expect(fields("doktor-ara-giris-dvo")).toHaveLength(6);
    expect(field("doktor-ara-giris-dvo", "drTescilNo")["length"]).toBe(16);
    expect(fields("doktor-list-dvo")).toHaveLength(4);
  });

  it("verifies TakipAraGirisDVO with the one-month window rule (4.5.3)", () => {
    expect(fields("takip-ara-giris-dvo")).toHaveLength(6);
    expect(field("takip-ara-giris-dvo", "hastaTCK")["sensitive"]).toBe(true);
    expect(field("takip-ara-giris-dvo", "sevkDurumu")["enumRef"]).toBe(
      "evet-hayir",
    );
    expect(
      String(field("takip-ara-giris-dvo", "bitisTarihi")["description"]),
    ).toContain("one month");
    expect(
      String(field("takip-ara-cevap-dvo", "takipler")["description"]),
    ).toContain("TakipDVO");
  });

  it("verifies IlacListDVO and its item tables (4.5.4.c-e)", () => {
    expect(fields("ilac-ara-giris-dvo")).toHaveLength(3);
    expect(field("ilac-ara-giris-dvo", "barkod")["codeSystem"]).toBe("GS1");

    expect(fields("ilac-list-dvo")).toHaveLength(22);
    expect(field("ilac-list-dvo", "ayaktanOdenme")["enumRef"]).toBe(
      "odenme-durumu",
    );
    expect(field("ilac-list-dvo", "yatanOdenme")["enumRef"]).toBe(
      "odenme-durumu",
    );
    expect(field("ilac-list-dvo", "eczAktifPasif")["enumRef"]).toBe(
      "aktif-pasif",
    );
    expect(field("ilac-list-dvo", "hasAktifPasif")["enumRef"]).toBe(
      "aktif-pasif",
    );
    expect(field("ilac-list-dvo", "barkod")["codeSystem"]).toBe("GS1");
    expect(field("ilac-list-dvo", "esdegerBarkod")["codeSystem"]).toBe("GS1");
    expect(field("ilac-list-dvo", "ayaktanMaksimumKullanimDoz2")["type"]).toBe(
      "decimal",
    );

    expect(fields("fiyat-list-dvo")).toHaveLength(2);
    expect(String(field("fiyat-list-dvo", "fiyat")["description"])).toContain(
      "KDV",
    );
    expect(fields("ilac-indirim-dvo")).toHaveLength(8);
    expect(
      String(field("ilac-indirim-dvo", "indirimOrani4")["description"]),
    ).toContain("erroneously");
  });

  it("registers the two new code-list enums", () => {
    expect(values("odenme-durumu").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
    ]);
    expect(values("odenme-durumu")[2]["description"]).toContain(
      "not equal to 3",
    );
    expect(values("aktif-pasif").map((v) => v["code"])).toEqual(["A", "P"]);
  });
});
