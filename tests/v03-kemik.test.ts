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

describe("v0.3 kemik-iligi (Group 28)", () => {
  it("registers KemikIligiKabul composites from Tablo 4.1.16.a/b (s.180)", () => {
    const giris = reg.dvos.find((d) => d.data["id"] === "KemikIligiKabulDVO");
    expect(giris?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("hastaTcNo")?.["length"]).toBe(11);
    expect(byName.get("islemKodu")?.["length"]).toBe(10);
    expect(byName.get("islemKodu")?.["required"]).toBe(true);
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiKabulCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    const cevapByName = new Map(
      (cevap?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(cevapByName.get("bildirimNo")?.["type"]).toBe("integer");
    const refs = JSON.stringify(giris?.data["sourceRefs"]);
    expect(refs).toContain('"page":180');
  });

  it("registers KemikIligiIptal composites from Tablo 4.1.17.a/b (s.181)", () => {
    const giris = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiIptalGirisDVO",
    );
    expect(giris?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("bildirimNo")?.["required"]).toBe(true);
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "KemikIligiIptalCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    expect(
      (cevap?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["hastaTcNo", "sonucKodu", "sonucMesaji"]);
    expect(JSON.stringify(giris?.data["sourceRefs"])).toContain('"page":181');
  });

  it("resolves the kemik-iligi kabul and iptal contracts", () => {
    const kabul = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.kemik-iligi-kabul",
    );
    expect(kabul?.data["contract"]).toEqual({
      inputDvo: "KemikIligiKabulDVO",
      outputDvo: "KemikIligiKabulCevapDVO",
    });
    expect(kabul?.data["status"]).toBe("reviewed");
    const iptal = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.kemik-iligi-iptal",
    );
    expect(iptal?.data["contract"]).toEqual({
      inputDvo: "KemikIligiIptalGirisDVO",
      outputDvo: "KemikIligiIptalCevapDVO",
    });
    expect(iptal?.data["status"]).toBe("reviewed");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(70);
    expect(manifest.counts.methods).toBe(25);
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
