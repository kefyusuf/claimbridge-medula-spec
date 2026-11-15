/**
 * Markdown docs generator (PRD 18.2): renders services, methods, dvos,
 * workflows, and scenarios reference documents from the registry. Every
 * document starts with the generated-file header; content is sorted by id
 * for byte-determinism.
 */
import { mkdirSync, writeFileSync } from "node:fs";
import { resolve } from "node:path";
import type { Registry, YamlFile } from "./loadRegistry.js";

export const DOC_NAMES = [
  "dvos.md",
  "methods.md",
  "scenarios.md",
  "services.md",
  "workflows.md",
] as const;

export const GENERATED_HEADER =
  "<!-- This file is generated. Do not edit manually. -->";

type Entity = Record<string, unknown>;

function obj(v: unknown): Entity {
  return v !== null && typeof v === "object" && !Array.isArray(v)
    ? (v as Entity)
    : {};
}

function arr(v: unknown): unknown[] {
  return Array.isArray(v) ? v : [];
}

function str(v: unknown): string {
  return typeof v === "string" ? v : "";
}

function sorted(files: YamlFile[]): Entity[] {
  return [...files]
    .sort((a, b) => {
      const ka = String(a.data["id"] ?? a.file);
      const kb = String(b.data["id"] ?? b.file);
      return ka < kb ? -1 : ka > kb ? 1 : 0;
    })
    .map((f) => f.data);
}

function table(headers: string[], rows: string[][]): string {
  const head = `| ${headers.join(" | ")} |`;
  const sep = `| ${headers.map(() => "---").join(" | ")} |`;
  const body = rows.map((r) => `| ${r.join(" | ")} |`).join("\n");
  return [head, sep, body].filter(Boolean).join("\n");
}

function codeRefs(entity: Entity): string {
  const refs = arr(entity["sourceRefs"])
    .map((r) => str(obj(r)["id"]))
    .filter(Boolean);
  return refs.join(", ");
}

function renderServices(reg: Registry): string {
  const lines: string[] = ["# Services", ""];
  for (const s of sorted(reg.services)) {
    const wsdl = obj(s["wsdl"]);
    lines.push(
      `## ${str(s["displayName"])} (\`${str(s["id"])}\`)`,
      "",
      str(s["description"]),
      "",
      table(
        ["Field", "Value"],
        [
          ["Slug", str(s["slug"])],
          ["Status", str(s["status"])],
          ["Production WSDL", str(wsdl["production"])],
          ["Test WSDL", str(wsdl["test"])],
          ["Source refs", codeRefs(s)],
        ],
      ),
      "",
      "**Methods**",
      "",
      ...arr(s["methods"]).map((m) => `- \`${str(m)}\``),
      "",
    );
  }
  return lines.join("\n");
}

function renderMethods(reg: Registry): string {
  const lines: string[] = ["# Methods", ""];
  for (const m of sorted(reg.methods)) {
    const names = obj(m["names"]);
    const contract = obj(m["contract"]);
    const effects = obj(m["stateEffects"]);
    const success = obj(m["success"]);
    const sandbox = obj(m["sandbox"]);
    lines.push(
      `## \`${str(m["id"])}\``,
      "",
      table(
        ["Field", "Value"],
        [
          ["Service", str(m["service"])],
          ["Documentation heading", str(names["documentationHeading"])],
          ["Operation name", str(names["operationName"])],
          ["Input DVO", str(contract["inputDvo"]) || "null"],
          ["Output DVO", str(contract["outputDvo"]) || "null"],
          [
            "Success",
            `${str(success["resultCodeField"])} = ${str(success["successCode"])} (${str(success["messageField"])})`,
          ],
          ["Sandbox supported", str(sandbox["supported"])],
          ["Status", str(m["status"])],
          ["Source refs", codeRefs(m)],
        ],
      ),
      "",
      "**State effects**",
      "",
      table(
        ["Effect", "Targets"],
        ["creates", "reads", "updates", "deletes", "generates"].map((k) => [
          k,
          arr(effects[k])
            .map((v) => `\`${str(v)}\``)
            .join(", ") || "—",
        ]),
      ),
      "",
    );
  }
  return lines.join("\n");
}

