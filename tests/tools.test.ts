import { execSync } from "node:child_process";
import { mkdtempSync, rmSync, writeFileSync } from "node:fs";
import { tmpdir } from "node:os";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";
import { validateSchemas } from "../tools/src/validateSchemas.js";
import { validateReferences } from "../tools/src/validateReferences.js";
import { checkSyntheticExamples } from "../tools/src/checkSyntheticExamples.js";

const root = resolve(import.meta.dirname, "..");

describe("tools (Group 5)", () => {
  it("loads the full v0.1 registry", () => {
    const reg = loadRegistry(root);
    expect(reg.services).toHaveLength(9);
    expect(reg.methods).toHaveLength(73);
    expect(reg.dvos).toHaveLength(212);
    expect(reg.enums).toHaveLength(81);
    expect(reg.rules).toHaveLength(7);
    expect(reg.workflows).toHaveLength(4);
    expect(reg.scenarios).toHaveLength(8);
    expect(reg.sourceIds.has("medula-hastane-guide-2026-06-17")).toBe(true);
    expect(reg.wsdlIds.size).toBe(18);
  });

  it("finds no schema issues on the committed registry", () => {
    const issues = validateSchemas(loadRegistry(root));
    expect(issues, JSON.stringify(issues, null, 2)).toEqual([]);
  });

  it("finds no reference issues on the committed registry", () => {
    const issues = validateReferences(loadRegistry(root));
    expect(issues, JSON.stringify(issues, null, 2)).toEqual([]);
  });

  it("reports a method that references a missing service", () => {
    const reg = loadRegistry(root);
    reg.methods[0]!.data["service"] = "medula.hastane.does-not-exist";
    const issues = validateReferences(reg);
    expect(issues.length).toBeGreaterThan(0);
    expect(
      issues.some((i) => i.message.includes("medula.hastane.does-not-exist")),
    ).toBe(true);
  });

  it("flags a null contract on a method whose status is not draft", () => {
    const reg = loadRegistry(root);
    const readMethod = reg.methods.find((m) =>
      (m.data["id"] as string).endsWith("hizmet-kaydi-oku"),
    );
    expect(readMethod).toBeTruthy();
    readMethod!.data["contract"] = { inputDvo: null, outputDvo: null };
    readMethod!.data["status"] = "reviewed";
    const issues = validateReferences(reg);
    expect(issues.some((i) => i.message.includes("null contract"))).toBe(true);
  });

  it("resolves field enumRef values through the registry", () => {
    const reg = loadRegistry(root);
    const dvo = reg.dvos.find((d) => d.data["id"] === "ProvizyonGirisDVO");
    expect(dvo).toBeTruthy();
    const fields = dvo!.data["fields"] as Array<Record<string, unknown>>;
    fields[0]!["enumRef"] = "does-not-exist";
    const issues = validateReferences(reg);
    expect(issues.some((i) => i.message.includes("does-not-exist"))).toBe(true);
  });

  it("passes the synthetic guard on the committed examples", () => {
    const issues = checkSyntheticExamples(resolve(root, "examples"));
    expect(issues, JSON.stringify(issues, null, 2)).toEqual([]);
  });

  it("catches a real-looking identity value in a temp example", () => {
    const tmp = mkdtempSync(resolve(tmpdir(), "cbms-synthetic-"));
    try {
      writeFileSync(
        resolve(tmp, "bad.json"),
        JSON.stringify({ hastaTCKimlikNo: "12345678901" }),
      );
      const issues = checkSyntheticExamples(tmp);
      expect(issues.length).toBeGreaterThan(0);
      expect(issues.some((i) => i.message.includes("hastaTCKimlikNo"))).toBe(
        true,
      );
    } finally {
      rmSync(tmp, { recursive: true, force: true });
    }
  });

  it("catches a non-placeholder credential in a temp example", () => {
    const tmp = mkdtempSync(resolve(tmpdir(), "cbms-synthetic-"));
    try {
      writeFileSync(
        resolve(tmp, "bad.json"),
        JSON.stringify({ kullaniciAdi: "admin" }),
      );
      const issues = checkSyntheticExamples(tmp);
      expect(issues.length).toBeGreaterThan(0);
      expect(issues.some((i) => i.message.includes("kullaniciAdi"))).toBe(true);
    } finally {
      rmSync(tmp, { recursive: true, force: true });
    }
  });

  it("exits zero when the validate command runs on the committed repository", () => {
    const stdout = execSync("pnpm validate", {
      cwd: root,
      stdio: "pipe",
    }).toString();
    expect(stdout).toContain("validate: OK");
  });
});
