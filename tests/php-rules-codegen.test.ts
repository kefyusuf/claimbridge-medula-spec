import { readFileSync, readdirSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");
const rulesDir = resolve(root, "dist", "php", "src", "Rules");

function listRules(domain: string): string[] {
  const dir = resolve(rulesDir, domain);
  try {
    return readdirSync(dir)
      .filter((f) => f.endsWith(".php"))
      .sort();
  } catch {
    return [];
  }
}

describe("php validation rules codegen (Group 48)", () => {
  it("generates one rule class per input DVO", () => {
    const total = readdirSync(rulesDir, { withFileTypes: true }).reduce(
      (acc, d) => (d.isDirectory() ? acc + listRules(d.name).length : acc),
      0,
    );
    expect(total).toBe(127);
  });

  it("generates the ProvizyonGirisDVO rules from guide data", () => {
    const content = readFileSync(
      resolve(rulesDir, "HastaKabul", "ProvizyonGirisDVORules.php"),
      "utf8",
    );
    // required fields carry Laravel's required rule
    expect(content).toContain(
      `"takipTipi" => ['required', 'string', 'in:N,E,U,K,T,Y,P,S,C,F,B'],`,
    );
    // optional fields are nullable with their type
    expect(content).toContain(`"takipNo" => ['nullable', 'string'],`);
    // length bounds become max rules
    expect(content).toContain(
      `"bransKodu" => ['required', 'string', 'max:4'],`,
    );
    // enum membership is built from the guide's code list
    expect(content).toContain(`"provizyonTipi" => ['required', 'string', 'in:`);
  });

  it("maps registry types to Laravel rule types", () => {
    const content = readFileSync(
      resolve(rulesDir, "HastaKabul", "ProvizyonGirisDVORules.php"),
      "utf8",
    );
    expect(content).toContain(`"saglikTesisKodu" => ['required', 'integer'],`);
  });

  it("documents conditional exceptions as inline comments", () => {
    const content = readFileSync(
      resolve(rulesDir, "HastaKabul", "ProvizyonGirisDVORules.php"),
      "utf8",
    );
    expect(content).toContain("linked-takip");
  });
});
