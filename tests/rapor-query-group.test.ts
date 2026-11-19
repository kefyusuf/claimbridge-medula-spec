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

type Service = Record<string, unknown>;
type Method = Record<string, unknown>;
type Dvo = Record<string, unknown>;
type Enum = Record<string, unknown>;

let service: Service;
let methods: Map<string, Method>;
let dvos: Map<string, Dvo>;
let raporTuru: Enum;

beforeAll(() => {
  service = readYaml("registry/services/rapor.yml");
  methods = new Map(
    [
      "rapor-bilgisi-bul",
      "rapor-bilgisi-sil",
      "ilac-rapor-duzelt",
      "rapor-bilgisi-bul-rapor-takip-nodan",
      "rapor-bilgisi-bul-tc-kimlik-nodan",
    ].map((slug) => [
      `medula.hastane.rapor.${slug}`,
      readYaml(`registry/methods/rapor/${slug}.yml`),
    ]),
  );
  dvos = new Map(
    [
      "rapor-sorgu-dvo",
      "rapor-oku-dvo",
      "ilac-rapor-duzelt-dvo",
      "rapor-oku-rapor-takip-nodan-dvo",
      "rapor-oku-tc-kimlik-nodan-dvo",
      "rapor-cevap-dvo",
      "rapor-cevap-tc-kimlik-nodan-dvo",
    ].map((name) => [name, readYaml(`registry/dvos/rapor/${name}.yml`)]),
  );
  raporTuru = readYaml("registry/enums/rapor-turu.yml");
});

function field(dvoId: string, name: string): Record<string, unknown> {
  const fields =
    (dvos.get(dvoId)?.["fields"] as Array<Record<string, unknown>>) ?? [];
  const found = fields.find((f) => f["name"] === name);
  expect(found, `field ${dvoId}.${name}`).toBeTruthy();
  return found as Record<string, unknown>;
}

