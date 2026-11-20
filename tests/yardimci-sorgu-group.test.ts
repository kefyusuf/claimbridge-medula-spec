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
  "orneklenmis-takipler",
  "kesinti-yapilmis-islemler",
  "katilim-payi-ucreti",
  "takip-bilgileri-listesi",
  "yurt-disi-yardim-hakki-getir",
  "guncel-sut-kodlari",
];
const DVO_NAMES = [
  "orneklenmis-giris-dvo",
  "orneklenmis-cevap-dvo",
  "evrak-kesinti-giris-dvo",
  "evrak-kesinti-cevap-dvo",
  "evrak-takip-dvo",
  "takip-islem-kesinti-dvo",
  "katilim-payi-giris-dvo",
  "katilim-payi-cevap-dvo",
  "katilim-payi-dvo",
  "takip-bilgisi-giris-dvo",
  "takip-bilgisi-cevap-dvo",
  "takip-bilgisi-list-dvo",
  "yurt-disi-yardim-hakki-giris-dvo",
  "yurt-disi-yardim-hakki-cevap-dvo",
  "yurt-disi-yardim-hakki-detay-dvo",
  "guncel-sut-sorgu-giris-dvo",
  "guncel-sut-sorgu-cevap-dvo",
  "sut-fiyat-dvo",
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
    ["grup-turu", "sut-hizmet-turu"].map((name) => [
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

describe("yardimci query methods (G44b, guide s.290-298)", () => {
  it("extends the yardimci-islemler service to ten methods", () => {
    const serviceMethods = service["methods"] as string[];
    expect(serviceMethods).toHaveLength(10);
    expect(serviceMethods).toContain(
      "medula.hastane.yardimci-islemler.guncel-sut-kodlari",
    );
  });

  it("binds the six query method contracts", () => {
    const expected: Array<[string, string, string, number]> = [
      [
        "orneklenmis-takipler",
        "OrneklenmisGirisDVO",
        "OrneklenmisCevapDVO",
        290,
      ],
      [
        "kesinti-yapilmis-islemler",
        "EvrakKesintiGirisDVO",
        "EvrakKesintiCevapDVO",
        291,
      ],
      [
        "katilim-payi-ucreti",
        "KatilimPayiGirisDVO",
        "KatilimPayiCevapDVO",
        293,
      ],
      [
        "takip-bilgileri-listesi",
        "TakipBilgisiGirisDVO",
        "TakipBilgisiCevapDVO",
        294,
      ],
      [
        "yurt-disi-yardim-hakki-getir",
        "YurtDisiYardimHakkiGetirGirisDVO",
        "YurtDisiYardimHakkiGetirCevapDVO",
        296,
      ],
      [
        "guncel-sut-kodlari",
        "GuncelSutSorguGirisDVO",
        "GuncelSutSorguCevapDVO",
        297,
      ],
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

  it("verifies the evrak query composites (4.5.5-4.5.6)", () => {
    expect(fields("orneklenmis-giris-dvo")).toHaveLength(4);
    expect(field("orneklenmis-giris-dvo", "grupTuru")["enumRef"]).toBe(
      "grup-turu",
    );
    expect(fields("orneklenmis-cevap-dvo")).toHaveLength(4);
    expect(
      String(field("orneklenmis-cevap-dvo", "takipler")["description"]),
    ).toContain("EvrakTakipDVO");

    expect(fields("evrak-kesinti-giris-dvo")).toHaveLength(4);
    expect(fields("evrak-kesinti-cevap-dvo")).toHaveLength(7);
    expect(
      field("evrak-kesinti-cevap-dvo", "tupBebekKatilimTutari")["type"],
    ).toBe("decimal");

    expect(fields("evrak-takip-dvo")).toHaveLength(5);
    expect(fields("takip-islem-kesinti-dvo")).toHaveLength(8);
    expect(field("takip-islem-kesinti-dvo", "sutKodu")["codeSystem"]).toBe(
      "SUT",
    );
    expect(field("takip-islem-kesinti-dvo", "islemTarihi")["type"]).toBe(
      "date",
    );
    expect(field("takip-islem-kesinti-dvo", "aciklama")["length"]).toBe(255);
  });

  it("verifies the co-payment composites (4.5.7)", () => {
    expect(fields("katilim-payi-giris-dvo")).toHaveLength(2);
    expect(fields("katilim-payi-cevap-dvo")).toHaveLength(4);
    expect(
      String(field("katilim-payi-cevap-dvo", "KatilimPayiDVO")["description"]),
    ).toContain("TYPE name as the PARAMETER name");
    expect(fields("katilim-payi-dvo")).toHaveLength(4);
  });

  it("verifies the takip list and abroad entitlement queries (4.5.8-4.5.9)", () => {
    expect(fields("takip-bilgisi-giris-dvo")).toHaveLength(5);
    expect(fields("takip-bilgisi-cevap-dvo")).toHaveLength(5);
    expect(
      String(
        field("takip-bilgisi-cevap-dvo", "takipBilgisiListDVO")["description"],
      ),
    ).toContain("extraction artifact");
    expect(fields("takip-bilgisi-list-dvo")).toHaveLength(4);
    expect(
      String(field("takip-bilgisi-list-dvo", "grupTuru")["description"]),
    ).toContain("NAME");

    expect(fields("yurt-disi-yardim-hakki-giris-dvo")).toHaveLength(3);
    expect(fields("yurt-disi-yardim-hakki-cevap-dvo")).toHaveLength(3);
    expect(fields("yurt-disi-yardim-hakki-detay-dvo")).toHaveLength(9);
    expect(
      String(
        field("yurt-disi-yardim-hakki-detay-dvo", "kisiNo")["description"],
      ),
    ).toContain("YUPASS");
    expect(
      field("yurt-disi-yardim-hakki-detay-dvo", "id")["description"],
    ).toContain("patient admission");
  });

  it("verifies the SUT price catalog query (4.5.10)", () => {
    expect(fields("guncel-sut-sorgu-giris-dvo")).toHaveLength(2);
    expect(
      (
        field("guncel-sut-sorgu-giris-dvo", "tarih")[
          "conditionalRequired"
        ] as Array<unknown>
      ).length,
    ).toBe(1);
    expect(fields("guncel-sut-sorgu-cevap-dvo")).toHaveLength(3);
    expect(fields("sut-fiyat-dvo")).toHaveLength(5);
    expect(field("sut-fiyat-dvo", "sutKodu")["codeSystem"]).toBe("SUT");
    expect(field("sut-fiyat-dvo", "fiyat")["type"]).toBe("string");
    expect(field("sut-fiyat-dvo", "turu")["enumRef"]).toBe("sut-hizmet-turu");
    expect(values("sut-hizmet-turu")).toHaveLength(10);
  });

  it("registers the grup-turu enum with the four guide values", () => {
    expect(values("grup-turu").map((v) => v["code"])).toEqual([
      "A",
      "Y",
      "G",
      "D",
    ]);
    expect(values("grup-turu")[2]["label"]).toBe("Gunubirlik");
    expect(JSON.stringify(enums.get("grup-turu")!["sourceRefs"])).toContain(
      "tedavi-turu",
    );
  });
});
