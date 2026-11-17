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

describe("v0.3 entries 3 (Group 19)", () => {
  it("registers DisBilgisiDVO with the full dental chart (4.2.1.e, s.193-194)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "DisBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "sagAltCene",
      "sagSutAltCene",
      "sagSutUstCene",
      "sagUstCene",
      "solAltCene",
      "solSutAltCene",
      "solSutUstCene",
      "solUstCene",
      "sagAltCeneAnomaliDis",
      "sagUstCeneAnomaliDis",
      "solAltCeneAnomaliDis",
      "solUstCeneAnomaliDis",
      "anomali",
      "sutKodu",
      "ayniFarkliKesi",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("sagAltCene")?.["length"]).toBe(8);
    expect(byName.get("sagSutAltCene")?.["length"]).toBe(5);
    expect(
      String(byName.get("sagAltCeneAnomaliDis")?.["description"]),
    ).toContain("E");
    const refs = JSON.stringify(dvo?.data["sourceRefs"]);
    expect(refs).toContain('"page":193');
    expect(refs).toContain('"page":194');
  });

  it("registers MalzemeBilgisiDVO with the procurement fields (4.2.1.h, s.224-226)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "MalzemeBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "malzemeTuru",
      "paketHaric",
      "katkiPayi",
      "kdv",
      "kodsuzMalzemeAdi",
      "kodsuzMalzemeFiyati",
      "malzemeKodu",
      "barkod",
      "adet",
      "malzemeSatinAlisTarihi",
      "donorId",
      "ihaleKesinlesmeTarihi",
      "ikNoAlimNo",
      "bayiNo",
      "sagSol",
      "birlikteYapilanIslemSUTKodu",
      "birlikteYapilanIslemHizmetSunucuRefNo",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    const turu = byName.get("malzemeTuru");
    expect(turu?.["type"]).toBe("enum");
    expect(turu?.["enumRef"]).toBe("malzeme-turu");
    expect(byName.get("bayiNo")?.["length"]).toBe(13);
    expect(byName.get("adet")?.["type"]).toBe("decimal");
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":224');
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":225');
  });

  it("registers the malzeme-turu enum with the three guide codes (s.225)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "malzeme-turu");
    expect(e?.data["status"]).toBe("reviewed");
    expect(
      (e?.data["values"] as Array<{ code: string; label: string }>).map(
        (v) => v.label,
      ),
    ).toEqual(["SUT kodlu", "Emekli Sandigi Protokol kodlu", "Kodsuz malzeme"]);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":225');
  });

  it("registers TahlilBilgisiDVO with the gen-bilgisi placeholder (4.2.1.j, s.227-228)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TahlilBilgisiDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("istemYapanDrTescilNo")?.["required"]).toBe(true);
    expect(byName.get("istemYapanDrBrans")?.["length"]).toBe(4);
    expect(byName.get("genBilgisi")).toBeTruthy();
    expect(String(byName.get("genBilgisi")?.["description"])).toContain(
      "GenBilgisiDVO",
    );
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":227');
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(63);
    expect(manifest.counts.enums).toBe(19);
  });
});
