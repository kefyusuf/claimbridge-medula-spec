/**
 * Mermaid diagram generator (PRD 18.3): renders the ER diagram, the core
 * claim flow, and the service map from the registry. Diagrams start with a
 * Mermaid `%%` header comment and are sorted for byte-determinism.
 */
import { mkdirSync, writeFileSync } from "node:fs";
import { resolve } from "node:path";
import type { Registry } from "./loadRegistry.js";

export const MERMAID_NAMES = ["core-flow.mmd", "er-diagram.mmd", "service-map.mmd"] as const;

export const MERMAID_HEADER = "%% This file is generated. Do not edit manually.";

type Entity = Record<string, unknown>;

function obj(v: unknown): Entity {
  return v !== null && typeof v === "object" && !Array.isArray(v) ? (v as Entity) : {};
}

function arr(v: unknown): unknown[] {
  return Array.isArray(v) ? v : [];
}

function str(v: unknown): string {
  return typeof v === "string" ? v : "";
}

function sanitize(value: string): string {
  return value.replace(/[^A-Za-z0-9_]/g, "_");
}

function renderErDiagram(reg: Registry): string {
  const lines: string[] = ["erDiagram"];
  const dvos = [...reg.dvos]
    .map((f) => f.data)
    .sort((a, b) => (str(a["id"]) < str(b["id"]) ? -1 : 1));
  const enumIds = new Set(reg.enums.map((e) => str(e.data["id"])).sort());

  for (const dvo of dvos) {
    lines.push(`  ${sanitize(str(dvo["id"]))} {`);
    for (const field of arr(dvo["fields"])) {
      const f = obj(field);
      const type = sanitize(str(f["type"]));
      const name = sanitize(str(f["name"]));
      if (type !== "" && name !== "") {
        lines.push(`    ${type} ${name}`);
      }
    }
    lines.push("  }");
  }

  for (const m of [...reg.methods].map((f) => f.data).sort((a, b) => (str(a["id"]) < str(b["id"]) ? -1 : 1))) {
    const contract = obj(m["contract"]);
    for (const key of ["inputDvo", "outputDvo"] as const) {
      const dvo = str(contract[key]);
      if (dvo !== "") {
        lines.push(`  ${sanitize(str(m["id"]))} ||--|| ${sanitize(dvo)} : ${key}`);
      }
    }
  }

  for (const dvo of dvos) {
    for (const field of arr(dvo["fields"])) {
      const f = obj(field);
      const ref = str(f["enumRef"]);
      if (ref !== "" && enumIds.has(ref)) {
        lines.push(`  ${sanitize(str(dvo["id"]))} }o--|| ${sanitize(ref)} : enumRef`);
      }
    }
  }
  return lines.join("\n");
}

function renderCoreFlow(reg: Registry): string {
  const core = reg.workflows.map((w) => w.data).find((w) => str(w["id"]) === "core-claim-flow");
  const steps = core ? arr(core["steps"]) : [];
  const lines: string[] = ["flowchart LR"];
  const nodeIds: string[] = [];
  for (const step of steps) {
    const s = obj(step);
    const id = sanitize(str(s["id"]));
    nodeIds.push(id);
    lines.push(`  ${id}["${str(s["id"])}<br/>${str(s["method"])}"]`);
  }
  for (let i = 0; i < nodeIds.length - 1; i += 1) {
    lines.push(`  ${nodeIds[i]} --> ${nodeIds[i + 1]}`);
  }
  return lines.join("\n");
}

function renderServiceMap(reg: Registry): string {
  const lines: string[] = ["flowchart LR"];
  const services = [...reg.services]
    .map((f) => f.data)
    .sort((a, b) => (str(a["id"]) < str(b["id"]) ? -1 : 1));
  for (const s of services) {
    const id = sanitize(str(s["id"]));
    lines.push(`  ${id}["${str(s["slug"])}"]`);
    for (const method of arr(s["methods"])) {
      const m = str(method);
      lines.push(`  ${id} --> ${sanitize(m)}["${m}"]`);
    }
  }
  return lines.join("\n");
}

export function generateMermaid(reg: Registry): Record<string, string> {
  return {
    "er-diagram.mmd": `${MERMAID_HEADER}\n\n${renderErDiagram(reg)}\n`,
    "core-flow.mmd": `${MERMAID_HEADER}\n\n${renderCoreFlow(reg)}\n`,
    "service-map.mmd": `${MERMAID_HEADER}\n\n${renderServiceMap(reg)}\n`,
  };
}

export function writeMermaid(reg: Registry, outDir: string): void {
  mkdirSync(outDir, { recursive: true });
  for (const [name, text] of Object.entries(generateMermaid(reg))) {
    writeFileSync(resolve(outDir, name), text);
  }
}
