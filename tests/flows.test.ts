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
const examplesDir = resolve(root, "examples");

type RegistryEntry = { file: string; data: Record<string, unknown> };
type Step = {
  id: string;
  method: string;
  requires: string[];
  creates: string[];
  updates: string[];
  deletes: string[];
  next: string[];
};

let ajv: Ajv2020;
let workflows: RegistryEntry[];
let scenarios: RegistryEntry[];
let methods: RegistryEntry[];
let sonucKoduValues: string[];

const EXPECTED_WORKFLOW_FILES = [
  "core-claim-flow.yml",
  "invoice-registration-flow.yml",
  "patient-admission-flow.yml",
  "service-registration-flow.yml",
].sort();

const EXPECTED_SCENARIO_IDS = [
  "duplicate-invoice",
  "happy-path",
  "invalid-takip-no",
  "invoice-without-service",
  "missing-required-field",
  "service-timeout",
];

const EXAMPLE_DOMAINS = ["fatura-kayit", "hasta-kabul", "hizmet-kayit"];

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
        file,
        data: parse(
          readFileSync(resolve(registryDir, dir, file), "utf8"),
        ) as Record<string, unknown>,
      }));

  const methodsPath = resolve(registryDir, "methods");
  methods = readdirSync(methodsPath, { withFileTypes: true })
    .filter((e) => e.isDirectory())
    .flatMap((d) =>
      readdirSync(resolve(methodsPath, d.name))
        .filter((f) => f.endsWith(".yml"))
        .map((file) => ({
          file: `${d.name}/${file}`,
          data: parse(
            readFileSync(resolve(methodsPath, d.name, file), "utf8"),
          ) as Record<string, unknown>,
        })),
    );

  workflows = loadFlat("workflows");
  scenarios = loadFlat("scenarios");

  const sonucKoduEnum = parse(
    readFileSync(resolve(registryDir, "enums", "sonuc-kodu.yml"), "utf8"),
  ) as {
    values: Array<{ code: string }>;
  };
  sonucKoduValues = sonucKoduEnum.values.map((v) => v.code);
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

