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

describe("v0.3 nested (Group 21)", () => {
  it("registers MajistralIlacDVO from Tablo 4.2.1.f.1 (s.199-200)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "MajistralIlacDVO");
    expect(dvo, "MajistralIlacDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "islemSiraNo",
      "preparatTuru",
      "bolunmusTozTuru",
      "ambalajTuru",
      "ambalajBoyutu",
      "ambalajAdet",
      "hamMaddeler",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("preparatTuru")?.["enumRef"]).toBe("preparat-turu");
    expect(byName.get("ambalajTuru")?.["enumRef"]).toBe("ambalaj-turu");
    expect(String(byName.get("bolunmusTozTuru")?.["description"])).toContain(
      "3",
    );
    expect(String(byName.get("hamMaddeler")?.["description"])).toContain(
      "MajistralHamMaddeDVO",
    );
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":199');
    expect(refs).toContain('"page":200');
  });

  it("registers the preparat-turu enum with the eight guide codes (s.199)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "preparat-turu");
    expect(e?.data["status"]).toBe("reviewed");
    expect(
      (e?.data["values"] as Array<{ code: string; label: string }>).map(
        (v) => v.label,
      ),
    ).toEqual([
      "Tozlar",
      "Likid",
      "Bolunmus tozlar",
      "Sert kapsul ve pastiller",
      "Sogukta hazirlanan cozeltiler",
      "Sicakta hazirlanan cozeltiler",
      "Farmasotik formuller",
      "Granuller",
    ]);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":199');
  });

  it("registers the ambalaj-turu enum with the three guide codes (s.200)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "ambalaj-turu");
    expect(e?.data["status"]).toBe("reviewed");
    expect(
      (e?.data["values"] as Array<{ code: string; label: string }>).map(
        (v) => v.label,
      ),
    ).toEqual(["Ecza Siseleri", "Merhem Kutulari", "Kilitli Torbalar"]);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":200');
  });

  it("registers TahlilSonucDVO from Tablo 4.2.1.j.1 (s.228)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TahlilSonucDVO");
    expect(dvo, "TahlilSonucDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("islemSiraNo")?.["length"]).toBe(15);
    expect(byName.get("sonuc")?.["required"]).toBe(true);
    expect(String(byName.get("sonuc")?.["description"])).toContain("+");
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":228');
  });

  it("resolves the IlacBilgisiDVO majistralIlac placeholder", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "IlacBilgisiDVO");
    const majistral = (
      dvo?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "majistralIlac");
    expect(String(majistral?.["description"])).toContain(
      "MajistralIlacDVO registry entity",
    );
    expect(String(majistral?.["description"])).not.toContain("placeholder");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(119);
    expect(manifest.counts.enums).toBe(52);
  });
});
