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

const DVO_NAMES = [
  "imzali-rapor-giris-dvo",
  "imzali-rapor-cevap-dvo",
  "maluliyet-rapor-dvo",
  "maluliyet-brans-gorus-bilgisi-dvo",
  "maluliyet-brans-gorus-tani-bilgisi-dvo",
  "imzali-doktor-bilgisi-dvo",
  "engellilik-rapor-dvo",
  "imzali-tani-bilgisi-dvo",
  "engellilik-brans-gorus-bilgisi-dvo",
  "tibbi-gereklilik-rapor-dvo",
];
const ENUM_NAMES = [
  "maluliyet-rapor-turu",
  "sevk-nedeni",
  "basvuru-sekli",
  "doktor-personel-tipi",
  "muracaat-turu",
  "muracaat-nedeni",
  "bagimlilik-durumu",
  "istek-nedeni",
  "tani-neden",
];

let method: Yaml;
let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;

beforeAll(() => {
  method = readYaml("registry/methods/imzali-rapor/rapor-kaydet.yml");
  dvos = new Map(
    DVO_NAMES.map((name) => [
      name,
      readYaml(`registry/dvos/imzali-rapor/${name}.yml`),
    ]),
  );
  enums = new Map(
    ENUM_NAMES.map((name) => [name, readYaml(`registry/enums/${name}.yml`)]),
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

describe("imzali rapor kaydet composite (G45c-b, guide s.330-336)", () => {
  it("registers rapor-kaydet as the twelfth imzali-rapor method", () => {
    expect(method["id"]).toBe("medula.hastane.imzali-rapor.rapor-kaydet");
    expect(method["contract"]).toEqual({
      inputDvo: "ImzaliRaporGirisDVO",
      outputDvo: "ImzaliRaporCevapDVO",
    });
    const effects = method["stateEffects"] as Record<string, string[]>;
    expect(effects["creates"]).toContain("imzaliRapor");
    expect(effects["generates"]).toContain("raporTakipNo");
    const service = readYaml("registry/services/imzali-rapor.yml");
    expect(service["methods"] as string[]).toHaveLength(12);
  });

  it("keeps the signed-blob input minimal (4.9.1.a)", () => {
    expect(fields("imzali-rapor-giris-dvo")).toHaveLength(3);
    expect(field("imzali-rapor-giris-dvo", "raporBilgisi")["type"]).toBe(
      "array",
    );
    expect(
      String(field("imzali-rapor-giris-dvo", "raporBilgisi")["description"]),
    ).toContain("opaque byte arrays");
  });

  it("verifies the response with the disambiguated id (4.9.1.b)", () => {
    expect(fields("imzali-rapor-cevap-dvo")).toHaveLength(7);
    expect(
      field("imzali-rapor-cevap-dvo", "raporTakipNo")[
        "syntheticOnlyRecommended"
      ],
    ).toBe(true);
    for (const branch of [
      "maluliyetRaporu",
      "engellilikRaporu",
      "tibbiGereklilikRaporu",
    ]) {
      expect(field("imzali-rapor-cevap-dvo", branch)["type"]).toBe("object");
    }
  });

  it("verifies the MaluliyetRaporDVO chain (4.9.1.c-e)", () => {
    expect(fields("maluliyet-rapor-dvo")).toHaveLength(18);
    expect(field("maluliyet-rapor-dvo", "fotograf")["type"]).toBe("array");
    expect(field("maluliyet-rapor-dvo", "maluliyetRaporTuru")["enumRef"]).toBe(
      "maluliyet-rapor-turu",
    );
    expect(field("maluliyet-rapor-dvo", "sevkNedeni")["enumRef"]).toBe(
      "sevk-nedeni",
    );
    expect(field("maluliyet-rapor-dvo", "basvuruSekli")["enumRef"]).toBe(
      "basvuru-sekli",
    );
    expect(field("maluliyet-rapor-dvo", "aciklama")["length"]).toBe(4000);
    expect(field("maluliyet-rapor-dvo", "karar")["length"]).toBe(4000);

    expect(fields("maluliyet-brans-gorus-bilgisi-dvo")).toHaveLength(10);
    expect(
      field("maluliyet-brans-gorus-bilgisi-dvo", "doktorTipi")["enumRef"],
    ).toBe("doktor-personel-tipi");
    expect(
      field("maluliyet-brans-gorus-bilgisi-dvo", "anamnez")["length"],
    ).toBe(4000);
    expect(fields("maluliyet-brans-gorus-tani-bilgisi-dvo")).toHaveLength(3);
    expect(
      field("maluliyet-brans-gorus-tani-bilgisi-dvo", "icd10Kodu")[
        "codeSystem"
      ],
    ).toBe("ICD-10-WHO");
    expect(
      field("maluliyet-brans-gorus-tani-bilgisi-dvo", "aciklama")["length"],
    ).toBe(500);
    expect(
      field("maluliyet-brans-gorus-tani-bilgisi-dvo", "taniNeden")["enumRef"],
    ).toBe("tani-neden");
    expect(
      (
        field("maluliyet-brans-gorus-tani-bilgisi-dvo", "taniNeden")[
          "conditionalRequired"
        ] as Array<unknown>
      ).length,
    ).toBe(1);
  });

  it("verifies the EngellilikRaporDVO chain (4.9.1.g-i)", () => {
    expect(fields("engellilik-rapor-dvo")).toHaveLength(27);
    expect(
      field("engellilik-rapor-dvo", "engelOrani")["description"],
    ).toContain("0 and 100");
    expect(
      field("engellilik-rapor-dvo", "bagimlilikDegerlendirilmesi")["enumRef"],
    ).toBe("bagimlilik-durumu");
    const ehFlags = [
      "ortopedikEngelVar",
      "zihinselEngelVar",
      "gormeEngeliVar",
      "ruhsalVeDengeselEngelVar",
      "isitmeEngeliVar",
      "kronikEngeliVar",
      "dilVeKonusmaEngeliVar",
      "siniflanamayanEngeliVar",
    ];
    for (const flag of ehFlags) {
      expect(field("engellilik-rapor-dvo", flag)["enumRef"]).toBe("evet-hayir");
    }
    expect(
      String(field("engellilik-rapor-dvo", "uyeler")["description"]),
    ).toContain("singular");

    expect(fields("imzali-tani-bilgisi-dvo")).toHaveLength(1);
    expect(
      String(field("imzali-tani-bilgisi-dvo", "taniKodu")["description"]),
    ).toContain("disambiguated");
    expect(field("imzali-tani-bilgisi-dvo", "taniKodu")["codeSystem"]).toBe(
      "ICD-10-WHO",
    );
    expect(fields("engellilik-brans-gorus-bilgisi-dvo")).toHaveLength(5);
    expect(
      field("engellilik-brans-gorus-bilgisi-dvo", "engelOrani")["required"],
    ).toBe(true);
  });

  it("verifies TibbiGereklilikRaporDVO with the deferred procedure shape (4.9.1.j)", () => {
    expect(fields("tibbi-gereklilik-rapor-dvo")).toHaveLength(12);
    expect(field("tibbi-gereklilik-rapor-dvo", "istekNedeni")["enumRef"]).toBe(
      "istek-nedeni",
    );
    expect(
      String(field("tibbi-gereklilik-rapor-dvo", "islemler")["description"]),
    ).toContain("shape deferred");
    expect(field("tibbi-gereklilik-rapor-dvo", "karar")["length"]).toBe(2000);
  });

  it("registers the nine new code-list enums", () => {
    expect(values("maluliyet-rapor-turu").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
    ]);
    expect(values("sevk-nedeni")).toHaveLength(3);
    expect(values("basvuru-sekli")).toHaveLength(2);
    expect(values("doktor-personel-tipi").map((v) => v["code"])).toEqual([
      "1",
      "2",
    ]);
    expect(values("muracaat-turu")).toHaveLength(2);
    expect(values("muracaat-nedeni")).toHaveLength(3);
    expect(values("bagimlilik-durumu")).toHaveLength(3);
    expect(values("istek-nedeni")).toHaveLength(3);
    expect(values("tani-neden").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
    ]);
    expect(JSON.stringify(enums.get("tani-neden")!["sourceRefs"])).toContain(
      "Meslek Hastaligi",
    );
  });
});
