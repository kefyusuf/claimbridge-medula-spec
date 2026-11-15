#!/usr/bin/env node
/**
 * claimbridge-medula-spec CLI.
 *
 * Group 0 stub: `validate` exits 0 as a placeholder so the Milestone 0
 * acceptance criteria stay green. Real validation arrives with Group 5
 * (loadRegistry, schema/reference/synthetic checks) and generation step
 * arrives with Group 6 (dist bundle, docs, mermaid, `check`).
 */
import { readFileSync } from "node:fs";
import { resolve } from "node:path";

type Command = "validate" | "generate" | "check";

function specVersion(): string {
  return readFileSync(resolve(import.meta.dirname, "../../SPEC_VERSION"), "utf8").trim();
}

function fail(message: string): never {
  console.error(`error: ${message}`);
  process.exit(1);
}

const command = process.argv[2] as Command | undefined;

switch (command) {
  case "validate":
    // TODO(Group 5): YAML parse, JSON Schema, reference, source, and synthetic checks.
    console.log(`validate: OK (Group 0 stub) — spec ${specVersion()}`);
    break;
  case "generate":
    // TODO(Group 6): dist bundle, docs, mermaid, manifest with checksums.
    fail("generate is not implemented yet (planned: Group 6)");
  case "check":
    // TODO(Group 6): regenerate in memory and compare with committed outputs.
    fail("check is not implemented yet (planned: Group 6)");
  default:
    fail(`unknown command ${JSON.stringify(command)} — usage: validate | generate | check`);
}
