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
  "teshis-bilgisi-dvo",
  "diyaliz-rapor-bilgisi-dvo",
  "eswl-rapor-bilgisi-dvo",
  "eswt-rapor-bilgisi-dvo",
  "ftr-rapor-bilgisi-dvo",
  "hot-rapor-bilgisi-dvo",
  "tup-bebek-rapor-bilgisi-dvo",
  "eswl-tas-bilgisi-dvo",
];
const ENUM_NAMES = [
  "bobrek-tarafi",
  "eswt-vucut-bolgesi",
  "ftr-vucut-bolgesi",
  "tup-bebek-turu",
  "tas-lokalizasyon",
];

let dvos: Map<string, Yaml>;
let enums: Map<string, Yaml>;

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

describe("rapor specialist tables (G43d, guide s.273-276)", () => {
  it("verifies TeshisBilgisiDVO (4.4.1.v)", () => {
    expect(fields("teshis-bilgisi-dvo")).toHaveLength(3);
    expect(field("teshis-bilgisi-dvo", "teshisKodu")["type"]).toBe("integer");
    expect(field("teshis-bilgisi-dvo", "baslangicTarihi")["required"]).toBe(
      true,
    );
  });

  it("verifies the seven treatment-specific tables (4.4.1.w-cc)", () => {
    expect(fields("diyaliz-rapor-bilgisi-dvo")).toHaveLength(4);
    expect(field("diyaliz-rapor-bilgisi-dvo", "refakatVarMi")["enumRef"]).toBe(
      "evet-hayir",
    );
    expect(field("diyaliz-rapor-bilgisi-dvo", "butKodu")["codeSystem"]).toBe(
      "SUT",
    );

    expect(fields("eswl-rapor-bilgisi-dvo")).toHaveLength(5);
    expect(field("eswl-rapor-bilgisi-dvo", "bobrekBilgisi")["enumRef"]).toBe(
      "bobrek-tarafi",
    );
    expect(
      field("eswl-rapor-bilgisi-dvo", "eswlRaporuTasBilgileri")["required"],
    ).toBe(true);

    expect(fields("eswt-rapor-bilgisi-dvo")).toHaveLength(4);
    expect(
      field("eswt-rapor-bilgisi-dvo", "eswtVucutBolgesiKodu")["enumRef"],
    ).toBe("eswt-vucut-bolgesi");

    expect(fields("ftr-rapor-bilgisi-dvo")).toHaveLength(6);
    expect(
      field("ftr-rapor-bilgisi-dvo", "ftrVucutBolgesiKodu")["enumRef"],
    ).toBe("ftr-vucut-bolgesi");
    expect(field("ftr-rapor-bilgisi-dvo", "tedaviTuru")["enumRef"]).toBe(
      "tedavi-turu",
    );
    expect(
      String(
        field("ftr-rapor-bilgisi-dvo", "robotikRehabilitasyon")["description"],
      ),
    ).toContain("empty-description");

    expect(fields("hot-rapor-bilgisi-dvo")).toHaveLength(3);
    expect(fields("tup-bebek-rapor-bilgisi-dvo")).toHaveLength(2);
    expect(
      field("tup-bebek-rapor-bilgisi-dvo", "tupBebekRaporTuru")["enumRef"],
    ).toBe("tup-bebek-turu");

    expect(fields("eswl-tas-bilgisi-dvo")).toHaveLength(2);
    expect(
      field("eswl-tas-bilgisi-dvo", "tasLokalizasyonKodu")["enumRef"],
    ).toBe("tas-lokalizasyon");
  });

  it("annotates SUT codeSystem on every butKodu", () => {
    for (const dvo of [
      "diyaliz-rapor-bilgisi-dvo",
      "eswl-rapor-bilgisi-dvo",
      "eswt-rapor-bilgisi-dvo",
      "ftr-rapor-bilgisi-dvo",
      "tup-bebek-rapor-bilgisi-dvo",
    ]) {
      expect(field(dvo, "butKodu")["codeSystem"], dvo).toBe("SUT");
    }
  });

  it("registers the five new code-list enums", () => {
    expect(values("bobrek-tarafi").map((v) => v["code"])).toEqual(["1", "2"]);
    expect(values("eswt-vucut-bolgesi")).toHaveLength(12);
    expect(values("eswt-vucut-bolgesi")[0]["code"]).toBe("12");
    expect(values("ftr-vucut-bolgesi")).toHaveLength(17);
    expect(values("ftr-vucut-bolgesi")[4]["code"]).toBe("12");
    expect(values("ftr-vucut-bolgesi")[16]["code"]).toBe("11");
    expect(
      JSON.stringify(enums.get("ftr-vucut-bolgesi")!["sourceRefs"]),
    ).toContain("ordering anomaly");
    expect(values("tup-bebek-turu")).toHaveLength(2);
    expect(values("tas-lokalizasyon").map((v) => v["code"])).toEqual([
      "2",
      "3",
      "4",
    ]);
    expect(
      JSON.stringify(enums.get("tas-lokalizasyon")!["sourceRefs"]),
    ).toContain("no code 1");
  });
});
