import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { describe, expect, it } from "vitest";

const root = resolve(import.meta.dirname, "..");

describe("release v0.5.0 (Group 44)", () => {
  it("bumps SPEC_VERSION and package.json to 0.5.0", () => {
    const specVersion = readFileSync(
      resolve(root, "SPEC_VERSION"),
      "utf8",
    ).trim();
    expect(specVersion).toBe("0.5.0");
    const pkg = JSON.parse(
      readFileSync(resolve(root, "package.json"), "utf8"),
    ) as { version: string };
    expect(pkg.version).toBe("0.5.0");
  });

  it("bumps CITATION.cff to 0.5.0", () => {
    const citation = readFileSync(resolve(root, "CITATION.cff"), "utf8");
    expect(citation).toContain("version: 0.5.0");
    expect(citation).toContain('date-released: "2026-11-19"');
  });

  it("records the 0.5.0 release in the changelog", () => {
    const changelog = readFileSync(resolve(root, "CHANGELOG.md"), "utf8");
    expect(changelog).toContain("## [0.5.0] — 2026-11-19");
    expect(changelog).toContain("Rapor Bilgisi Kayit");
  });

  it("carries the complete rapor service group in the bundle", () => {
    const bundle = JSON.parse(
      readFileSync(
        resolve(root, "dist", "claimbridge-medula-spec.json"),
        "utf8",
      ),
    ) as {
      specVersion: string;
      services: Array<{ id: string }>;
      methods: Array<{ id: string; status: string }>;
      dvos: Array<{ id: string }>;
      enums: Array<{ id: string }>;
    };
    expect(bundle.specVersion).toBe("0.5.0");
    expect(bundle.services.map((s) => s.id)).toContain("medula.hastane.rapor");
    const raporMethods = bundle.methods.filter((m) =>
      m.id.startsWith("medula.hastane.rapor."),
    );
    expect(raporMethods).toHaveLength(7);
    expect(raporMethods.every((m) => m.status === "reviewed")).toBe(true);
    expect(bundle.dvos).toHaveLength(176);
    expect(bundle.enums).toHaveLength(69);
  });
});
