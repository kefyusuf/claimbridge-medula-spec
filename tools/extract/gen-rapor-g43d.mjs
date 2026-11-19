/**
 * G43d generator: rapor specialist report tables, guide pages 273-276 —
 * TeshisBilgisiDVO (4.4.1.v) and the seven treatment-specific tables
 * (Diyaliz w, ESWL x, ESWT y, FTR z, HOT aa, TupBebek bb, ESWLTas cc),
 * plus five new code-list enums. Completes section 4.4. One-off tool.
 */
import { readFileSync, writeFileSync, mkdirSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { stringify } from "yaml";

const ROOT = resolve(dirname(fileURLToPath(import.meta.url)), "../..");

const GUIDE_REF = (page) => ({
  id: "medula-hastane-guide-3-1-1-2026-10-19",
  sourceType: "official-guide",
  guideVersion: "3.1.1",
  page,
  confidence: "extracted",
});

const FIELD = (
  name,
  displayName,
  type,
  required,
  length,
  description,
  page,
  extra = {},
) => ({
  name,
  displayName,
  type,
  enumRef: extra.enumRef ?? null,
  codeSystem: extra.codeSystem ?? null,
  required,
  length,
  description,
  sensitive: extra.sensitive ?? false,
  syntheticOnlyRecommended: extra.syntheticOnly ?? false,
  sourceRefs: [
    { ...GUIDE_REF(page), ...(extra.notes ? { notes: extra.notes } : {}) },
  ],
  conditionalRequired: extra.conditionalRequired ?? [],
  introducedIn: "0.5.0",
  deprecatedIn: null,
});

const ENUM = (id, displayName, values, page, notes) => ({
  id,
  displayName,
  values: values.map(([code, label, description]) => ({
    code,
    label,
    description,
  })),
  sourceRefs: [{ ...GUIDE_REF(page), ...(notes ? { notes } : {}) }],
  status: "reviewed",
});

// ── enums ─────────────────────────────────────────────────────────
const VUCUT_12_23 = [
  ["12", "Sag Omuz Bolgesi", "Right shoulder region."],
  ["13", "Sol Omuz Bolgesi", "Left shoulder region."],
  ["14", "Sag Dirsek Bolgesi", "Right elbow region."],
  ["15", "Sol Dirsek Bolgesi", "Left elbow region."],
  ["16", "Sag El-El Bilegi Bolgesi", "Right hand-wrist region."],
  ["17", "Sol El-El Bilegi Bolgesi", "Left hand-wrist region."],
  ["18", "Sag Kalca Bolgesi", "Right hip region."],
  ["19", "Sol Kalca Bolgesi", "Left hip region."],
  ["20", "Sag Diz Bolgesi", "Right knee region."],
  ["21", "Sol Diz Bolgesi", "Left knee region."],
  ["22", "Sag Ayak-Ayak Bilegi Bolgesi", "Right foot-ankle region."],
  ["23", "Sol Ayak-Ayak Bilegi Bolgesi", "Left foot-ankle region."],
];

const enums = {
  "bobrek-tarafi": ENUM(
    "bobrek-tarafi",
    "Bobrek Tarafi",
    [
      ["1", "Sag Bobrek", "Right kidney."],
      ["2", "Sol Bobrek", "Left kidney."],
    ],
    273,
  ),
  "eswt-vucut-bolgesi": ENUM(
    "eswt-vucut-bolgesi",
    "ESWT Vucut Bolgesi",
    VUCUT_12_23,
    274,
  ),
  "ftr-vucut-bolgesi": ENUM(
    "ftr-vucut-bolgesi",
    "FTR Vucut Bolgesi",
    [
      [
        "1",
        "Yuz Bolgesi",
        "Face region (temporomandibular joint and facial nerve; right and left applications are reimbursed as one).",
      ],
      ["2", "Boyun Bolgesi", "Neck region (cervical application)."],
      ["3", "Sirt Bolgesi", "Back region (thoracic-dorsal applications)."],
      ["4", "Bel Bolgesi", "Lumbar region (lumbosacral applications)."],
      ...VUCUT_12_23,
      ["11", "Tum Vucut Bolgesi", "Whole-body region."],
    ],
    274,
    "Guide order preserved verbatim: the whole-body code 11 is listed AFTER codes 12-23 on s.275 — an ordering anomaly, not a registration choice.",
  ),
  "tup-bebek-turu": ENUM(
    "tup-bebek-turu",
    "Tup Bebek Turu",
    [
      [
        "1",
        "Bir hastaligin tedavisi amaciyla uygulanan tup bebek islemleri",
        "IVF performed for the treatment of a disease.",
      ],
      ["2", "Diger tup bebek tedavisi islemleri", "Other IVF procedures."],
    ],
    276,
  ),
  "tas-lokalizasyon": ENUM(
    "tas-lokalizasyon",
    "Tas Lokalizasyonu",
    [
      ["2", "Alt Ureter", "Lower ureter."],
      ["3", "Ust Ureter", "Upper ureter."],
      ["4", "Bobrek", "Kidney."],
    ],
    276,
    "The guide lists only codes 2-4; no code 1 exists in the published list.",
  ),
};

// ── DVOs ──────────────────────────────────────────────────────────
const dvos = {
  "teshis-bilgisi-dvo": {
    id: "TeshisBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "baslangicTarihi",
        "Rapor Baslangic Tarihi",
        "string",
        true,
        10,
        'Report start date, "dd.mm.yyyy" (s.273).',
        273,
      ),
      FIELD(
        "bitisTarihi",
        "Rapor Bitis Tarihi",
        "string",
        true,
        10,
        'Report end date, "dd.mm.yyyy" (s.273).',
        273,
      ),
      FIELD(
        "teshisKodu",
        "Teshis Kodu",
        "integer",
        true,
        null,
        "Report diagnosis code (s.273).",
        273,
      ),
    ],
  },
  "diyaliz-rapor-bilgisi-dvo": {
    id: "DiyalizRaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "refakatVarMi",
        "Refakat Var Mi",
        "enum",
        true,
        null,
        "Companion flag, E/H (s.273).",
        273,
        { enumRef: "evet-hayir" },
      ),
      FIELD(
        "seansGun",
        "Seans Gun Sayisi",
        "integer",
        true,
        null,
        "Session day count of the report (s.273).",
        273,
      ),
      FIELD(
        "seansSayi",
        "Seans Sayisi",
        "integer",
        true,
        null,
        "Session count of the report (s.273).",
        273,
      ),
      FIELD(
        "butKodu",
        "But Kodu",
        "string",
        true,
        null,
        "SUT procedure code (s.273).",
        273,
        { codeSystem: "SUT" },
      ),
    ],
  },
  "eswl-rapor-bilgisi-dvo": {
    id: "ESWLRaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "butKodu",
        "But Kodu",
        "string",
        true,
        null,
        "SUT procedure code (s.273).",
        273,
        { codeSystem: "SUT" },
      ),
      FIELD(
        "eswlRaporuTasSayisi",
        "Tas Sayisi",
        "integer",
        true,
        null,
        "Stone count of the report (s.273).",
        273,
      ),
      FIELD(
        "eswlRaporuSeansSayisi",
        "Seans Sayisi",
        "integer",
        true,
        null,
        "Session count of the report (s.273).",
        273,
      ),
      FIELD(
        "bobrekBilgisi",
        "Bobrek Tarafi",
        "enum",
        true,
        null,
        "Kidney side (s.273).",
        273,
        { enumRef: "bobrek-tarafi" },
      ),
      FIELD(
        "eswlRaporuTasBilgileri",
        "ESWL Raporu Tas Bilgileri",
        "array",
        true,
        null,
        "Stone details; item shape Tablo 4.4.1.cc (ESWLTasBilgisiDVO, this registry) (s.274).",
        274,
      ),
    ],
  },
  "eswt-rapor-bilgisi-dvo": {
    id: "ESWTRaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "eswtVucutBolgesiKodu",
        "ESWT Vucut Bolgesi Kodu",
        "enum",
        true,
        null,
        "Twelve-value body-region list (s.274).",
        274,
        { enumRef: "eswt-vucut-bolgesi" },
      ),
      FIELD(
        "seansGun",
        "Seans Gun Sayisi",
        "integer",
        true,
        null,
        "Session day count (s.274).",
        274,
      ),
      FIELD(
        "seansSayi",
        "Seans Sayisi",
        "integer",
        true,
        null,
        "Session count (s.274).",
        274,
      ),
      FIELD(
        "butKodu",
        "But Kodu",
        "string",
        true,
        null,
        "SUT procedure code (s.274).",
        274,
        { codeSystem: "SUT" },
      ),
    ],
  },
  "ftr-rapor-bilgisi-dvo": {
    id: "FTRRaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "ftrVucutBolgesiKodu",
        "FTR Vucut Bolgesi Kodu",
        "enum",
        true,
        null,
        "Seventeen-value body-region list; guide order preserved (11 listed last on s.275) (s.274-275).",
        274,
        { enumRef: "ftr-vucut-bolgesi" },
      ),
      FIELD(
        "seansGun",
        "Seans Gun Sayisi",
        "integer",
        true,
        null,
        "Session day count (s.275).",
        275,
      ),
      FIELD(
        "seansSayi",
        "Seans Sayisi",
        "integer",
        true,
        null,
        "Session count (s.275).",
        275,
      ),
      FIELD(
        "butKodu",
        "But Kodu",
        "string",
        true,
        null,
        "SUT procedure code (s.275).",
        275,
        { codeSystem: "SUT" },
      ),
      FIELD(
        "tedaviTuru",
        "Tedavi Turu",
        "enum",
        true,
        1,
        "A = Ayaktan, Y = Yatarak (s.275); binds the hasta-kabul group's tedavi-turu enum.",
        275,
        { enumRef: "tedavi-turu" },
      ),
      FIELD(
        "robotikRehabilitasyon",
        "Robotik Rehabilitasyon",
        "string",
        true,
        null,
        "Guide row carries NO length, value list or description — registered verbatim as an empty-description required string (s.275).",
        275,
      ),
    ],
  },
  "hot-rapor-bilgisi-dvo": {
    id: "HOTRaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "seansGun",
        "Seans Gun Sayisi",
        "integer",
        true,
        null,
        "Session day count (s.275).",
        275,
      ),
      FIELD(
        "seansSayi",
        "Seans Sayisi",
        "integer",
        true,
        null,
        "Session count (s.275).",
        275,
      ),
      FIELD(
        "tedaviSuresi",
        "Tedavi Suresi",
        "integer",
        true,
        null,
        "Report treatment duration (s.275).",
        275,
      ),
    ],
  },
  "tup-bebek-rapor-bilgisi-dvo": {
    id: "TupBebekRaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "tupBebekRaporTuru",
        "Tup Bebek Turu",
        "enum",
        true,
        null,
        "Disease-treatment vs other IVF procedures (s.276).",
        276,
        { enumRef: "tup-bebek-turu" },
      ),
      FIELD(
        "butKodu",
        "But Kodu",
        "string",
        true,
        null,
        "SUT procedure code (s.276).",
        276,
        { codeSystem: "SUT" },
      ),
    ],
  },
  "eswl-tas-bilgisi-dvo": {
    id: "ESWLTasBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "tasBoyutu",
        "Tas Boyut Bilgisi",
        "string",
        true,
        null,
        'Stone size in millimetres, e.g. "2x5" (s.276).',
        276,
      ),
      FIELD(
        "tasLokalizasyonKodu",
        "Tas Lokalizasyonu Kodu",
        "enum",
        true,
        null,
        "Stone localization; the published list has no code 1 (s.276).",
        276,
        { enumRef: "tas-lokalizasyon" },
      ),
    ],
  },
};

// ── emit ──────────────────────────────────────────────────────────
function write(rel, data) {
  const path = resolve(ROOT, rel);
  mkdirSync(dirname(path), { recursive: true });
  writeFileSync(path, stringify(data, { lineWidth: 0 }), "utf8");
  console.log("wrote", rel);
}

for (const [name, value] of Object.entries(enums)) {
  write(`registry/enums/${name}.yml`, value);
}
for (const [name, dvo] of Object.entries(dvos)) {
  write(`registry/dvos/rapor/${name}.yml`, {
    ...dvo,
    sourceRefs: [
      {
        ...GUIDE_REF(dvo.fields[0].sourceRefs[0].page),
        section: "4.4 Rapor Bilgisi Kayit Metotlari",
      },
    ],
    status: "reviewed",
  });
}
console.log("G43d generation complete");