function renderDvos(reg: Registry): string {
  const lines: string[] = ["# DVOs", ""];
  for (const d of sorted(reg.dvos)) {
    lines.push(
      `## \`${str(d["id"])}\``,
      "",
      `Domain: \`${str(d["domain"])}\` · Direction: \`${str(d["direction"])}\` · Status: \`${str(d["status"])}\` · Source refs: ${codeRefs(d)}`,
      "",
      table(
        ["Field", "Type", "Required", "Enum ref", "Sensitive", "Description"],
        arr(d["fields"]).map((f) => {
          const e = obj(f);
          return [
            `\`${str(e["name"])}\``,
            str(e["type"]),
            str(e["required"]),
            str(e["enumRef"]) || "—",
            str(e["sensitive"]),
            str(e["description"]).replaceAll("|", "\\|"),
          ];
        }),
      ),
      "",
    );
  }
  return lines.join("\n");
}

function renderWorkflows(reg: Registry): string {
  const lines: string[] = ["# Workflows", ""];
  for (const w of sorted(reg.workflows)) {
    lines.push(
      `## ${str(w["name"])} (\`${str(w["id"])}\`)`,
      "",
      str(w["description"]),
      "",
      table(
        ["Step", "Method", "Requires", "Creates", "Updates", "Deletes", "Next"],
        arr(w["steps"]).map((s) => {
          const e = obj(s);
          return [
            `\`${str(e["id"])}\``,
            `\`${str(e["method"])}\``,
            arr(e["requires"])
              .map((v) => `\`${str(v)}\``)
              .join(", ") || "—",
            arr(e["creates"])
              .map((v) => `\`${str(v)}\``)
              .join(", ") || "—",
            arr(e["updates"])
              .map((v) => `\`${str(v)}\``)
              .join(", ") || "—",
            arr(e["deletes"])
              .map((v) => `\`${str(v)}\``)
              .join(", ") || "—",
            arr(e["next"])
              .map((v) => `\`${str(v)}\``)
              .join(", ") || "—",
          ];
        }),
      ),
      "",
      `Status: \`${str(w["status"])}\` · Source refs: ${codeRefs(w)}`,
      "",
    );
  }
  return lines.join("\n");
}

function renderScenarios(reg: Registry): string {
  const lines: string[] = ["# Scenarios", ""];
  for (const s of sorted(reg.scenarios)) {
    const expected = obj(s["expected"]);
    const result = obj(expected["result"]);
    const sandbox = obj(s["sandbox"]);
    lines.push(
      `## ${str(s["title"])} (\`${str(s["id"])}\`)`,
      "",
      table(
        ["Field", "Value"],
        [
          ["Method", `\`${str(s["method"])}\``],
          ["Expected sonucKodu", `\`${str(result["sonucKodu"])}\``],
          ["Expected sonucMesaji", str(result["sonucMesaji"])],
          ["Deterministic", str(sandbox["deterministic"])],
          ["HTTP status", str(sandbox["httpStatus"])],
          ["Latency (ms)", str(sandbox["latencyMs"]) ?? "—"],
          ["Status", str(s["status"])],
          ["Source refs", codeRefs(s)],
        ],
      ),
      "",
    );
  }
  return lines.join("\n");
}

export function generateDocs(reg: Registry): Record<string, string> {
  return {
    "services.md": `${GENERATED_HEADER}\n\n${renderServices(reg)}\n`,
    "methods.md": `${GENERATED_HEADER}\n\n${renderMethods(reg)}\n`,
    "dvos.md": `${GENERATED_HEADER}\n\n${renderDvos(reg)}\n`,
    "workflows.md": `${GENERATED_HEADER}\n\n${renderWorkflows(reg)}\n`,
    "scenarios.md": `${GENERATED_HEADER}\n\n${renderScenarios(reg)}\n`,
  };
}

export function writeDocs(reg: Registry, outDir: string): void {
  mkdirSync(outDir, { recursive: true });
  for (const [name, text] of Object.entries(generateDocs(reg))) {
    writeFileSync(resolve(outDir, name), text);
  }
}
