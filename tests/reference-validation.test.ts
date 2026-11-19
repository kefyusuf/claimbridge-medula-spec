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
const sourcesDir = resolve(root, "sources");

type RegistryEntry = { file: string; data: Record<string, unknown> };
type WsdlEntry = {
  id: string;
  service: string;
  environment: string;
  url: string;
};

let ajv: Ajv2020;
let services: RegistryEntry[];
let methods: RegistryEntry[];
let wsdlManifest: WsdlEntry[];

const CORE_CONTRACTS: Record<string, { inputDvo: string; outputDvo: string }> =
  {
    "medula.hastane.hasta-kabul.hasta-kabul": {
      inputDvo: "ProvizyonGirisDVO",
      outputDvo: "ProvizyonCevapDVO",
    },
    "medula.hastane.hizmet-kayit.hizmet-kayit": {
      inputDvo: "HizmetKayitGirisDVO",
      outputDvo: "HizmetKayitCevapDVO",
    },
    "medula.hastane.fatura-kayit.fatura-kayit": {
      inputDvo: "FaturaGirisDVO",
      outputDvo: "FaturaCevapDVO",
    },
  };

beforeAll(() => {
  ajv = new Ajv2020({ allErrors: true, allowUnionTypes: true });
  for (const file of readdirSync(schemasDir).filter((f) =>
    f.endsWith(".schema.json"),
  )) {
    ajv.addSchema(JSON.parse(readFileSync(resolve(schemasDir, file), "utf8")));
  }

  const servicesPath = resolve(registryDir, "services");
  services = readdirSync(servicesPath)
    .filter((f) => f.endsWith(".yml"))
    .map((file) => ({
      file,
      data: parse(readFileSync(resolve(servicesPath, file), "utf8")) as Record<
        string,
        unknown
      >,
    }));

  const methodsPath = resolve(registryDir, "methods");
  methods = readdirSync(methodsPath, { withFileTypes: true })
    .filter((e) => e.isDirectory())
    .flatMap((dir) =>
      readdirSync(resolve(methodsPath, dir.name))
        .filter((f) => f.endsWith(".yml"))
        .map((file) => ({
          file: `${dir.name}/${file}`,
          data: parse(
            readFileSync(resolve(methodsPath, dir.name, file), "utf8"),
          ) as Record<string, unknown>,
        })),
    );

  const manifest = parse(
    readFileSync(resolve(sourcesDir, "wsdl-manifest.yml"), "utf8"),
  ) as {
    wsdls: WsdlEntry[];
  };
  wsdlManifest = manifest.wsdls ?? [];
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

describe("reference-validation (Group 2)", () => {
  it("has exactly 4 service registry files", () => {
    expect(services.map((s) => s.file).sort()).toEqual([
      "fatura-kayit.yml",
      "hasta-kabul.yml",
      "hizmet-kayit.yml",
      "rapor.yml",
    ]);
  });

  it("has exactly 30 method registry files in 4 domains", () => {
    expect(methods.map((m) => m.file).sort()).toEqual([
      "fatura-kayit/fatura-iptal.yml",
      "fatura-kayit/fatura-kayit.yml",
      "fatura-kayit/fatura-oku.yml",
      "fatura-kayit/fatura-tutar-oku.yml",
      "hasta-kabul/basvuru-altindaki-takipleri-oku.yml",
      "hasta-kabul/ekds-belge-gereken-takip-sorgu.yml",
      "hasta-kabul/ekds-kisi-dogrulama-sorgu.yml",
      "hasta-kabul/hasta-cikis-iptal.yml",
      "hasta-kabul/hasta-cikis-kayit.yml",
      "hasta-kabul/hasta-kabul-iptal.yml",
      "hasta-kabul/hasta-kabul-kimlik-dogrulama.yml",
      "hasta-kabul/hasta-kabul-oku.yml",
      "hasta-kabul/hasta-kabul.yml",
      "hasta-kabul/hasta-yatis-oku.yml",
      "hasta-kabul/kemik-iligi-iptal.yml",
      "hasta-kabul/kemik-iligi-islem-duzeltme.yml",
      "hasta-kabul/kemik-iligi-kabul.yml",
      "hasta-kabul/kemik-iligi-oku.yml",
      "hasta-kabul/kemik-iligi-tc-ile-sorgu.yml",
      "hasta-kabul/sevk-bildir.yml",
      "hasta-kabul/update-provizyon-tipi.yml",
      "hasta-kabul/update-tedavi-tipi.yml",
      "hizmet-kayit/hizmet-kaydi-iptal.yml",
      "hizmet-kayit/hizmet-kaydi-oku.yml",
      "hizmet-kayit/hizmet-kayit.yml",
      "rapor/ilac-rapor-duzelt.yml",
      "rapor/rapor-bilgisi-bul-rapor-takip-nodan.yml",
      "rapor/rapor-bilgisi-bul-tc-kimlik-nodan.yml",
      "rapor/rapor-bilgisi-bul.yml",
      "rapor/rapor-bilgisi-kaydet.yml",
      "rapor/rapor-bilgisi-sil.yml",
      "rapor/takip-no-ile-rapor-bilgisi-kaydet.yml",
    ]);
  });

  it("validates every service and method file against its schema", () => {
    for (const s of services) {
      expect(schemaValidate("service", s.data), `service file: ${s.file}`).toBe(
        true,
      );
    }
    for (const m of methods) {
      expect(schemaValidate("method", m.data), `method file: ${m.file}`).toBe(
        true,
      );
    }
  });

  it("resolves every method.service to a registered service id", () => {
    const serviceIds = new Set(services.map((s) => s.data.id as string));
    for (const m of methods) {
      const service = m.data.service as string;
      expect(
        serviceIds.has(service),
        `unresolved service "${service}" in ${m.file}`,
      ).toBe(true);
    }
  });

  it("resolves every service.methods entry to a registered method id", () => {
    const methodIds = new Set(methods.map((m) => m.data.id as string));
    for (const s of services) {
      const ids = (s.data.methods as string[]) ?? [];
      expect(
        ids.length,
        `service ${s.file} must list its methods`,
      ).toBeGreaterThan(0);
      for (const id of ids) {
        expect(
          methodIds.has(id),
          `unresolved method "${id}" in ${s.file}`,
        ).toBe(true);
      }
    }
  });

  it("keeps every method id inside its declared service", () => {
    for (const m of methods) {
      const id = m.data.id as string;
      const service = m.data.service as string;
      expect(
        id.startsWith(`${service}.`),
        `method "${id}" must be prefixed by service "${service}"`,
      ).toBe(true);
    }
  });

  it("uses the medula.hastane.<slug> id convention for services", () => {
    for (const s of services) {
      const slug = s.data.slug as string;
      expect(s.data.id, `service ${s.file} id convention`).toBe(
        `medula.hastane.${slug}`,
      );
    }
  });

  it("gives core kayit methods resolved contracts to the nine planned DVOs", () => {
    for (const [id, contract] of Object.entries(CORE_CONTRACTS)) {
      const m = methods.find((entry) => entry.data.id === id);
      expect(m, `missing core method ${id}`).toBeTruthy();
      expect(m?.data.contract).toEqual(contract);
    }
  });

  it("resolves contracts for reviewed methods and allows draft nulls", () => {
    for (const m of methods) {
      const contract = m.data.contract as {
        inputDvo: string | null;
        outputDvo: string | null;
      };
      if (m.data.status === "draft") {
        expect(
          contract.inputDvo === null || typeof contract.inputDvo === "string",
          `${m.file} draft inputDvo must be null or a string`,
        ).toBe(true);
        continue;
      }
      expect(contract.inputDvo, `${m.file} inputDvo must resolve`).toBeTruthy();
      expect(
        contract.outputDvo,
        `${m.file} outputDvo must resolve`,
      ).toBeTruthy();
    }
  });

  it("shares the guide's success patterns across all methods", () => {
    for (const m of methods) {
      const success = m.data.success as Record<string, string>;
      // Intra-guide divergence (G43a): the rapor group is Integer 0-based
      // (s.254) with sonucAciklamasi as the message field, unlike the
      // other groups' String "0000" + sonucMesaji.
      if (m.data.service === "medula.hastane.rapor") {
        expect(success).toEqual({
          resultCodeField: "sonucKodu",
          successCode: "0",
          messageField: "sonucAciklamasi",
        });
      } else {
        expect(success).toEqual({
          resultCodeField: "sonucKodu",
          successCode: "0000",
          messageField: "sonucMesaji",
        });
      }
    }
  });

  it("resolves every service WSDL reference in the manifest", () => {
    expect(wsdlManifest.length).toBe(8);
    for (const s of services) {
      const slug = s.data.slug as string;
      const wsdl = s.data.wsdl as {
        production: string | null;
        test: string | null;
      };
      for (const [env, id] of [
        ["production", wsdl.production],
        ["test", wsdl.test],
      ] as Array<[string, string | null]>) {
        expect(id, `service ${slug} missing ${env} wsdl id`).toBeTruthy();
        const entry = wsdlManifest.find((w) => w.id === id);
        expect(entry, `wsdl id "${id}" not in manifest`).toBeTruthy();
        expect(entry?.service).toBe(slug);
        expect(entry?.environment).toBe(env);
      }
    }
  });
});
