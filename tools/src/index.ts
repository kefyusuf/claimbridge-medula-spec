#!/usr/bin/env node
/**
 * claimbridge-medula-spec CLI.
 *
 * `validate` runs the full pipeline from PRD 19.1: YAML parse + JSON Schema
 * validation, registry reference validation, source-reference validation,
 * and the synthetic-example guard.
 *
 * `generate` writes the dist bundle, manifest, docs, and mermaid diagrams
 * (PRD 19.2). `check` validates, regenerates in memory with the committed
 * generatedAt, and fails on stale outputs (PRD 19.3).
 */
import { existsSync, readFileSync } from "node:fs";
import { resolve } from "node:path";
import { loadRegistry } from "./loadRegistry.js";
import { validateSchemas, type ValidationIssue } from "./validateSchemas.js";
import { validateReferences } from "./validateReferences.js";
import { checkSyntheticExamples } from "./checkSyntheticExamples.js";
import {
  buildBundle,
  buildManifest,
  renderMinified,
  renderPretty,
  writeDist,
} from "./generateDist.js";
import { generateDocs, writeDocs } from "./generateDocs.js";
import { generateMermaid, writeMermaid } from "./generateMermaid.js";

const repoRoot = resolve(import.meta.dirname, "..", "..");
const distDir = resolve(repoRoot, "dist");

function fail(message: string): never {
  console.error(`error: ${message}`);
  process.exit(1);
}

function report(stage: string, issues: ValidationIssue[]): void {
  if (issues.length === 0) {
    console.log(`  ${stage}: OK`);
    return;
  }
  for (const issue of issues) {
    console.error(`  ${stage} FAIL ${issue.file} — ${issue.message}`);
  }
  process.exitCode = 1;
}

function runValidation(): void {
  const reg = loadRegistry(repoRoot);
  const fileCount =
    reg.services.length +
    reg.methods.length +
    reg.dvos.length +
    reg.enums.length +
    reg.rules.length +
    reg.workflows.length +
    reg.scenarios.length;
  console.log(`validation — ${fileCount} registry files loaded (spec v0.1.0)`);
  report("schemas", validateSchemas(reg));
  report("references", validateReferences(reg));
  report(
    "synthetic-examples",
    checkSyntheticExamples(resolve(repoRoot, "examples")),
  );
  if (process.exitCode === 1) {
    fail("validation failed");
  }
}

function compareOutputs(
  reg: ReturnType<typeof loadRegistry>,
  generatedAt: string,
): string[] {
  const stale: string[] = [];
  const bundle = buildBundle(reg, generatedAt);
  const pretty = renderPretty(bundle);
  const minified = renderMinified(bundle);
  const manifest = buildManifest(bundle, pretty, minified, generatedAt);

  const compareDist = (file: string, expected: string): void => {
    const path = resolve(distDir, file);
    if (!existsSync(path)) {
      stale.push(`dist/${file} (missing)`);
    } else if (readFileSync(path, "utf8") !== expected) {
      stale.push(`dist/${file}`);
    }
  };
  compareDist("claimbridge-medula-spec.json", pretty);
  compareDist("claimbridge-medula-spec.min.json", minified);
  compareDist("manifest.json", renderPretty(manifest));

  for (const [name, text] of Object.entries(generateDocs(reg))) {
    const path = resolve(repoRoot, "docs", "generated", name);
    if (!existsSync(path) || readFileSync(path, "utf8") !== text) {
      stale.push(`docs/generated/${name}`);
    }
  }
  for (const [name, text] of Object.entries(generateMermaid(reg))) {
    const path = resolve(repoRoot, "diagrams", "generated", name);
    if (!existsSync(path) || readFileSync(path, "utf8") !== text) {
      stale.push(`diagrams/generated/${name}`);
    }
  }
  return stale;
}

const command = process.argv[2];

switch (command) {
  case "validate": {
    runValidation();
    console.log("validate: OK");
    break;
  }
  case "generate": {
    const reg = loadRegistry(repoRoot);
    const generatedAt = new Date().toISOString();
    const manifest = writeDist(reg, distDir, generatedAt);
    writeDocs(reg, resolve(repoRoot, "docs", "generated"));
    writeMermaid(reg, resolve(repoRoot, "diagrams", "generated"));
    const c = manifest.counts;
    console.log(
      `generate: OK — bundle ${manifest.bundle} (services ${c.services}, methods ${c.methods}, dvos ${c.dvos}, enums ${c.enums}, rules ${c.rules}, workflows ${c.workflows}, scenarios ${c.scenarios})`,
    );
    break;
  }
  case "check": {
    runValidation();
    const manifestPath = resolve(distDir, "manifest.json");
    if (!existsSync(manifestPath)) {
      fail("dist/manifest.json is missing — run pnpm generate first");
    }
    const committed = JSON.parse(readFileSync(manifestPath, "utf8")) as {
      generatedAt: string;
    };
    const reg = loadRegistry(repoRoot);
    const stale = compareOutputs(reg, committed.generatedAt);
    if (stale.length > 0) {
      for (const file of stale) {
        console.error(`  check STALE ${file}`);
      }
      fail(`${stale.length} generated output(s) stale — run pnpm generate`);
    }
    console.log("check: OK — generated outputs are fresh");
    break;
  }
  default:
    fail(
      `unknown command "${command ?? ""}" — usage: validate | generate | check`,
    );
}
