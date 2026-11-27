import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");

type Registry = ReturnType<typeof loadRegistry>;

let reg: Registry;

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("error catalogs (Group 50)", () => {
  it("documents 9000 as the guide-verified success-with-warning code", () => {
    const e = reg.enums.find((x) => x.data["id"] === "sonuc-kodu");
    const values =
      (e?.data["values"] as Array<{
        code: string;
        label: string;
        description?: string;
      }>) ?? [];
    expect(values.map((v) => v.code)).toEqual(["0000", "9000"]);
    const warn = values.find((v) => v.code === "9000");
    expect(warn?.label.toLowerCase()).toContain("uyari");
    const refs = JSON.stringify(e?.data["sourceRefs"]);
    expect(refs).toContain('"page":103');
    expect(refs).toContain('"page":143');
    // the 9000 semantics: not an error; show the message as a warning.
    const warnDesc = (warn?.description ?? "").toLowerCase();
    expect(warnDesc).toContain("not an error");
    expect(warnDesc).toContain("warning");
  });

  it("registers the under-18 provision warning scenario (9000)", () => {
    const s = reg.scenarios.find(
      (x) => x.data["id"] === "provizyon-under18-warning",
    );
    expect(s, "provizyon-under18-warning must exist").toBeTruthy();
    expect(s?.data["method"]).toBe("medula.hastane.hasta-kabul.hasta-kabul");
    const expected = s?.data["expected"] as {
      result: { sonucKodu: string; sonucMesaji: string };
      stateChanges: { creates: string[] };
    };
    expect(expected.result.sonucKodu).toBe("9000");
    // guide-verbatim warning tail (s.143)
    expect(expected.result.sonucMesaji).toContain(
      "başvurması için yönlendiriniz",
    );
    // the provision still succeeds: takip state and identifiers are created
    expect(expected.stateChanges.creates).toContain("takipNo");
    expect(expected.stateChanges.creates).toContain("takip");
    const refs = JSON.stringify(s?.data["sourceRefs"]);
    expect(refs).toContain('"page":143');
  });

  it("resolves the per-method error-catalog backlog with the no-catalog finding", () => {
    const pageMap = readFileSync(
      resolve(root, "tools", "extract", "guide-page-map.md"),
      "utf8",
    );
    expect(pageMap).not.toContain("Complete sonucKodu error catalogs");
    expect(pageMap).toContain("no per-method error catalog");
    expect(pageMap).toContain("0000");
    expect(pageMap).toContain("9000");
  });
});
