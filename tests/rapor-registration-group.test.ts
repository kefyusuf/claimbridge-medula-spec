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

let methods: Map<string, Yaml>;
let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;
let service: Yaml;

const METHOD_SLUGS = [
  "rapor-bilgisi-kaydet",
  "takip-no-ile-rapor-bilgisi-kaydet",
];
const DVO_NAMES = [
  "rapor-giris-dvo",
  "isgoremezlik-rapor-dvo",
  "is-kazasi-rapor-dvo",
  "rapor-bilgisi-dvo",
  "hak-sahibi-bilgisi-dvo",
  "doktor-bilgisi-dvo",
  "rapor-etkin-madde-dvo",
  "ilac-teshis-bilgi-dvo",
];
const ENUM_NAMES = [
  "isgoremezlik-rapor-turu",
  "rapor-duzenleme-turu",
  "olum-durumu",
  "devam-durumu",
  "yatis-devam-durumu",
  "yatis-devam-is-kazasi",
  "adli-vaka-durumu",
  "doktor-tipi",
  "doz-birimi",
  "periyot-birimi",
  "devredilen-kurum-rapor",
];

beforeAll(() => {
  methods = new Map(
    METHOD_SLUGS.map((slug) => [
      slug,
      readYaml(`registry/methods/rapor/${slug}.yml`),
    ]),
  );
  dvos = new Map(
    DVO_NAMES.map((name) => [
      name,
      readYaml(`registry/dvos/rapor/${name}.yml`),
    ]),
  );
  enums = new Map(
    ENUM_NAMES.map((name) => [name, readYaml(`registry/enums/${name}.yml`)]),
  );
  service = readYaml("registry/services/rapor.yml");
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

describe("rapor registration composite (G43b, guide s.252-278)", () => {
  it("registers the two registration methods on the rapor service", () => {
    const serviceMethods = service["methods"] as string[];
    expect(serviceMethods).toHaveLength(7);
    expect(serviceMethods).toContain(
      "medula.hastane.rapor.rapor-bilgisi-kaydet",
    );
    expect(serviceMethods).toContain(
      "medula.hastane.rapor.takip-no-ile-rapor-bilgisi-kaydet",
    );

    const kaydet = methods.get("rapor-bilgisi-kaydet")!;
    const contract = kaydet["contract"] as Record<string, unknown>;
    expect(contract["inputDvo"]).toBe("RaporGirisDVO");
    expect(contract["outputDvo"]).toBe("RaporCevapDVO");
    const effects = kaydet["stateEffects"] as Record<string, string[]>;
    expect(effects["creates"]).toContain("rapor");
    expect(effects["generates"]).toContain("raporTakipNo");
    expect((kaydet["success"] as Record<string, string>)["successCode"]).toBe(
      "0",
    );

    const variant = methods.get("takip-no-ile-rapor-bilgisi-kaydet")!;
    expect((variant["contract"] as Record<string, unknown>)["inputDvo"]).toBe(
      "RaporGirisDVO",
    );
  });

  it("verifies the RaporGirisDVO dispatch composite (Tablo 4.4.1.a)", () => {
    expect(fields("rapor-giris-dvo").map((f) => f["name"])).toEqual([
      "ilacRapor",
      "maluliyetRapor",
      "tedaviRapor",
      "isgoremezlikRapor",
      "kullaniciTesisKodu",
    ]);
    for (const branch of [
      "ilacRapor",
      "maluliyetRapor",
      "tedaviRapor",
      "isgoremezlikRapor",
    ]) {
      expect(field("rapor-giris-dvo", branch)["type"]).toBe("object");
      expect(field("rapor-giris-dvo", branch)["required"]).toBe(false);
      expect(
        (
          field("rapor-giris-dvo", branch)["conditionalRequired"] as Array<
            Record<string, unknown>
          >
        ).length,
      ).toBeGreaterThan(0);
    }
    expect(
      field("rapor-giris-dvo", "isgoremezlikRapor")["description"],
    ).toContain("4.4.1.c");
    expect(field("rapor-giris-dvo", "kullaniciTesisKodu")["required"]).toBe(
      true,
    );
  });

  it("verifies IsgoremezlikRaporDVO with its conditional branches (Tablo 4.4.1.c)", () => {
    expect(fields("isgoremezlik-rapor-dvo")).toHaveLength(25);
    expect(
      field("isgoremezlik-rapor-dvo", "isGoremezlikRaporTuru")["enumRef"],
    ).toBe("isgoremezlik-rapor-turu");
    expect(field("isgoremezlik-rapor-dvo", "doktorlar")["required"]).toBe(true);
    expect(field("isgoremezlik-rapor-dvo", "doktorlar")["type"]).toBe("array");
    expect(field("isgoremezlik-rapor-dvo", "hakSahibi")["required"]).toBe(true);
    expect(field("isgoremezlik-rapor-dvo", "devammi")["enumRef"]).toBe(
      "devam-durumu",
    );
    expect(field("isgoremezlik-rapor-dvo", "yatisDevam")["enumRef"]).toBe(
      "yatis-devam-durumu",
    );
    expect(field("isgoremezlik-rapor-dvo", "bashekimTCNo")["sensitive"]).toBe(
      true,
    );
    const branchCond = field("isgoremezlik-rapor-dvo", "isKazasiRaporu")[
      "conditionalRequired"
    ] as Array<Record<string, unknown>>;
    expect(JSON.stringify(branchCond)).toContain("isGoremezlikRaporTuru = 1");
  });

  it("verifies IsKazasiRaporDVO with its publish-later quirks (Tablo 4.4.1.d)", () => {
    expect(fields("is-kazasi-rapor-dvo")).toHaveLength(13);
    expect(field("is-kazasi-rapor-dvo", "yatisDevam")["enumRef"]).toBe(
      "yatis-devam-is-kazasi",
    );
    expect(field("is-kazasi-rapor-dvo", "isKontTarihi")["required"]).toBe(true);
    expect(
      String(field("is-kazasi-rapor-dvo", "yaraninTuru")["description"]),
    ).toContain("SONRA YAYINLANACAKTIR");
    expect(
      String(field("is-kazasi-rapor-dvo", "yaraninYeri")["description"]),
    ).toContain("SONRA YAYINLANACAKTIR");
  });

  it("verifies the shared leaf tables (4.4.1.r / 4.4.1.s / 4.4.1.t)", () => {
    expect(fields("rapor-bilgisi-dvo")).toHaveLength(6);
    expect(field("rapor-bilgisi-dvo", "raporSiraNo")["type"]).toBe("integer");
    expect(field("rapor-bilgisi-dvo", "aVakaTKaza")["enumRef"]).toBe(
      "adli-vaka-durumu",
    );
    expect(
      field("rapor-bilgisi-dvo", "raporTakipNo")["syntheticOnlyRecommended"],
    ).toBe(true);

    expect(fields("hak-sahibi-bilgisi-dvo")).toHaveLength(17);
    expect(field("hak-sahibi-bilgisi-dvo", "tckimlikNo")["sensitive"]).toBe(
      true,
    );
    expect(field("hak-sahibi-bilgisi-dvo", "tckimlikNo")["length"]).toBe(11);
    expect(field("hak-sahibi-bilgisi-dvo", "devredilenKurum")["enumRef"]).toBe(
      "devredilen-kurum-rapor",
    );
    expect(field("hak-sahibi-bilgisi-dvo", "sigortaliTuru")["enumRef"]).toBe(
      "sigortali-turu",
    );
    expect(field("hak-sahibi-bilgisi-dvo", "provizyonTipi")["enumRef"]).toBe(
      "provizyon-tipi",
    );
    expect(
      String(field("hak-sahibi-bilgisi-dvo", "adresDetay")["description"]),
    ).toContain("second occurrence");

    expect(fields("doktor-bilgisi-dvo")).toHaveLength(5);
    expect(field("doktor-bilgisi-dvo", "drTescilNo")["length"]).toBe(16);
    expect(field("doktor-bilgisi-dvo", "tipi")["enumRef"]).toBe("doktor-tipi");
  });

  it("verifies the IlacRaporDuzelt item tables (4.4.1.ff / 4.4.1.gg)", () => {
    expect(fields("rapor-etkin-madde-dvo")).toHaveLength(6);
    expect(field("rapor-etkin-madde-dvo", "etkinMaddeKodu")["required"]).toBe(
      true,
    );
    expect(field("rapor-etkin-madde-dvo", "kullanimDozBirim")["enumRef"]).toBe(
      "doz-birimi",
    );
    expect(
      field("rapor-etkin-madde-dvo", "kullanimPeriyotBirim")["enumRef"],
    ).toBe("periyot-birimi");

    expect(fields("ilac-teshis-bilgi-dvo")).toHaveLength(4);
    expect(field("ilac-teshis-bilgi-dvo", "ICD10Kodu")["type"]).toBe("array");
    expect(field("ilac-teshis-bilgi-dvo", "ICD10Kodu")["required"]).toBe(true);
  });

  it("registers the ten new code-list enums with guide-verified values", () => {
    expect(values("isgoremezlik-rapor-turu").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
    ]);
    expect(values("isgoremezlik-rapor-turu")[0]["label"]).toBe("Is Kazasi");
    expect(values("rapor-duzenleme-turu")).toHaveLength(2);
    expect(values("olum-durumu").map((v) => v["code"])).toEqual(["1", "2"]);
    expect(values("devam-durumu").map((v) => v["code"])).toEqual([
      "-1",
      "1",
      "2",
    ]);
    expect(values("yatis-devam-durumu")).toHaveLength(4);
    expect(values("yatis-devam-is-kazasi")).toHaveLength(3);
    expect(values("adli-vaka-durumu").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
    ]);
    expect(values("doktor-tipi")).toHaveLength(2);
    expect(values("doz-birimi").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "A",
      "B",
    ]);
    expect(values("periyot-birimi")).toHaveLength(7);
    expect(values("devredilen-kurum-rapor")).toHaveLength(31);
    expect(values("devredilen-kurum-rapor")[28]["code"]).toBe("147");
    expect(
      JSON.stringify(enums.get("devredilen-kurum-rapor")!["sourceRefs"]),
    ).toContain("changelog");
  });
});
