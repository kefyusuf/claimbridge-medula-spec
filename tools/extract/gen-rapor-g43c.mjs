/**
 * G43c generator: remaining rapor report-branch composites, guide pages
 * 257-267 + 276-277. Six typed report branches (MeslekHastaligi, Analik,
 * Emzirme, Ilac, Tedavi, Hastalik), the shared RaporDVO (4.4.1.k), the
 * small composites (HastaYatis/Cocuk/Malzeme/TedaviIslem/BransGorus) and
 * IsgoremezlikRaporEkDVO — plus nine new code-list enums and the
 * IsKazasiRaporDVO completion missed in G43b. One-off tool.
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
  "nor-sez-for": ENUM(
    "nor-sez-for",
    "Dogum Cesidi",
    [
      ["1", "Normal", "Natural birth."],
      ["2", "Sezeryan", "Caesarean birth."],
      ["3", "Forsebs", "Forceps birth."],
    ],
    259,
    "Parameter name row-wrapped (norSezFor / Forsebs) in the guide; the three-value list is authoritative.",
  ),
  "aktarma-rapor": ENUM(
    "aktarma-rapor",
    "Aktarma Raporu Var Mi",
    [
      ["1", "Evet", "Transfer report exists."],
      ["2", "Hayir", "No transfer report."],
    ],
    260,
  ),
  "analik-rapor-tipi": ENUM(
    "analik-rapor-tipi",
    "Analik Rapor Tipi",
    [
      ["1", "Dogum Oncesi Analik Raporu", "Pre-birth maternity report."],
      ["2", "Dogum Sonrasi Analik Raporu", "Post-birth maternity report."],
    ],
    260,
  ),
  "gebelik-tipi": ENUM(
    "gebelik-tipi",
    "Gebelik Tipi",
    [
      ["1", "Tekil", "Single pregnancy."],
      ["2", "Cogul", "Multiple pregnancy."],
    ],
    260,
  ),
  cinsiyet: ENUM(
    "cinsiyet",
    "Cinsiyet",
    [
      ["K", "Kiz", "Girl."],
      ["E", "Erkek", "Boy."],
    ],
    266,
  ),
  "tedavi-rapor-turu": ENUM(
    "tedavi-rapor-turu",
    "Tedavi Rapor Turu",
    [
      ["1", "Diyaliz", "Dialysis."],
      ["2", "Hiperbarik Oksijen Tedavisi", "Hyperbaric oxygen therapy."],
      ["3", "ESWT", "Extracorporeal shockwave therapy."],
      ["4", "Tupbebek Tedavisi", "IVF treatment."],
      [
        "5",
        "Fizik Tedavi ve Rehabilitasyon",
        "Physical therapy and rehabilitation.",
      ],
      ["6", "ESWL", "Extracorporeal shockwave lithotripsy."],
      [
        "7",
        "Fizik Tedavi ve Rehabilitasyon - Trafik Kazasi",
        "Physical therapy — traffic accident.",
      ],
      ["8", "Ev Hemodiyalizi", "Home haemodialysis."],
      ["9", "Pulmoner Rehabilitasyon", "Pulmonary rehabilitation."],
    ],
    262,
  ),
  "calisma-durumu": ENUM(
    "calisma-durumu",
    "Rapor Durumu (Calisir / Kontrol)",
    [
      ["1", "Calisir", "Fit to work."],
      ["2", "Kontrol", "Under control examination."],
    ],
    256,
    "Recurring two-value list across the incapacity branches (IsKazasiRaporDVO s.256, MeslekHastaligiRaporDVO s.258, AnalikRaporDVO s.259, HastalikRaporDVO s.262); mandatory when there was hospitalization.",
  ),
  "nuks-durumu": ENUM(
    "nuks-durumu",
    "Nuks Durumu",
    [
      ["1", "Nuks Var", "Relapse present."],
      ["2", "Nuks Yok", "No relapse."],
    ],
    257,
    "Recurring across IsKazasiRaporDVO (s.257), MeslekHastaligiRaporDVO (s.258) and HastalikRaporDVO (s.263); the illness branch gives no length.",
  ),
  "evet-hayir": ENUM(
    "evet-hayir",
    "Evet / Hayir",
    [
      ["E", "Evet", "Yes."],
      ["H", "Hayir", "No."],
    ],
    276,
    "Generic E/H flag used by hastaYatisVarMi and kontrolMu on IsgoremezlikRaporEkDVO (s.276). The hasta-kabul group models its E/H fields as plain strings — the rapor group binds them.",
  ),
  "ek-durumu": ENUM(
    "ek-durumu",
    "Rapor Ek Durumu",
    [
      ["1", "Ilk", "Initial report."],
      ["2", "Ek", "Attachment report."],
    ],
    276,
  ),
};

// ── shared snippet helpers ────────────────────────────────────────
const INCAPACITY_DATES = (startPage) => [
  FIELD(
    "baslangicTarihi",
    "Baslangic Tarihi",
    "string",
    false,
    10,
    'Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.' +
      (startPage + 1) +
      ").",
    startPage + 1,
  ),
  FIELD(
    "bitisTarihi",
    "Bitis Tarihi",
    "string",
    false,
    10,
    'End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.' +
      (startPage + 1) +
      ").",
    startPage + 1,
  ),
  FIELD(
    "raporDurumu",
    "Rapor Durumu",
    "enum",
    false,
    1,
    "Fit-to-work or control state; mandatory when there was hospitalization (s." +
      (startPage + 1) +
      ").",
    startPage + 1,
    { enumRef: "calisma-durumu" },
  ),
  FIELD(
    "isKontTarihi",
    "Isbasi / Kontrol Tarihi",
    "string",
    true,
    10,
    'Return-to-work or control date, "dd.mm.yyyy" (s.' + (startPage + 1) + ").",
    startPage + 1,
  ),
  FIELD(
    "hastaneYatisTarihi",
    "Hastane Yatis Tarihi",
    "string",
    false,
    10,
    'Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.' +
      (startPage + 1) +
      ").",
    startPage + 1,
  ),
  FIELD(
    "hastaneCikisTarihi",
    "Hastane Cikis Tarihi",
    "string",
    false,
    10,
    'Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.' +
      (startPage + 1) +
      ").",
    startPage + 1,
  ),
];

const TABURCU = (page) =>
  FIELD(
    "taburcuKodu",
    "Taburcu Kodu",
    "enum",
    false,
    null,
    "Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s." +
      page +
      ").",
    page,
    { enumRef: "taburcu-kodu" },
  );

const YATIS_DEVAM_3 = (page) =>
  FIELD(
    "yatisDevam",
    "Yatis Devam",
    "enum",
    true,
    1,
    "Hospitalization state; three-value list shared with the work-accident branch (s." +
      page +
      ").",
    page,
    { enumRef: "yatis-devam-is-kazasi" },
  );

const YARANIN = (page) => [
  FIELD(
    "yaraninTuru",
    "Yaranin Turu",
    "string",
    false,
    null,
    'Wound type; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.' +
      page +
      ").",
    page,
  ),
  FIELD(
    "yaraninYeri",
    "Yaranin Yeri",
    "string",
    false,
    null,
    'Wound site; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.' +
      page +
      ").",
    page,
  ),
];

// ── DVOs ──────────────────────────────────────────────────────────
const dvos = {
  "meslek-hastaligi-rapor-dvo": {
    id: "MeslekHastaligiRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      ...INCAPACITY_DATES(257),
      FIELD(
        "nuks",
        "Nuks Durumu",
        "enum",
        false,
        1,
        "Relapse status (s.258).",
        258,
        { enumRef: "nuks-durumu" },
      ),
      YATIS_DEVAM_3(258),
      ...YARANIN(258),
      FIELD(
        "taburcuTarihi",
        "Taburcu Tarihi",
        "string",
        false,
        10,
        'Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.258).',
        258,
      ),
      TABURCU(258),
      FIELD(
        "isKazasiTarihi",
        "Is Kazasi Tarihi",
        "string",
        false,
        10,
        "Work-accident date; present here too, mirroring IsKazasiRaporDVO (s.258-259 table continuation).",
        258,
      ),
    ],
  },
  "analik-rapor-dvo": {
    id: "AnalikRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      ...INCAPACITY_DATES(259),
      FIELD(
        "bebekDogumTarihi",
        "Bebek Dogum Tarihi",
        "string",
        true,
        10,
        'Birth date of the child, "dd.mm.yyyy" (s.259).',
        259,
      ),
      FIELD(
        "dogumOncBasTarihi",
        "Aktarma Raporunun Baslayacagi Zaman",
        "string",
        true,
        10,
        'Start of the transferred report period, "dd.mm.yyyy" (s.259).',
        259,
      ),
      FIELD(
        "canliCocukSayisi",
        "Canli Cocuk Sayisi",
        "integer",
        false,
        null,
        "Children alive after the birth (s.259).",
        259,
      ),
      FIELD(
        "doganCocukSayisi",
        "Dogan Cocuk Sayisi",
        "integer",
        false,
        null,
        "Children delivered (s.259).",
        259,
      ),
      FIELD(
        "norSezFor",
        "Dogum Cesidi",
        "enum",
        true,
        1,
        "Birth type: Normal / Sezeryan / Forsebs (s.259).",
        259,
        { enumRef: "nor-sez-for" },
      ),
      YATIS_DEVAM_3(260),
      FIELD(
        "aktarmaRaporVarmi",
        "Aktarma Raporu Varmi",
        "enum",
        true,
        1,
        "Transfer-report flag (s.260).",
        260,
        { enumRef: "aktarma-rapor" },
      ),
      FIELD(
        "aktarmaRaporTarihi",
        "Aktarma Rapor Tarihi",
        "string",
        true,
        10,
        'Date of the week-32 doctor control, "dd.mm.yyyy" (s.260).',
        260,
      ),
      FIELD(
        "gebelikHaftasi",
        "Gebelik Haftasi",
        "integer",
        false,
        null,
        "Pregnancy week at the time of the report (s.260).",
        260,
      ),
      FIELD(
        "taburcuTarihi",
        "Taburcu Tarihi",
        "string",
        false,
        10,
        'Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.260).',
        260,
      ),
      TABURCU(260),
      FIELD(
        "analikRaporTipi",
        "Analik Rapor Tipi",
        "enum",
        false,
        null,
        "Pre-birth or post-birth maternity report (s.260).",
        260,
        { enumRef: "analik-rapor-tipi" },
      ),
      FIELD(
        "gebelikTipi",
        "Gebelik Tipi",
        "enum",
        false,
        null,
        "Single or multiple pregnancy (s.260).",
        260,
        { enumRef: "gebelik-tipi" },
      ),
      FIELD(
        "gebelikHaftasi1",
        "Gebelik Haftasi 1",
        "integer",
        false,
        null,
        "Week at the pre-birth report visit, typically 32 (s.260).",
        260,
      ),
      FIELD(
        "gebelikHaftasi2",
        "Gebelik Haftasi 2",
        "integer",
        false,
        null,
        "Week until which work may continue when the pre-birth report is issued as fit, typically 37 (s.260).",
        260,
      ),
      FIELD(
        "bebekDogumHaftasi",
        "Bebek Dogum Haftasi",
        "integer",
        false,
        null,
        "Week of the birth, typically 40 (s.261).",
        261,
      ),
      FIELD(
        "aktarmaHaftasi",
        "Aktarma Haftasi",
        "integer",
        false,
        null,
        "Weeks transferred from the pre-birth leave to the post-birth period; system-calculated (s.261).",
        261,
      ),
    ],
  },
  "emzirme-rapor-dvo": {
    id: "EmzirmeRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "bebekDogumTarihi",
        "Bebek Dogum Tarihi",
        "string",
        true,
        10,
        'Birth date of the child, "dd.mm.yyyy" (s.261).',
        261,
      ),
      FIELD(
        "dogumOncBasTarihi",
        "Aktarma Raporunun Baslayacagi Zaman",
        "string",
        true,
        10,
        'Start of the transferred report period, "dd.mm.yyyy" (s.261).',
        261,
      ),
      FIELD(
        "canliCocukSayisi",
        "Canli Cocuk Sayisi",
        "integer",
        false,
        null,
        "Children alive after the birth (s.261).",
        261,
      ),
      FIELD(
        "anneTcKimlikNo",
        "Annenin TC Kimlik Numarasi",
        "string",
        false,
        11,
        "Mother's citizen ID when the nursing report is issued on behalf of the father (s.261).",
        261,
        { sensitive: true },
      ),
      FIELD(
        "doganCocukSayisi",
        "Dogan Cocuk Sayisi",
        "integer",
        false,
        null,
        "Children delivered (s.261).",
        261,
      ),
    ],
  },
  "ilac-rapor-dvo": {
    id: "IlacRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "raporDVO",
        "Rapor Bilgileri",
        "object",
        true,
        null,
        "Report core; shape Tablo 4.4.1.k (RaporDVO, this registry).",
        261,
      ),
      FIELD(
        "raporEtkinMaddeler",
        "Rapor Etkin Maddeleri",
        "array",
        false,
        null,
        "Active ingredients; item shape Tablo 4.4.1.ff (RaporEtkinMaddeDVO, this registry). The required column is not visible in the text extraction (s.261).",
        261,
      ),
      FIELD(
        "takipFormuNo",
        "Takip Formu Numarasi",
        "string",
        false,
        null,
        "Follow-up form number when the drug report is filed with a diabetes diagnosis (s.261).",
        261,
      ),
    ],
  },
  "tedavi-rapor-dvo": {
    id: "TedaviRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "raporDVO",
        "Rapor Bilgileri",
        "object",
        true,
        null,
        "Report core; shape Tablo 4.4.1.k (RaporDVO, this registry).",
        261,
      ),
      FIELD(
        "islemler",
        "Tedavi Islem Bilgileri",
        "array",
        true,
        null,
        "Treatment procedures; only the object matching tedaviRaporTuru is populated, the rest NULL; item shape Tablo 4.4.1.o (TedaviIslemBilgisiDVO, this registry) (s.262).",
        262,
      ),
      FIELD(
        "tedaviRaporTuru",
        "Tedavi Rapor Turu",
        "enum",
        true,
        null,
        "Nine-value treatment type list (s.262).",
        262,
        { enumRef: "tedavi-rapor-turu" },
      ),
    ],
  },
  "hastalik-rapor-dvo": {
    id: "HastalikRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      ...INCAPACITY_DATES(262),
      FIELD(
        "nuks",
        "Nuks",
        "enum",
        false,
        null,
        "Relapse status; no length given in the illness branch (s.263).",
        263,
        { enumRef: "nuks-durumu" },
      ),
      YATIS_DEVAM_3(263),
      FIELD(
        "taburcuTarihi",
        "Taburcu Tarihi",
        "string",
        false,
        10,
        'Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.263).',
        263,
      ),
      TABURCU(263),
    ],
  },
  "rapor-dvo": {
    id: "RaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "raporBilgisi",
        "Rapor Bilgisi",
        "object",
        true,
        null,
        "Report key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry).",
        263,
      ),
      FIELD(
        "turu",
        "Raporun Turu",
        "enum",
        true,
        1,
        "Report type (s.263-264).",
        263,
        { enumRef: "rapor-turu" },
      ),
      FIELD(
        "baslangicTarihi",
        "Rapor Baslangic Tarihi",
        "string",
        false,
        10,
        'Report start date, "dd.mm.yyyy"; guide: Evet for all reports except prosthesis and fit-to-work-before-birth (s.264).',
        264,
        {
          conditionalRequired: [
            {
              condition:
                "the report is not a prosthesis or fit-to-work-before-birth report",
              note: "guide: Protez ve Doğum öncesi çalışabilir raporu dışında kalan tüm raporlar için Evet (s.264)",
            },
          ],
        },
      ),
      FIELD(
        "bitisTarihi",
        "Rapor Bitis Tarihi",
        "string",
        false,
        10,
        'Report end date, "dd.mm.yyyy"; same exception rule (s.264).',
        264,
        {
          conditionalRequired: [
            {
              condition:
                "the report is not a prosthesis or fit-to-work-before-birth report",
              note: "guide: Protez raporu ve Doğum öncesi çalışabilir raporu dışında kalan tüm raporlar için Evet (s.264)",
            },
          ],
        },
      ),
      FIELD(
        "duzenlemeTuru",
        "Rapor Duzenleme Turu",
        "enum",
        true,
        1,
        "Issuing style (s.264).",
        264,
        { enumRef: "rapor-duzenleme-turu" },
      ),
      FIELD(
        "hakSahibi",
        "Hak Sahibi Bilgisi",
        "object",
        true,
        null,
        "Beneficiary; shape Tablo 4.4.1.s (HakSahibiBilgisiDVO, this registry); NULL when TakipNoileRaporBilgisiKaydet is used — resolved from the tracking number (s.264).",
        264,
        {
          conditionalRequired: [
            {
              condition: "TakipNoileRaporBilgisiKaydet is used",
              note: "guide: bu alan NULL olarak gönderilmelidir (s.264)",
            },
          ],
        },
      ),
      FIELD(
        "protokolNo",
        "Protokol Numarasi",
        "string",
        false,
        20,
        "Report protocol number (s.264).",
        264,
      ),
      FIELD(
        "protokolTarihi",
        "Protokol Tarihi",
        "string",
        false,
        10,
        'Report protocol date, "dd.mm.yyyy" (s.264).',
        264,
      ),
      FIELD(
        "durum",
        "Rapor Durumu",
        "string",
        false,
        1,
        "Sent empty; value list contains 1 = Taslak (draft) (s.264).",
        264,
      ),
      FIELD(
        "aciklama",
        "Aciklama",
        "string",
        false,
        5000,
        "Report description (s.264).",
        264,
      ),
      FIELD(
        "doktorlar",
        "Doktor Bilgileri",
        "array",
        true,
        null,
        "Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry); sent as an array (s.264).",
        264,
      ),
      FIELD(
        "tanilar",
        "Tani Bilgileri",
        "array",
        false,
        null,
        "Diagnoses; item shape Tablo 4.4.1.u (TaniBilgisiDVO, hizmet-kayit group); NOT sent for drug reports (s.264).",
        264,
      ),
      FIELD(
        "teshisler",
        "Teshis Bilgileri",
        "array",
        false,
        null,
        "Diagnosis details; item shape Tablo 4.4.1.v (TeshisBilgisiDVO) — deferred to G43d; NOT sent for drug reports (s.264).",
        264,
      ),
      FIELD(
        "ilacTeshisler",
        "Ilac Teshis Bilgileri",
        "array",
        false,
        null,
        "Drug diagnoses; item shape Tablo 4.4.1.gg (IlacTeshisBilgiDVO, this registry); MANDATORY for drug reports (s.264).",
        264,
        {
          conditionalRequired: [
            {
              condition: "the report is a drug report",
              note: "guide: ilaç raporlarında gönderilmesi zorunlu (s.264)",
            },
          ],
        },
      ),
      FIELD(
        "takipNo",
        "Takip No",
        "string",
        false,
        null,
        "GSS-generated tracking number from the admission; filled when TakipNoileRaporBilgisiKaydet is used (s.265).",
        265,
        { syntheticOnly: true },
      ),
      FIELD(
        "klinikTani",
        "Klinik Tani",
        "string",
        false,
        255,
        "Clinical diagnosis (s.265; parameter name row-wrapped in the guide).",
        265,
      ),
      FIELD(
        "ozelDurum",
        "Ozel Durum",
        "integer",
        false,
        null,
        "Special-case code; 0 when none. 1 = surgery/botulinum for mobility, 2-3 = 3713-law disability categories (s.265). Full catalogue in Tablo 5.1 OzelDurumVO per the changelog.",
        265,
      ),
    ],
  },
  "hasta-yatis-rapor-dvo": {
    id: "HastaYatisBilgisiRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "yatisTarihi",
        "Hastane Yatis Tarihi",
        "string",
        true,
        10,
        'Hospital admission date, "dd.mm.yyyy" (s.266).',
        266,
      ),
      FIELD(
        "cikisTarihi",
        "Hastaneden Cikis Tarihi",
        "string",
        true,
        10,
        'Hospital discharge date, "dd.mm.yyyy" (s.266).',
        266,
      ),
    ],
  },
  "cocuk-bilgisi-dvo": {
    id: "CocukBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "cinsiyet",
        "Cinsiyet",
        "enum",
        true,
        1,
        "Gender of the newborn (s.266).",
        266,
        { enumRef: "cinsiyet" },
      ),
      FIELD(
        "kilo",
        "Kilo",
        "string",
        true,
        5,
        "Birth weight, e.g. 3,45 (s.266).",
        266,
      ),
      FIELD(
        "dogumSaati",
        "Dogum Saati",
        "string",
        true,
        5,
        "Birth time, hh:mm (s.266).",
        266,
      ),
    ],
  },
  "malzeme-rapor-dvo": {
    id: "MalzemeBilgisiRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "malzemeKodu",
        "Protez Malzeme Kodu",
        "string",
        false,
        20,
        "Material code; mandatory when malzemeTuru is 1 or 2 (s.266). Coded per SUT — externally-coded codeSystem annotation per the G42 sweep norm.",
        266,
        {
          codeSystem: "SUT",
          conditionalRequired: [
            {
              condition: "malzemeTuru = 1 ya da 2",
              note: "guide: malzemeTuru = 1 ya da 2 ise bu alan doldurulmalıdır (s.266)",
            },
          ],
        },
      ),
      FIELD(
        "malzemeAdi",
        "Protez Malzeme Adi",
        "string",
        false,
        200,
        "Material name; mandatory when malzemeTuru is 3 (s.266).",
        266,
        {
          conditionalRequired: [
            {
              condition: "malzemeTuru = 3",
              note: "guide: malzemeTuru = 3 ise bu alan doldurulmalıdır (s.266)",
            },
          ],
        },
      ),
      FIELD(
        "malzemeTuru",
        "Protez Malzeme Turu",
        "enum",
        true,
        1,
        "SUT-coded / retirement-fund-protocol / uncoded material (s.266).",
        266,
        { enumRef: "malzeme-turu" },
      ),
      FIELD(
        "adet",
        "Protez Malzeme Sayisi",
        "integer",
        true,
        null,
        "Material count (s.266).",
        266,
      ),
    ],
  },
  "tedavi-islem-bilgisi-dvo": {
    id: "TedaviIslemBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "diyalizRaporBilgisi",
        "Diyaliz Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated when the treatment type is dialysis; shape Tablo 4.4.1.w (DiyalizRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
      FIELD(
        "eswlRaporBilgisi",
        "ESWL Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for ESWL; shape Tablo 4.4.1.x (ESWLRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
      FIELD(
        "eswtRaporBilgisi",
        "ESWT Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for ESWT; shape Tablo 4.4.1.y (ESWTRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
      FIELD(
        "ftrRaporBilgisi",
        "FTR Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for physical therapy; shape Tablo 4.4.1.z (FTRRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
      FIELD(
        "hotRaporBilgisi",
        "HOT Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for hyperbaric oxygen; shape Tablo 4.4.1.aa (HOTRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
      FIELD(
        "tupBebekRaporBilgisi",
        "Tup Bebek Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for IVF; shape Tablo 4.4.1.bb (TupBebekRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
      FIELD(
        "evHemodiyaliziRaporBilgisi",
        "Ev Hemodiyalizi Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for home haemodialysis; shape Tablo 4.4.1.hh (EvHemodiyaliziRaporBilgisiDVO) — deferred to G43d. The guide's reference column says 4.4.1.bb, a cross-reference typo (4.4.1.hh is the home-haemodialysis table, s.278).",
        267,
      ),
      FIELD(
        "pulmonerRaporBilgisi",
        "Pulmoner Rapor Bilgisi",
        "object",
        false,
        null,
        "Populated for pulmonary rehabilitation; shape Tablo 4.4.1.ii (PulmonerRaporBilgisiDVO) — deferred to G43d.",
        267,
      ),
    ],
  },
  "brans-gorus-bilgisi-dvo": {
    id: "BransGorusBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "bransKodu",
        "Brans Kodu",
        "string",
        true,
        4,
        "Health-Ministry branch code of the opining department (s.267).",
        267,
      ),
      FIELD(
        "aciklama",
        "Aciklama",
        "string",
        true,
        255,
        "Department opinion (s.267).",
        267,
      ),
    ],
  },
  "isgoremezlik-rapor-ek-dvo": {
    id: "IsgoremezlikRaporEkDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "aciklama",
        "Aciklama",
        "string",
        true,
        null,
        "Attachment description (s.276).",
        276,
      ),
      FIELD(
        "bitisTarihi",
        "Bitis Tarihi",
        "string",
        true,
        null,
        'Attachment end date, "dd.mm.yyyy" (s.276).',
        276,
      ),
      FIELD(
        "durum",
        "Durum",
        "enum",
        true,
        null,
        "Initial or attachment report (s.276).",
        276,
        { enumRef: "ek-durumu" },
      ),
      FIELD(
        "duzenlemeTuru",
        "Duzenleme Turu",
        "enum",
        true,
        null,
        "Issuing style (s.276).",
        276,
        { enumRef: "rapor-duzenleme-turu" },
      ),
      FIELD(
        "hastaYatisVarMi",
        "Hasta Yatisi Var Mi",
        "enum",
        true,
        1,
        "E when hospitalized (H when not) — the yatislar array must then carry at least one stay (s.276).",
        276,
        { enumRef: "evet-hayir" },
      ),
      FIELD(
        "kontrolMu",
        "Kontrol Mu",
        "enum",
        true,
        null,
        "Control examination flag: E = Evet, H = Hayir (s.276).",
        276,
        { enumRef: "evet-hayir" },
      ),
      FIELD(
        "kontrolTarihi",
        "Kontrol Tarihi",
        "string",
        true,
        null,
        'Control date, "dd.mm.yyyy" (s.276).',
        276,
      ),
      FIELD(
        "protokolNo",
        "Protokol No",
        "string",
        false,
        null,
        "Protocol number (s.277).",
        277,
      ),
      FIELD(
        "protokolTarihi",
        "Protokol Tarihi",
        "string",
        false,
        null,
        'Protocol date, "dd.mm.yyyy" (s.277).',
        277,
      ),
      FIELD(
        "yatislar",
        "Yatis Bilgileri",
        "array",
        true,
        null,
        "Hospital stays; item shape Tablo 4.4.1.l (HastaYatisBilgisiRaporDVO, this registry); mandatory when hastaYatisVarMi = E (s.277).",
        277,
        {
          conditionalRequired: [
            {
              condition: "hastaYatisVarMi = E",
              note: "guide: en az bir hasta yatış bilgisi gönderilmelidir (s.277)",
            },
          ],
        },
      ),
      FIELD(
        "raporBilgisiDVO",
        "Rapor Bilgisi",
        "object",
        true,
        null,
        "Report key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry); the guide's parameter name carries a DVO suffix here.",
        277,
      ),
      FIELD(
        "doktorlar",
        "Doktor Bilgileri",
        "array",
        true,
        null,
        "Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry) (s.277).",
        277,
      ),
      FIELD(
        "tanilar",
        "Tanilar",
        "array",
        true,
        null,
        "Diagnoses; item shape Tablo 4.4.1.u (TaniBilgisiDVO, hizmet-kayit group); parameter name capitalized (Tanilar) in the guide (s.277).",
        277,
      ),
      FIELD(
        "kullaniciTesisKodu",
        "Kullanici Tesis Kodu",
        "integer",
        true,
        null,
        "Health facility code of the caller (s.277).",
        277,
      ),
    ],
  },
};

// ── IsKazasiRaporDVO completion (missed rows on guide p.257) ──────
import { parse as yamlParse } from "yaml";

const isKazasiPath = resolve(
  ROOT,
  "registry/dvos/rapor/is-kazasi-rapor-dvo.yml",
);
const isKazasi = yamlParse(readFileSync(isKazasiPath, "utf8"));
const existingNames = isKazasi.fields.map((f) => f.name);

if (!existingNames.includes("taburcuKodu")) {
  isKazasi.fields.push(
    FIELD(
      "taburcuKodu",
      "Taburcu Kodu",
      "enum",
      false,
      null,
      "Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.257).",
      257,
      { enumRef: "taburcu-kodu" },
    ),
  );
  isKazasi.fields.push(
    FIELD(
      "isKazasiTarihi",
      "Is Kazasi Tarihi",
      "string",
      false,
      10,
      'Work-accident date, "dd.mm.yyyy"; filled when the relapse flag is set (s.257).',
      257,
    ),
  );
  console.log("IsKazasiRaporDVO completed with taburcuKodu + isKazasiTarihi");
}

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
writeFileSync(isKazasiPath, stringify(isKazasi, { lineWidth: 0 }), "utf8");
console.log("updated registry/dvos/rapor/is-kazasi-rapor-dvo.yml");
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
console.log("G43c generation complete");
