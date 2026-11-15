/**
 * Synthetic-example guard (PRD 20.5): a simple, high-signal scanner that
 * fails examples containing likely-real data — 11-digit identity values,
 * non-placeholder credentials, or log files. Deliberately not
 * over-engineered.
 */
import { readFileSync, readdirSync, statSync } from "node:fs";
import { resolve } from "node:path";
import type { ValidationIssue } from "./validateSchemas.js";

const REAL_IDENTITY_PATTERN =
  /"(?:hastaTCKimlikNo|tcKimlikNo)"\s*:\s*"(?!\s*SYNTHETIC_)\d{11}"/;

const CREDENTIAL_KEYS = [
  "password",
  "sifre",
  "username",
  "kullaniciAdi",
  "secret",
  "token",
  "apiKey",
];

const PLACEHOLDER_PATTERN = /^(SYNTHETIC_|<|%|\$)/;

function scanValue(
  key: string,
  value: unknown,
  file: string,
  issues: ValidationIssue[],
): void {
  if (typeof value === "string" && CREDENTIAL_KEYS.includes(key)) {
    if (!PLACEHOLDER_PATTERN.test(value)) {
      issues.push({
        file,
        message: `"${key}" has a non-placeholder value; credentials must use SYNTHETIC_* placeholders (PRD 17.2)`,
      });
    }
  }
}

function walk(dir: string, issues: ValidationIssue[]): void {
  for (const entry of readdirSync(dir, { withFileTypes: true })) {
    const path = resolve(dir, entry.name);
    if (entry.isDirectory()) {
      walk(path, issues);
      continue;
    }
    if (entry.name.endsWith(".log")) {
      issues.push({
        file: path,
        message: "request/response logs must never be committed (PRD 17.1)",
      });
      continue;
    }
    if (!entry.name.endsWith(".json")) {
      continue;
    }
    const text = readFileSync(path, "utf8");
    if (REAL_IDENTITY_PATTERN.test(text)) {
      issues.push({
        file: path,
        message:
          "hastaTCKimlikNo looks like a real 11-digit identity value; use SYNTHETIC_* placeholders",
      });
    }
    let data: unknown;
    try {
      data = JSON.parse(text);
    } catch {
      issues.push({ file: path, message: "example does not parse as JSON" });
      continue;
    }
    const obj = data;
    if (obj !== null && typeof obj === "object" && !Array.isArray(obj)) {
      for (const [key, value] of Object.entries(obj)) {
        scanValue(key, value, path, issues);
      }
    }
  }
}

export function checkSyntheticExamples(dir: string): ValidationIssue[] {
  const issues: ValidationIssue[] = [];
  walk(dir, issues);
  return issues;
}
