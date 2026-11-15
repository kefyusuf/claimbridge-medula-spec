import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { Ajv2020 } from "ajv/dist/2020.js";
import type { ValidateFunction } from "ajv";
import { parse } from "yaml";

const SCHEMA_BASE = "https://claimbridge.dev/schemas/";
const root = resolve(import.meta.dirname, "..");
const schemasDir = resolve(root, "schemas");
const registryDir = resolve(root, "registry");

type RegistryEntry = { file: string; data: Record<string, unknown> };
type FieldLike = { name: string; type?: string; enumRef?: string | null };

let ajv: Ajv2020;
let dvos: RegistryEntry[];
let enums: RegistryEntry[];
let rules: RegistryEntry[];
let methods: RegistryEntry[];
let services: RegistryEntry[];

const EXPECTED_DVO_FILES = [
  "fatura-kayit/fatura-cevap-detay-dvo.yml",
  "fatura-kayit/fatura-cevap-dvo.yml",
  "fatura-kayit/fatura-giris-dvo.yml",
  "fatura-kayit/fatura-hizmet-detay-dvo.yml",
  "hasta-kabul/provizyon-cevap-dvo.yml",
  "hasta-kabul/provizyon-giris-dvo.yml",
  "hasta-kabul/takip-dvo.yml",
  "hasta-kabul/takip-oku-giris-dvo.yml",
  "hasta-kabul/takip-sil-cevap-dvo.yml",
  "hasta-kabul/takip-sil-giris-dvo.yml",
  "hizmet-kayit/hizmet-iptal-cevap-dvo.yml",
  "hizmet-kayit/hizmet-iptal-giris-dvo.yml",
  "hizmet-kayit/hizmet-oku-cevap-dvo.yml",
  "hizmet-kayit/hizmet-dvo.yml",
  "hizmet-kayit/hizmet-oku-giris-dvo.yml",
  "hizmet-kayit/hizmet-kayit-cevap-dvo.yml",
  "hizmet-kayit/ameliyatve-girisim-bilgisi-dvo.yml",
  "hizmet-kayit/diger-islem-bilgisi-dvo.yml",
  "hizmet-kayit/ilac-bilgisi-dvo.yml",
  "hizmet-kayit/hizmet-kayit-giris-dvo.yml",
  "hizmet-kayit/dis-bilgisi-dvo.yml",
  "hizmet-kayit/kan-bilgisi-dvo.yml",
  "hizmet-kayit/malzeme-bilgisi-dvo.yml",
  "hizmet-kayit/konsultasyon-bilgisi-dvo.yml",
  "hizmet-kayit/kayitli-islem-bilgisi-dvo.yml",
  "hizmet-kayit/muayene-bilgisi-dvo.yml",
  "hizmet-kayit/onceki-islem-bilgisi-dvo.yml",
  "hizmet-kayit/hatali-islem-bilgisi-dvo.yml",
  "hizmet-kayit/tahlil-bilgisi-dvo.yml",
  "hizmet-kayit/tani-bilgisi-dvo.yml",
  "hizmet-kayit/hasta-yatis-bilgisi-dvo.yml",
  "fatura-kayit/fatura-iptal-cevap-dvo.yml",
  "fatura-kayit/fatura-iptal-giris-dvo.yml",
  "fatura-kayit/fatura-oku-cevap-dvo.yml",
  "fatura-kayit/fatura-oku-giris-dvo.yml",
  "fatura-kayit/hizmet-detay-dvo.yml",
];

const EXPECTED_ENUM_IDS = [
  "provizyon-tipi",
  "sigortali-turu",
  "sonuc-kodu",
  "takip-durumu",
  "takip-tipi",
  "tedavi-tipi",
  "tedavi-turu",
  "odeme-sorgu-durum",
  "tani-tipi",
  "ekds-yontem-gerekce",
  "istisnai-hal",
  "taburcu-kodu",
  "malzeme-turu",
  "ilac-turu",
  "ayni-farkli-kesi",
  "euroscore",
];

const EXPECTED_RULE_FILES = [
  "rules/cancellation-rules.yml",
  "rules/conditional-required-fields.yml",
  "rules/invoice-rules.yml",
  "rules/required-fields.yml",
  "rules/state-transition-rules.yml",
];

