import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { beforeAll, describe, expect, it } from "vitest";
import { loadRegistry } from "../tools/src/loadRegistry.js";

const root = resolve(import.meta.dirname, "..");

type Registry = ReturnType<typeof loadRegistry>;

let reg: Registry;

beforeAll(() => {
  reg = loadRegistry(root);
});

describe("code lists 154-158 (Group 54)", () => {
  it("carries the four letter codes in istisnai-hal (s.158)", () => {
    const e = reg.enums.find((x) => x.data["id"] === "istisnai-hal");
    const values =
      (e?.data["values"] as Array<{
        code: string;
        label: string;
      }>) ?? [];
    expect(values.map((v) => v.code)).toEqual([
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
    const labelOf = (code: string) =>
      (values.find((v) => v.code === code)?.label ?? "").toLowerCase();
    expect(labelOf("I")).toContain("is kazasi");
    expect(labelOf("M")).toContain("meslek");
    expect(labelOf("B")).toContain("madde");
    expect(labelOf("V")).toContain("acil");
    expect(e?.data["status"]).toBe("reviewed");
  });

  it("keeps devredilen-kurum to the numeric s.154-156 list only", () => {
    const e = reg.enums.find((x) => x.data["id"] === "devredilen-kurum");
    const codes = (e?.data["values"] as Array<{ code: string }>).map(
      (v) => v.code,
    );
    // The I/M/B/V letter rows belong to istisnaiHal (s.158); they were
    // previously misattributed to this list by column-flow inference.
    expect(codes).toEqual([
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
    ]);
    expect(codes).not.toContain("I");
    expect(codes).not.toContain("M");
    expect(codes).not.toContain("B");
    expect(codes).not.toContain("V");
  });

  it("resolves the visual-pass backlog item in the page map", () => {
    const pageMap = readFileSync(
      resolve(root, "tools", "extract", "guide-page-map.md"),
      "utf8",
    );
    expect(pageMap).not.toContain("istisnaiHal and devredilenKurum code lists");
    expect(pageMap).toContain("G54");
    expect(pageMap.toLowerCase()).toContain("letter codes");
  });
});
