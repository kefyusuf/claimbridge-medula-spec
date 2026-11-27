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

describe("v0.2 catalog (Group 12)", () => {
  it("keeps sonuc-kodu to the guide-verified codes (0000 success; 9000 warning; EKDS codes stay out)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "sonuc-kodu");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual(["0000", "9000"]);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain(GUIDE_ID);
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain("no global");
  });

  it("registers the ekds-yontem-gerekce enum from s.167-168", () => {
    const e = reg.enums.find((x) => x.data["id"] === "ekds-yontem-gerekce");
    expect(e, "ekds-yontem-gerekce must exist").toBeTruthy();
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual([
      "10",
      "11",
      "12",
      "13",
      "20",
      "21",
      "30",
      "31",
      "32",
      "33",
      "34",
      "35",
      "99",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
    expect(JSON.stringify(e?.data["sourceRefs"])).toContain('"page":167');
    const labels = (
      e?.data["values"] as Array<{ code: string; label: string }>
    ).filter((v) => v.code === "30" || v.code === "99");
    expect(labels.map((v) => v.label)).toEqual([
      "Kisiye ait TCKK yaninda yok",
      "EKDS'den saglik sebebiyle muaftir",
    ]);
  });

  it("registers the istisnai-hal enum with the nine numeric and four letter guide codes (s.157-158)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "istisnai-hal");
    expect(e, "istisnai-hal must exist").toBeTruthy();
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toEqual([
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "I",
      "M",
      "B",
      "V",
    ]);
    expect(e?.data["status"]).toBe("reviewed");
    const refs = JSON.stringify(e?.data["sourceRefs"]);
    expect(refs).toContain('"page":157');
    expect(refs).toContain('"page":158');
  });

  it("adds ekdsYontemGerekce to ProvizyonGirisDVO and TakipDVO", () => {
    for (const id of ["ProvizyonGirisDVO", "TakipDVO"]) {
      const dvo = reg.dvos.find((d) => d.data["id"] === id);
      const fields = dvo?.data["fields"] as Array<Record<string, unknown>>;
      const field = fields.find((f) => f["name"] === "ekdsYontemGerekce");
      expect(field, `${id} must carry ekdsYontemGerekce`).toBeTruthy();
      expect(field?.["type"]).toBe("enum");
      expect(field?.["enumRef"]).toBe("ekds-yontem-gerekce");
      expect(JSON.stringify(field?.["sourceRefs"])).toContain(GUIDE_ID);
    }
  });

  it("updates the manifest counts for the two new enums", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.enums).toBe(81);
    expect(manifest.counts.dvos).toBe(212);
  });
});
