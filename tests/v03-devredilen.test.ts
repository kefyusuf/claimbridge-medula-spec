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

describe("v0.3 devredilen-kurum (Group 36)", () => {
  it("registers the devredilen-kurum enum with the 34 guide codes (s.154-158)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "devredilen-kurum");
    expect(e, "devredilen-kurum must exist").toBeTruthy();
    expect(e?.data["status"]).toBe("reviewed");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    expect(codes).toHaveLength(35);
    for (const c of [
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "10",
      "12",
      "14",
      "15",
      "17",
      "18",
      "19",
      "20",
      "21",
      "22",
      "23",
      "25",
      "26",
      "27",
      "28",
      "31",
      "32",
      "97",
      "98",
      "99",
      "100",
      "147",
      "148",
      "149",
      "I",
      "M",
      "B",
      "V",
    ]) {
      expect(codes, `missing devredilenKurum code ${c}`).toContain(c);
    }
    const refs = JSON.stringify(e?.data["sourceRefs"]);
    expect(refs).toContain('"page":155');
    expect(refs).toContain('"page":156');
    expect(refs).toContain('"page":158');
  });

  it("keeps the guide-anchored spot checks", () => {
    const e = reg.enums.find((x) => x.data["id"] === "devredilen-kurum");
    const byCode = new Map(
      (e?.data["values"] as Array<{ code: string; label: string }>).map((v) => [
        v.code,
        v.label,
      ]),
    );
    expect(byCode.get("1")).toBe("SSK");
    expect(byCode.get("3")).toBe("Emekli Sandigi");
    expect(byCode.get("100")).toBe(
      "8105 CK Kapsaminda Ozel Duzenlemeye Tabi Kisiler",
    );
    expect(byCode.get("I")).toBe("Is kazasi");
    expect(byCode.get("V")).toBe("Acil Hal");
  });

  it("binds ProvizyonGirisDVO devredilenKurum to the enum", () => {
    const dvo = reg.dvos.find((d) => d.data["id"] === "ProvizyonGirisDVO");
    const devredilen = (
      dvo?.data["fields"] as Array<Record<string, unknown>>
    ).find((f) => f["name"] === "devredilenKurum");
    expect(devredilen?.["type"]).toBe("enum");
    expect(devredilen?.["enumRef"]).toBe("devredilen-kurum");
  });

  it("updates the manifest enum count", () => {
    const manifest = JSON.parse(
      readFileSync(resolve(root, "dist", "manifest.json"), "utf8"),
    ) as { counts: Record<string, number> };
    expect(manifest.counts.enums).toBe(23);
    expect(manifest.counts.dvos).toBe(70);
  });
});
