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

const TAAHHUT_SLUGS = [
  "dis-taahhut-kaydet",
  "dis-taahhut-oku",
  "dis-taahhut-sil",
  "kisi-dis-taahhut-oku",
];
const ORTODONTI_SLUGS = [
  "ortodonti-formu-kaydet",
  "ortodonti-formu-iptal",
  "ortodonti-formu-oku",
];
const DVO_NAMES = [
  "taahhut-kayit-dvo",
  "taahhut-dvo",
  "taahhut-dis-dvo",
  "taahhut-cevap-dvo",
  "taahhut-oku-dvo",
  "taahhut-kisi-oku-dvo",
  "taahhut-kisi-cevap-dvo",
  "ortodonti-formu-kaydet-giris-dvo",
  "ortodonti-formu-kaydet-cevap-dvo",
  "ortodonti-formu-iptal-giris-dvo",
  "ortodonti-formu-iptal-cevap-dvo",
  "ortodonti-formu-oku-giris-dvo",
  "ortodonti-formu-oku-cevap-dvo",
];

let taahhutService: Yaml;
let ortodontiService: Yaml;
let methods: Map<string, Yaml>;
let dvos: Map<string, Yaml>;

beforeAll(() => {
  taahhutService = readYaml("registry/services/taahhut.yml");
  ortodontiService = readYaml("registry/services/ortodonti.yml");
  methods = new Map(
    [
      ...TAAHHUT_SLUGS.map((s) => [`taahhut/${s}`, "taahhut"]),
      ...ORTODONTI_SLUGS.map((s) => [`ortodonti/${s}`, "ortodonti"]),
    ].map(([key, domain]) => {
      const slug = (key as string).split("/")[1];
      return [key, readYaml(`registry/methods/${domain}/${slug}.yml`)];
    }),
  );
  dvos = new Map(
    DVO_NAMES.map((name) => {
      const domain =
        name.startsWith("taahhut") || name.startsWith("ortodonti")
          ? name.startsWith("taahhut")
            ? "taahhut"
            : "ortodonti"
          : "taahhut";
      return [name, readYaml(`registry/dvos/${domain}/${name}.yml`)];
    }),
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

describe("taahhut + ortodonti services (G45b, guide s.322-329)", () => {
  it("registers the two services with guide-verified wsdls", () => {
    expect(taahhutService["id"]).toBe("medula.hastane.taahhut");
    expect(taahhutService["methods"] as string[]).toHaveLength(4);
    expect(ortodontiService["id"]).toBe("medula.hastane.ortodonti");
    expect(ortodontiService["methods"] as string[]).toHaveLength(3);
    const manifest = readYaml("sources/wsdl-manifest.yml");
    const wsdls = manifest["wsdls"] as Array<Record<string, string>>;
    expect(wsdls.filter((w) => w["service"] === "taahhut")).toHaveLength(2);
    expect(wsdls.filter((w) => w["service"] === "ortodonti")).toHaveLength(2);
    const ortoProd = wsdls.find(
      (w) => w["service"] === "ortodonti" && w["environment"] === "production",
    );
    expect(ortoProd!["url"]).toContain("ortodontiIslemleriWS");
  });

  it("binds the seven method contracts with workflow effects", () => {
    const kaydet = methods.get("taahhut/dis-taahhut-kaydet")!;
    expect(kaydet["contract"]).toEqual({
      inputDvo: "TaahhutKayitDVO",
      outputDvo: "TaahhutCevapDVO",
    });
    expect(
      (kaydet["stateEffects"] as Record<string, string[]>)["creates"],
    ).toContain("taahhut");
    expect(
      (kaydet["stateEffects"] as Record<string, string[]>)["generates"],
    ).toContain("taahhutNo");
    expect(
      (
        methods.get("taahhut/dis-taahhut-oku")!["stateEffects"] as Record<
          string,
          string[]
        >
      )["reads"],
    ).toContain("taahhut");
    expect(
      (
        methods.get("taahhut/dis-taahhut-sil")!["stateEffects"] as Record<
          string,
          string[]
        >
      )["deletes"],
    ).toContain("taahhut");
    const okuKisi = methods.get("taahhut/kisi-dis-taahhut-oku")!;
    expect(okuKisi["contract"]).toEqual({
      inputDvo: "TaahhutKisiOkuDVO",
      outputDvo: "TaahhutKisiCevapDVO",
    });
    const formKaydet = methods.get("ortodonti/ortodonti-formu-kaydet")!;
    expect(formKaydet["contract"]).toEqual({
      inputDvo: "OrtodontiFormuKaydetGirisDVO",
      outputDvo: "OrtodontiFormuKaydetCevapDVO",
    });
    expect(
      (formKaydet["stateEffects"] as Record<string, string[]>)["generates"],
    ).toContain("formNo");
  });

  it("verifies the TaahhutDVO address body (4.7.1.c)", () => {
    expect(fields("taahhut-dvo")).toHaveLength(11);
    expect(field("taahhut-dvo", "hastaTCKimlikNo")["sensitive"]).toBe(true);
    expect(String(field("taahhut-dvo", "adressIlce")["description"])).toContain(
      "must match",
    );
    expect(field("taahhut-dvo", "adressEposta")["required"]).toBe(false);
  });

  it("verifies TaahhutDisDVO with the annex-7 restriction (4.7.1.d)", () => {
    expect(fields("taahhut-dis-dvo")).toHaveLength(2);
    expect(field("taahhut-dis-dvo", "sutKodu")["codeSystem"]).toBe("SUT");
    expect(
      String(field("taahhut-dis-dvo", "sutKodu")["description"]),
    ).toContain("404010");
    expect(String(field("taahhut-dis-dvo", "disNo")["description"])).toContain(
      "4.7.4",
    );
  });

  it("verifies TaahhutCevapDVO with the PDF output (4.7.1.b)", () => {
    expect(fields("taahhut-cevap-dvo")).toHaveLength(4);
    expect(field("taahhut-cevap-dvo", "taahhutNo")["type"]).toBe("integer");
    expect(
      field("taahhut-cevap-dvo", "taahhutNo")["syntheticOnlyRecommended"],
    ).toBe(true);
    expect(
      String(field("taahhut-cevap-dvo", "taahhutCikti")["description"]),
    ).toContain("PDF");
  });

  it("verifies the oku/sil and kisi-oku contracts (4.4.2-4.4.4)", () => {
    expect(fields("taahhut-oku-dvo")).toHaveLength(2);
    expect(
      String(field("taahhut-oku-dvo", "saglikTesisKodu")["description"]),
    ).toContain("typed String here");
    expect(fields("taahhut-kisi-oku-dvo")).toHaveLength(2);
    expect(field("taahhut-kisi-oku-dvo", "tcKimlikNo")["sensitive"]).toBe(true);
    expect(fields("taahhut-kisi-cevap-dvo")).toHaveLength(3);
    expect(field("taahhut-kisi-cevap-dvo", "taahhutNo")["type"]).toBe("array");
  });

  it("verifies the ortodonti contracts (4.5.1-4.5.3)", () => {
    expect(fields("ortodonti-formu-kaydet-giris-dvo")).toHaveLength(6);
    expect(
      field("ortodonti-formu-kaydet-giris-dvo", "sutKodu")["codeSystem"],
    ).toBe("SUT");
    expect(
      field("ortodonti-formu-kaydet-giris-dvo", "tcKimlikNo")["sensitive"],
    ).toBe(true);
    expect(
      String(
        field("ortodonti-formu-kaydet-giris-dvo", "formNo")["description"],
      ),
    ).toContain("Evet/Hayır");

    expect(fields("ortodonti-formu-iptal-giris-dvo")).toHaveLength(4);
    expect(fields("ortodonti-formu-oku-giris-dvo")).toHaveLength(4);

    expect(fields("ortodonti-formu-oku-cevap-dvo")).toHaveLength(13);
    for (const underscored of [
      "tesis_kodu_1",
      "islem_tarihi_2",
      "provizyonNo3",
    ]) {
      expect(field("ortodonti-formu-oku-cevap-dvo", underscored)).toBeTruthy();
    }
    expect(
      String(
        field("ortodonti-formu-oku-cevap-dvo", "tesis_kodu_1")["description"],
      ),
    ).toContain("underscored");
    expect(
      String(
        field("ortodonti-formu-oku-cevap-dvo", "islemTuru")["description"],
      ),
    ).toContain("Sınıf");
  });
});
