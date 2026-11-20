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

describe("v0.3 ilac (Group 20)", () => {
  it("registers IlacBilgisiDVO core fields from Tablo 4.2.1.f (s.198-199)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "IlacBilgisiDVO");
    expect(dvo, "IlacBilgisiDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "aciklama",
      "adet",
      "barkod",
      "hizmetSunucuRefNo",
      "ilacTuru",
      "islemSiraNo",
      "islemTarihi",
      "tutar",
      "paketHaric",
      "ozelDurum",
      "cokluOzelDurum",
      "seriNo",
      "sonKullanimTarihi",
      "batchNo",
      "itsBirimSarfId",
      "majistralIlac",
      "birlikteYapilanIslemSUTKodu",
      "birlikteYapilanIslemHizmetSunucuRefNo",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("adet")?.["type"]).toBe("decimal");
    expect(byName.get("barkod")?.["length"]).toBe(13);
    expect(String(byName.get("barkod")?.["description"])).toContain(
      "majistral",
    );
    expect(byName.get("ilacTuru")?.["type"]).toBe("enum");
    expect(byName.get("ilacTuru")?.["enumRef"]).toBe("ilac-turu");
    expect(byName.get("tutar")?.["required"]).toBe(false);
    expect(byName.get("paketHaric")?.["required"]).toBe(true);
    expect(byName.get("itsBirimSarfId")).toBeTruthy();
    expect(String(byName.get("majistralIlac")?.["description"])).toContain(
      "MajistralIlacDVO",
    );
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":198');
    expect(refs).toContain('"page":199');
  });

  it("registers the ilac-turu enum with the three guide codes (s.198)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "ilac-turu");
    expect(e, "ilac-turu must exist").toBeTruthy();
    expect(
      (e?.data["values"] as Array<{ code: string; label: string }>).map(
        (v) => v.label,
      ),
    ).toEqual(["Barkodlu ilac", "Majistral ilac", "Radyofarmasotik Ajan"]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":198');
  });

  it("documents that the drug table continues beyond the verified pages", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "IlacBilgisiDVO");
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain("continues");
    const notes = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(notes).toContain("s.200-223");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(163);
    expect(manifest.counts.enums).toBe(58);
  });
});
