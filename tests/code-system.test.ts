import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { Ajv2020 } from "ajv/dist/2020.js";
import type { ValidateFunction } from "ajv";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const SCHEMA_BASE = "https://claimbridge.dev/schemas/";
const root = resolve(import.meta.dirname, "..");
const schemasDir = resolve(root, "schemas");

let ajv: Ajv2020;
let reg: ReturnType<typeof loadRegistry>;

beforeAll(() => {
  ajv = new Ajv2020({ allErrors: true, allowUnionTypes: true });
  for (const f of readdirSync(schemasDir).filter((f) =>
    f.endsWith(".schema.json"),
  )) {
    ajv.addSchema(JSON.parse(readFileSync(resolve(schemasDir, f), "utf8")));
  }
  reg = loadRegistry(root);
});

function validate(
  schemaName: string,
  data: unknown,
): boolean | ValidateFunction["errors"] {
  const v = ajv.getSchema(`${SCHEMA_BASE}${schemaName}.schema.json`);
  expect(v, `schema not registered: ${schemaName}`).toBeTruthy();
  const ok = (v as ValidateFunction)(data);
  return ok ? true : ((v as ValidateFunction).errors ?? false);
}

describe("code-system references (Group 39)", () => {
  it("extends the Field schema with an optional codeSystem attribute", () => {
    const schema = JSON.parse(
      readFileSync(resolve(schemasDir, "field.schema.json"), "utf8"),
    ) as { properties: Record<string, { type: string[] }> };
    const codeSystem = schema.properties["codeSystem"];
    expect(codeSystem, "field schema must declare codeSystem").toBeTruthy();
    expect((codeSystem as { type: string[] })["type"]).toEqual([
      "string",
      "null",
    ]);
  });

  it("accepts a DVO field declaring an external code system", () => {
    const sample = {
      id: "ProbeDVO",
      domain: "hasta-kabul",
      direction: "input",
      sourceRefs: [
        {
          id: "medula-hastane-guide-3-1-1-2026-10-19",
          sourceType: "official-guide",
          confidence: "extracted",
        },
      ],
      fields: [
        {
          name: "taniKodu",
          displayName: "Tani Kodu",
          type: "string",
          enumRef: null,
          required: true,
          length: 10,
          description: "ICD-10 diagnosis code.",
          sensitive: false,
          syntheticOnlyRecommended: false,
          codeSystem: "ICD-10-WHO",
          sourceRefs: [
            {
              id: "medula-hastane-guide-3-1-1-2026-10-19",
              sourceType: "official-guide",
              confidence: "extracted",
            },
          ],
          conditionalRequired: [],
          introducedIn: null,
          deprecatedIn: null,
        },
      ],
      status: "draft",
    };
    expect(
      validate("dvo", sample),
      JSON.stringify(validate("dvo", sample)),
    ).toBe(true);
  });

  it("annotates TaniBilgisiDVO.taniKodu with the ICD-10 code system", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TaniBilgisiDVO");
    const taniKodu = (
      dvo?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "taniKodu");
    expect(taniKodu?.["codeSystem"]).toBe("ICD-10-WHO");
  });

  it("annotates the SUT-coded operation fields across entry composites", () => {
    const sutFields: Array<[string, string]> = [
      ["AmeliyatveGirisimBilgisiDVO", "sutKodu"],
      ["DigerIslemBilgisiDVO", "sutKodu"],
      ["KonsultasyonBilgisiDVO", "sutKodu"],
      ["MuayeneBilgisiDVO", "sutKodu"],
      ["DisBilgisiDVO", "sutKodu"],
    ];
    for (const [id, field] of sutFields) {
      const dvo = reg.dvos.find((d) => d.data["id"] === id);
      const f = (dvo?.data["fields"] as Array<Record<string, unknown>>).find(
        (x) => x["name"] === field,
      );
      expect(
        f?.["codeSystem"],
        `${id}.${field} must declare the SUT code system`,
      ).toBe("SUT");
    }
  });

  it("documents the code-system reference norm in the domain model docs", () => {
    const docs = readFileSync(
      resolve(root, "docs", "01-domain-model.md"),
      "utf8",
    );
    expect(docs).toContain("codeSystem");
    expect(docs).toContain("ICD-10");
  });
});
