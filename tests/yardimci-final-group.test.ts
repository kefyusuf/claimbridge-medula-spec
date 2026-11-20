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
  "evrak-takip-grup-kodlari-sorgu",
  "tesis-yatak-sorgu",
  "barkod-sut-eslesme-sorgu",
  "kisi-gecmis-islem-sorgu",
  "tani-ara",
  "e-nabiz-bildirim-sorgu",
  "kisi-vefat-kayit",
  "kurum-sevk-talep-no-sorgu",
  "kisi-gen-sorgula",
];
const DVO_NAMES = [
  "evrak-takip-grup-kodu-sorgu-giris-dvo",
  "evrak-takip-grup-kodu-sorgu-cevap-dvo",
  "evrak-takip-grup-kodu-dvo",
  "tesis-yatak-sorgu-giris-dvo",
  "tesis-yatak-sorgu-cevap-dvo",
  "tesis-yatak-bilgi-dvo",
  "barkod-sut-eslesme-sorgu-giris-dvo",
  "barkod-sut-eslesme-sorgu-cevap-dvo",
  "barkod-sut-dvo",
  "kisi-gecmis-islemler-giris-dvo",
  "kisi-gecmis-islemler-cevap-dvo",
  "kisi-islem-dvo",
  "tani-ara-giris-wsdvo",
  "tani-ara-cevap-dvo",
  "tani-list-dvo",
  "e-nabiz-bildirim-sorgu-giris-dvo",
  "e-nabiz-bildirim-sorgu-cevap-dvo",
  "e-nabiz-hizmet-bilgi-dvo",
  "kisi-olum-kayit-giris-dvo",
  "kisi-olum-kayit-cevap-dvo",
  "kisi-olum-kayit-detay-dvo",
  "kurum-sevk-talep-no-sorgu-giris-dvo",
  "kurum-sevk-talep-no-sorgu-cevap-dvo",
  "kurum-sevk-talep-no-sorgu-detay-dvo",
  "kisi-gen-sorgu-giris-dvo",
  "kisi-gen-sorgu-cevap-dvo",
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
    ["yatak-turu", "tescil-turu", "yatak-seviyesi", "ara-karar"].map((name) => [
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

describe("yardimci final helpers (G44c, guide s.299-310)", () => {
  it("completes the yardimci-islemler service at 19 methods", () => {
    const serviceMethods = service["methods"] as string[];
    expect(serviceMethods).toHaveLength(19);
    expect(serviceMethods).toContain(
      "medula.hastane.yardimci-islemler.kisi-gen-sorgula",
    );
    expect(serviceMethods).toContain(
      "medula.hastane.yardimci-islemler.kisi-vefat-kayit",
    );
  });

  it("binds the nine helper contracts", () => {
    const expected: Array<[string, string, string, number]> = [
      [
        "evrak-takip-grup-kodlari-sorgu",
        "EvrakTakipGrupKoduSorguGirisDVO",
        "EvrakTakipGrupKoduSorguCevapDVO",
        299,
      ],
      [
        "tesis-yatak-sorgu",
        "TesisYatakSorguGirisDVO",
        "TesisYatakSorguCevapDVO",
        300,
      ],
      [
        "barkod-sut-eslesme-sorgu",
        "BarkodSutEslesmeSorguGirisDVO",
        "BarkodSutEslesmeSorguCevapDVO",
        301,
      ],
      [
        "kisi-gecmis-islem-sorgu",
        "KisiGecmisIslemlerGirisDVO",
        "KisiGecmisIslemlerCevapDVO",
        302,
      ],
      ["tani-ara", "TaniAraGirisWSDVO", "TaniAraCevapDVO", 304],
      [
        "e-nabiz-bildirim-sorgu",
        "ENabizBildirimSorguGirisDVO",
        "ENabizBildirimSorguCevapDVO",
        305,
      ],
      [
        "kisi-vefat-kayit",
        "KisiOlumKayitGirisDVO",
        "KisiOlumKayitCevapDVO",
        306,
      ],
      [
        "kurum-sevk-talep-no-sorgu",
        "KurumSevkTalepNoSorguGirisDVO",
        "KurumSevkTalepNoSorguCevapDVO",
        307,
      ],
      ["kisi-gen-sorgula", "KisiGenSorguGirisDVO", "KisiGenSorguCevapDVO", 309],
    ];
    for (const [slug, inputDvo, outputDvo, page] of expected) {
      const method = methods.get(slug)!;
      expect(method["contract"]).toEqual({ inputDvo, outputDvo });
      const refs = method["sourceRefs"] as Array<Record<string, unknown>>;
      expect(refs.some((r) => r["page"] === page)).toBe(true);
    }
  });

  it("verifies the bed catalogue chain (4.5.12)", () => {
    expect(fields("tesis-yatak-sorgu-giris-dvo")).toHaveLength(2);
    expect(
      (
        field("tesis-yatak-sorgu-giris-dvo", "tarih")[
          "conditionalRequired"
        ] as Array<unknown>
      ).length,
    ).toBe(1);
    expect(fields("tesis-yatak-bilgi-dvo")).toHaveLength(6);
    expect(field("tesis-yatak-bilgi-dvo", "turu")["enumRef"]).toBe(
      "yatak-turu",
    );
    expect(field("tesis-yatak-bilgi-dvo", "tescilTuru")["enumRef"]).toBe(
      "tescil-turu",
    );
    expect(field("tesis-yatak-bilgi-dvo", "seviye")["enumRef"]).toBe(
      "yatak-seviyesi",
    );
    expect(values("yatak-turu").map((v) => v["code"])).toEqual(["E", "Y", "P"]);
    expect(values("tescil-turu").map((v) => v["code"])).toEqual([
      "0",
      "1",
      "2",
    ]);
    expect(values("yatak-seviyesi")).toHaveLength(3);
  });

  it("verifies the barcode-SUT mapping chain (4.5.13)", () => {
    expect(fields("barkod-sut-eslesme-sorgu-giris-dvo")).toHaveLength(5);
    expect(
      field("barkod-sut-eslesme-sorgu-giris-dvo", "barkod")["codeSystem"],
    ).toBe("GS1");
    expect(
      field("barkod-sut-eslesme-sorgu-giris-dvo", "sutKodu")["codeSystem"],
    ).toBe("SUT");
    expect(fields("barkod-sut-dvo")).toHaveLength(5);
    expect(field("barkod-sut-dvo", "sutKodu")["codeSystem"]).toBe("SUT");
  });

  it("verifies the person-history, diagnosis and e-Nabiz chains (4.5.14-4.5.16)", () => {
    expect(fields("kisi-gecmis-islemler-giris-dvo")).toHaveLength(3);
    expect(
      field("kisi-gecmis-islemler-giris-dvo", "hastaTCKimlikNo")["sensitive"],
    ).toBe(true);
    expect(
      String(
        field("kisi-gecmis-islemler-giris-dvo", "hastaTCKimlikNo")[
          "description"
        ],
      ),
    ).toContain("long");
    expect(fields("kisi-islem-dvo")).toHaveLength(3);

    expect(fields("tani-ara-giris-wsdvo")).toHaveLength(2);
    expect(field("tani-ara-giris-wsdvo", "icd10Kodu")["codeSystem"]).toBe(
      "ICD-10-WHO",
    );
    expect(
      String(field("tani-ara-giris-wsdvo", "icd10Kodu")["description"]),
    ).toContain("A0");
    expect(field("tani-list-dvo", "icd10Kodu")["codeSystem"]).toBe(
      "ICD-10-WHO",
    );

    expect(fields("e-nabiz-bildirim-sorgu-giris-dvo")).toHaveLength(3);
    expect(
      field("e-nabiz-bildirim-sorgu-giris-dvo", "hizmetSunucuRefNo")["type"],
    ).toBe("array");
    expect(fields("e-nabiz-hizmet-bilgi-dvo")).toHaveLength(3);
    expect(
      String(
        field("e-nabiz-bildirim-sorgu-cevap-dvo", "hizmetler")["description"],
      ),
    ).toContain("numbering anomaly");
    expect(field("e-nabiz-hizmet-bilgi-dvo", "islemKodu")["codeSystem"]).toBe(
      "SUT",
    );
  });

  it("verifies the death-registration chain with its copy-paste errors (4.5.17)", () => {
    expect(fields("kisi-olum-kayit-giris-dvo")).toHaveLength(6);
    expect(
      field("kisi-olum-kayit-giris-dvo", "olumBelgesiIcerik")["type"],
    ).toBe("array");
    expect(
      String(
        field("kisi-olum-kayit-giris-dvo", "saglikTesisKodu")["description"],
      ),
    ).toContain("typed String here");
    expect(fields("kisi-olum-kayit-detay-dvo")).toHaveLength(8);
    expect(
      String(field("kisi-olum-kayit-detay-dvo", "adi")["description"]),
    ).toContain("erroneously");
    expect(
      String(field("kisi-olum-kayit-detay-dvo", "soyadi")["description"]),
    ).toContain("erroneously");
    expect(
      String(field("kisi-olum-kayit-detay-dvo", "tcKimlikNo")["description"]),
    ).toContain("erroneously");
  });

  it("verifies the institution-referral and gen queries (4.5.19-4.5.20)", () => {
    expect(fields("kurum-sevk-talep-no-sorgu-giris-dvo")).toHaveLength(2);
    expect(fields("kurum-sevk-talep-no-sorgu-detay-dvo")).toHaveLength(10);
    expect(
      String(
        field("kurum-sevk-talep-no-sorgu-detay-dvo", "kurumSevkTalepNo")[
          "description"
        ],
      ),
    ).toContain("MALULİYET SEVK FORMU");
    expect(
      field("kurum-sevk-talep-no-sorgu-detay-dvo", "araKarar")["enumRef"],
    ).toBe("ara-karar");
    expect(
      field("kurum-sevk-talep-no-sorgu-detay-dvo", "sigortaliTcNo")[
        "sensitive"
      ],
    ).toBe(true);
    expect(
      String(
        field(
          "kurum-sevk-talep-no-sorgu-cevap-dvo",
          "KurumSevkTalepNoSorguDetay",
        )["description"],
      ),
    ).toContain("TYPE name as the PARAMETER name");

    expect(fields("kisi-gen-sorgu-giris-dvo")).toHaveLength(4);
    expect(
      (
        field("kisi-gen-sorgu-giris-dvo", "genKodu")[
          "conditionalRequired"
        ] as Array<unknown>
      ).length,
    ).toBe(1);
    expect(field("kisi-gen-sorgu-giris-dvo", "sutKodu")["codeSystem"]).toBe(
      "SUT",
    );
    expect(fields("kisi-gen-sorgu-cevap-dvo")).toHaveLength(4);
    expect(
      String(field("kisi-gen-sorgu-cevap-dvo", "islemTarihi")["description"]),
    ).toContain("Sevk Tarihi");
  });

  it("registers the four new code-list enums", () => {
    expect(values("ara-karar").map((v) => v["code"])).toEqual([
      "H",
      "E",
      "K",
      "Y",
    ]);
    expect(values("ara-karar")[3]["label"]).toBe("YSK Ara Karar");
  });
});
