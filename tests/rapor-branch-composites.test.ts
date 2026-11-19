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
  "meslek-hastaligi-rapor-dvo",
  "analik-rapor-dvo",
  "emzirme-rapor-dvo",
  "ilac-rapor-dvo",
  "tedavi-rapor-dvo",
  "hastalik-rapor-dvo",
  "rapor-dvo",
  "hasta-yatis-rapor-dvo",
  "cocuk-bilgisi-dvo",
  "malzeme-rapor-dvo",
  "tedavi-islem-bilgisi-dvo",
  "brans-gorus-bilgisi-dvo",
  "isgoremezlik-rapor-ek-dvo",
];
const ENUM_NAMES = [
  "nor-sez-for",
  "aktarma-rapor",
  "analik-rapor-tipi",
  "gebelik-tipi",
  "cinsiyet",
  "tedavi-rapor-turu",
  "calisma-durumu",
  "nuks-durumu",
  "ek-durumu",
  "evet-hayir",
];

let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;
let isKazasi: Yaml;

beforeAll(() => {
  dvos = new Map(
    DVO_NAMES.map((name) => [
      name,
      readYaml(`registry/dvos/rapor/${name}.yml`),
    ]),
  );
  enums = new Map(
    ENUM_NAMES.map((name) => [name, readYaml(`registry/enums/${name}.yml`)]),
  );
  isKazasi = readYaml("registry/dvos/rapor/is-kazasi-rapor-dvo.yml");
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

describe("rapor branch composites (G43c, guide s.257-278)", () => {
  it("completes IsKazasiRaporDVO with the p.257 continuation rows", () => {
    const names = (isKazasi["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"],
    );
    expect(names).toContain("taburcuKodu");
    expect(names).toContain("isKazasiTarihi");
    expect(names).toHaveLength(13);
    expect(
      names.filter((n) => n === "taburcuKodu" || n === "isKazasiTarihi"),
    ).toHaveLength(2);
  });

  it("verifies the incapacity sibling branches (4.4.1.e / 4.4.1.j)", () => {
    const meslek = fields("meslek-hastaligi-rapor-dvo").map((f) => f["name"]);
    expect(meslek).toHaveLength(13);
    expect(meslek).toContain("isKazasiTarihi");
    expect(field("meslek-hastaligi-rapor-dvo", "raporDurumu")["enumRef"]).toBe(
      "calisma-durumu",
    );
    expect(field("meslek-hastaligi-rapor-dvo", "nuks")["enumRef"]).toBe(
      "nuks-durumu",
    );
    expect(field("meslek-hastaligi-rapor-dvo", "yatisDevam")["enumRef"]).toBe(
      "yatis-devam-is-kazasi",
    );
    expect(field("meslek-hastaligi-rapor-dvo", "taburcuKodu")["enumRef"]).toBe(
      "taburcu-kodu",
    );

    const hastalik = fields("hastalik-rapor-dvo").map((f) => f["name"]);
    expect(hastalik).toHaveLength(10);
    expect(hastalik).not.toContain("isKazasiTarihi");
    expect(hastalik).not.toContain("yaraninTuru");
    expect(field("hastalik-rapor-dvo", "nuks")["length"]).toBeNull();
  });

  it("verifies the maternity branch (4.4.1.f) and nursing branch (4.4.1.g)", () => {
    expect(fields("analik-rapor-dvo")).toHaveLength(23);
    expect(field("analik-rapor-dvo", "norSezFor")["enumRef"]).toBe(
      "nor-sez-for",
    );
    expect(field("analik-rapor-dvo", "analikRaporTipi")["enumRef"]).toBe(
      "analik-rapor-tipi",
    );
    expect(field("analik-rapor-dvo", "gebelikTipi")["enumRef"]).toBe(
      "gebelik-tipi",
    );
    expect(field("analik-rapor-dvo", "aktarmaRaporVarmi")["enumRef"]).toBe(
      "aktarma-rapor",
    );
    expect(
      field("analik-rapor-dvo", "aktarmaHaftasi")["description"],
    ).toContain("system-calculated");

    expect(fields("emzirme-rapor-dvo")).toHaveLength(5);
    expect(field("emzirme-rapor-dvo", "anneTcKimlikNo")["sensitive"]).toBe(
      true,
    );
    expect(
      String(field("emzirme-rapor-dvo", "anneTcKimlikNo")["description"]),
    ).toContain("father");
  });

  it("verifies the drug and treatment branches (4.4.1.h / 4.4.1.i)", () => {
    expect(fields("ilac-rapor-dvo")).toHaveLength(3);
    expect(field("ilac-rapor-dvo", "raporDVO")["description"]).toContain(
      "4.4.1.k",
    );
    expect(
      String(field("ilac-rapor-dvo", "raporEtkinMaddeler")["description"]),
    ).toContain("not visible");

    expect(fields("tedavi-rapor-dvo")).toHaveLength(3);
    expect(field("tedavi-rapor-dvo", "tedaviRaporTuru")["enumRef"]).toBe(
      "tedavi-rapor-turu",
    );
    expect(values("tedavi-rapor-turu")).toHaveLength(9);
  });

  it("verifies the shared RaporDVO core (4.4.1.k)", () => {
    expect(fields("rapor-dvo")).toHaveLength(17);
    expect(field("rapor-dvo", "turu")["enumRef"]).toBe("rapor-turu");
    expect(field("rapor-dvo", "duzenlemeTuru")["enumRef"]).toBe(
      "rapor-duzenleme-turu",
    );
    expect(field("rapor-dvo", "aciklama")["length"]).toBe(5000);
    expect(String(field("rapor-dvo", "hakSahibi")["description"])).toContain(
      "TakipNoileRaporBilgisiKaydet",
    );
    expect(
      String(field("rapor-dvo", "ilacTeshisler")["description"]),
    ).toContain("MANDATORY");
    expect(field("rapor-dvo", "durum")["description"]).toContain("Taslak");
    expect(field("rapor-dvo", "takipNo")["syntheticOnlyRecommended"]).toBe(
      true,
    );
  });

  it("verifies the small composites (4.4.1.l-p)", () => {
    expect(fields("hasta-yatis-rapor-dvo")).toHaveLength(2);
    expect(field("hasta-yatis-rapor-dvo", "yatisTarihi")["required"]).toBe(
      true,
    );

    expect(fields("cocuk-bilgisi-dvo")).toHaveLength(3);
    expect(field("cocuk-bilgisi-dvo", "cinsiyet")["enumRef"]).toBe("cinsiyet");

    expect(fields("malzeme-rapor-dvo")).toHaveLength(4);
    expect(field("malzeme-rapor-dvo", "malzemeTuru")["enumRef"]).toBe(
      "malzeme-turu",
    );
    expect(
      field("malzeme-rapor-dvo", "malzemeKodu")["conditionalRequired"],
    ).toBeTruthy();

    expect(fields("tedavi-islem-bilgisi-dvo")).toHaveLength(8);
    expect(
      String(
        field("tedavi-islem-bilgisi-dvo", "evHemodiyaliziRaporBilgisi")[
          "description"
        ],
      ),
    ).toContain("cross-reference typo");

    expect(fields("brans-gorus-bilgisi-dvo")).toHaveLength(2);
    expect(field("brans-gorus-bilgisi-dvo", "aciklama")["required"]).toBe(true);
  });

  it("verifies IsgoremezlikRaporEkDVO (4.4.1.ee)", () => {
    expect(fields("isgoremezlik-rapor-ek-dvo")).toHaveLength(14);
    expect(field("isgoremezlik-rapor-ek-dvo", "durum")["enumRef"]).toBe(
      "ek-durumu",
    );
    expect(field("isgoremezlik-rapor-ek-dvo", "duzenlemeTuru")["enumRef"]).toBe(
      "rapor-duzenleme-turu",
    );
    expect(
      field("isgoremezlik-rapor-ek-dvo", "hastaYatisVarMi")["enumRef"],
    ).toBe("evet-hayir");
    expect(field("isgoremezlik-rapor-ek-dvo", "kontrolMu")["enumRef"]).toBe(
      "evet-hayir",
    );
    expect(field("isgoremezlik-rapor-ek-dvo", "yatislar")["required"]).toBe(
      true,
    );
    expect(
      String(field("isgoremezlik-rapor-ek-dvo", "tanilar")["description"]),
    ).toContain("capitalized");
  });

  it("registers the ten new code-list enums", () => {
    expect(values("nor-sez-for").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
    ]);
    expect(values("aktarma-rapor")).toHaveLength(2);
    expect(values("analik-rapor-tipi")).toHaveLength(2);
    expect(values("gebelik-tipi")).toHaveLength(2);
    expect(values("cinsiyet").map((v) => v["code"])).toEqual(["K", "E"]);
    expect(values("calisma-durumu").map((v) => v["code"])).toEqual(["1", "2"]);
    expect(values("nuks-durumu").map((v) => v["code"])).toEqual(["1", "2"]);
    expect(values("ek-durumu").map((v) => v["code"])).toEqual(["1", "2"]);
    expect(values("evet-hayir").map((v) => v["code"])).toEqual(["E", "H"]);
    expect(values("tedavi-rapor-turu")[6]["label"]).toContain("Trafik");
  });
});
