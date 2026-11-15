import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { Ajv2020 } from "ajv/dist/2020.js";
import type { ValidateFunction } from "ajv";
import { parse } from "yaml";

const SCHEMA_BASE = "https://claimbridge.dev/schemas/";
const root = resolve(import.meta.dirname, "..");
const schemasDir = resolve(root, "schemas");
const fixturesDir = resolve(root, "tests", "fixtures");

let ajv: Ajv2020;

beforeAll(() => {
  ajv = new Ajv2020({ allErrors: true, allowUnionTypes: true });
  const files = readdirSync(schemasDir).filter((f) =>
    f.endsWith(".schema.json"),
  );
  expect(
    files.length,
    "schemas directory must contain schema files",
  ).toBeGreaterThan(0);
  for (const file of files) {
    ajv.addSchema(JSON.parse(readFileSync(resolve(schemasDir, file), "utf8")));
  }
});

function loadFixture(name: string): unknown {
  return parse(readFileSync(resolve(fixturesDir, name), "utf8"));
}

function getValidator(schemaName: string): ValidateFunction {
  const validate = ajv.getSchema(`${SCHEMA_BASE}${schemaName}.schema.json`);
  expect(validate, `schema not registered: ${schemaName}`).toBeTruthy();
  return validate as ValidateFunction;
}

const validFixtures: Array<[string, string]> = [
  ["service", "valid/service.valid.yml"],
  ["method", "valid/method.valid.yml"],
  ["dvo", "valid/dvo.valid.yml"],
  ["workflow", "valid/workflow.valid.yml"],
  ["scenario", "valid/scenario.valid.yml"],
];

const schemaInvalidFixtures: Array<[string, string]> = [
  ["service", "invalid/service-missing-id.yml"],
  ["method", "invalid/method-bad-status.yml"],
  ["dvo", "invalid/dvo-invalid-field-type.yml"],
];

const referenceInvalidFixtures: Array<[string, string]> = [
  ["method", "invalid/method-unknown-dvo-ref.yml"],
  ["dvo", "invalid/field-bad-enum-ref.yml"],
  ["workflow", "invalid/workflow-missing-method-ref.yml"],
  ["scenario", "invalid/scenario-missing-method-ref.yml"],
];

describe("schema-validation (Group 1)", () => {
  it("contains exactly the 10 schemas from PRD section 11", () => {
    const files = readdirSync(schemasDir).filter((f) =>
      f.endsWith(".schema.json"),
    );
    expect(files).toHaveLength(10);
  });

  it.each(validFixtures)("accepts valid fixture: %s", (schemaName, file) => {
    const validate = getValidator(schemaName);
    const ok = validate(loadFixture(file));
    expect(ok, JSON.stringify(validate.errors ?? [], null, 2)).toBe(true);
  });

  it.each(schemaInvalidFixtures)(
    "rejects schema-invalid fixture: %s",
    (schemaName, file) => {
      const validate = getValidator(schemaName);
      const ok = validate(loadFixture(file));
      expect(ok, "fixture must fail schema validation").toBe(false);
      expect(validate.errors?.length).toBeGreaterThan(0);
    },
  );

  it.each(referenceInvalidFixtures)(
    "accepts schema-wise (reference failure is Group 5's job): %s",
    (schemaName, file) => {
      const validate = getValidator(schemaName);
      expect(validate(loadFixture(file)), "fixture must pass schema").toBe(
        true,
      );
    },
  );
});
