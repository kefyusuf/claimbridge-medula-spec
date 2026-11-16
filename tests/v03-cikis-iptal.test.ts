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

describe("v0.3 cikis-iptal + oku (Group 26)", () => {
  it("registers HastaCikisIptalDVO reusing the Cevap contract (4.1.5, s.169-170)", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "HastaCikisIptalDVO");
    expect(dvo?.data["status"]).toBe("reviewed");
    const names = (dvo?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "hastaBasvuruNo",
      "hastaCikisTarihi",
      "yeniHastaCikisTarihi",
      "saglikTesisKodu",
    ]);
    expect(byName(dvo).get("yeniHastaCikisTarihi")?.["required"]).toBe(false);
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":169');
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":170');
  });

  it("registers HastaYatisOku composites (4.1.6, s.170-171)", () => {
    const giris = reg.dvos.find((d) => d.data["id"] === "HastaYatisOkuDVO");
    expect(giris?.data["status"]).toBe("reviewed");
    expect(
      (giris?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["hastaBasvuruNo", "saglikTesisKodu"]);

    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "HastaYatisOkuCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    const names = (cevap?.data["fields"] as Array<Record<string, unknown>>).map(
      (f) => f["name"] as string,
    );
    expect(names).toEqual([
      "saglikTesisiKodu",
      "hastaBasvuruNo",
      "basvuruYatisBilgileri",
      "sonucKodu",
      "sonucMesaji",
      "yeniDoganDogumTarihi",
      "yeniDoganCocukSiraNo",
      "donorTck",
    ]);
    const refs = JSON.stringify(cevap?.data["sourceRefs"]);
    expect(refs).toContain('"page":170');
    expect(refs).toContain('"page":171');
  });

  it("registers BasvuruYatisBilgileriDVO with the faturalanma durumu (4.1.6.c, s.171)", () => {
    const dvo = reg.dvos.find(
      (d) => d.data["id"] === "BasvuruYatisBilgileriDVO",
    );
    expect(dvo?.data["status"]).toBe("reviewed");
    const byName = new Map(
      (dvo?.data["fields"] as Array<Record<string, unknown>>).map((f) => [
        f["name"] as string,
        f,
      ]),
    );
    expect(byName.get("durum")?.["length"]).toBe(1);
    expect(String(byName.get("durum")?.["description"])).toContain(
      "Faturalanmis",
    );
    expect(JSON.stringify(dvo?.data["sourceRefs"])).toContain('"page":171');
  });

  it("registers BasvuruTakip composites (4.1.7, s.171-172)", () => {
    const giris = reg.dvos.find((d) => d.data["id"] === "BasvuruTakipOkuDVO");
    expect(giris?.data["status"]).toBe("reviewed");
    const cevap = reg.dvos.find(
      (d) => d.data["id"] === "BasvuruTakipOkuCevapDVO",
    );
    expect(cevap?.data["status"]).toBe("reviewed");
    const takip = reg.dvos.find((d) => d.data["id"] === "BasvuruTakipDVO");
    expect(takip?.data["status"]).toBe("reviewed");
    expect(
      (takip?.data["fields"] as Array<Record<string, unknown>>).map(
        (f) => f["name"],
      ),
    ).toEqual(["takipNo", "takipFaturaDurumu"]);
    expect(
      String(byName(takip).get("takipFaturaDurumu")?.["description"]),
    ).toContain("faturalanmis");
  });

  it("resolves the three contracts and corrects the basvuru operation name", () => {
    const iptal = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.hasta-cikis-iptal",
    );
    expect(iptal?.data["contract"]).toEqual({
      inputDvo: "HastaCikisIptalDVO",
      outputDvo: "HastaCikisCevapDVO",
    });
    expect(iptal?.data["status"]).toBe("reviewed");

    const yatis = reg.methods.find(
      (x) => x.data["id"] === "medula.hastane.hasta-kabul.hasta-yatis-oku",
    );
    expect(yatis?.data["contract"]).toEqual({
      inputDvo: "HastaYatisOkuDVO",
      outputDvo: "HastaYatisOkuCevapDVO",
    });
    expect(yatis?.data["status"]).toBe("reviewed");

    const basvuru = reg.methods.find(
      (x) =>
        x.data["id"] ===
        "medula.hastane.hasta-kabul.basvuru-altindaki-takipleri-oku",
    );
    expect(basvuru?.data["contract"]).toEqual({
      inputDvo: "BasvuruTakipOkuDVO",
      outputDvo: "BasvuruTakipOkuCevapDVO",
    });
    expect(basvuru?.data["status"]).toBe("reviewed");
    const names = JSON.stringify(basvuru?.data["names"]);
    expect(names).toContain("BasvuruAltindakiTakipleriOku");
    expect(names).toContain("BasvuruTakipOku");
  });

  it("updates the manifest counts", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.dvos).toBe(59);
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