const MIN_FIELDS: Record<string, string[]> = {
  ProvizyonGirisDVO: [
    "saglikTesisKodu",
    "hastaTCKimlikNo",
    "takipNo",
    "provizyonTipi",
    "tedaviTuru",
    "takipTipi",
    "bransKodu",
    "doktorTescilNo",
    "ktsHbysKodu",
  ],
  ProvizyonCevapDVO: [
    "sonucKodu",
    "sonucMesaji",
    "hastaBasvuruNo",
    "takipNo",
    "takipler",
  ],
  HizmetKayitGirisDVO: [
    "saglikTesisKodu",
    "takipNo",
    "tanilar",
    "ktsHbysKodu",
    "ameliyatveGirisimBilgileri",
    "muayeneBilgisi",
    "triajBeyani",
    "hastaYatisBilgileri",
    "kanBilgileri",
  ],
  HizmetKayitCevapDVO: [
    "sonucKodu",
    "sonucMesaji",
    "takipNo",
    "hastaBasvuruNo",
    "saglikTesisKodu",
    "islemBilgileri",
    "hataliKayitlar",
  ],
  FaturaGirisDVO: [
    "saglikTesisKodu",
    "faturaTarihi",
    "hastaBasvuruNo",
    "faturaRefNo",
    "hizmetDetaylari",
    "trafikKazasiOdemeYuzdesi",
    "ilaveUcret",
    "ktsHbysKodu",
    "hastaTelefon",
    "hastaAdres",
    "muvafakatVar",
  ],
  FaturaCevapDVO: [
    "sonucKodu",
    "sonucMesaji",
    "faturaTeslimNo",
    "faturaTutari",
  ],
};

beforeAll(() => {
  ajv = new Ajv2020({ allErrors: true, allowUnionTypes: true });
  for (const file of readdirSync(schemasDir).filter((f) =>
    f.endsWith(".schema.json"),
  )) {
    ajv.addSchema(JSON.parse(readFileSync(resolve(schemasDir, file), "utf8")));
  }

  const loadFlat = (dir: string): RegistryEntry[] =>
    readdirSync(resolve(registryDir, dir))
      .filter((f) => f.endsWith(".yml"))
      .map((file) => ({
        file: `${dir}/${file}`,
        data: parse(
          readFileSync(resolve(registryDir, dir, file), "utf8"),
        ) as Record<string, unknown>,
      }));

  const loadNested = (dir: string): RegistryEntry[] => {
    const basePath = resolve(registryDir, dir);
    return readdirSync(basePath, { withFileTypes: true })
      .filter((e) => e.isDirectory())
      .flatMap((d) =>
        readdirSync(resolve(basePath, d.name))
          .filter((f) => f.endsWith(".yml"))
          .map((file) => ({
            file: `${d.name}/${file}`,
            data: parse(
              readFileSync(resolve(basePath, d.name, file), "utf8"),
            ) as Record<string, unknown>,
          })),
      );
  };

  dvos = loadNested("dvos");
  enums = loadFlat("enums");
  rules = loadFlat("rules");
  methods = loadNested("methods");
  services = loadFlat("services");
});

function schemaValidate(
  schemaName: string,
  data: unknown,
): boolean | ValidateFunction["errors"] {
  const validate = ajv.getSchema(`${SCHEMA_BASE}${schemaName}.schema.json`);
  expect(validate, `schema not registered: ${schemaName}`).toBeTruthy();
  const ok = (validate as ValidateFunction)(data);
  return ok ? true : ((validate as ValidateFunction).errors ?? false);
}

