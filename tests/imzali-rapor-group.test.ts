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
  "rapor-onay",
  "kurul-baskani-rapor-onay",
  "bashekim-rapor-onay",
  "rapor-sorgu",
  "tc-ile-rapor-sorgu",
  "kurul-baskani-onay-bekleyen-rapor-sorgu",
  "bashekim-onay-bekleyen-rapor-sorgu",
  "onay-bekleyen-rapor-sorgu",
  "rapor-sil",
  "onay",
  "onay-bekleyen",
];
const DVO_NAMES = [
  "rapor-onay-dvo",
  "imzali-rapor-onay-giris-dvo",
  "imzali-rapor-sorgu-giris-dvo",
  "imzali-rapor-onay-bekleyen-sorgu-giris-dvo",
  "rapor-onay-bekleyen-sorgu-dvo",
  "imzali-rapor-sil-giris-dvo",
  "onay-dvo",
  "rapor-onay-cevap-dvo",
  "rapor-sorgu-cevap-dvo",
  "imzali-rapor-dvo",
  "onay-cevap-dvo",
  "onay-bekleyen-cevap-dvo",
  "sonuc-dvo",
];
const ENUM_NAMES = ["imzali-rapor-turu", "onay-veren-turu", "onay-islem-turu"];

let service: Yaml;
let methods: Map<string, Yaml>;
let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;

