import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");
const GUIDE_ID = "medula-hastane-guide-3-1-1-2026-10-19";

let reg: ReturnType<typeof loadRegistry>;

const NEW_METHOD_IDS = [
  "medula.hastane.hasta-kabul.basvuru-altindaki-takipleri-oku",
  "medula.hastane.hasta-kabul.ekds-belge-gereken-takip-sorgu",
  "medula.hastane.hasta-kabul.ekds-kisi-dogrulama-sorgu",
  "medula.hastane.hasta-kabul.hasta-cikis-iptal",
  "medula.hastane.hasta-kabul.hasta-cikis-kayit",
  "medula.hastane.hasta-kabul.hasta-kabul-kimlik-dogrulama",
  "medula.hastane.hasta-kabul.hasta-yatis-oku",
  "medula.hastane.hasta-kabul.kemik-iligi-islem-duzeltme",
  "medula.hastane.hasta-kabul.kemik-iligi-iptal",
  "medula.hastane.hasta-kabul.kemik-iligi-kabul",
  "medula.hastane.hasta-kabul.kemik-iligi-oku",
  "medula.hastane.hasta-kabul.kemik-iligi-tc-ile-sorgu",
  "medula.hastane.hasta-kabul.sevk-bildir",
  "medula.hastane.hasta-kabul.update-provizyon-tipi",
  "medula.hastane.hasta-kabul.update-tedavi-tipi",
];

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("v0.3 hasta-kabul methods (Group 24)", () => {
  it("registers the guide-listed HastaKabul methods as draft entries (s.149)", () => {
    const ids = reg.methods.map((m) => m.data["id"] as string);
    for (const id of NEW_METHOD_IDS) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      expect(m, `missing method ${id}`).toBeTruthy();
      expect(
        m?.data["status"],
        `${id} status matches the Group 25/26 resolutions`,
      ).toBe(
        [
          "medula.hastane.hasta-kabul.hasta-cikis-kayit",
          "medula.hastane.hasta-kabul.hasta-cikis-iptal",
          "medula.hastane.hasta-kabul.hasta-yatis-oku",
          "medula.hastane.hasta-kabul.basvuru-altindaki-takipleri-oku",
        ].includes(id)
          ? "reviewed"
          : "draft",
      );
      expect(m?.data["service"]).toBe("medula.hastane.hasta-kabul");
      const refs = JSON.stringify(m?.data["sourceRefs"]);
      expect(refs, `${id} must cite the method list`).toContain(GUIDE_ID);
      expect(refs, `${id} must cite page 149`).toContain('"page":149');
    }
    expect(reg.methods).toHaveLength(25);
  });

  it("marks HastaKabulKimlikDogrulama as disabled in the sandbox", () => {
    const m = reg.methods.find(
      (x) =>
        x.data["id"] ===
        "medula.hastane.hasta-kabul.hasta-kabul-kimlik-dogrulama",
    );
    const sandbox = m?.data["sandbox"] as {
      supported: boolean;
      defaultScenario: string | null;
    };
    expect(
      sandbox.supported,
      "the guide disabled this method (changelog s.13)",
    ).toBe(false);
    expect(String(JSON.stringify(m?.data["sourceRefs"]))).toContain(
      "devre disi",
    );
  });

  it("keeps draft null contracts except the resolved hasta-cikis-kayit", () => {
    for (const id of NEW_METHOD_IDS) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      const resolved: Record<string, [string, string]> = {
        "medula.hastane.hasta-kabul.hasta-cikis-kayit": [
          "HastaCikisDVO",
          "HastaCikisCevapDVO",
        ],
        "medula.hastane.hasta-kabul.hasta-cikis-iptal": [
          "HastaCikisIptalDVO",
          "HastaCikisCevapDVO",
        ],
        "medula.hastane.hasta-kabul.hasta-yatis-oku": [
          "HastaYatisOkuDVO",
          "HastaYatisOkuCevapDVO",
        ],
        "medula.hastane.hasta-kabul.basvuru-altindaki-takipleri-oku": [
          "BasvuruTakipOkuDVO",
          "BasvuruTakipOkuCevapDVO",
        ],
      };
      if (resolved[id]) {
        expect(m?.data["contract"]).toEqual({
          inputDvo: resolved[id][0],
          outputDvo: resolved[id][1],
        });
        continue;
      }
      expect(
        m?.data["contract"],
        `${id} contract stays null while draft`,
      ).toEqual({
        inputDvo: null,
        outputDvo: null,
      });
    }
  });

  it("lists the new methods on the hasta-kabul service", () => {
    const s = reg.services.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul",
    );
    const methods = (s?.data["methods"] as string[]) ?? [];
    for (const id of NEW_METHOD_IDS) {
      expect(methods, `service must list ${id}`).toContain(id);
    }
    expect(methods).toHaveLength(18);
  });

  it("updates the manifest methods count", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.methods).toBe(25);
  });
});
