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
  "takip-formu-kaydet",
  "takip-formu-oku",
  "takip-formu-sil",
];
const DVO_NAMES = [
  "takip-formu-kaydet-giris-dvo",
  "takip-formu-kaydet-cevap-dvo",
  "diabet-takip-formu-kayit-dvo",
  "diabet-takip-formu-dvo",
  "takip-formu-doktor-bilgisi-dvo",
  "takip-formu-diabet-egitimi-dvo",
  "takip-formu-hastalik-dvo",
  "takip-formu-aliskanlik-dvo",
  "takip-formu-kullanilan-ilaclar-dvo",
  "takip-formu-oku-giris-dvo",
  "takip-formu-oku-cevap-dvo",
  "takip-formu-sil-giris-dvo",
  "takip-formu-sil-cevap-dvo",
];
const ENUM_NAMES = [
  "ikamet-turu",
  "tbt-durumu",
  "egzersiz-durumu",
  "basvuru-nedeni",
  "var-yok-bilinmiyor",
  "anti-gad",
  "ekg-durumu",
  "goz-muayenesi",
  "akut-komplikasyon",
  "diabet-hastalik",
  "aliskanlik",
];

let service: Yaml;
let methods: Map<string, Yaml>;
let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;

beforeAll(() => {
  service = readYaml("registry/services/takip-formu.yml");
  methods = new Map(
    METHOD_SLUGS.map((slug) => [
      slug,
      readYaml(`registry/methods/takip-formu/${slug}.yml`),
    ]),
  );
  dvos = new Map(
    DVO_NAMES.map((name) => [
      name,
      readYaml(`registry/dvos/takip-formu/${name}.yml`),
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

describe("takip formu service (G45a, guide s.310-321)", () => {
  it("registers the takip-formu service with guide-verified wsdl", () => {
    expect(service["id"]).toBe("medula.hastane.takip-formu");
    const wsdl = service["wsdl"] as Record<string, string>;
    expect(wsdl["production"]).toBe("wsdl.takip-formu.production");
    expect(service["methods"] as string[]).toHaveLength(3);
    const manifest = readYaml("sources/wsdl-manifest.yml");
    const wsdls = manifest["wsdls"] as Array<Record<string, string>>;
    const tf = wsdls.filter((w) => w["service"] === "takip-formu");
    expect(tf).toHaveLength(2);
    expect(tf[0]["url"]).toContain("takipFormuIslemleriWS");
  });

  it("binds the three form methods with workflow effects", () => {
    const kaydet = methods.get("takip-formu-kaydet")!;
    expect(kaydet["contract"]).toEqual({
      inputDvo: "TakipFormuKaydetGirisDVO",
      outputDvo: "TakipFormuKaydetCevapDVO",
    });
    const effects = kaydet["stateEffects"] as Record<string, string[]>;
    expect(effects["creates"]).toContain("takipFormu");
    expect(effects["generates"]).toContain("takipFormuNo");
    expect(
      (
        methods.get("takip-formu-oku")!["stateEffects"] as Record<
          string,
          string[]
        >
      )["reads"],
    ).toContain("takipFormu");
    expect(
      (
        methods.get("takip-formu-sil")!["stateEffects"] as Record<
          string,
          string[]
        >
      )["deletes"],
    ).toContain("takipFormu");
  });

  it("verifies the 47-field DiabetTakipFormuKayitDVO body (4.6.1.c)", () => {
    expect(fields("diabet-takip-formu-kayit-dvo")).toHaveLength(47);
    expect(
      field("diabet-takip-formu-kayit-dvo", "saglikTesisiKodu")["description"],
    ).toContain("extra i");
    expect(field("diabet-takip-formu-kayit-dvo", "cinsiyet")["enumRef"]).toBe(
      "cinsiyet",
    );
    expect(field("diabet-takip-formu-kayit-dvo", "tani")["codeSystem"]).toBe(
      "ICD-10-WHO",
    );
    expect(
      field("diabet-takip-formu-kayit-dvo", "sistolikKanBasinci")["required"],
    ).toBe(false);
    expect(
      field("diabet-takip-formu-kayit-dvo", "koronerArterH")["required"],
    ).toBe(true);
    expect(
      field("diabet-takip-formu-kayit-dvo", "insulinPompasi")["description"],
    ).toContain("Turkish capital İ");
    expect(
      (
        field("diabet-takip-formu-kayit-dvo", "insulinPompasiVerTarihi")[
          "conditionalRequired"
        ] as Array<unknown>
      ).length,
    ).toBe(1);
    for (const v of [
      "glukoMetre",
      "mikroalbuminuri",
      "periferikSensoryalNoropati",
      "insulinPompasi",
    ]) {
      expect(field("diabet-takip-formu-kayit-dvo", v)["enumRef"]).toBe(
        "var-yok-bilinmiyor",
      );
    }
  });

  it("mirrors the response DVO with takipFormuNo (4.6.1.d)", () => {
    const kayit = fields("diabet-takip-formu-kayit-dvo").map((f) => f["name"]);
    const cevap = fields("diabet-takip-formu-dvo").map((f) => f["name"]);
    expect(cevap).toHaveLength(48);
    expect(cevap[0]).toBe("takipFormuNo");
    expect(cevap.slice(1)).toEqual(kayit);
    expect(
      field("diabet-takip-formu-dvo", "takipFormuNo")[
        "syntheticOnlyRecommended"
      ],
    ).toBe(true);
  });

  it("verifies the five sub-composites (4.6.1.e-i)", () => {
    expect(fields("takip-formu-doktor-bilgisi-dvo")).toHaveLength(3);
    expect(
      field("takip-formu-doktor-bilgisi-dvo", "dmEgitimiAlmisMi")["enumRef"],
    ).toBe("evet-hayir");
    expect(fields("takip-formu-diabet-egitimi-dvo")).toHaveLength(3);
    expect(fields("takip-formu-hastalik-dvo")).toHaveLength(2);
    expect(field("takip-formu-hastalik-dvo", "hastalikKodu")["enumRef"]).toBe(
      "diabet-hastalik",
    );
    expect(
      (
        field("takip-formu-hastalik-dvo", "digerHastalikTaniKodu")[
          "conditionalRequired"
        ] as Array<unknown>
      ).length,
    ).toBe(1);
    expect(fields("takip-formu-aliskanlik-dvo")).toHaveLength(1);
    expect(fields("takip-formu-kullanilan-ilaclar-dvo")).toHaveLength(2);
    expect(
      field("takip-formu-kullanilan-ilaclar-dvo", "barkod")["codeSystem"],
    ).toBe("GS1");
    expect(
      String(
        field("takip-formu-kullanilan-ilaclar-dvo", "gunlukDoz")["description"],
      ),
    ).toContain("insulin");
  });

  it("verifies the oku and sil contracts (4.3.2 / 4.3.3)", () => {
    expect(fields("takip-formu-oku-giris-dvo")).toHaveLength(2);
    expect(field("takip-formu-oku-giris-dvo", "tcKimlikNo")["sensitive"]).toBe(
      true,
    );
    expect(
      String(
        field("takip-formu-oku-cevap-dvo", "diabetTakipFormu")["description"],
      ),
    ).toContain("4.6.1.d");
    expect(fields("takip-formu-sil-giris-dvo")).toHaveLength(2);
    expect(
      field("takip-formu-sil-giris-dvo", "takipFormuNo")[
        "syntheticOnlyRecommended"
      ],
    ).toBe(true);
  });

  it("registers the eleven new code-list enums", () => {
    expect(values("ikamet-turu")).toHaveLength(6);
    expect(values("tbt-durumu")).toHaveLength(6);
    expect(values("egzersiz-durumu")).toHaveLength(7);
    expect(values("basvuru-nedeni")).toHaveLength(6);
    expect(values("var-yok-bilinmiyor").map((v) => v["code"])).toEqual([
      "V",
      "Y",
      "B",
    ]);
    expect(values("anti-gad").map((v) => v["code"])).toEqual(["P", "N", "B"]);
    expect(values("ekg-durumu")).toHaveLength(3);
    expect(values("goz-muayenesi")).toHaveLength(7);
    expect(values("akut-komplikasyon").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
    ]);
    expect(values("diabet-hastalik")).toHaveLength(15);
    expect(values("diabet-hastalik").map((v) => v["code"])).toEqual([
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
      "12",
      "13",
      "14",
      "0",
    ]);
    expect(values("aliskanlik")).toHaveLength(4);
  });
});
