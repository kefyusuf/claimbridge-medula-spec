import { existsSync, readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");
const GUIDE_ID = "medula-hastane-guide-3-1-1-2026-10-19";

let reg: ReturnType<typeof loadRegistry>;

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("v0.2 contracts (Group 11)", () => {
  it("registers the eight oku/iptal DVOs with guide page references", () => {
    const expected: Array<[string, number]> = [
      ["HizmetOkuGirisDVO", 236],
      ["HizmetOkuCevapDVO", 237],
      ["HizmetIptalGirisDVO", 239],
      ["HizmetIptalCevapDVO", 239],
      ["FaturaOkuGirisDVO", 244],
      ["FaturaOkuCevapDVO", 245],
      ["FaturaIptalGirisDVO", 243],
      ["FaturaIptalCevapDVO", 243],
    ];
    for (const [id, page] of expected) {
      const dvo = reg.dvos.find((d) => d.data["id"] === id);
      expect(dvo, `${id} must exist`).toBeTruthy();
      expect(dvo?.data["status"], `${id} must be reviewed`).toBe("reviewed");
      const refs = JSON.stringify(dvo?.data["sourceRefs"]);
      expect(refs, `${id} must cite ${GUIDE_ID}`).toContain(GUIDE_ID);
      expect(refs, `${id} must cite page ${page}`).toContain(`"page":${page}`);
    }
  });

  it("resolves every remaining oku/iptal contract to guide tables", () => {
    const expectations: Array<[string, string, string, number]> = [
      [
        "medula.hastane.hizmet-kayit.hizmet-kaydi-oku",
        "HizmetOkuGirisDVO",
        "HizmetOkuCevapDVO",
        236,
      ],
      [
        "medula.hastane.hizmet-kayit.hizmet-kaydi-iptal",
        "HizmetIptalGirisDVO",
        "HizmetIptalCevapDVO",
        239,
      ],
      [
        "medula.hastane.fatura-kayit.fatura-oku",
        "FaturaOkuGirisDVO",
        "FaturaOkuCevapDVO",
        244,
      ],
      [
        "medula.hastane.fatura-kayit.fatura-iptal",
        "FaturaIptalGirisDVO",
        "FaturaIptalCevapDVO",
        243,
      ],
      [
        "medula.hastane.fatura-kayit.fatura-tutar-oku",
        "FaturaGirisDVO",
        "FaturaCevapDVO",
        246,
      ],
    ];
    for (const [id, inputDvo, outputDvo, page] of expectations) {
      const m = reg.methods.find((x) => x.data["id"] === id);
      expect(m?.data["contract"], `${id} contract`).toEqual({
        inputDvo,
        outputDvo,
      });
      expect(m?.data["status"], `${id} must be reviewed`).toBe("reviewed");
      expect(
        JSON.stringify(m?.data["sourceRefs"]),
        `${id} must cite page ${page}`,
      ).toContain(`"page":${page}`);
    }
  });

  it("keeps the mutually-exclusive read filters documented (s.237)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HizmetOkuGirisDVO");
    const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
    const byName = new Map(fields.map((f) => [f["name"] as string, f]));
    expect(byName.has("islemSiraNumaralari")).toBe(true);
    expect(byName.has("hizmetSunucuRefNolari")).toBe(true);
    const note = JSON.stringify(
      byName.get("hizmetSunucuRefNolari")?.["conditionalRequired"],
    );
    expect(note).toContain("dolu olamaz");
  });

  it("documents the FaturaBilgisiKaydet naming evidence on fatura-kayit", () => {
    const m = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.fatura-kayit.fatura-kayit",
    );
    const aliases = JSON.stringify(m?.data["names"]);
    expect(aliases).toContain("FaturaBilgisiKaydet");
  });

  it("updates the manifest counts for the complete contract set", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(119);
    expect(manifest.counts.methods).toBe(36);
  });

  it("ships the non-authoritative extraction workspace (PRD 25.4)", () => {
    const readme = resolve(root, "tools", "extract", "README.md");
    const pageMap = resolve(root, "tools", "extract", "guide-page-map.md");
    expect(existsSync(readme)).toBe(true);
    expect(existsSync(pageMap)).toBe(true);
    const map = readFileSync(pageMap, "utf8");
    expect(map).toContain("4.1.1.a");
    expect(map).toContain("4.2.1.a");
    expect(map).toContain("4.3.1.a");
  });
});