describe("registry-data (Group 3)", () => {
  it("has exactly the 9 DVO files from PRD section 13.3", () => {
    expect(dvos.map((d) => d.file).sort()).toEqual(
      [...EXPECTED_DVO_FILES].sort(),
    );
  });

  it("has exactly the 5 enum files from PRD section 11", () => {
    expect(enums.map((e) => e.data.id).sort()).toEqual(
      [...EXPECTED_ENUM_IDS].sort(),
    );
  });

  it("has exactly the 5 rule files from PRD section 11", () => {
    expect(rules.map((r) => r.file).sort()).toEqual(EXPECTED_RULE_FILES);
  });

  it("validates every DVO, enum, and rule file against its schema", () => {
    for (const d of dvos) {
      expect(schemaValidate("dvo", d.data), `dvo file: ${d.file}`).toBe(true);
    }
    for (const e of enums) {
      expect(schemaValidate("enum", e.data), `enum file: ${e.file}`).toBe(true);
    }
    for (const r of rules) {
      expect(schemaValidate("rule", r.data), `rule file: ${r.file}`).toBe(true);
    }
  });

  it("keeps enum codes unique within each enum", () => {
    for (const e of enums) {
      const codes = (e.data.values as Array<{ code: string }>).map(
        (v) => v.code,
      );
      expect(new Set(codes).size, `duplicate codes in enum ${e.data.id}`).toBe(
        codes.length,
      );
    }
  });

  it("enforces the field enumRef contract (PRD 12.4 amendment)", () => {
    const enumIds = new Set(enums.map((e) => e.data.id as string));
    for (const d of dvos) {
      for (const f of (d.data.fields as FieldLike[]) ?? []) {
        if (f.type === "enum") {
          expect(
            f.enumRef,
            `enum-typed field ${d.data.id}.${f.name} must declare enumRef`,
          ).toBeTruthy();
          expect(
            enumIds.has(f.enumRef as string),
            `unresolved enumRef "${f.enumRef}" in ${d.data.id}.${f.name}`,
          ).toBe(true);
        } else {
          expect(
            f.enumRef,
            `non-enum field ${d.data.id}.${f.name} must keep enumRef null`,
          ).toBeNull();
        }
      }
    }
  });

  it("resolves every non-null method contract DVO to a registered DVO id", () => {
    const dvoIds = new Set(dvos.map((d) => d.data.id as string));
    for (const m of methods) {
      const contract = m.data.contract as {
        inputDvo: string | null;
        outputDvo: string | null;
      };
      for (const key of ["inputDvo", "outputDvo"] as const) {
        const id = contract[key];
        if (id !== null) {
          expect(dvoIds.has(id), `unresolved ${key} "${id}" in ${m.file}`).toBe(
            true,
          );
        }
      }
    }
  });

  it("covers the PRD 13.4 minimum fields in the six contract DVOs", () => {
    const fieldsById = new Map(
      dvos.map((d) => [
        d.data.id as string,
        (d.data.fields as FieldLike[]).map((f) => f.name),
      ]),
    );
    for (const [dvoId, required] of Object.entries(MIN_FIELDS)) {
      const present = fieldsById.get(dvoId) ?? [];
      for (const name of required) {
        expect(
          present,
          `${dvoId} is missing minimum field "${name}" (PRD 13.4)`,
        ).toContain(name);
      }
    }
  });

  it("keeps rule ids unique across all rule files", () => {
    const ids: string[] = [];
    for (const r of rules) {
      for (const rule of (r.data.rules as Array<{ id: string }>) ?? []) {
        ids.push(rule.id);
      }
    }
    expect(new Set(ids).size, "duplicate rule ids across rule files").toBe(
      ids.length,
    );
  });

  it("resolves rule appliesTo references into services, methods, DVOs, and fields", () => {
    const serviceIds = new Set(services.map((s) => s.data.id as string));
    const methodIds = new Set(methods.map((m) => m.data.id as string));
    const fieldNamesByDvo = new Map(
      dvos.map((d) => [
        d.data.id as string,
        (d.data.fields as FieldLike[]).map((f) => f.name),
      ]),
    );
    for (const r of rules) {
      for (const rule of (r.data.rules as Array<Record<string, unknown>>) ??
        []) {
        const at = rule.appliesTo as Record<string, string | null>;
        if (at.service) {
          expect(
            serviceIds.has(at.service),
            `unresolved appliesTo.service "${at.service}" in ${r.file}`,
          ).toBe(true);
        }
        if (at.method) {
          expect(
            methodIds.has(at.method),
            `unresolved appliesTo.method "${at.method}" in ${r.file}`,
          ).toBe(true);
        }
        if (at.dvo) {
          expect(
            fieldNamesByDvo.has(at.dvo),
            `unresolved appliesTo.dvo "${at.dvo}" in ${r.file}`,
          ).toBe(true);
        }
        if (at.dvo && at.field) {
          expect(
            fieldNamesByDvo.get(at.dvo),
            `unresolved appliesTo.field "${at.field}" in ${at.dvo} (${r.file})`,
          ).toContain(at.field);
        }
      }
    }
  });
});
