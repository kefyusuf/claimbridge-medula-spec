/**
 * G45c-a generator: E-İmzalı Rapor workflow/confirmation methods, guide
 * pages 336-349 — raporOnay, kurulBaskaniRaporOnay, bashekimRaporOnay,
 * raporSorgu, tcIleraporSorgu, kurulBaskaniOnayBekleyenRaporSorgu,
 * bashekimOnayBekleyenRaporSorgu, onayBekleyenRaporSorgu, raporSil, onay,
 * onayBekleyen (+12 DVOs, 3 enums). raporKaydet's 7-page composite is
 * G45c-b. WSDL ImzaliRaporIslemleriService verified s.38/100/353.
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
const enums = {
  "imzali-rapor-turu": ENUM(
    "imzali-rapor-turu",
    "Imzali Rapor Turu",
    [
      ["1", "Tedavi Raporu", "Treatment report."],
      ["2", "Is Goremezlik", "Incapacity report."],
      ["3", "Maluliyet", "Disability report."],
      ["4", "Engellilik", "Impairment report."],
      ["5", "Tibbi Gereklilik", "Medical necessity report."],
      ["10", "Ilac", "Drug report."],
    ],
    340,
    "Reproduced identically across the raporSorgu / tcIleraporSorgu / onayBekleyen sorgu response tables (s.340-346).",
  ),
  "onay-veren-turu": ENUM(
    "onay-veren-turu",
    "Onay Veren Turu",
    [
      ["1", "Doktor", "Physician."],
      ["2", "Bashekim", "Chief physician."],
    ],
    348,
  ),
  "onay-islem-turu": ENUM(
    "onay-islem-turu",
    "Onaylanan Islem Turu",
    [
      ["1", "Rapor", "Report."],
      ["2", "Mutat disi raporu", "Off-standard report."],
      ["3", "Sevk Bildirim", "Referral notification."],
      ["4", "Sevk Kayit", "Referral registration."],
    ],
    348,
  ),
};

// ── DVOs ──────────────────────────────────────────────────────────
const BYTE_NOTE =
  "Digitally signed report blob — the E-İmzalı flow sends opaque byte arrays, not structured fields.";

const dvos = {
  "rapor-onay-dvo": {
    id: "RaporOnayDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        8,
        "GSS-assigned facility code (s.337).",
        337,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Citizen ID of the approving physician (s.337).",
        337,
        { sensitive: true },
      ),
      FIELD(
        "raporBilgisi",
        "Rapor Bilgisi",
        "array",
        true,
        null,
        "Signed report blob; " + BYTE_NOTE,
        337,
      ),
    ],
  },
  "imzali-rapor-onay-giris-dvo": {
    id: "ImzaliRaporOnayGirisDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        8,
        "GSS-assigned facility code (s.338).",
        338,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Citizen ID of the approving physician (board head or chief physician per the method) (s.338).",
        338,
        { sensitive: true },
      ),
      FIELD(
        "raporOnayBilgisi",
        "Rapor Bilgisi",
        "array",
        true,
        null,
        "Signed approval blob; " + BYTE_NOTE,
        338,
      ),
    ],
  },
  "imzali-rapor-sorgu-giris-dvo": {
    id: "ImzaliRaporSorguGirisDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        8,
        "GSS-assigned facility code (s.340).",
        340,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Querying physician's citizen ID (s.340).",
        340,
        { sensitive: true },
      ),
      FIELD(
        "raporSorguBilgisi",
        "Rapor Bilgisi",
        "array",
        true,
        null,
        "Signed query blob; " + BYTE_NOTE,
        340,
      ),
    ],
  },
  "imzali-rapor-onay-bekleyen-sorgu-giris-dvo": {
    id: "ImzaliRaporOnayBekleyenSorguGirisDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        8,
        "GSS-assigned facility code (s.343).",
        343,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Board-head physician's citizen ID (s.343).",
        343,
        { sensitive: true },
      ),
      FIELD(
        "onayBekleyenSorguBilgisi",
        "Rapor Bilgisi",
        "array",
        true,
        null,
        "Signed pending-approval query blob; " + BYTE_NOTE,
        343,
      ),
    ],
  },
  "rapor-onay-bekleyen-sorgu-dvo": {
    id: "RaporOnayBekleyenSorguDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        8,
        "GSS-assigned facility code (s.346).",
        346,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Board-head physician's citizen ID (s.346).",
        346,
        { sensitive: true },
      ),
    ],
  },
  "imzali-rapor-sil-giris-dvo": {
    id: "ImzaliRaporSilGirisDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        8,
        "GSS-assigned facility code (s.347).",
        347,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Board-head physician's citizen ID (s.347).",
        347,
        { sensitive: true },
      ),
      FIELD(
        "raporSorguBilgisi",
        "Rapor Bilgisi",
        "array",
        true,
        null,
        "Signed delete blob; " + BYTE_NOTE,
        347,
      ),
    ],
  },
  "onay-dvo": {
    id: "OnayDVO",
    domain: "imzali-rapor",
    direction: "input",
    fields: [
      FIELD(
        "tesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the performing facility (s.348).",
        348,
      ),
      FIELD(
        "doktorTcKimlikNo",
        "Doktor T.C. Kimlik No",
        "string",
        true,
        11,
        "Citizen ID of the approving physician (s.348).",
        348,
        { sensitive: true },
      ),
      FIELD(
        "onayVerenTuru",
        "Onay Turu",
        "enum",
        true,
        1,
        "Physician or chief physician (s.348).",
        348,
        { enumRef: "onay-veren-turu" },
      ),
      FIELD(
        "onayIslemTuru",
        "Onaylanan Islem Turu",
        "enum",
        true,
        1,
        "Report / off-standard report / referral notification / referral registration (s.348).",
        348,
        { enumRef: "onay-islem-turu" },
      ),
      FIELD(
        "onayIslemReferans",
        "Onay Islem Referans ID",
        "string",
        true,
        null,
        "Document ID matching onayIslemTuru (s.348).",
        348,
        { syntheticOnly: true },
      ),
    ],
  },
  "rapor-onay-cevap-dvo": {
    id: "RaporOnayCevapDVO",
    domain: "imzali-rapor",
    direction: "output",
    fields: [
      FIELD(
        "raporTakipNo",
        "Rapor Takip No",
        "string",
        true,
        null,
        "System-generated unique report tracking number (s.337).",
        337,
        { syntheticOnly: true },
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.337).',
        337,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        true,
        null,
        "Result description (s.337).",
        337,
      ),
      FIELD(
        "uyariMesaji",
        "Uyari Mesaji",
        "string",
        false,
        null,
        "Warning message (s.337).",
        337,
      ),
    ],
  },
  "rapor-sorgu-cevap-dvo": {
    id: "RaporSorguCevapDVO",
    domain: "imzali-rapor",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.340).',
        340,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        true,
        null,
        "Result description (s.340).",
        340,
      ),
      FIELD(
        "uyariMesaji",
        "Uyari Mesaji",
        "string",
        true,
        null,
        "Warning message (s.340).",
        340,
      ),
      FIELD(
        "raporBilgileri",
        "Rapor Bilgileri",
        "array",
        false,
        null,
        "Signed reports; item shape ImzaliRaporDVO (this registry) (s.340).",
        340,
      ),
    ],
  },
  "imzali-rapor-dvo": {
    id: "ImzaliRaporDVO",
    domain: "imzali-rapor",
    direction: "output",
    fields: [
      FIELD(
        "turu",
        "Rapor Turu",
        "enum",
        true,
        null,
        "Six-value report type list (s.340).",
        340,
        { enumRef: "imzali-rapor-turu" },
      ),
      FIELD(
        "maluliyetRaporu",
        "Maluliyet Rapor Bilgileri",
        "object",
        false,
        null,
        "Populated per report type; shape Tablo 4.9.1.c (MaluliyetRaporDVO) — §4.9 composite, deferred to G45c-b.",
        340,
      ),
      FIELD(
        "engellilikRaporu",
        "Engellilik Rapor Bilgileri",
        "object",
        false,
        null,
        "Populated per report type; shape Tablo 4.9.1.g (EngellilikRaporDVO) — §4.9 composite, deferred to G45c-b.",
        340,
      ),
      FIELD(
        "tibbiGereklilikRaporu",
        "Tibbi Gereklilik Rapor Bilgileri",
        "object",
        false,
        null,
        "Populated per report type; shape Tablo 4.9.1.j (TibbiGereklilikRaporDVO) — §4.9 composite, deferred to G45c-b.",
        340,
      ),
    ],
  },
  "onay-cevap-dvo": {
    id: "OnayCevapDVO",
    domain: "imzali-rapor",
    direction: "output",
    fields: [
      FIELD(
        "onayIslemReferans",
        "Islem Referans",
        "string",
        true,
        null,
        "System-generated unique reference (s.348).",
        348,
        { syntheticOnly: true },
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.348).',
        348,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        true,
        null,
        "Result description (s.349).",
        349,
      ),
      FIELD(
        "uyariMesaji",
        "Uyari Mesaji",
        "string",
        false,
        null,
        "Warning message (s.349).",
        349,
      ),
    ],
  },
  "onay-bekleyen-cevap-dvo": {
    id: "OnayBekleyenCevapDVO",
    domain: "imzali-rapor",
    direction: "output",
    fields: [
      FIELD(
        "onayiBeklenenDoktorlar",
        "Islem Referans / Onayi Beklenen Doktorlar",
        "array",
        true,
        null,
        "Physicians pending approval on the report; the guide types it DoktorBilgiDVO (singular, shape not shown) — preserved verbatim (s.349).",
        349,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.349).',
        349,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        true,
        null,
        "Result description (s.349).",
        349,
      ),
    ],
  },
  "sonuc-dvo": {
    id: "SonucDVO",
    domain: "imzali-rapor",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.347).',
        347,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        true,
        null,
        "Result description (s.347).",
        347,
      ),
      FIELD(
        "uyariMesaji",
        "Uyari Mesaji",
        "string",
        false,
        null,
        "Warning message (s.347).",
        347,
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
  id: `medula.hastane.imzali-rapor.${slug}`,
  service: "medula.hastane.imzali-rapor",
  names: {
    documentationHeading: operationName,
    operationName,
    aliases: [operationName],
  },
  contract: { inputDvo, outputDvo },
  sourceRefs: [{ ...GUIDE_REF(page), section: `4.6 ${section}` }],
  stateEffects: effects,
  success: {
    resultCodeField: "sonucKodu",
    successCode: "0000",
    messageField: "sonucMesaji",
  },
  sandbox: { supported: false, defaultScenario: null },
  status: "reviewed",
});

const NONE = {
  creates: [],
  reads: [],
  updates: [],
  deletes: [],
  generates: [],
};

const methods = {
  "rapor-onay": METHOD(
    "rapor-onay",
    "raporOnay",
    "RaporOnayDVO",
    "RaporOnayCevapDVO",
    336,
    "4.6.2 raporOnay Metodu",
    { ...NONE, creates: ["imzaliRapor"], generates: ["raporTakipNo"] },
  ),
  "kurul-baskani-rapor-onay": METHOD(
    "kurul-baskani-rapor-onay",
    "kurulBaskanıRaporOnay",
    "ImzaliRaporOnayGirisDVO",
    "RaporOnayCevapDVO",
    337,
    "4.6.3 kurulBaskanıRaporOnay Metodu",
    { ...NONE, updates: ["imzaliRapor"], generates: ["raporTakipNo"] },
  ),
  "bashekim-rapor-onay": METHOD(
    "bashekim-rapor-onay",
    "bashekimRaporOnay",
    "ImzaliRaporOnayGirisDVO",
    "RaporOnayCevapDVO",
    338,
    "4.6.4 bashekimRaporOnay Metodu",
    { ...NONE, updates: ["imzaliRapor"], generates: ["raporTakipNo"] },
  ),
  "rapor-sorgu": METHOD(
    "rapor-sorgu",
    "raporSorgu",
    "ImzaliRaporSorguGirisDVO",
    "RaporSorguCevapDVO",
    339,
    "4.6.5 raporSorgu Metodu",
    NONE,
  ),
  "tc-ile-rapor-sorgu": METHOD(
    "tc-ile-rapor-sorgu",
    "tcIleraporSorgu",
    "ImzaliRaporSorguGirisDVO",
    "RaporSorguCevapDVO",
    341,
    "4.6.6 tcIleraporSorgu Metodu",
    NONE,
  ),
  "kurul-baskani-onay-bekleyen-rapor-sorgu": METHOD(
    "kurul-baskani-onay-bekleyen-rapor-sorgu",
    "kurulBaskaniOnayBekleyenRaporSorgu",
    "ImzaliRaporOnayBekleyenSorguGirisDVO",
    "RaporSorguCevapDVO",
    342,
    "4.6.7 kurulBaskaniOnayBekleyenRaporSorgu Metodu",
    NONE,
  ),
  "bashekim-onay-bekleyen-rapor-sorgu": METHOD(
    "bashekim-onay-bekleyen-rapor-sorgu",
    "bashekimOnayBekleyenRaporSorgu",
    "ImzaliRaporOnayBekleyenSorguGirisDVO",
    "RaporSorguCevapDVO",
    344,
    "4.6.8 bashekimOnayBekleyenRaporSorgu Metodu",
    NONE,
  ),
  "onay-bekleyen-rapor-sorgu": METHOD(
    "onay-bekleyen-rapor-sorgu",
    "onayBekleyenRaporSorgu",
    "RaporOnayBekleyenSorguDVO",
    "RaporSorguCevapDVO",
    345,
    "4.6.9 onayBekleyenRaporSorgu Metodu",
    NONE,
  ),
  "rapor-sil": METHOD(
    "rapor-sil",
    "raporSil",
    "ImzaliRaporSilGirisDVO",
    "SonucDVO",
    347,
    "4.6.10 raporSil Metodu",
    { ...NONE, deletes: ["imzaliRapor"] },
  ),
  onay: METHOD(
    "onay",
    "onay",
    "ImzaliRaporOnayGirisDVO",
    "OnayCevapDVO",
    348,
    "4.6.11 onay Metodu",
    NONE,
  ),
  "onay-bekleyen": METHOD(
    "onay-bekleyen",
    "onayBekleyen",
    "ImzaliRaporOnayGirisDVO",
    "OnayBekleyenCevapDVO",
    349,
    "4.6.12 onayBekleyen Metodu",
    NONE,
  ),
};

// ── service ───────────────────────────────────────────────────────
const service = {
  id: "medula.hastane.imzali-rapor",
  slug: "imzali-rapor",
  displayName: "E-İmzalı Rapor Islemleri Metotlari",
  description:
    "Digitally-signed report operations: approval (physician / board head / chief physician), signed-blob queries, pending-approval queries, deletion and the XML-object approval step. Inputs and query payloads are opaque byte[] signature blobs; raporKaydet (7-page composite, s.329-336) lands with G45c-b.",
  sourceRefs: [
    { ...GUIDE_REF(329), section: "4.6 E-İmzalı Rapor Islemleri Metotlari" },
  ],
  wsdl: {
    production: "wsdl.imzali-rapor.production",
    test: "wsdl.imzali-rapor.test",
  },
  methods: Object.keys(methods).map(
    (slug) => `medula.hastane.imzali-rapor.${slug}`,
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
  write(`registry/dvos/imzali-rapor/${name}.yml`, {
    ...dvo,
    sourceRefs: [
      { ...GUIDE_REF(336), section: "4.6 E-İmzalı Rapor Islemleri Metotlari" },
    ],
    status: "reviewed",
  });
}
for (const [slug, method] of Object.entries(methods)) {
  write(`registry/methods/imzali-rapor/${slug}.yml`, method);
}
write("registry/services/imzali-rapor.yml", service);

const manifestPath = resolve(ROOT, "sources/wsdl-manifest.yml");
const manifest = readFileSync(manifestPath, "utf8");
if (!manifest.includes("wsdl.imzali-rapor.production")) {
  const addition = `

  - id: wsdl.imzali-rapor.production
    service: imzali-rapor
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/ImzaliRaporIslemleriService?wsdl

  - id: wsdl.imzali-rapor.test
    service: imzali-rapor
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/ImzaliRaporIslemleriService?wsdl
`;
  writeFileSync(manifestPath, manifest.replace(/\n$/, "\n") + addition, "utf8");
  console.log("appended imzali-rapor wsdl entries");
}
console.log("G45c-a generation complete");
