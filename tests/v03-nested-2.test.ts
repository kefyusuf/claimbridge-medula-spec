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

describe("v0.3 nested 2 (Group 22)", () => {
  it("registers MajistralHamMaddeDVO from Tablo 4.2.1.f.1.1 (s.201)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "MajistralHamMaddeDVO");
    expect(dvo, "MajistralHamMaddeDVO must exist").toBeTruthy();
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("majistralHamMaddeKodu")?.["required"]).toBe(true);
    expect(byName.get("miktar")?.["type"]).toBe("integer");
    expect(byName.get("hamMaddeBirimi")?.["enumRef"]).toBe("ham-madde-birimi");
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":201');
  });

  it("registers the ham-madde-birimi enum (s.201)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "ham-madde-birimi");
    expect(e?.data["status"]).toBe("reviewed");
    expect(
      (e?.data["values"] as Array<{ code: string; label: string }>).map(
        (v) => v.label,
      ),
    ).toEqual(["Gram", "Miligram"]);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":201');
  });

  it("registers GenBilgisiDVO and IslemDetayDVO as compact records", () => {
    const gen = reg.dvos.find((d) => d.data["id"] === "GenBilgisiDVO");
    expect(gen?.data["status"]).toBe("reviewed");
    expect(
      (gen?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["genKodu"]);
    expect(JSON.stringify(gen?.data["sourceRefs"])).toContain('"page":231');

    const islem = reg.dvos.find((d) => d.data["id"] === "IslemDetayDVO");
    expect(islem?.data["status"]).toBe("reviewed");
    expect(
      (islem?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["islemSiraNo", "islemTutari"]);
    expect(JSON.stringify(islem?.data["sourceRefs"])).toContain('"page":243');
  });

  it("enriches TahlilBilgisiDVO with the s.231 tail fields", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "TahlilBilgisiDVO");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    for (const name of [
      "tahlilTipi",
      "birim",
      "sagSol",
      "ayniFarkliKesi",
      "aciklama",
    ]) {
      expect(byName.has(name), `missing field ${name}`).toBe(true);
    }
    expect(byName.get("tahlilTipi")?.["length"]).toBe(6);
    expect(byName.get("ayniFarkliKesi")?.["enumRef"]).toBe("ayni-farkli-kesi");
    expect(JSON.stringify(byName.get("birim")?.["sourceRefs"])).toContain(
      '"page":231',
    );
  });

  it("resolves the remaining nested placeholders and adds eklenenIlaclar", () => {
    const maj = reg.dvos.find((d) => d.data["id"] === "MajistralIlacDVO");
    const majByName = new Map(
      (maj?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    const ham = majByName.get("hamMaddeler");
    expect(String(ham?.["description"])).toContain(
      "MajistralHamMaddeDVO registry entity",
    );
    expect(majByName.get("eklenenIlaclar")).toBeTruthy();

    const tahlil = reg.dvos.find((d) => d.data["id"] === "TahlilBilgisiDVO");
    const gen = byName(tahlil).get("genBilgisi");
    expect(String(gen?.["description"])).toContain(
      "GenBilgisiDVO registry entity",
    );

    const detay = reg.dvos.find((d) => d.data["id"] === "FaturaCevapDetayDVO");
    const islem = byName(detay).get("islemDetaylari");
    expect(String(islem?.["description"])).toContain(
      "IslemDetayDVO registry entity",
    );
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(42);
    expect(manifest.counts.enums).toBe(19);
  });
});

function byName(dvo?: {
  data: Record<string, unknown>;
}): Map<string, Record<string, unknown>> {
  return new Map(
    ((dvo?.data["fields"] as Array<Record<string, unknown>>) ?? []).map((f) => [
      f["name"] as string,
      f,
    ]),
  );
}
