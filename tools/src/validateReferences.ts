/**
 * Reference validation (PRD 20.2): id resolution across the registry,
 * the draft-only null-contract rule (amended PRD 12.2), the field enumRef
 * contract (amended PRD 12.4), WSDL manifest resolution (PRD 16.2), and
 * source-reference id resolution (PRD 20.2 rule 8).
 *
 * Sandbox-design sources are self-registered: their ids carry the reserved
 * `sandbox-design-` prefix and never need a manifest entry.
 */
import type { Registry, YamlFile } from "./loadRegistry.js";
import type { ValidationIssue } from "./validateSchemas.js";

type Entity = Record<string, unknown>;

function isEntity(v: unknown): v is Entity {
  return v !== null && typeof v === "object" && !Array.isArray(v);
}

function str(v: unknown): string {
  return typeof v === "string" ? v : "";
}

function strOrNull(v: unknown): string | null {
  return typeof v === "string" ? v : null;
}

function arr(v: unknown): unknown[] {
  return Array.isArray(v) ? v : [];
}

function obj(v: unknown): Entity {
  return isEntity(v) ? v : {};
}

function idOf(file: YamlFile): string {
  return str(file.data["id"]);
}

function checkUniqueIds(files: YamlFile[], kind: string, issues: ValidationIssue[]): void {
  const seen = new Map<string, string>();
  for (const f of files) {
    const id = idOf(f);
    const first = seen.get(id);
    if (first !== undefined) {
      issues.push({ file: f.file, message: `duplicate ${kind} id "${id}" (first seen in ${first})` });
    } else {
      seen.set(id, f.file);
    }
  }
}

function checkSourceRefs(entity: Entity, file: string, reg: Registry, issues: ValidationIssue[]): void {
  for (const ref of arr(entity["sourceRefs"])) {
    const r = obj(ref);
    const id = str(r["id"]);
    if (id === "") {
      issues.push({ file, message: "sourceRefs entry without an id" });
      continue;
    }
    const sandboxInternal = str(r["sourceType"]) === "sandbox-design" && id.startsWith("sandbox-design-");
    if (!reg.sourceIds.has(id) && !sandboxInternal) {
      issues.push({ file, message: `source reference id "${id}" does not exist in the source manifests` });
    }
  }
}