beforeAll(() => {
  service = readYaml("registry/services/imzali-rapor.yml");
  methods = new Map(
    METHOD_SLUGS.map((slug) => [
      slug,
      readYaml(`registry/methods/imzali-rapor/${slug}.yml`),
    ]),
  );
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

describe("imzali rapor service (G45c-a, guide s.336-349)", () => {
  it("registers the imzali-rapor service with guide-verified wsdl", () => {
    expect(service["id"]).toBe("medula.hastane.imzali-rapor");
    expect(service["methods"] as string[]).toHaveLength(12);
    const manifest = readYaml("sources/wsdl-manifest.yml");
    const wsdls = manifest["wsdls"] as Array<Record<string, string>>;
    const ir = wsdls.filter((w) => w["service"] === "imzali-rapor");
    expect(ir).toHaveLength(2);
    expect(ir[0]["url"]).toContain("ImzaliRaporIslemleriService");
  });

  it("binds the eleven workflow contracts", () => {
    const expected: Array<[string, string, string, number]> = [
      ["rapor-onay", "RaporOnayDVO", "RaporOnayCevapDVO", 336],
      [
        "kurul-baskani-rapor-onay",
        "ImzaliRaporOnayGirisDVO",
        "RaporOnayCevapDVO",
        337,
      ],
      [
        "bashekim-rapor-onay",
        "ImzaliRaporOnayGirisDVO",
        "RaporOnayCevapDVO",
        338,
      ],
      ["rapor-sorgu", "ImzaliRaporSorguGirisDVO", "RaporSorguCevapDVO", 339],
      [
        "tc-ile-rapor-sorgu",
        "ImzaliRaporSorguGirisDVO",
        "RaporSorguCevapDVO",
        341,
      ],
      [
        "kurul-baskani-onay-bekleyen-rapor-sorgu",
        "ImzaliRaporOnayBekleyenSorguGirisDVO",
        "RaporSorguCevapDVO",
        342,
      ],
      [
        "bashekim-onay-bekleyen-rapor-sorgu",
        "ImzaliRaporOnayBekleyenSorguGirisDVO",
        "RaporSorguCevapDVO",
        344,
      ],
      [
        "onay-bekleyen-rapor-sorgu",
        "RaporOnayBekleyenSorguDVO",
        "RaporSorguCevapDVO",
        345,
      ],
      ["rapor-sil", "ImzaliRaporSilGirisDVO", "SonucDVO", 347],
      ["onay", "ImzaliRaporOnayGirisDVO", "OnayCevapDVO", 348],
      ["onay-bekleyen", "ImzaliRaporOnayGirisDVO", "OnayBekleyenCevapDVO", 349],
    ];
    for (const [slug, inputDvo, outputDvo, page] of expected) {
      const method = methods.get(slug)!;
      expect(method["contract"], slug).toEqual({ inputDvo, outputDvo });
      const refs = method["sourceRefs"] as Array<Record<string, unknown>>;
      expect(refs.some((r) => r["page"] === page)).toBe(true);
      expect((method["success"] as Record<string, string>)["successCode"]).toBe(
        "0000",
      );
    }
  });

  it("models the signed-blob inputs with the approval workflow effects", () => {
    for (const dvo of [
      "rapor-onay-dvo",
      "imzali-rapor-onay-giris-dvo",
      "imzali-rapor-sorgu-giris-dvo",
    ]) {
      expect(field(dvo, "doktorTcKimlikNo")["sensitive"], dvo).toBe(true);
    }
    expect(fields("rapor-onay-dvo")).toHaveLength(3);
    expect(field("rapor-onay-dvo", "raporBilgisi")["type"]).toBe("array");
    expect(
      String(field("rapor-onay-dvo", "raporBilgisi")["description"]),
    ).toContain("signed");
    expect(fields("imzali-rapor-onay-bekleyen-sorgu-giris-dvo")).toHaveLength(
      3,
    );
    expect(fields("rapor-onay-bekleyen-sorgu-dvo")).toHaveLength(2);
    expect(fields("imzali-rapor-sil-giris-dvo")).toHaveLength(3);

    const onay = methods.get("rapor-onay")!;
    const effects = onay["stateEffects"] as Record<string, string[]>;
    expect(effects["creates"]).toContain("imzaliRapor");
    expect(effects["generates"]).toContain("raporTakipNo");
    const sil = methods.get("rapor-sil")!;
    expect(
      (sil["stateEffects"] as Record<string, string[]>)["deletes"],
    ).toContain("imzaliRapor");
    const kurul = methods.get("kurul-baskani-rapor-onay")!;
    expect(
      (kurul["stateEffects"] as Record<string, string[]>)["updates"],
    ).toContain("imzaliRapor");
  });

  it("verifies the response contracts (RaporOnay / RaporSorgu / Onay / OnayBekleyen / Sonuc)", () => {
    expect(fields("rapor-onay-cevap-dvo")).toHaveLength(4);
    expect(
      field("rapor-onay-cevap-dvo", "raporTakipNo")["syntheticOnlyRecommended"],
    ).toBe(true);
    expect(field("rapor-onay-cevap-dvo", "uyariMesaji")["required"]).toBe(
      false,
    );

    expect(fields("rapor-sorgu-cevap-dvo")).toHaveLength(4);
    expect(field("rapor-sorgu-cevap-dvo", "raporBilgileri")["type"]).toBe(
      "array",
    );

    expect(fields("onay-cevap-dvo")).toHaveLength(4);
    expect(
      field("onay-cevap-dvo", "onayIslemReferans")["syntheticOnlyRecommended"],
    ).toBe(true);

    expect(fields("onay-bekleyen-cevap-dvo")).toHaveLength(3);
    expect(
      String(
        field("onay-bekleyen-cevap-dvo", "onayiBeklenenDoktorlar")[
          "description"
        ],
      ),
    ).toContain("singular");

    expect(fields("sonuc-dvo")).toHaveLength(3);
  });

  it("verifies the OnayDVO signable-object contract (4.9.11.a)", () => {
    expect(fields("onay-dvo")).toHaveLength(5);
    expect(field("onay-dvo", "onayVerenTuru")["enumRef"]).toBe(
      "onay-veren-turu",
    );
    expect(field("onay-dvo", "onayIslemTuru")["enumRef"]).toBe(
      "onay-islem-turu",
    );
    expect(values("onay-veren-turu").map((v) => v["code"])).toEqual(["1", "2"]);
    expect(values("onay-islem-turu").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
    ]);
  });

  it("verifies ImzaliRaporDVO with deferred §4.9 composites", () => {
    expect(fields("imzali-rapor-dvo")).toHaveLength(4);
    expect(field("imzali-rapor-dvo", "turu")["enumRef"]).toBe(
      "imzali-rapor-turu",
    );
    expect(values("imzali-rapor-turu").map((v) => v["code"])).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
      "10",
    ]);
    for (const branch of [
      "maluliyetRaporu",
      "engellilikRaporu",
      "tibbiGereklilikRaporu",
    ]) {
      expect(field("imzali-rapor-dvo", branch)["type"]).toBe("object");
      expect(
        String(field("imzali-rapor-dvo", branch)["description"]),
      ).toContain("4.9");
    }
  });
});