describe("flows (Group 4)", () => {
  it("has exactly the 4 workflow files from PRD section 11", () => {
    expect(
      readdirSync(resolve(registryDir, "workflows"))
        .filter((f) => f.endsWith(".yml"))
        .sort(),
    ).toEqual(EXPECTED_WORKFLOW_FILES);
  });

  it("has exactly the 6 scenarios from PRD section 15", () => {
    expect(scenarios.map((s) => s.data.id).sort()).toEqual(
      EXPECTED_SCENARIO_IDS,
    );
  });

  it("validates every workflow and scenario file against its schema", () => {
    for (const w of workflows) {
      expect(
        schemaValidate("workflow", w.data),
        `workflow file: ${w.file}`,
      ).toBe(true);
    }
    for (const s of scenarios) {
      expect(
        schemaValidate("scenario", s.data),
        `scenario file: ${s.file}`,
      ).toBe(true);
    }
  });

  it("resolves every workflow step method to a registered method id", () => {
    const methodIds = new Set(methods.map((m) => m.data.id as string));
    for (const w of workflows) {
      for (const step of (w.data.steps as Step[]) ?? []) {
        expect(
          methodIds.has(step.method),
          `unresolved method "${step.method}" in ${w.file}`,
        ).toBe(true);
      }
    }
  });

  it("resolves every workflow step.next to a step in the same workflow", () => {
    for (const w of workflows) {
      const stepIds = new Set(
        ((w.data.steps as Step[]) ?? []).map((s) => s.id),
      );
      for (const step of (w.data.steps as Step[]) ?? []) {
        for (const next of step.next) {
          expect(
            stepIds.has(next),
            `unresolved next "${next}" in workflow ${w.data.id}`,
          ).toBe(true);
        }
      }
    }
  });

  it("has exactly one entry step per workflow", () => {
    for (const w of workflows) {
      const steps = (w.data.steps as Step[]) ?? [];
      const targeted = new Set(steps.flatMap((s) => s.next));
      const entries = steps.filter((s) => !targeted.has(s.id));
      expect(
        entries.length,
        `workflow ${w.data.id} must have exactly one entry step`,
      ).toBe(1);
    }
  });

  it("matches the PRD 14 core-claim-flow shape", () => {
    const core = workflows.find((w) => w.data.id === "core-claim-flow");
    expect(core, "core-claim-flow must exist").toBeTruthy();
    const steps = (core?.data.steps as Step[]) ?? [];
    expect(steps.map((s) => s.id)).toEqual([
      "patient-admission",
      "service-registration",
      "invoice-registration",
    ]);
    expect(steps[0]?.method).toBe("medula.hastane.hasta-kabul.hasta-kabul");
    expect(steps[0]?.creates).toEqual([
      "hastaBasvuruNo",
      "takipNo",
      "patientAdmission",
      "takip",
    ]);
    expect(steps[1]?.method).toBe("medula.hastane.hizmet-kayit.hizmet-kayit");
    expect(steps[1]?.requires).toEqual(["hastaBasvuruNo", "takipNo"]);
    expect(steps[1]?.creates).toEqual(["serviceRecord", "islemSiraNo"]);
    expect(steps[2]?.method).toBe("medula.hastane.fatura-kayit.fatura-kayit");
    expect(steps[2]?.requires).toEqual(["hastaBasvuruNo", "serviceRecord"]);
    expect(steps[2]?.creates).toEqual(["invoiceRecord", "faturaTeslimNo"]);
    expect(steps[2]?.next).toEqual([]);
  });

  it("resolves every scenario method to a registered method id", () => {
    const methodIds = new Set(methods.map((m) => m.data.id as string));
    for (const s of scenarios) {
      expect(
        methodIds.has(s.data.method as string),
        `unresolved method in scenario ${s.data.id}`,
      ).toBe(true);
    }
  });

  it("keeps sandbox-only result codes outside the official sonuc-kodu enum", () => {
    const official = new Set(sonucKoduValues);
    for (const s of scenarios) {
      const code = (s.data.expected as { result: { sonucKodu: string } }).result
        .sonucKodu;
      if (code.startsWith("SANDBOX_")) {
        expect(
          official.has(code),
          `sandbox code "${code}" must not collide with official codes`,
        ).toBe(false);
      } else {
        expect(
          official.has(code),
          `non-sandbox code "${code}" must be an official sonuc-kodu value`,
        ).toBe(true);
      }
    }
  });

  it("resolves every method defaultScenario to a registered scenario id", () => {
    const scenarioIds = new Set(scenarios.map((s) => s.data.id as string));
    for (const m of methods) {
      const ds = (m.data.sandbox as { defaultScenario: string | null })
        .defaultScenario;
      if (ds !== null) {
        expect(
          scenarioIds.has(ds),
          `unresolved defaultScenario "${ds}" on ${m.data.id}`,
        ).toBe(true);
      }
    }
  });

  it("ships parseable synthetic examples for the three domains", () => {
    const domains = readdirSync(examplesDir, { withFileTypes: true })
      .filter((e) => e.isDirectory())
      .map((e) => e.name)
      .sort();
    expect(domains).toEqual(EXAMPLE_DOMAINS);
    for (const domain of domains) {
      const files = readdirSync(resolve(examplesDir, domain)).sort();
      expect(files, `example pair for ${domain}`).toEqual([
        `${domain}-request.json`,
        `${domain}-response.json`,
      ]);
      for (const file of files) {
        const text = readFileSync(resolve(examplesDir, domain, file), "utf8");
        const json = JSON.parse(text) as unknown;
        expect(json, `${domain}/${file} must parse as JSON`).toBeTruthy();
        const realTc = /"hastaTCKimlikNo"\s*:\s*"(?!\s*SYNTHETIC_)\d{11}"/;
        expect(
          realTc.test(text),
          `${domain}/${file} must not contain an 11-digit identity value`,
        ).toBe(false);
      }
    }
  });
});
