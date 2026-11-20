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

describe("v0.3 hasta-cikis (Group 25)", () => {
  it("registers HastaCikisDVO from Tablo 4.1.4.a (s.168-169)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HastaCikisDVO");
    expect(dvo, "HastaCikisDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("hastaBasvuruNo")?.["required"]).toBe(true);
    expect(byName.get("hastaCikisTarihi")?.["length"]).toBe(10);
    expect(byName.get("hastaCikisTarihi")?.["required"]).toBe(true);
    expect(byName.get("saglikTesisKodu")?.["type"]).toBe("integer");
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":168');
  });

  it("registers HastaCikisCevapDVO from Tablo 4.1.4.b (s.169)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HastaCikisCevapDVO");
    expect(dvo, "HastaCikisCevapDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "sonucKodu",
      "sonucMesaji",
      "yatisBaslangicTarihi",
      "yatisBitisTarihi",
    ]);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":169');
  });

  it("resolves the hasta-cikis-kayit contract and promotes it to reviewed", () => {
    const m = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.hasta-cikis-kayit",
    );
    expect(m?.data["contract"]).toEqual({
      inputDvo: "HastaCikisDVO",
      outputDvo: "HastaCikisCevapDVO",
    });
    expect(m?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(m?.data["sourceRefs"])).toContain('"page":169');
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(163);
    expect(manifest.counts.methods).toBe(51);
  });
});
