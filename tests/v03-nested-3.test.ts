import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");
const GUIDE_ID = "medula-hastane-guide-3-1-1-2026-10-19";

let reg: ReturnType<typeof loadRegistry>;

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("v0.3 nested 3 (Group 23)", () => {
  it("registers MajistralEklenenIlacDVO from Tablo 4.2.1.f.1.2 (s.223-224)", () => {
    const dvo = reg.dvos.find(
      (d) => d.data["id"] === "MajistralEklenenIlacDVO",
    );
    expect(dvo, "MajistralEklenenIlacDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("islemSiraNo")?.["length"]).toBe(15);
    expect(byName.get("barkod")?.["length"]).toBe(14);
    expect(byName.get("adet")?.["type"]).toBe("decimal");
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":223');
    expect(refs).toContain('"page":224');
  });

  it("resolves the MajistralIlac eklenenIlaclar placeholder", () => {
    const maj = reg.dvos.find((d) => d.data["id"] === "MajistralIlacDVO");
    const eklenen = (
      maj?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "eklenenIlaclar");
    expect(String(eklenen?.["description"])).toContain(
      "MajistralEklenenIlacDVO registry entity",
    );
    expect(String(eklenen?.["description"])).not.toContain("placeholder");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(42);
    expect(manifest.counts.enums).toBe(19);
  });
});
