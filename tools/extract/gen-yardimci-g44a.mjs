/**
 * G44a generator: Yardimci Islemler search methods, guide pages 283-290 —
 * SaglikTesisiAra, DoktorAra, TakipAra, IlacAra + their DVOs (13) and two
 * code-list enums. Service WSDL verified on s.352-353 (yardimciIslemlerWS).
 * One-off extraction tool — run once, commit the output.
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
const enums = {
  "odenme-durumu": ENUM(
    "odenme-durumu",
    "Odenme Durumu",
    [
      ["1", "Odenir", "Reimbursed."],
      ["2", "Raporla Odenir", "Reimbursed with a report."],
      [
        "3",
        "Odenmez",
        "Not reimbursed (in the hospital application everything not equal to 3 is reimbursed).",
      ],
    ],
    288,
    "Used by both IlacListDVO.ayaktanOdenme and IlacListDVO.yatanOdenme (s.288).",
  ),
  "aktif-pasif": ENUM(
    "aktif-pasif",
    "Aktif / Pasif",
    [
      ["A", "Aktif", "Active."],
      ["P", "Pasif", "Passive."],
    ],
    288,
    "Used by IlacListDVO.eczAktifPasif (pharmacy) and IlacListDVO.hasAktifPasif (hospital) (s.288).",
  ),
};

// ── DVOs ──────────────────────────────────────────────────────────
const dvos = {
  "saglik-tesisi-ara-giris-dvo": {
    id: "SaglikTesisiAraGirisDVO",
    domain: "yardimci-islemler",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the facility calling the method (s.283).",
        283,
      ),
      FIELD(
        "saglikTesisAdi",
        "Tesis Adi",
        "string",
        false,
        100,
        "Searched facility name; partial-letter search supported (s.283).",
        283,
      ),
      FIELD(
        "tesisIlKodu",
        "Tesisin Il Kodu",
        "string",
        false,
        2,
        "Province code of the searched facility (s.283).",
        283,
      ),
      FIELD(
        "tesisKodu",
        "Tesis Kodu",
        "integer",
        false,
        null,
        "Facility code when known — the remaining fields are then fetched for it; otherwise empty (s.283).",
        283,
      ),
      FIELD(
        "tesisTuru",
        "Tesisin Turu",
        "string",
        false,
        2,
        "Facility type code; the type list lives in the FAQ section (s.283).",
        283,
      ),
    ],
  },
  "saglik-tesisi-ara-cevap-dvo": {
    id: "SaglikTesisiAraCevapDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.283) — this group uses the String 0000 pattern.',
        283,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description; the failure reason is stated here (s.284).",
        284,
      ),
      FIELD(
        "tesisler",
        "Tesis Bilgileri",
        "array",
        false,
        null,
        "Facilities; item shape Tablo 4.5.1.c (SaglikTesisiListDVO, this registry) (s.284).",
        284,
      ),
    ],
  },
  "saglik-tesisi-list-dvo": {
    id: "SaglikTesisiListDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "tesisIl",
        "Tesisin Il Kodu",
        "string",
        false,
        2,
        "Facility province code (s.284).",
        284,
      ),
      FIELD(
        "tesisAdi",
        "Tesis Adi",
        "string",
        false,
        100,
        "Facility name (s.284).",
        284,
      ),
      FIELD(
        "tesisKodu",
        "Tesisin Kodu",
        "integer",
        false,
        null,
        "Facility code (s.284).",
        284,
      ),
      FIELD(
        "tesisSinifKodu",
        "Tesis Sinif Kodu",
        "string",
        false,
        2,
        "Facility class code (s.284).",
        284,
      ),
      FIELD(
        "tesisTuru",
        "Tesisin Turu",
        "string",
        false,
        2,
        "Facility type code (s.284).",
        284,
      ),
      FIELD(
        "tesisIlAdi",
        "Tesisin Il Adi",
        "string",
        false,
        2,
        "Facility province name — the guide states length 2 for a NAME column, likely an extraction or guide-table artifact (s.284).",
        284,
      ),
      FIELD(
        "tesisIlceKodu",
        "Tesisin Ilce Kodu",
        "string",
        false,
        2,
        "Facility district code (s.284).",
        284,
      ),
      FIELD(
        "tesisIlceAdi",
        "Tesis Ilce Adi",
        "string",
        false,
        100,
        "Facility district name (s.284).",
        284,
      ),
      FIELD(
        "tesisTuruAdi",
        "Tesisin Tur Adi",
        "string",
        false,
        300,
        "Facility type name (s.284).",
        284,
      ),
    ],
  },
  "doktor-ara-giris-dvo": {
    id: "DoktorAraGirisDVO",
    domain: "yardimci-islemler",
    direction: "input",
    fields: [
      FIELD(
        "drAdi",
        "Doktor Adi",
        "string",
        false,
        30,
        "Searched physician first name (s.284).",
        284,
      ),
      FIELD(
        "drSoyadi",
        "Doktor Soyadi",
        "string",
        false,
        30,
        "Searched physician last name (s.285).",
        285,
      ),
      FIELD(
        "drBransKodu",
        "Doktor Uzmanlik Kodu",
        "string",
        false,
        4,
        "Searched physician branch code (s.285).",
        285,
      ),
      FIELD(
        "drDiplomaNo",
        "Doktor Diploma No",
        "string",
        false,
        20,
        "Searched physician diploma number (s.285).",
        285,
      ),
      FIELD(
        "drTescilNo",
        "Doktor Tescil No",
        "string",
        false,
        16,
        "Searched physician diploma registration number (s.285).",
        285,
      ),
      FIELD(
        "saglikTesisKodu",
        "Saglik Tesis Kodu",
        "integer",
        true,
        null,
        "GSS-assigned code of the calling facility (s.285).",
        285,
      ),
    ],
  },
  "doktor-ara-cevap-dvo": {
    id: "DoktorAraCevapDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.285).',
        285,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.285).",
        285,
      ),
      FIELD(
        "doktorlar",
        "Doktor Bilgileri",
        "array",
        false,
        null,
        "Physicians; item shape Tablo 4.5.2.c (DoktorListDVO, this registry) (s.285).",
        285,
      ),
    ],
  },
  "doktor-list-dvo": {
    id: "DoktorListDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "drAdi",
        "Doktor Adi",
        "string",
        false,
        30,
        "Physician first name (s.285).",
        285,
      ),
      FIELD(
        "drSoyadi",
        "Doktor Soyadi",
        "string",
        false,
        30,
        "Physician last name (s.285).",
        285,
      ),
      FIELD(
        "drDiplomaNo",
        "Doktor Diploma No",
        "string",
        false,
        20,
        "Physician diploma number (s.285).",
        285,
      ),
      FIELD(
        "drTescilNo",
        "Doktor Tescil No",
        "string",
        false,
        16,
        "Physician diploma registration number (s.285).",
        285,
      ),
    ],
  },
  "takip-ara-giris-dvo": {
    id: "TakipAraGirisDVO",
    domain: "yardimci-islemler",
    direction: "input",
    fields: [
      FIELD(
        "hastaTCK",
        "Hastanin TC Kimlik Numarasi",
        "string",
        true,
        11,
        "Patient citizen ID (s.286).",
        286,
        { sensitive: true },
      ),
      FIELD(
        "baslangicTarihi",
        "Takip Arama Baslangic Tarihi",
        "string",
        true,
        10,
        'Search-window start, "dd.mm.yyyy" (s.286).',
        286,
      ),
      FIELD(
        "bitisTarihi",
        "Takip Arama Bitis Tarihi",
        "string",
        true,
        10,
        'Search-window end, "dd.mm.yyyy"; guide note: the window may not exceed one month (s.286).',
        286,
      ),
      FIELD(
        "sevkDurumu",
        "Sevk Bildirimi Durumu",
        "enum",
        true,
        1,
        "E: referred notifications in the window across all facilities; H: the calling facility's own takips in the window (s.286).",
        286,
        { enumRef: "evet-hayir" },
      ),
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the searching facility (s.286).",
        286,
      ),
      FIELD(
        "ktsHbysKodu",
        "KTS HBYS Kodu",
        "string",
        true,
        null,
        "Software vendor KTS code (s.286).",
        286,
      ),
    ],
  },
  "takip-ara-cevap-dvo": {
    id: "TakipAraCevapDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.286).',
        286,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.286).",
        286,
      ),
      FIELD(
        "takipler",
        "Takip Bilgileri",
        "array",
        false,
        null,
        "Tracking records; item shape Tablo 4.1.2.b (TakipDVO, hasta-kabul group) (s.286).",
        286,
      ),
    ],
  },
  "ilac-ara-giris-dvo": {
    id: "IlacAraGirisDVO",
    domain: "yardimci-islemler",
    direction: "input",
    fields: [
      FIELD(
        "barkod",
        "Ilacin Barkod Numarasi",
        "string",
        false,
        13,
        "Drug barcode (s.287).",
        287,
        { codeSystem: "GS1" },
      ),
      FIELD(
        "ilacAdi",
        "Ilacin Adi",
        "string",
        false,
        50,
        "Drug name (s.287).",
        287,
      ),
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the searching facility (s.287).",
        287,
      ),
    ],
  },
  "ilac-ara-cevap-dvo": {
    id: "IlacAraCevapDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.287).',
        287,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.287).",
        287,
      ),
      FIELD(
        "ilaclar",
        "Ilac Bilgileri",
        "array",
        false,
        null,
        "Drugs; item shape Tablo 4.5.4.c (IlacListDVO, this registry) (s.287).",
        287,
      ),
    ],
  },
  "ilac-list-dvo": {
    id: "IlacListDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "ilacFiyatlari",
        "Ilac Fiyat Bilgisi",
        "array",
        false,
        null,
        "Price history; item shape Tablo 4.5.4.d (FiyatListDVO, this registry) (s.287).",
        287,
      ),
      FIELD(
        "ambalajToplamBirimMiktari",
        "Ilac Ambalaj Toplam Birim Miktari",
        "decimal",
        false,
        null,
        "Total unit quantity per package (s.287; renamed from kullanimBirimi per the 3.1.1 changelog s.7).",
        287,
      ),
      FIELD(
        "barkod",
        "Ilac Barkodu",
        "string",
        false,
        13,
        "Drug barcode (s.287).",
        287,
        { codeSystem: "GS1" },
      ),
      FIELD(
        "ilacAdi",
        "Ilac Adi",
        "string",
        false,
        50,
        "Drug name (s.288).",
        288,
      ),
      FIELD(
        "eczAktifPasif",
        "Eczane Aktiflik Bilgisi",
        "enum",
        false,
        1,
        "Pharmacy activity state (s.288).",
        288,
        { enumRef: "aktif-pasif" },
      ),
      FIELD(
        "hasAktifPasif",
        "Hastane Aktiflik Bilgisi",
        "enum",
        false,
        1,
        "Hospital activity state (s.288).",
        288,
        { enumRef: "aktif-pasif" },
      ),
      FIELD(
        "ayaktanOdenme",
        "Ayaktan Odeme Durumu",
        "enum",
        false,
        1,
        "Outpatient reimbursement state (s.288).",
        288,
        { enumRef: "odenme-durumu" },
      ),
      FIELD(
        "yatanOdenme",
        "Yatan Odeme Durumu",
        "enum",
        false,
        1,
        "Inpatient reimbursement state (s.288).",
        288,
        { enumRef: "odenme-durumu" },
      ),
      FIELD(
        "guncelKamuIndirimliFiyati",
        "Guncel Kamu Indirimli Fiyati",
        "decimal",
        false,
        null,
        "Current public discounted rate (s.288).",
        288,
      ),
      FIELD(
        "ilacIndirimDVO",
        "Ilac Indirim Oranlari",
        "array",
        false,
        null,
        "Discount rates; item shape Tablo 4.5.4.e (IlacIndirimDVO, this registry) (s.288).",
        288,
      ),
      FIELD(
        "yatanMaksimumKullanimPeriyot",
        "Yatan Maksimum Kullanim Periyoti",
        "integer",
        false,
        null,
        "Maximum usage period for inpatient takips (s.288).",
        288,
      ),
      FIELD(
        "yatanMaksimumKullanimPeriyotBirim",
        "Yatan Maksimum Kullanim Periyot Birimi",
        "integer",
        false,
        null,
        "Maximum usage period unit for inpatient takips (s.288).",
        288,
      ),
      FIELD(
        "yatanMaksimumKullanimDoz1",
        "Yatan Maksimum Kullanim Doz 1",
        "integer",
        false,
        null,
        "Maximum usage doze-1 multiplier for inpatient takips (s.288).",
        288,
      ),
      FIELD(
        "yatanMaksimumKullanimDoz2",
        "Yatan Maksimum Kullanim Doz 2",
        "decimal",
        false,
        null,
        "Maximum usage doze-2 multiplier for inpatient takips (s.288).",
        288,
      ),
      FIELD(
        "ayaktanMaksimumKullanimPeriyot",
        "Ayaktan Maksimum Kullanim Periyoti",
        "integer",
        false,
        null,
        "Maximum usage period for outpatient takips (s.288).",
        288,
      ),
      FIELD(
        "ayaktanMaksimumKullanimPeriyotBirim",
        "Ayaktan Maksimum Kullanim Periyot Birimi",
        "integer",
        false,
        null,
        "Maximum usage period unit for outpatient takips (s.288).",
        288,
      ),
      FIELD(
        "ayaktanMaksimumKullanimDoz1",
        "Ayaktan Maksimum Kullanim Doz 1",
        "integer",
        false,
        null,
        "Maximum usage doze-1 multiplier for outpatient takips (s.289).",
        289,
      ),
      FIELD(
        "ayaktanMaksimumKullanimDoz2",
        "Ayaktan Maksimum Kullanim Doz 2",
        "decimal",
        false,
        null,
        "Maximum usage doze-2 multiplier for outpatient takips (s.289).",
        289,
      ),
      FIELD(
        "esdegerGrupFiyati",
        "Esdeger Grup Fiyati",
        "decimal",
        false,
        null,
        "Price computed over the equivalent group (s.289).",
        289,
      ),
      FIELD(
        "esdegerKullanimBirimi",
        "Esdeger Kullanim Birimi",
        "decimal",
        false,
        null,
        "Usage unit computed over the equivalent group (s.289).",
        289,
      ),
      FIELD(
        "esdegerBarkod",
        "Esdeger Barkod",
        "string",
        false,
        null,
        "Barcode of the equivalent-group drug (s.289).",
        289,
        { codeSystem: "GS1" },
      ),
      FIELD(
        "farmasotikFormAdi",
        "Farmasotik Form",
        "string",
        false,
        null,
        "Pharmaceutical form name (s.289).",
        289,
      ),
    ],
  },
  "fiyat-list-dvo": {
    id: "FiyatListDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "fiyat",
        "Ilac Fiyat Bilgisi",
        "decimal",
        false,
        null,
        "Drug price; KDV-inclusive per the Health Ministry publication — discounts and KDV are subtracted from this figure during payment queries (s.289).",
        289,
      ),
      FIELD(
        "gecerlilikTarihi",
        "Ilac Gecerlilik Tarihi",
        "string",
        false,
        10,
        "Price validity date (s.289).",
        289,
      ),
    ],
  },
  "ilac-indirim-dvo": {
    id: "IlacIndirimDVO",
    domain: "yardimci-islemler",
    direction: "output",
    fields: [
      FIELD(
        "kamuIndOranAlt",
        "Kamu Indirim Alt Orani",
        "decimal",
        false,
        null,
        "Public discount lower rate (s.289).",
        289,
      ),
      FIELD(
        "kamuIndOranUst",
        "Kamu Indirim Ust Orani",
        "decimal",
        false,
        null,
        "Public discount upper rate (s.289).",
        289,
      ),
      FIELD(
        "gecerlilikTarihi",
        "Gecerlilik Tarihi",
        "string",
        false,
        10,
        "Validity date (s.289).",
        289,
      ),
      FIELD(
        "ilac_id",
        "Ilac Tekil Numarasi",
        "integer",
        false,
        null,
        "Drug unique id (s.290).",
        290,
      ),
      FIELD(
        "indirimOrani1",
        "Indirim Orani 1",
        "decimal",
        false,
        null,
        "Discount rate 1 (s.290).",
        290,
      ),
      FIELD(
        "indirimOrani2",
        "Indirim Orani 2",
        "decimal",
        false,
        null,
        "Discount rate 2 (s.290).",
        290,
      ),
      FIELD(
        "indirimOrani3",
        "Indirim Orani 3",
        "decimal",
        false,
        null,
        "Discount rate 3 (s.290).",
        290,
      ),
      FIELD(
        "indirimOrani4",
        "Indirim Orani 4",
        "decimal",
        false,
        null,
        'Discount rate 4; the guide\'s description column erroneously repeats "İndirim Oranı 3" (s.290).',
        290,
      ),
    ],
  },
};

// ── methods ───────────────────────────────────────────────────────
const METHOD = (slug, operationName, inputDvo, outputDvo, page, section) => ({
  id: `medula.hastane.yardimci-islemler.${slug}`,
  service: "medula.hastane.yardimci-islemler",
  names: {
    documentationHeading: operationName,
    operationName,
    aliases: [operationName],
  },
  contract: { inputDvo, outputDvo },
  sourceRefs: [{ ...GUIDE_REF(page), section: `4.5 ${section}` }],
  stateEffects: {
    creates: [],
    reads: [],
    updates: [],
    deletes: [],
    generates: [],
  },
  success: {
    resultCodeField: "sonucKodu",
    successCode: "0000",
    messageField: "sonucMesaji",
  },
  sandbox: { supported: false, defaultScenario: null },
  status: "reviewed",
});

const methods = {
  "saglik-tesisi-ara": METHOD(
    "saglik-tesisi-ara",
    "SaglikTesisiAra",
    "SaglikTesisiAraGirisDVO",
    "SaglikTesisiAraCevapDVO",
    283,
    "4.5.1 SaglikTesisiAra Metodu",
  ),
  "doktor-ara": METHOD(
    "doktor-ara",
    "DoktorAra",
    "DoktorAraGirisDVO",
    "DoktorAraCevapDVO",
    284,
    "4.5.2 DoktorAra Metodu",
  ),
  "takip-ara": METHOD(
    "takip-ara",
    "TakipAra",
    "TakipAraGirisDVO",
    "TakipAraCevapDVO",
    286,
    "4.5.3 TakipAra Metodu",
  ),
  "ilac-ara": METHOD(
    "ilac-ara",
    "IlacAra",
    "IlacAraGirisDVO",
    "IlacAraCevapDVO",
    287,
    "4.5.4 IlacAra Metodu",
  ),
};

// ── service ───────────────────────────────────────────────────────
const service = {
  id: "medula.hastane.yardimci-islemler",
  slug: "yardimci-islemler",
  displayName: "Yardimci Web Servis Metotlari",
  description:
    "Helper operations: facility, physician, tracking-record and drug searches, plus the remaining helper queries landing in G44b-c. The takip-ara search window may not exceed one month (s.286).",
  sourceRefs: [
    { ...GUIDE_REF(283), section: "4.5 Yardimci Web Servis Metotlari" },
  ],
  wsdl: {
    production: "wsdl.yardimci-islemler.production",
    test: "wsdl.yardimci-islemler.test",
  },
  methods: Object.keys(methods).map(
    (slug) => `medula.hastane.yardimci-islemler.${slug}`,
  ),
  status: "reviewed",
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
  write(`registry/dvos/yardimci-islemler/${name}.yml`, {
    ...dvo,
    sourceRefs: [
      { ...GUIDE_REF(283), section: "4.5 Yardimci Web Servis Metotlari" },
    ],
    status: "reviewed",
  });
}
for (const [slug, method] of Object.entries(methods)) {
  write(`registry/methods/yardimci-islemler/${slug}.yml`, method);
}
write("registry/services/yardimci-islemler.yml", service);

const manifestPath = resolve(ROOT, "sources/wsdl-manifest.yml");
const manifest = readFileSync(manifestPath, "utf8");
if (!manifest.includes("wsdl.yardimci-islemler.production")) {
  const addition = `

  - id: wsdl.yardimci-islemler.production
    service: yardimci-islemler
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/yardimciIslemlerWS?wsdl

  - id: wsdl.yardimci-islemler.test
    service: yardimci-islemler
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/yardimciIslemlerWS?wsdl
`;
  writeFileSync(manifestPath, manifest.replace(/\n$/, "\n") + addition, "utf8");
  console.log("appended yardimci wsdl entries to sources/wsdl-manifest.yml");
}
console.log("G44a generation complete");
