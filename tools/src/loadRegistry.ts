/**
 * Registry loader: walks the repository tree and returns every registry
 * collection plus the source/WSDL manifests needed for reference validation.
 */
import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { parse } from "yaml";

export type YamlFile = { file: string; data: Record<string, unknown> };

export interface Registry {
  root: string;
  services: YamlFile[];
  methods: YamlFile[];
  dvos: YamlFile[];
  enums: YamlFile[];
  rules: YamlFile[];
  workflows: YamlFile[];
  scenarios: YamlFile[];
  /** Ids registered in official-sources.yml and guide-versions.yml. */
  sourceIds: Set<string>;
  /** WSDL manifest ids mapped to their owning service slug and environment. */
  wsdlIds: Map<string, { service: string; environment: string }>;
}

function readYaml(path: string): Record<string, unknown> {
  return parse(readFileSync(path, "utf8")) as Record<string, unknown>;
}

function loadFlat(dir: string): YamlFile[] {
  return readdirSync(dir)
    .filter((f) => f.endsWith(".yml"))
    .map((file) => ({ file, data: readYaml(resolve(dir, file)) }));
}

function loadNested(dir: string): YamlFile[] {
  return readdirSync(dir, { withFileTypes: true })
    .filter((e) => e.isDirectory())
    .flatMap((d) =>
      readdirSync(resolve(dir, d.name))
        .filter((f) => f.endsWith(".yml"))
        .map((file) => ({
          file: `${d.name}/${file}`,
          data: readYaml(resolve(dir, d.name, file)),
        })),
    );
}

function collectSourceIds(root: string): Set<string> {
  const ids = new Set<string>();
  const official = readYaml(resolve(root, "sources", "official-sources.yml"));
  for (const s of (official["sources"] as Array<Record<string, unknown>>) ??
    []) {
    if (typeof s["id"] === "string") ids.add(s["id"]);
  }
  const guides = readYaml(resolve(root, "sources", "guide-versions.yml"));
  for (const g of (guides["guides"] as Array<Record<string, unknown>>) ?? []) {
    if (typeof g["id"] === "string") ids.add(g["id"]);
  }
  return ids;
}

function collectWsdlIds(
  root: string,
): Map<string, { service: string; environment: string }> {
  const map = new Map<string, { service: string; environment: string }>();
  const manifest = readYaml(resolve(root, "sources", "wsdl-manifest.yml"));
  for (const w of (manifest["wsdls"] as Array<Record<string, unknown>>) ?? []) {
    const id = w["id"];
    if (typeof id === "string") {
      map.set(id, {
        service: typeof w["service"] === "string" ? w["service"] : "",
        environment:
          typeof w["environment"] === "string" ? w["environment"] : "",
      });
    }
  }
  return map;
}

export function loadRegistry(root: string): Registry {
  const registryDir = resolve(root, "registry");
  return {
    root,
    services: loadFlat(resolve(registryDir, "services")),
    methods: loadNested(resolve(registryDir, "methods")),
    dvos: loadNested(resolve(registryDir, "dvos")),
    enums: loadFlat(resolve(registryDir, "enums")),
    rules: loadFlat(resolve(registryDir, "rules")),
    workflows: loadFlat(resolve(registryDir, "workflows")),
    scenarios: loadFlat(resolve(registryDir, "scenarios")),
    sourceIds: collectSourceIds(root),
    wsdlIds: collectWsdlIds(root),
  };
}
