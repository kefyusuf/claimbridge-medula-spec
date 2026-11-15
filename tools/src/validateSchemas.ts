/**
 * Schema validation (PRD 20.1): every registry YAML file is validated
 * against the JSON Schema declared for its collection.
 */
import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { Ajv2020 } from "ajv/dist/2020.js";
import type { Registry, YamlFile } from "./loadRegistry.js";

export interface ValidationIssue {
  file: string;
  message: string;
}

const SCHEMA_BASE = "https://claimbridge.dev/schemas/";

type CollectionSpec = {
  name: keyof Omit<import("./loadRegistry.js").Registry, "root" | "sourceIds" | "wsdlIds">;
  schema: string;
};

const COLLECTIONS: CollectionSpec[] = [
  { name: "services", schema: "service" },
  { name: "methods", schema: "method" },
  { name: "dvos", schema: "dvo" },
  { name: "enums", schema: "enum" },
  { name: "rules", schema: "rule" },
  { name: "workflows", schema: "workflow" },
  { name: "scenarios", schema: "scenario" },
];

export function validateSchemas(reg: Registry): ValidationIssue[] {
  const ajv = new Ajv2020({ allErrors: true, allowUnionTypes: true });
  const schemasDir = resolve(reg.root, "schemas");
  for (const file of readdirSync(schemasDir).filter((f) => f.endsWith(".schema.json"))) {
    ajv.addSchema(JSON.parse(readFileSync(resolve(schemasDir, file), "utf8")));
  }

  const issues: ValidationIssue[] = [];
  for (const spec of COLLECTIONS) {
    const files = reg[spec.name] as YamlFile[];
    const validate = ajv.getSchema(`${SCHEMA_BASE}${spec.schema}.schema.json`);
    if (!validate) {
      issues.push({ file: "*", message: `schema not registered: ${spec.schema}` });
      continue;
    }
    for (const { file, data } of files) {
      const ok = validate(data);
      if (!ok) {
        const details = (validate.errors ?? [])
          .map((e) => `${e.instancePath} ${e.message ?? ""}`.trim())
          .join("; ");
        issues.push({ file, message: `schema ${spec.schema}: ${details}` });
      }
    }
  }
  return issues;
}