export function validateReferences(reg: Registry): ValidationIssue[] {
  const issues: ValidationIssue[] = [];

  checkUniqueIds(reg.services, "service", issues);
  checkUniqueIds(reg.methods, "method", issues);
  checkUniqueIds(reg.dvos, "dvo", issues);
  checkUniqueIds(reg.enums, "enum", issues);
  checkUniqueIds(reg.workflows, "workflow", issues);
  checkUniqueIds(reg.scenarios, "scenario", issues);

  const ruleIds = new Map<string, string>();
  for (const r of reg.rules) {
    for (const rule of arr(r.data["rules"])) {
      const id = str(obj(rule)["id"]);
      if (id !== "") {
        const first = ruleIds.get(id);
        if (first !== undefined) {
          issues.push({ file: r.file, message: `duplicate rule id "${id}" (first seen in ${first})` });
        } else {
          ruleIds.set(id, r.file);
        }
      }
    }
  }

  const serviceIds = new Set(reg.services.map((s) => idOf(s)));
  const methodIds = new Set(reg.methods.map((m) => idOf(m)));
  const dvoIds = new Set(reg.dvos.map((d) => idOf(d)));
  const enumIds = new Set(reg.enums.map((e) => idOf(e)));
  const scenarioIds = new Set(reg.scenarios.map((s) => idOf(s)));
  const fieldNamesByDvo = new Map<string, string[]>(
    reg.dvos.map((d) => [
      idOf(d),
      arr(d.data["fields"]).map((f) => str(obj(f)["name"])).filter((n) => n !== ""),
    ]),
  );

  for (const { file, data } of reg.services) {
    checkSourceRefs(data, file, reg, issues);
    const wsdl = obj(data["wsdl"]);
    const slug = str(data["slug"]);
    for (const env of ["production", "test"] as const) {
      const id = strOrNull(wsdl[env]);
      if (id === null) {
        issues.push({ file, message: `missing ${env} wsdl id` });
        continue;
      }
      const entry = reg.wsdlIds.get(id);
      if (entry === undefined) {
        issues.push({ file, message: `service references missing wsdl id "${id}"` });
        continue;
      }
      if (entry.service !== slug || entry.environment !== env) {
        issues.push({
          file,
          message: `wsdl id "${id}" is registered for ${entry.environment}/${entry.service}, expected ${env}/${slug}`,
        });
      }
    }
  }

  for (const { file, data } of reg.methods) {
    checkSourceRefs(data, file, reg, issues);
    const id = str(data["id"]);
    const service = str(data["service"]);
    if (!serviceIds.has(service)) {
      issues.push({ file, message: `method "${id}" references missing service "${service}"` });
    }

    const contract = obj(data["contract"]);
    const status = str(data["status"]);
    for (const key of ["inputDvo", "outputDvo"] as const) {
      const dvo = strOrNull(contract[key]);
      if (dvo !== null) {
        if (!dvoIds.has(dvo)) {
          issues.push({ file, message: `method "${id}" references missing ${key} DVO "${dvo}"` });
        }
      } else if (status !== "draft") {
        issues.push({
          file,
          message: `method "${id}" has a null contract but status "${status}"; null contracts are draft-only (PRD 12.2)`,
        });
      }
    }

    const sandbox = obj(data["sandbox"]);
    const defaultScenario = strOrNull(sandbox["defaultScenario"]);
    if (defaultScenario !== null && !scenarioIds.has(defaultScenario)) {
      issues.push({
        file,
        message: `method "${id}" defaultScenario "${defaultScenario}" does not resolve to a scenario`,
      });
    }
  }

  for (const { file, data } of reg.dvos) {
    checkSourceRefs(data, file, reg, issues);
    for (const field of arr(data["fields"])) {
      const f = obj(field);
      const name = str(f["name"]);
      checkSourceRefs(f, `${file}#${name}`, reg, issues);
      const type = str(f["type"]);
      const enumRef = strOrNull(f["enumRef"]);
      if (type === "enum") {
        if (enumRef === null) {
          issues.push({ file, message: `enum-typed field "${name}" must declare enumRef (PRD 12.4)` });
        } else if (!enumIds.has(enumRef)) {
          issues.push({ file, message: `field "${name}" references missing enum "${enumRef}"` });
        }
      } else if (enumRef !== null) {
        issues.push({ file, message: `field "${name}" has type "${type}" but a non-null enumRef "${enumRef}"` });
      }
    }
  }

  for (const { file, data } of reg.enums) {
    checkSourceRefs(data, file, reg, issues);
  }

  for (const { file, data } of reg.rules) {
    for (const rule of arr(data["rules"])) {
      const r = obj(rule);
      checkSourceRefs(r, file, reg, issues);
      const at = obj(r["appliesTo"]);
      const service = strOrNull(at["service"]);
      if (service !== null && !serviceIds.has(service)) {
        issues.push({ file, message: `rule "${str(r["id"])}" appliesTo.service "${service}" does not resolve` });
      }
      const method = strOrNull(at["method"]);
      if (method !== null && !methodIds.has(method)) {
        issues.push({ file, message: `rule "${str(r["id"])}" appliesTo.method "${method}" does not resolve` });
      }
      const dvo = strOrNull(at["dvo"]);
      if (dvo !== null && !dvoIds.has(dvo)) {
        issues.push({ file, message: `rule "${str(r["id"])}" appliesTo.dvo "${dvo}" does not resolve` });
      }
      const field = strOrNull(at["field"]);
      if (dvo !== null && field !== null && !fieldNamesByDvo.get(dvo)?.includes(field)) {
        issues.push({
          file,
          message: `rule "${str(r["id"])}" appliesTo.field "${field}" does not exist in DVO "${dvo}"`,
        });
      }
    }
  }

  for (const { file, data } of reg.workflows) {
    checkSourceRefs(data, file, reg, issues);
    const stepIds = new Set(arr(data["steps"]).map((s) => str(obj(s)["id"])).filter((v) => v !== ""));
    for (const step of arr(data["steps"])) {
      const s = obj(step);
      const stepId = str(s["id"]);
      const method = str(s["method"]);
      if (!methodIds.has(method)) {
        issues.push({ file, message: `workflow step "${stepId}" references missing method "${method}"` });
      }
      for (const next of arr(s["next"])) {
        const nextId = str(next);
        if (!stepIds.has(nextId)) {
          issues.push({
            file,
            message: `workflow step "${stepId}" has unresolved next "${nextId}"`,
          });
        }
      }
    }
  }

  for (const { file, data } of reg.scenarios) {
    checkSourceRefs(data, file, reg, issues);
    const method = str(data["method"]);
    if (!methodIds.has(method)) {
      issues.push({ file, message: `scenario "${str(data["id"])}" references missing method "${method}"` });
    }
  }

  return issues;
}
