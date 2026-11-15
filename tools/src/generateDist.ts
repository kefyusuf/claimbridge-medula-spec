/**
 * Dist bundle generator (PRD 18.1): builds the canonical
 * claimbridge-medula-spec.json bundle, its minified twin, and the manifest
 * with counts and sha256 checksums.
 *
 * All builders are pure and byte-deterministic for a pinned generatedAt —
 * that is what lets `pnpm check` regenerate in memory and compare.
 */
import { mkdirSync, readFileSync, writeFileSync } from "node:fs";
import { createHash } from "node:crypto";
import { resolve } from "node:path";
import { parse } from "yaml";
import type { Registry, YamlFile } from "./loadRegistry.js";

export interface Bundle {
  specVersion: string;
  generatedAt: string;
  sources: unknown[];
  services: unknown[];
  methods: unknown[];
  dvos: unknown[];
  enums: unknown[];
  rules: unknown[];
  workflows: unknown[];
  scenarios: unknown[];
}

export interface Manifest {
  specVersion: string;
  generatedAt: string;
  bundle: string;
  minifiedBundle: string;
  counts: Record<string, number>;
  checksums: Record<string, string>;
}

function sortedById(files: YamlFile[]): unknown[] {
  return [...files]
    .sort((a, b) => {
      const ka = String(a.data["id"] ?? a.file);
      const kb = String(b.data["id"] ?? b.file);
      return ka < kb ? -1 : ka > kb ? 1 : 0;
    })
    .map((f) => f.data);
}

function readYamlEntries(path: string, key: string): Record<string, unknown>[] {
  const doc = parse(readFileSync(path, "utf8")) as Record<string, unknown>;
  const entries = doc[key];
  return Array.isArray(entries) ? (entries as Record<string, unknown>[]) : [];
}

export function buildBundle(reg: Registry, generatedAt: string): Bundle {
  const sources = [
    ...readYamlEntries(resolve(reg.root, "sources", "official-sources.yml"), "sources"),
    ...readYamlEntries(resolve(reg.root, "sources", "guide-versions.yml"), "guides"),
  ].sort((a, b) => {
    const ka = String(a["id"] ?? "");
    const kb = String(b["id"] ?? "");
    return ka < kb ? -1 : ka > kb ? 1 : 0;
  });

  return {
    specVersion: readFileSync(resolve(reg.root, "SPEC_VERSION"), "utf8").trim(),
    generatedAt,
    sources,
    services: sortedById(reg.services),
    methods: sortedById(reg.methods),
    dvos: sortedById(reg.dvos),
    enums: sortedById(reg.enums),
    rules: sortedById(reg.rules),
    workflows: sortedById(reg.workflows),
    scenarios: sortedById(reg.scenarios),
  };
}

export function renderPretty(value: unknown): string {
  return `${JSON.stringify(value, null, 2)}\n`;
}

export function renderMinified(bundle: Bundle): string {
  return `${JSON.stringify(bundle)}\n`;
}

function sha256(text: string): string {
  return `sha256:${createHash("sha256").update(text).digest("hex")}`;
}

export function buildManifest(
  bundle: Bundle,
  prettyText: string,
  minifiedText: string,
  generatedAt: string,
): Manifest {
  return {
    specVersion: bundle.specVersion,
    generatedAt,
    bundle: "claimbridge-medula-spec.json",
    minifiedBundle: "claimbridge-medula-spec.min.json",
    counts: {
      services: bundle.services.length,
      methods: bundle.methods.length,
      dvos: bundle.dvos.length,
      enums: bundle.enums.length,
      rules: bundle.rules.length,
      workflows: bundle.workflows.length,
      scenarios: bundle.scenarios.length,
    },
    checksums: {
      "claimbridge-medula-spec.json": sha256(prettyText),
      "claimbridge-medula-spec.min.json": sha256(minifiedText),
    },
  };
}

export function writeDist(reg: Registry, outDir: string, generatedAt: string): Manifest {
  const bundle = buildBundle(reg, generatedAt);
  const pretty = renderPretty(bundle);
  const minified = renderMinified(bundle);
  const manifest = buildManifest(bundle, pretty, minified, generatedAt);
  mkdirSync(outDir, { recursive: true });
  writeFileSync(resolve(outDir, "claimbridge-medula-spec.json"), pretty);
  writeFileSync(resolve(outDir, "claimbridge-medula-spec.min.json"), minified);
  writeFileSync(resolve(outDir, "manifest.json"), renderPretty(manifest));
  return manifest;
}
