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

describe("v0.3 entries 2 (Group 18)", () => {
  it("registers KonsultasyonBilgisiDVO (4.2.1.g, s.224)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "KonsultasyonBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "bransKodu",
      "drTescilNo",
      "sutKodu",
      "hizmetSunucuRefNo",
      "islemSiraNo",
      "islemTarihi",
      "ozelDurum",
      "cokluOzelDurum",
    ]);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":224');
  });

  it("registers MuayeneBilgisiDVO (4.2.1.i, s.226-227)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "MuayeneBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "bransKodu",
      "drTescilNo",
      "sutKodu",
      "hizmetSunucuRefNo",
      "islemSiraNo",
      "muayeneTarihi",
      "ozelDurum",
      "cokluOzelDurum",
    ]);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":226');
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":227');
  });

  it("registers HastaYatisBilgisiDVO (4.2.1.o, s.234)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HastaYatisBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("refakatciGunSayisi")?.["length"]).toBe(4);
    expect(byName.get("yatisBaslangicTarihi")?.["required"]).toBe(true);
    expect(byName.get("yatisBitisTarihi")?.["required"]).toBe(true);
    expect(byName.get("aciklama")?.["length"]).toBe(1000);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":234');
  });

  it("registers KanBilgisiDVO with the ISBT blood-product fields (4.2.1.s, s.234-235)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "KanBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("isbtBilesenNo")).toBeTruthy();
    expect(byName.get("isbtUniteNo")).toBeTruthy();
    expect(byName.get("sutKodu")?.["length"]).toBe(7);
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":234');
    expect(refs).toContain('"page":235');
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(70);
    expect(manifest.counts.enums).toBe(21);
  });
});
