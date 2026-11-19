import { execSync } from "node:child_process";
import { readFileSync, writeFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";
import {
  buildBundle,
  buildManifest,
  renderMinified,
  renderPretty,
} from "../tools/src/generateDist.js";
import { generateDocs } from "../tools/src/generateDocs.js";
import { generateMermaid } from "../tools/src/generateMermaid.js";

const root = resolve(import.meta.dirname, "..");
const PINNED = "2026-11-15T00:00:00.000Z";
const GENERATED_HEADER =
  "<!-- This file is generated. Do not edit manually. -->";
const MERMAID_HEADER_PREFIX =
  "%% This file is generated. Do not edit manually.";

describe("generation (Group 6)", () => {
  it("builds the PRD 18.1 bundle shape", () => {
    const bundle = buildBundle(loadRegistry(root), PINNED);
    expect(bundle.specVersion).toBe(
      readFileSync(resolve(root, "SPEC_VERSION"), "utf8").trim(),
    );
    expect(bundle.generatedAt).toBe(PINNED);
    expect(bundle.sources.length).toBeGreaterThanOrEqual(1);
    expect(bundle.services).toHaveLength(5);
    expect(bundle.methods).toHaveLength(36);
    expect(bundle.dvos).toHaveLength(119);
    expect(bundle.enums).toHaveLength(52);
    expect(bundle.rules).toHaveLength(5);
    expect(bundle.workflows).toHaveLength(4);
    expect(bundle.scenarios).toHaveLength(6);
  });

  it("reports PRD 18.1 counts and sha256 checksums", () => {
    const bundle = buildBundle(loadRegistry(root), PINNED);
    const pretty = renderPretty(bundle);
    const minified = renderMinified(bundle);
    const manifest = buildManifest(bundle, pretty, minified, PINNED);
    expect(manifest.counts).toEqual({
      services: 5,
      methods: 36,
      dvos: 119,
      enums: 52,
      rules: 5,
      workflows: 4,
      scenarios: 6,
    });
    for (const value of Object.values(manifest.checksums)) {
      expect(value).toMatch(/^sha256:[0-9a-f]{64}$/);
    }
  });

  it("is byte-deterministic for a pinned timestamp", () => {
    const reg = loadRegistry(root);
    const first = renderPretty(buildBundle(reg, PINNED));
    const second = renderPretty(buildBundle(loadRegistry(root), PINNED));
    expect(second).toBe(first);
  });

  it("minifies to the same object", () => {
    const bundle = buildBundle(loadRegistry(root), PINNED);
    expect(JSON.parse(renderMinified(bundle))).toEqual(bundle);
    expect(renderMinified(bundle).length).toBeLessThan(
      renderPretty(bundle).length,
    );
  });

  it("emits the five generated documents with the do-not-edit header", () => {
    const docs = generateDocs(loadRegistry(root));
    expect(Object.keys(docs).sort()).toEqual([
      "dvos.md",
      "methods.md",
      "scenarios.md",
      "services.md",
      "workflows.md",
    ]);
    for (const [name, text] of Object.entries(docs)) {
      expect(
        text.startsWith(`${GENERATED_HEADER}\n`),
        `header on ${name}`,
      ).toBe(true);
    }
    expect(docs["services.md"]).toContain("medula.hastane.hasta-kabul");
    expect(docs["methods.md"]).toContain(
      "medula.hastane.fatura-kayit.fatura-tutar-oku",
    );
    expect(docs["dvos.md"]).toContain("ProvizyonGirisDVO");
    expect(docs["workflows.md"]).toContain("core-claim-flow");
    expect(docs["scenarios.md"]).toContain("SANDBOX_2001");
  });

  it("emits three mermaid diagrams with header comments", () => {
    const diagrams = generateMermaid(loadRegistry(root));
    expect(Object.keys(diagrams).sort()).toEqual([
      "core-flow.mmd",
      "er-diagram.mmd",
      "service-map.mmd",
    ]);
    for (const text of Object.values(diagrams)) {
      expect(text.startsWith(`${MERMAID_HEADER_PREFIX}\n`)).toBe(true);
    }
    expect(diagrams["er-diagram.mmd"]).toContain("ProvizyonGirisDVO");
    expect(diagrams["er-diagram.mmd"]).toContain("provizyon_tipi");
    expect(diagrams["core-flow.mmd"]).toContain(
      "medula.hastane.hasta-kabul.hasta-kabul",
    );
    expect(diagrams["core-flow.mmd"]).toContain(
      "medula.hastane.fatura-kayit.fatura-kayit",
    );
    expect(diagrams["service-map.mmd"]).toContain("hizmet-kayit");
  });

  it("generates committed outputs that pass the check command", () => {
    execSync("pnpm generate", { cwd: root, stdio: "pipe" });
    const stdout = execSync("pnpm check", {
      cwd: root,
      stdio: "pipe",
    }).toString();
    expect(stdout).toContain("check: OK");
  });

  it("detects stale generated outputs and exits non-zero", () => {
    const minPath = resolve(root, "dist", "claimbridge-medula-spec.min.json");
    const original = readFileSync(minPath, "utf8");
    try {
      const mutated = original.replace("0000", "9999");
      expect(mutated).not.toBe(original);
      writeFileSync(minPath, mutated);
      let failed = false;
      try {
        execSync("pnpm check", { cwd: root, stdio: "pipe" });
      } catch (error) {
        failed = true;
        const status = (error as { status?: number }).status;
        expect(status).not.toBe(0);
      }
      expect(failed, "check must fail on stale output").toBe(true);
    } finally {
      writeFileSync(minPath, original);
    }
  });
});
