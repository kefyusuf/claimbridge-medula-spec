#!/usr/bin/env node
/**
 * claimbridge-medula-spec CLI.
 *
 * `validate` runs the full pipeline from PRD 19.1: YAML parse + JSON Schema
 * validation, registry reference validation, source-reference validation,
 * and the synthetic-example guard. `generate` and `check` arrive with
 * Group 6.
 */
import { resolve } from "node:path";
import { loadRegistry } from "./loadRegistry.js";
import { validateSchemas, type ValidationIssue } from "./validateSchemas.js";
import { validateReferences } from "./validateReferences.js";
import { checkSyntheticExamples } from "./checkSyntheticExamples.js";

const repoRoot = resolve(import.meta.dirname, "..", "..");

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

const command = process.argv[2];

switch (command) {
  case "validate": {
    const reg = loadRegistry(repoRoot);
    const fileCount =
      reg.services.length +
      reg.methods.length +
      reg.dvos.length +
      reg.enums.length +
      reg.rules.length +
      reg.workflows.length +
      reg.scenarios.length;
    console.log(`validate — ${fileCount} registry files loaded (spec v0.1.0)`);
    report("schemas", validateSchemas(reg));
    report("references", validateReferences(reg));
    report("synthetic-examples", checkSyntheticExamples(resolve(repoRoot, "examples")));
    if (process.exitCode === 1) {
      fail("validation failed");
    }
    console.log("validate: OK");
    break;
  }
  case "generate":
    // TODO(Group 6): dist bundle, docs, mermaid, manifest with checksums.
    fail("generate is not implemented yet (planned: Group 6)");
  case "check":
    // TODO(Group 6): regenerate in memory and compare with committed outputs.
    fail("check is not implemented yet (planned: Group 6)");
  default:
    fail(`unknown command "${command ?? ""}" — usage: validate | generate | check`);
}