describe("rapor query service group (G43a, guide s.252-283)", () => {
  it("registers the rapor service with guide-verified wsdl endpoints", () => {
    expect(service["id"]).toBe("medula.hastane.rapor");
    expect(service["slug"]).toBe("rapor");
    const wsdl = service["wsdl"] as Record<string, string>;
    expect(wsdl["production"]).toBe("wsdl.rapor.production");
    expect(wsdl["test"]).toBe("wsdl.rapor.test");
    const methodList = service["methods"] as string[];
    expect(methodList).toHaveLength(7);
  });

  it("binds the five method contracts to their guide tables", () => {
    const expected: Array<[string, string, string, number]> = [
      [
        "medula.hastane.rapor.rapor-bilgisi-bul",
        "RaporSorguDVO",
        "RaporCevapDVO",
        279,
      ],
      [
        "medula.hastane.rapor.rapor-bilgisi-sil",
        "RaporSorguDVO",
        "RaporCevapDVO",
        280,
      ],
      [
        "medula.hastane.rapor.ilac-rapor-duzelt",
        "IlacRaporDuzeltDVO",
        "RaporCevapDVO",
        280,
      ],
      [
        "medula.hastane.rapor.rapor-bilgisi-bul-rapor-takip-nodan",
        "RaporOkuRaporTakipNodanDVO",
        "RaporCevapDVO",
        281,
      ],
      [
        "medula.hastane.rapor.rapor-bilgisi-bul-tc-kimlik-nodan",
        "RaporOkuTCKimlikNodanDVO",
        "RaporCevapTCKimlikNodanDVO",
        282,
      ],
    ];
    for (const [id, inputDvo, outputDvo, page] of expected) {
      const method = methods.get(id);
      expect(method, `method ${id}`).toBeTruthy();
      const contract = method!["contract"] as Record<string, unknown>;
      expect(contract["inputDvo"]).toBe(inputDvo);
      expect(contract["outputDvo"]).toBe(outputDvo);
      const sourceRefs = method!["sourceRefs"] as Array<
        Record<string, unknown>
      >;
      expect(sourceRefs.some((r) => r["page"] === page)).toBe(true);
    }
  });

  it("verifies RaporSorguDVO and RaporOkuDVO fields (Tablo 4.4.3.a / 4.4.3.c)", () => {
    const sorgu = ["raporBilgisi", "kullaniciTesisKodu"] as const;
    const sorguFields = (
      dvos.get("rapor-sorgu-dvo")!["fields"] as Array<Record<string, unknown>>
    ).map((f) => f["name"]);
    expect(sorguFields).toEqual(sorgu);
    expect(field("rapor-sorgu-dvo", "raporBilgisi")["type"]).toBe("object");
    expect(field("rapor-sorgu-dvo", "raporBilgisi")["required"]).toBe(true);
    expect(field("rapor-sorgu-dvo", "kullaniciTesisKodu")["type"]).toBe(
      "integer",
    );

    const okuFields = (
      dvos.get("rapor-oku-dvo")!["fields"] as Array<Record<string, unknown>>
    ).map((f) => f["name"]);
    expect(okuFields).toEqual([
      "raporTesisKodu",
      "raporNo",
      "raporTarih",
      "raporTuru",
      "raporSiraNo",
    ]);
    expect(field("rapor-oku-dvo", "raporNo")["type"]).toBe("string");
    expect(field("rapor-oku-dvo", "raporNo")["length"]).toBe(20);
    expect(field("rapor-oku-dvo", "raporTarih")["length"]).toBe(10);
    expect(field("rapor-oku-dvo", "raporTuru")["enumRef"]).toBe("rapor-turu");
    expect(field("rapor-oku-dvo", "raporSiraNo")["required"]).toBe(true);
  });

  it("verifies IlacRaporDuzeltDVO fields (Tablo 4.4.6.a, s.281)", () => {
    const names = (
      dvos.get("ilac-rapor-duzelt-dvo")!["fields"] as Array<
        Record<string, unknown>
      >
    ).map((f) => f["name"]);
    expect(names).toEqual([
      "drTescilNo",
      "duzeltmeBilgisi",
      "duzeltmeTarihi",
      "raporNo",
      "raporTarihi",
      "raporTuru",
      "tesisKodu",
      "raporEtkinMaddeler",
      "tanilar",
      "ilacTeshisler",
    ]);
    expect(field("ilac-rapor-duzelt-dvo", "duzeltmeBilgisi")["length"]).toBe(
      2000,
    );
    expect(field("ilac-rapor-duzelt-dvo", "drTescilNo")["length"]).toBe(20);
    expect(
      field("ilac-rapor-duzelt-dvo", "raporEtkinMaddeler")["required"],
    ).toBe(false);
    expect(field("ilac-rapor-duzelt-dvo", "tanilar")["type"]).toBe("array");
    expect(field("ilac-rapor-duzelt-dvo", "ilacTeshisler")["type"]).toBe(
      "array",
    );
  });

  it("verifies the two lookup DVOs (Tablo 4.4.7.a / 4.4.8.a)", () => {
    const takipNoFields = (
      dvos.get("rapor-oku-rapor-takip-nodan-dvo")!["fields"] as Array<
        Record<string, unknown>
      >
    ).map((f) => f["name"]);
    expect(takipNoFields).toEqual([
      "raporTakipNo",
      "kullaniciTesisKodu",
      "raporSiraNo",
    ]);

    const tcFields = (
      dvos.get("rapor-oku-tc-kimlik-nodan-dvo")!["fields"] as Array<
        Record<string, unknown>
      >
    ).map((f) => f["name"]);
    expect(tcFields).toEqual(["tckimlikNo", "raporTuru", "kullaniciTesisKodu"]);
    expect(field("rapor-oku-tc-kimlik-nodan-dvo", "raporTuru")["enumRef"]).toBe(
      "rapor-turu",
    );
    expect(
      field("rapor-oku-tc-kimlik-nodan-dvo", "tckimlikNo")["sensitive"],
    ).toBe(true);
  });

  it("verifies RaporCevapDVO with the integer sonucKodu divergence (Tablo 4.4.1.b)", () => {
    const names = (
      dvos.get("rapor-cevap-dvo")!["fields"] as Array<Record<string, unknown>>
    ).map((f) => f["name"]);
    expect(names).toEqual([
      "raporTakipNo",
      "analikRapor",
      "dogumOncesiCalisabilirRapor",
      "dogumRapor",
      "ilacRapor",
      "maluliyetRapor",
      "protezRapor",
      "tedaviRapor",
      "isgoremezlikRapor",
      "isgoremezlikRaporEkleri",
      "sonucAciklamasi",
      "sonucKodu",
      "raporTuru",
    ]);
    // Intra-guide divergence: this group's sonucKodu is Integer 0-based,
    // unlike the hasta-kabul group's String "0000" (s.253-254 vs s.42).
    expect(field("rapor-cevap-dvo", "sonucKodu")["type"]).toBe("integer");
    expect(field("rapor-cevap-dvo", "raporTakipNo")["type"]).toBe("integer");
    expect(field("rapor-cevap-dvo", "raporTuru")["enumRef"]).toBe("rapor-turu");
    expect(field("rapor-cevap-dvo", "isgoremezlikRaporEkleri")["type"]).toBe(
      "array",
    );
  });

  it("verifies RaporCevapTCKimlikNodanDVO (Tablo 4.4.8.b, s.283)", () => {
    const names = (
      dvos.get("rapor-cevap-tc-kimlik-nodan-dvo")!["fields"] as Array<
        Record<string, unknown>
      >
    ).map((f) => f["name"]);
    expect(names).toEqual(["raporlar", "sonucAciklamasi", "sonucKodu"]);
    expect(field("rapor-cevap-tc-kimlik-nodan-dvo", "raporlar")["type"]).toBe(
      "array",
    );
    expect(field("rapor-cevap-tc-kimlik-nodan-dvo", "sonucKodu")["type"]).toBe(
      "integer",
    );
  });

  it("registers the rapor-turu enum with the eleven guide values", () => {
    expect(raporTuru["id"]).toBe("rapor-turu");
    const values = raporTuru["values"] as Array<Record<string, string>>;
    expect(values.map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "10",
      "11",
    ]);
    expect(values[0]["label"]).toBe("Tedavi");
    expect(values[1]["label"]).toBe("Is Kazasi");
    expect(values[8]["label"]).toBe("Maluliyet");
    expect(values[9]["label"]).toBe("Ilac Kullanim");
    expect(values[10]["label"]).toBe("Ilac Muafiyet");
  });
});
