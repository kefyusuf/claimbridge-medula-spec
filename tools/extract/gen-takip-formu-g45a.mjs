/**
 * G45a generator: Takip Formu service, guide pages 310-321 —
 * takipFormuKaydet/oku/sil + the DiabetTakipFormu composite pair
 * (Kayit 47 fields / DVO 48 fields) + five sub-composites + eleven
 * code-list enums. WSDL takipFormuIslemleriWS verified on s.352-353.
 * One-off extraction tool.
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
const VYB = ["V", "Y", "B"];
const enums = {
  "ikamet-turu": ENUM(
    "ikamet-turu",
    "Ikamet Turu",
    [
      ["1", "Il Merkezi", "Province center."],
      ["2", "Ilce Merkezi", "District center."],
      ["3", "Belde", "Town."],
      ["4", "Koy", "Village."],
      ["5", "Mezra", "Hamlet."],
      ["6", "Diger", "Other."],
    ],
    311,
  ),
  "tbt-durumu": ENUM(
    "tbt-durumu",
    "Tibbi Beslenme Tedavisi Durumu",
    [
      ["1", "TBT onerilmis -> TBT'ye uyuyor", "Recommended and followed."],
      [
        "2",
        "TBT onerilmis -> ara sira uyuyor",
        "Recommended and occasionally followed.",
      ],
      ["3", "TBT onerilmis -> hic uyuyor", "Recommended and never followed."],
      ["4", "TBT onerilmis -> Bilinmiyor", "Recommended, adherence unknown."],
      ["5", "TBT onerilmemis", "Not recommended."],
      ["6", "Bilinmiyor", "Unknown."],
    ],
    311,
  ),
  "egzersiz-durumu": ENUM(
    "egzersiz-durumu",
    "Egzersiz Durumu",
    [
      [
        "1",
        "Onerilmis -> duzenli yapiyor",
        "Recommended, exercising regularly.",
      ],
      [
        "2",
        "Onerilmis -> duzensiz yapiyor",
        "Recommended, exercising irregularly.",
      ],
      ["3", "Onerilmis -> yapmiyor", "Recommended, not exercising."],
      [
        "4",
        "Onerilmis -> uygun hasta degil",
        "Recommended, not a suitable patient.",
      ],
      ["5", "Onerilmis -> Bilinmiyor", "Recommended, adherence unknown."],
      ["6", "Onerilmemis", "Not recommended."],
      ["7", "Bilinmiyor", "Unknown."],
    ],
    311,
  ),
  "basvuru-nedeni": ENUM(
    "basvuru-nedeni",
    "Basvuru Nedeni",
    [
      ["1", "Genel Kontrol", "General check."],
      [
        "2",
        "Rutin muayene ve kontrol",
        "Routine examination related to the disease.",
      ],
      [
        "3",
        "Baska branstan konsultasyon",
        "Consultation from another department.",
      ],
      ["4", "Akut metabolik komplikasyonlar", "Acute metabolic complications."],
      ["5", "Akut kronik komplikasyon", "Acute chronic complication."],
      ["6", "Ilac Yazdirma", "Prescription request."],
    ],
    312,
  ),
  "var-yok-bilinmiyor": ENUM(
    "var-yok-bilinmiyor",
    "Var / Yok / Bilinmiyor",
    [
      ["V", "Var", "Present."],
      ["Y", "Yok", "Absent."],
      ["B", "Bilinmiyor", "Unknown."],
    ],
    312,
    "Recurring V/Y/B list across glukoMetre, mikroalbuminuri, periferikSensoryalNoropati, koronerArterH, serebrovaskulerH, ayakMuayenesi (labels Diabetik ülser var/yok) and insulinPompasi (s.312-314).",
  ),
  "anti-gad": ENUM(
    "anti-gad",
    "AntiGAD Durumu",
    [
      ["P", "Pozitif", "Positive."],
      ["N", "Negatif", "Negative."],
      ["B", "Bilinmiyor", "Unknown."],
    ],
    313,
  ),
  "ekg-durumu": ENUM(
    "ekg-durumu",
    "EKG Durumu",
    [
      ["1", "Normal", "Normal ECG."],
      ["2", "Patolojik", "Pathological ECG."],
      ["3", "Bilinmiyor", "Unknown."],
    ],
    313,
  ),
  "goz-muayenesi": ENUM(
    "goz-muayenesi",
    "Goz Muayenesi Durumu",
    [
      ["1", "Normal", "Normal."],
      ["2", "Nonproliferatif RP", "Non-proliferative retinopathy."],
      ["3", "Proliferatif RP", "Proliferative retinopathy."],
      ["4", "Makula Donemi", "Macular degeneration."],
      ["5", "Katarakt", "Cataract."],
      ["6", "Glokom", "Glaucoma."],
      ["7", "Bilinmiyor", "Unknown."],
    ],
    313,
  ),
  "akut-komplikasyon": ENUM(
    "akut-komplikasyon",
    "Akut Komplikasyon (Son 3 Ay)",
    [
      ["1", "Yasanmadi", "Did not occur."],
      ["2", "DKA", "Diabetic ketoacidosis."],
      ["3", "HHD", "Hyperosmolar hyperglycemic state."],
      ["4", "Hipoglisemi", "Hypoglycemia."],
    ],
    314,
  ),
  "diabet-hastalik": ENUM(
    "diabet-hastalik",
    "Diabet Takip Formu Hastalik Kodu",
    [
      ["1", "Hipertansiyon", "Hypertension."],
      ["2", "Koroner Arter Hst.", "Coronary artery disease."],
      ["3", "Kanser", "Cancer."],
      ["4", "Solunum S. Hst.", "Respiratory system disease."],
      ["5", "Kalp Yetmezligi", "Heart failure."],
      ["6", "Kronik KC Hst.", "Chronic liver disease."],
      ["7", "Periferik Arter Hst.", "Peripheral artery disease."],
      ["8", "Diabetik Ayak.", "Diabetic foot."],
      ["9", "Amputasyon", "Amputation."],
      ["10", "KBY", "Chronic kidney failure."],
      ["11", "Osteoporoz", "Osteoporosis."],
      ["12", "Hiperkolesterolemi", "Hypercholesterolemia."],
      ["13", "Hiperlipidemi", "Hyperlipidemia."],
      ["14", "Ek hastalik yok.", "No additional disease."],
      ["0", "Diger", "Other — digerHastalikTaniKodu then carries the code."],
    ],
    319,
  ),
  aliskanlik: ENUM(
    "aliskanlik",
    "Aliskanlik Kodu",
    [
      ["1", "Sigara", "Smoking."],
      ["2", "Alkol", "Alcohol."],
      ["3", "Cay Kahve", "Tea/coffee."],
      ["4", "Diger", "Other."],
    ],
    319,
  ),
};

// ── shared: the 47-field diabet form body (4.6.1.c rows) ─────────
const FORM_BODY = () => [
  FIELD(
    "tcKimlikNo",
    "T.C. Kimlik Numarasi",
    "string",
    true,
    11,
    "Patient citizen ID (s.311).",
    311,
    { sensitive: true },
  ),
  FIELD("ad", "Ad", "string", true, null, "Patient first name (s.311).", 311),
  FIELD(
    "soyad",
    "Soyad",
    "string",
    true,
    null,
    "Patient last name (s.311).",
    311,
  ),
  FIELD(
    "cepTel",
    "Cep Telefonu",
    "string",
    true,
    10,
    "Mobile number, e.g. 5xxxxxxxxx (s.311).",
    311,
  ),
  FIELD(
    "protokolNo",
    "Protokol No",
    "string",
    true,
    null,
    "Protocol number (s.311).",
    311,
  ),
  FIELD(
    "vizitTarihi",
    "Vizit Tarihi",
    "string",
    true,
    10,
    'Visit date, "dd.mm.yyyy" (s.311).',
    311,
  ),
  FIELD(
    "saglikTesisiKodu",
    "Saglik Tesis Kodu",
    "integer",
    true,
    null,
    "Facility code; the guide spells this parameter saglikTesisiKodu (extra i) unlike saglikTesisKodu elsewhere — preserved verbatim (s.311).",
    311,
  ),
  FIELD(
    "cinsiyet",
    "Hastanin Cinsiyeti",
    "enum",
    true,
    1,
    "E = Erkek, K = Kadın (s.311).",
    311,
    { enumRef: "cinsiyet" },
  ),
  FIELD(
    "ikametTuru",
    "Ikamet Turu",
    "enum",
    true,
    null,
    "Six-value residence list (s.311).",
    311,
    { enumRef: "ikamet-turu" },
  ),
  FIELD(
    "doktorBilgileri",
    "Doktor Bilgileri",
    "array",
    true,
    null,
    "Physicians; item shape Tablo 4.6.1.e (TakipFormuDoktorBilgisiDVO, this registry) (s.311).",
    311,
  ),
  FIELD(
    "tani",
    "Hasta Tanisi",
    "string",
    true,
    null,
    "Diagnosis ICD-10 code (s.311).",
    311,
    { codeSystem: "ICD-10-WHO" },
  ),
  FIELD(
    "taniTarihi",
    "Tani Tarihi",
    "string",
    true,
    10,
    "First date the patient received the diagnosis (s.311).",
    311,
  ),
  FIELD(
    "diabetEgitimi",
    "Diabet Egitimi Bilgisi",
    "object",
    true,
    null,
    "Diabetes education; shape Tablo 4.6.1.f (TakipFormuDiabetEgitimiDVO, this registry) (s.311).",
    311,
  ),
  FIELD(
    "tibbiBeslenmeTedavisi",
    "Tibbi Beslenme Tedavisi (TBT)",
    "enum",
    true,
    null,
    "Six-value medical-nutrition adherence list (s.311).",
    311,
    { enumRef: "tbt-durumu" },
  ),
  FIELD(
    "egzersiz",
    "Egzersiz",
    "enum",
    true,
    null,
    "Seven-value exercise adherence list (s.311-312).",
    311,
    { enumRef: "egzersiz-durumu" },
  ),
  FIELD(
    "hastaliklar",
    "Hastaliklar",
    "array",
    true,
    null,
    "Diseases besides DM; item shape Tablo 4.6.1.g (TakipFormuHastalikDVO, this registry) (s.312).",
    312,
  ),
  FIELD(
    "basvuruNedeni",
    "Basvuru Nedeni",
    "enum",
    true,
    null,
    "Six-value admission-reason list (s.312).",
    312,
    { enumRef: "basvuru-nedeni" },
  ),
  FIELD(
    "aliskanliklar",
    "Aliskanliklar",
    "array",
    true,
    null,
    "Habits; item shape Tablo 4.6.1.h (TakipFormuAliskanlikDVO, this registry) (s.312).",
    312,
  ),
  FIELD(
    "glukoMetre",
    "Gluko Metre",
    "enum",
    true,
    1,
    "Glucometer presence (s.312).",
    312,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "kanSekeriTakipSayisi",
    "Kan Sekeri Takip Sayisi",
    "integer",
    true,
    null,
    "Daily blood-sugar measurement count (s.312).",
    312,
  ),
  FIELD(
    "kullanilanIlaclar",
    "Hastanin Kullandigi Ilac Bilgileri",
    "array",
    true,
    null,
    "Medications; item shape Tablo 4.6.1.i (TakipFormuKullanilanIlaclarDVO, this registry) (s.312).",
    312,
  ),
  FIELD(
    "sistolikKanBasinci",
    "Sistolik Kan Basinci",
    "integer",
    false,
    null,
    "Systolic blood pressure; the guide's required column is empty in the extraction (s.312).",
    312,
  ),
  FIELD(
    "diyastolikKanBasinci",
    "Diyastolik Kan Basinci",
    "integer",
    false,
    null,
    "Diastolic blood pressure; required column empty in the extraction (s.312).",
    312,
  ),
  FIELD("boy", "Boy", "decimal", true, null, "Height (s.312).", 312),
  FIELD("kilo", "Kilo", "decimal", true, null, "Weight (s.312).", 312),
  FIELD(
    "vki",
    "VKI",
    "decimal",
    true,
    null,
    "Body-mass index, e.g. 22.3 (s.312).",
    312,
  ),
  FIELD(
    "apg",
    "APG",
    "decimal",
    true,
    null,
    "Fasting blood sugar; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "tpg",
    "TPG",
    "decimal",
    true,
    null,
    "Postprandial blood sugar; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "hbA1c",
    "HbA1c",
    "decimal",
    true,
    null,
    "HbA1c; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "kreatinin",
    "Kreatinin",
    "decimal",
    true,
    null,
    "Creatinine; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "trigliserid",
    "Trigliserid",
    "decimal",
    true,
    null,
    "Triglyceride; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "ldlKol",
    "LDL-Kol",
    "decimal",
    true,
    null,
    "LDL cholesterol; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "hdlKol",
    "HDL-Kol",
    "decimal",
    true,
    null,
    "HDL cholesterol; 0 when unknown (s.313).",
    313,
  ),
  FIELD(
    "alt",
    "ALT",
    "decimal",
    true,
    null,
    "ALT; 0 when unknown (s.313).",
    313,
  ),
  FIELD("antiGAD", "AntiGAD", "enum", true, 1, "P/N/B result (s.313).", 313, {
    enumRef: "anti-gad",
  }),
  FIELD(
    "ekg",
    "EKG",
    "enum",
    true,
    null,
    "Three-value ECG state (s.313).",
    313,
    { enumRef: "ekg-durumu" },
  ),
  FIELD(
    "mikroalbuminuri",
    "Mikroalbuminuri",
    "enum",
    true,
    1,
    "V/Y/B (s.313).",
    313,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "gozMuayenesi",
    "Goz Muayenesi",
    "enum",
    true,
    null,
    "Seven-value eye-examination state (s.313).",
    313,
    { enumRef: "goz-muayenesi" },
  ),
  FIELD(
    "periferikSensoryalNoropati",
    "Periferik Sensoryal Noropati",
    "enum",
    true,
    1,
    "V/Y/B (s.313).",
    313,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "koronerArterH",
    "Koroner Arter H",
    "enum",
    true,
    1,
    "V/Y/B; the guide's required column is empty in the extraction (s.314).",
    314,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "serebrovaskulerH",
    "Serebrovaskuler H",
    "enum",
    true,
    1,
    "V/Y/B (s.314).",
    314,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "ayakMuayenesi",
    "Ayak Muayenesi",
    "enum",
    true,
    1,
    "V = diabetik ülser var, Y = yok, B = bilinmiyor (s.314).",
    314,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "akutKomplikasyon",
    "Akut Komplikasyon (Son 3 Ay)",
    "enum",
    true,
    null,
    "Four-value complication list (s.314).",
    314,
    { enumRef: "akut-komplikasyon" },
  ),
  FIELD(
    "yatisGun",
    "Hasta Yatis Gun",
    "integer",
    true,
    null,
    "Hospitalization day count of the visit (s.314).",
    314,
  ),
  FIELD(
    "insulinPompasi",
    "Insulin Pompasi",
    "enum",
    true,
    1,
    "Pump presence; the guide's parameter name carries the Turkish capital İ (İnsulinPompasi) — preserved verbatim (s.314).",
    314,
    { enumRef: "var-yok-bilinmiyor" },
  ),
  FIELD(
    "insulinPompasiVerTarihi",
    "Insulin Pompasi Verilis Tarihi",
    "string",
    false,
    10,
    'Pump start date, "dd.mm.yyyy"; filled when a pump exists (s.314).',
    314,
    {
      conditionalRequired: [
        {
          condition: "insulinPompasi = V",
          note: "guide: Verilmiş ise (s.314)",
        },
      ],
    },
  ),
  FIELD(
    "insulinPompasiDegTarihi",
    "Insulin Pompasi Degistirme Tarihi",
    "string",
    false,
    10,
    "Pump change date; filled when a pump exists (s.314).",
    314,
    {
      conditionalRequired: [
        {
          condition: "insulinPompasi = V",
          note: "guide: Verilmiş ise (s.314)",
        },
      ],
    },
  ),
];

// ── DVOs ──────────────────────────────────────────────────────────
const dvos = {
  "takip-formu-kaydet-giris-dvo": {
    id: "TakipFormuKaydetGirisDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "diabetTakipFormu",
        "Diabetes Mellitus Takip Formu",
        "object",
        true,
        null,
        "Diabetes follow-up form; shape Tablo 4.6.1.c (DiabetTakipFormuKayitDVO, this registry) (s.310).",
        310,
      ),
      FIELD(
        "kullaniciTesisKodu",
        "Saglik Tesis Kodu",
        "integer",
        true,
        null,
        "Facility code (s.310).",
        310,
      ),
    ],
  },
  "takip-formu-kaydet-cevap-dvo": {
    id: "TakipFormuKaydetCevapDVO",
    domain: "takip-formu",
    direction: "output",
    fields: [
      FIELD(
        "diabetTakipFormu",
        "Diabetes Mellitus Takip Formu",
        "object",
        false,
        null,
        "Saved form; shape Tablo 4.6.1.d (DiabetTakipFormuDVO, this registry) (s.310).",
        310,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.310).',
        310,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.310).",
        310,
      ),
    ],
  },
  "diabet-takip-formu-kayit-dvo": {
    id: "DiabetTakipFormuKayitDVO",
    domain: "takip-formu",
    direction: "input",
    fields: FORM_BODY(),
  },
  "diabet-takip-formu-dvo": {
    id: "DiabetTakipFormuDVO",
    domain: "takip-formu",
    direction: "output",
    fields: [
      FIELD(
        "takipFormuNo",
        "Takip Formu No",
        "string",
        false,
        null,
        "System-generated follow-up form number (s.314).",
        314,
        { syntheticOnly: true },
      ),
      ...FORM_BODY(),
    ],
  },
  "takip-formu-doktor-bilgisi-dvo": {
    id: "TakipFormuDoktorBilgisiDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "drTescilNo",
        "Doktor Tescil Numarasi",
        "string",
        true,
        null,
        "Physician registration number (s.318).",
        318,
      ),
      FIELD(
        "drBransKodu",
        "Doktor Brans Kodu",
        "string",
        true,
        4,
        "Physician branch code (s.318).",
        318,
      ),
      FIELD(
        "dmEgitimiAlmisMi",
        "DM Egitim Almis Mi",
        "enum",
        true,
        null,
        "E/H (s.318).",
        318,
        { enumRef: "evet-hayir" },
      ),
    ],
  },
  "takip-formu-diabet-egitimi-dvo": {
    id: "TakipFormuDiabetEgitimiDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "bireyselEgitimSayisi",
        "Bireysel Egitim Sayisi",
        "integer",
        true,
        null,
        "Individual DM education count (s.319).",
        319,
      ),
      FIELD(
        "grupEgitimSayisi",
        "Grup Egitim Sayisi",
        "integer",
        true,
        null,
        "Group DM education count (s.319).",
        319,
      ),
      FIELD(
        "dmEgitimiAlmisMi",
        "DM Egitim Almis Mi",
        "enum",
        true,
        null,
        "E/H (s.319).",
        319,
        { enumRef: "evet-hayir" },
      ),
    ],
  },
  "takip-formu-hastalik-dvo": {
    id: "TakipFormuHastalikDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "hastalikKodu",
        "Hastalik Kodu",
        "enum",
        true,
        null,
        "Fifteen-value disease list including 0 = Diğer (s.319).",
        319,
        { enumRef: "diabet-hastalik" },
      ),
      FIELD(
        "digerHastalikTaniKodu",
        "Hastalik Tani Kodu",
        "string",
        false,
        null,
        "Diagnosis code of a disease outside the list; filled when hastalikKodu = 0 (s.319).",
        319,
        {
          conditionalRequired: [
            {
              condition: "hastalikKodu = 0",
              note: "guide: Eğer hastalık kodu 0:Diğer seçilmiş ise (s.319)",
            },
          ],
        },
      ),
    ],
  },
  "takip-formu-aliskanlik-dvo": {
    id: "TakipFormuAliskanlikDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "aliskanlik",
        "Aliskanlik Kodu",
        "enum",
        true,
        null,
        "Four-value habit list (s.319).",
        319,
        { enumRef: "aliskanlik" },
      ),
    ],
  },
  "takip-formu-kullanilan-ilaclar-dvo": {
    id: "TakipFormuKullanilanIlaclarDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "barkod",
        "Barkod",
        "string",
        true,
        null,
        "Drug barcode (s.320).",
        320,
        { codeSystem: "GS1" },
      ),
      FIELD(
        "gunlukDoz",
        "Gunluk Doz",
        "string",
        true,
        null,
        "Daily dose; units written for insulin (s.320).",
        320,
      ),
    ],
  },
  "takip-formu-oku-giris-dvo": {
    id: "TakipFormuOkuGirisDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "tcKimlikNo",
        "Hasta T.C. Kimlik Numarasi",
        "string",
        true,
        null,
        "Patient citizen ID (s.320).",
        320,
        { sensitive: true },
      ),
      FIELD(
        "saglikTesisKodu",
        "Saglik Tesis Kodu",
        "integer",
        true,
        null,
        "Facility code (s.320).",
        320,
      ),
    ],
  },
  "takip-formu-oku-cevap-dvo": {
    id: "TakipFormuOkuCevapDVO",
    domain: "takip-formu",
    direction: "output",
    fields: [
      FIELD(
        "diabetTakipFormu",
        "Diabetes Mellitus Takip Formu",
        "array",
        false,
        null,
        "Saved forms; item shape Tablo 4.6.1.d (DiabetTakipFormuDVO, this registry) (s.320).",
        320,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.320).',
        320,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.320).",
        320,
      ),
    ],
  },
  "takip-formu-sil-giris-dvo": {
    id: "TakipFormuSilGirisDVO",
    domain: "takip-formu",
    direction: "input",
    fields: [
      FIELD(
        "takipFormuNo",
        "Takip Formu No",
        "string",
        true,
        null,
        "Follow-up form number (s.321).",
        321,
        { syntheticOnly: true },
      ),
      FIELD(
        "saglikTesisKodu",
        "Saglik Tesis Kodu",
        "integer",
        true,
        null,
        "Facility code (s.321).",
        321,
      ),
    ],
  },
  "takip-formu-sil-cevap-dvo": {
    id: "TakipFormuSilCevapDVO",
    domain: "takip-formu",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.321).',
        321,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.321).",
        321,
      ),
    ],
  },
};

// ── methods ───────────────────────────────────────────────────────
const METHOD = (
  slug,
  operationName,
  inputDvo,
  outputDvo,
  page,
  section,
  effects,
) => ({
  id: `medula.hastane.takip-formu.${slug}`,
  service: "medula.hastane.takip-formu",
  names: {
    documentationHeading: operationName,
    operationName,
    aliases: [operationName],
  },
  contract: { inputDvo, outputDvo },
  sourceRefs: [{ ...GUIDE_REF(page), section: `4.3 ${section}` }],
  stateEffects: effects,
  success: {
    resultCodeField: "sonucKodu",
    successCode: "0000",
    messageField: "sonucMesaji",
  },
  sandbox: { supported: false, defaultScenario: null },
  status: "reviewed",
});

const methods = {
  "takip-formu-kaydet": METHOD(
    "takip-formu-kaydet",
    "takipFormuKaydet",
    "TakipFormuKaydetGirisDVO",
    "TakipFormuKaydetCevapDVO",
    310,
    "4.3.1 takipFormuKaydet Metodu",
    {
      creates: ["takipFormu"],
      reads: [],
      updates: [],
      deletes: [],
      generates: ["takipFormuNo"],
    },
  ),
  "takip-formu-oku": METHOD(
    "takip-formu-oku",
    "takipFormuOku",
    "TakipFormuOkuGirisDVO",
    "TakipFormuOkuCevapDVO",
    320,
    "4.3.2 takipFormuOku Metodu",
    {
      creates: [],
      reads: ["takipFormu"],
      updates: [],
      deletes: [],
      generates: [],
    },
  ),
  "takip-formu-sil": METHOD(
    "takip-formu-sil",
    "takipFormuSil",
    "TakipFormuSilGirisDVO",
    "TakipFormuSilCevapDVO",
    321,
    "4.3.3 takipFormuSil Metodu",
    {
      creates: [],
      reads: [],
      updates: [],
      deletes: ["takipFormu"],
      generates: [],
    },
  ),
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
  write(`registry/dvos/takip-formu/${name}.yml`, {
    ...dvo,
    sourceRefs: [
      { ...GUIDE_REF(310), section: "4.3 Takip Formu Kayit Metotlari" },
    ],
    status: "reviewed",
  });
}
for (const [slug, method] of Object.entries(methods)) {
  write(`registry/methods/takip-formu/${slug}.yml`, method);
}

const service = {
  id: "medula.hastane.takip-formu",
  slug: "takip-formu",
  displayName: "Takip Formu Kayit Metotlari",
  description:
    "Diabetes Mellitus follow-up form operations: save, read and delete the DM follow-up form (guide section renumbered 4.3/4.6.1 across editions).",
  sourceRefs: [
    { ...GUIDE_REF(310), section: "4.3 Takip Formu Kayit Metotlari" },
  ],
  wsdl: {
    production: "wsdl.takip-formu.production",
    test: "wsdl.takip-formu.test",
  },
  methods: Object.keys(methods).map(
    (slug) => `medula.hastane.takip-formu.${slug}`,
  ),
  status: "reviewed",
};
write("registry/services/takip-formu.yml", service);

const manifestPath = resolve(ROOT, "sources/wsdl-manifest.yml");
const manifest = readFileSync(manifestPath, "utf8");
if (!manifest.includes("wsdl.takip-formu.production")) {
  const addition = `

  - id: wsdl.takip-formu.production
    service: takip-formu
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/takipFormuIslemleriWS?wsdl

  - id: wsdl.takip-formu.test
    service: takip-formu
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/takipFormuIslemleriWS?wsdl
`;
  writeFileSync(manifestPath, manifest.replace(/\n$/, "\n") + addition, "utf8");
  console.log("appended takip-formu wsdl entries to sources/wsdl-manifest.yml");
}
console.log("G45a generation complete");
