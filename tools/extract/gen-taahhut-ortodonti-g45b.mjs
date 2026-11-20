/**
 * G45b generator: Taahhüt + Ortodonti services, guide pages 322-329 —
 * disTaahhutKayit/okuDisTaahhut/silDisTaahhut/okuKisiDisTaahhut +
 * ortodontiFormuKaydet/iptal/oku (+13 DVOs, two new services).
 * WSDLs taahhutIslemleriWS + ortodontiIslemleriWS verified s.100-102/352-353.
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

// ── DVOs ──────────────────────────────────────────────────────────
const dvos = {
  "taahhut-kayit-dvo": {
    id: "TaahhutKayitDVO",
    domain: "taahhut",
    direction: "input",
    fields: [
      FIELD(
        "takipNo",
        "Takip Numarasi",
        "string",
        true,
        null,
        "Tracking number of the dental treatment to commit (s.322).",
        322,
        { syntheticOnly: true },
      ),
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "GSS-assigned facility code (s.322).",
        322,
      ),
      FIELD(
        "taahhut",
        "Taahhut Bilgileri",
        "object",
        true,
        null,
        "Commitment body; shape Tablo 4.7.1.c (TaahhutDVO, this registry) (s.322).",
        322,
      ),
      FIELD(
        "taahhutDiss",
        "Taahhut Edilen Islemler",
        "array",
        true,
        null,
        "Committed dental procedures; item shape Tablo 4.7.1.d (TaahhutDisDVO, this registry) (s.322).",
        322,
      ),
    ],
  },
  "taahhut-dvo": {
    id: "TaahhutDVO",
    domain: "taahhut",
    direction: "input",
    fields: [
      FIELD(
        "hastaTCKimlikNo",
        "Hastanin T.C. Kimlik Numarasi",
        "string",
        true,
        11,
        "Patient citizen ID (s.323).",
        323,
        { sensitive: true },
      ),
      FIELD(
        "adressIlPlaka",
        "Adres Il Plaka Kodu",
        "integer",
        true,
        null,
        "Address province plate code (s.323).",
        323,
      ),
      FIELD(
        "adressIlce",
        "Adres Ilce Adi",
        "string",
        true,
        null,
        "Address district name; must match a district of the plate-coded province or the record fails (s.323).",
        323,
      ),
      FIELD(
        "adressPostaKodu",
        "Posta Kodu",
        "string",
        true,
        6,
        "Postal code (s.323).",
        323,
      ),
      FIELD(
        "adressCaddeSokak",
        "Cadde Sokak Adi",
        "string",
        true,
        50,
        "Street name (s.323).",
        323,
      ),
      FIELD(
        "adressDisKapiNo",
        "Dis Kapi Numarasi",
        "string",
        true,
        15,
        "Outer door number (s.323).",
        323,
      ),
      FIELD(
        "adressIcKapiNo",
        "Ic Kapi Numarasi",
        "string",
        true,
        15,
        "Inner door number (s.323).",
        323,
      ),
      FIELD(
        "adressTelefon",
        "Telefon Numarasi",
        "string",
        true,
        10,
        "Phone number (s.323).",
        323,
      ),
      FIELD(
        "adressEposta",
        "E-posta Adresi",
        "string",
        false,
        50,
        "E-mail address (s.323).",
        323,
      ),
      FIELD(
        "taahhutAlanAd",
        "Taahhut Alanin Adi",
        "string",
        true,
        30,
        "Committed person's first name (s.323).",
        323,
      ),
      FIELD(
        "taahhutAlanSoyad",
        "Taahhut Alanin Soyadi",
        "string",
        true,
        30,
        "Committed person's last name (s.323).",
        323,
      ),
    ],
  },
  "taahhut-dis-dvo": {
    id: "TaahhutDisDVO",
    domain: "taahhut",
    direction: "input",
    fields: [
      FIELD(
        "sutKodu",
        "SUT Islem Kodu",
        "string",
        true,
        null,
        "SUT code of the committed procedure. Restricted to the SUT annex-7 prosthesis codes (404010…404420 per the guide, s.326) — dental commitments are only accepted for those (s.326).",
        323,
        { codeSystem: "SUT" },
      ),
      FIELD(
        "disNo",
        "Agiz Semasindaki Dis Numarasi",
        "integer",
        true,
        null,
        "Tooth/region number per the mouth schema Tablo 4.7.4 (adult 11-48 quadrant numbering, deciduous 51-65/71-85, regions 1-7, anomaly regions) (s.323-326).",
        323,
      ),
    ],
  },
  "taahhut-cevap-dvo": {
    id: "TaahhutCevapDVO",
    domain: "taahhut",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means the save succeeded (s.322).',
        322,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Failure description (s.322).",
        322,
      ),
      FIELD(
        "taahhutNo",
        "Taahhut Numarasi",
        "integer",
        false,
        null,
        "System-generated commitment number (s.322).",
        322,
        { syntheticOnly: true },
      ),
      FIELD(
        "taahhutCikti",
        "Taahhut Cikti",
        "array",
        false,
        null,
        "Commitment output as a PDF byte array; the guide states no other output is valid (s.322).",
        322,
      ),
    ],
  },
  "taahhut-oku-dvo": {
    id: "TaahhutOkuDVO",
    domain: "taahhut",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "string",
        true,
        null,
        "GSS-assigned facility code — typed String here unlike the Integer in TaahhutKayitDVO (s.324).",
        324,
      ),
      FIELD(
        "taahhutNo",
        "Taahhut Numarasi",
        "integer",
        true,
        null,
        "System-generated commitment number (s.324).",
        324,
        { syntheticOnly: true },
      ),
    ],
  },
  "taahhut-kisi-oku-dvo": {
    id: "TaahhutKisiOkuDVO",
    domain: "taahhut",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "GSS-assigned facility code (s.324).",
        324,
      ),
      FIELD(
        "tcKimlikNo",
        "Kisinin T.C. Kimlik Numarasi",
        "integer",
        true,
        null,
        "Citizen ID of the person whose commitments are read; the guide types it long (s.325).",
        325,
        { sensitive: true },
      ),
    ],
  },
  "taahhut-kisi-cevap-dvo": {
    id: "TaahhutKisiCevapDVO",
    domain: "taahhut",
    direction: "output",
    fields: [
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.325).',
        325,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Failure description (s.325).",
        325,
      ),
      FIELD(
        "taahhutNo",
        "Taahhut Numaralari",
        "array",
        false,
        null,
        "Commitment numbers previously saved by the facility for the person (s.325).",
        325,
      ),
    ],
  },
  "ortodonti-formu-kaydet-giris-dvo": {
    id: "OrtodontiFormuKaydetGirisDVO",
    domain: "ortodonti",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "GSS-assigned facility code (s.326).",
        326,
      ),
      FIELD(
        "provizyonNo",
        "Provizyon No",
        "string",
        true,
        null,
        "Provision number issued for the procedure (s.326).",
        326,
      ),
      FIELD(
        "sutKodu",
        "Sut Kodu",
        "string",
        true,
        null,
        "SUT code of the procedure (s.326).",
        326,
        { codeSystem: "SUT" },
      ),
      FIELD(
        "formNo",
        "Form No",
        "integer",
        true,
        null,
        "Form number of the person; the guide's required column reads 'Evet/Hayır' — a conditional requirement preserved verbatim (s.326).",
        326,
        {
          conditionalRequired: [
            {
              condition: "Evet/Hayır per the guide",
              note: "required column literally reads 'Evet/Hayır' (s.326)",
            },
          ],
        },
      ),
      FIELD(
        "islemTarihi",
        "Islem Tarihi",
        "string",
        true,
        null,
        'Procedure date, "dd.mm.yyyy" (s.326).',
        326,
      ),
      FIELD(
        "tcKimlikNo",
        "Kisinin T.C. Kimlik Numarasi",
        "integer",
        true,
        null,
        "Citizen ID of the person receiving the orthodontic procedure; the guide types it long (s.326).",
        326,
        { sensitive: true },
      ),
    ],
  },
  "ortodonti-formu-kaydet-cevap-dvo": {
    id: "OrtodontiFormuKaydetCevapDVO",
    domain: "ortodonti",
    direction: "output",
    fields: [
      FIELD(
        "formNo",
        "Form No",
        "string",
        false,
        null,
        "Orthodontic form number (s.327).",
        327,
        { syntheticOnly: true },
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.327).',
        327,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.327).",
        327,
      ),
    ],
  },
  "ortodonti-formu-iptal-giris-dvo": {
    id: "OrtodontiFormuIptalGirisDVO",
    domain: "ortodonti",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "GSS-assigned facility code (s.327).",
        327,
      ),
      FIELD(
        "sutKodu",
        "Sut Kodu",
        "string",
        true,
        null,
        "SUT code of the procedure (s.327).",
        327,
        { codeSystem: "SUT" },
      ),
      FIELD(
        "formNo",
        "Form No",
        "integer",
        true,
        null,
        "Form number (s.327).",
        327,
      ),
      FIELD(
        "tcKimlikNo",
        "Kisinin T.C. Kimlik Numarasi",
        "integer",
        true,
        null,
        "Citizen ID of the person receiving the orthodontic procedure; the guide types it long (s.327).",
        327,
        { sensitive: true },
      ),
    ],
  },
  "ortodonti-formu-iptal-cevap-dvo": {
    id: "OrtodontiFormuIptalCevapDVO",
    domain: "ortodonti",
    direction: "output",
    fields: [
      FIELD(
        "formNo",
        "Form No",
        "string",
        false,
        null,
        "Orthodontic form number (s.328).",
        328,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.328).',
        328,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.328).",
        328,
      ),
    ],
  },
  "ortodonti-formu-oku-giris-dvo": {
    id: "OrtodontiFormuOkuGirisDVO",
    domain: "ortodonti",
    direction: "input",
    fields: [
      FIELD(
        "saglikTesisKodu",
        "Tesis Kodu",
        "integer",
        true,
        null,
        "GSS-assigned facility code (s.328).",
        328,
      ),
      FIELD(
        "sutKodu",
        "Sut Kodu",
        "string",
        true,
        null,
        "SUT code of the procedure (s.328).",
        328,
        { codeSystem: "SUT" },
      ),
      FIELD(
        "formNo",
        "Form No",
        "integer",
        true,
        null,
        "Form number (s.328).",
        328,
      ),
      FIELD(
        "tcKimlikNo",
        "Kisinin T.C. Kimlik Numarasi",
        "integer",
        true,
        null,
        "Citizen ID of the person receiving the orthodontic procedure; the guide types it long (s.328).",
        328,
        { sensitive: true },
      ),
    ],
  },
  "ortodonti-formu-oku-cevap-dvo": {
    id: "OrtodontiFormuOkuCevapDVO",
    domain: "ortodonti",
    direction: "output",
    fields: [
      FIELD(
        "formNo",
        "Form No",
        "string",
        false,
        null,
        "Orthodontic form number (s.329).",
        329,
      ),
      FIELD(
        "islemTuru",
        "Islem Turu",
        "string",
        false,
        null,
        "Orthodontic procedure type, e.g. Sınıf I, Sınıf II (s.329).",
        329,
      ),
      FIELD(
        "tesis_kodu_1",
        "Tesis Kodu 1",
        "string",
        false,
        null,
        "Facility code of the first procedure; underscored parameter names are guide-verbatim (s.329).",
        329,
      ),
      FIELD(
        "tesis_kodu_2",
        "Tesis Kodu 2",
        "string",
        false,
        null,
        "Facility code of the second procedure (s.329).",
        329,
      ),
      FIELD(
        "tesis_kodu_3",
        "Tesis Kodu 3",
        "string",
        false,
        null,
        "Facility code of the third procedure (s.329).",
        329,
      ),
      FIELD(
        "islem_tarihi_1",
        "Islem Tarihi 1",
        "string",
        false,
        null,
        "Date of the first procedure (s.329).",
        329,
      ),
      FIELD(
        "islem_tarihi_2",
        "Islem Tarihi 2",
        "string",
        false,
        null,
        "Date of the second procedure (s.329).",
        329,
      ),
      FIELD(
        "islem_tarihi_3",
        "Islem Tarihi 3",
        "string",
        false,
        null,
        "Date of the third procedure (s.329).",
        329,
      ),
      FIELD(
        "provizyonNo1",
        "Provizyon No 1",
        "string",
        false,
        null,
        "Provision number of the first procedure (s.329).",
        329,
      ),
      FIELD(
        "provizyonNo2",
        "Provizyon No 2",
        "string",
        false,
        null,
        "Provision number of the second procedure (s.329).",
        329,
      ),
      FIELD(
        "provizyonNo3",
        "Provizyon No 3",
        "string",
        false,
        null,
        "Provision number of the third procedure (s.329).",
        329,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "string",
        true,
        4,
        'Result code; "0000" means success (s.329).',
        329,
      ),
      FIELD(
        "sonucMesaji",
        "Sonuc Mesaji",
        "string",
        false,
        null,
        "Result description (s.329).",
        329,
      ),
    ],
  },
};

// ── methods ───────────────────────────────────────────────────────
const METHOD = (
  service,
  slug,
  operationName,
  inputDvo,
  outputDvo,
  page,
  section,
  effects,
) => ({
  id: `medula.hastane.${service}.${slug}`,
  service: `medula.hastane.${service}`,
  names: {
    documentationHeading: operationName,
    operationName,
    aliases: [operationName],
  },
  contract: { inputDvo, outputDvo },
  sourceRefs: [{ ...GUIDE_REF(page), section }],
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
  taahhut: {
    "dis-taahhut-kaydet": METHOD(
      "taahhut",
      "dis-taahhut-kaydet",
      "disTaahhutKayit",
      "TaahhutKayitDVO",
      "TaahhutCevapDVO",
      322,
      "4.4.1 disTaahhutKayit Metodu",
      {
        creates: ["taahhut"],
        reads: [],
        updates: [],
        deletes: [],
        generates: ["taahhutNo"],
      },
    ),
    "dis-taahhut-oku": METHOD(
      "taahhut",
      "dis-taahhut-oku",
      "okuDisTaahhut",
      "TaahhutOkuDVO",
      "TaahhutCevapDVO",
      323,
      "4.4.2 okuDisTaahhut Metodu",
      {
        creates: [],
        reads: ["taahhut"],
        updates: [],
        deletes: [],
        generates: [],
      },
    ),
    "dis-taahhut-sil": METHOD(
      "taahhut",
      "dis-taahhut-sil",
      "silDisTaahhut",
      "TaahhutOkuDVO",
      "TaahhutCevapDVO",
      324,
      "4.4.3 silDisTaahhut Metodu",
      {
        creates: [],
        reads: [],
        updates: [],
        deletes: ["taahhut"],
        generates: [],
      },
    ),
    "kisi-dis-taahhut-oku": METHOD(
      "taahhut",
      "kisi-dis-taahhut-oku",
      "okuKisiDisTaahhut",
      "TaahhutKisiOkuDVO",
      "TaahhutKisiCevapDVO",
      324,
      "4.4.4 okuKisiDisTaahhut Metodu",
      { creates: [], reads: [], updates: [], deletes: [], generates: [] },
    ),
  },
  ortodonti: {
    "ortodonti-formu-kaydet": METHOD(
      "ortodonti",
      "ortodonti-formu-kaydet",
      "ortodontiFormuKaydet",
      "OrtodontiFormuKaydetGirisDVO",
      "OrtodontiFormuKaydetCevapDVO",
      326,
      "4.5.1 ortodontiFormuKaydet Metodu",
      {
        creates: ["ortodontiFormu"],
        reads: [],
        updates: [],
        deletes: [],
        generates: ["formNo"],
      },
    ),
    "ortodonti-formu-iptal": METHOD(
      "ortodonti",
      "ortodonti-formu-iptal",
      "ortodontiFormuIptal",
      "OrtodontiFormuIptalGirisDVO",
      "OrtodontiFormuIptalCevapDVO",
      327,
      "4.5.2 ortodontiFormuIptal Metodu",
      {
        creates: [],
        reads: ["ortodontiFormu"],
        updates: [],
        deletes: [],
        generates: [],
      },
    ),
    "ortodonti-formu-oku": METHOD(
      "ortodonti",
      "ortodonti-formu-oku",
      "ortodontiFormuOku",
      "OrtodontiFormuOkuGirisDVO",
      "OrtodontiFormuOkuCevapDVO",
      328,
      "4.5.3 ortodontiFormuOku Metodu",
      {
        creates: [],
        reads: ["ortodontiFormu"],
        updates: [],
        deletes: [],
        generates: [],
      },
    ),
  },
};

// ── services ──────────────────────────────────────────────────────
const services = {
  taahhut: {
    id: "medula.hastane.taahhut",
    slug: "taahhut",
    displayName: "Taahhut Kayit Metotlari",
    description:
      "Dental-prosthesis commitment operations: save (restricted to SUT annex-7 prosthesis codes 404010…404420), read by commitment number, delete, and read a person's prior commitments. Dental codes follow the mouth schema Tablo 4.7.4 (s.325-326).",
    sourceRefs: [{ ...GUIDE_REF(322), section: "4.4 Taahhut Kayit Metotlari" }],
    wsdl: { production: "wsdl.taahhut.production", test: "wsdl.taahhut.test" },
    methods: Object.keys(methods.taahhut).map(
      (s) => `medula.hastane.taahhut.${s}`,
    ),
    status: "reviewed",
  },
  ortodonti: {
    id: "medula.hastane.ortodonti",
    slug: "ortodonti",
    displayName: "Ortodonti Formu Kayit Metotlari",
    description:
      "Orthodontic form operations: save, cancel and read the orthodontics follow-up form (guide section renumbered 4.5/4.8 across editions).",
    sourceRefs: [
      { ...GUIDE_REF(326), section: "4.5 Ortodonti Formu Kayit Metotlari" },
    ],
    wsdl: {
      production: "wsdl.ortodonti.production",
      test: "wsdl.ortodonti.test",
    },
    methods: Object.keys(methods.ortodonti).map(
      (s) => `medula.hastane.ortodonti.${s}`,
    ),
    status: "reviewed",
  },
};

// ── emit ──────────────────────────────────────────────────────────
function write(rel, data) {
  const path = resolve(ROOT, rel);
  mkdirSync(dirname(path), { recursive: true });
  writeFileSync(path, stringify(data, { lineWidth: 0 }), "utf8");
  console.log("wrote", rel);
}

for (const [name, dvo] of Object.entries(dvos)) {
  const domain = dvo.id.includes("Taahhut") ? "taahhut" : "ortodonti";
  write(`registry/dvos/${domain}/${name}.yml`, {
    ...dvo,
    sourceRefs: [
      {
        ...GUIDE_REF(dvo.fields[0].sourceRefs[0].page),
        section:
          domain === "taahhut"
            ? "4.4 Taahhut Kayit Metotlari"
            : "4.5 Ortodonti Formu Kayit Metotlari",
      },
    ],
    status: "reviewed",
  });
}
for (const [domain, group] of Object.entries(methods)) {
  for (const [slug, method] of Object.entries(group)) {
    write(`registry/methods/${domain}/${slug}.yml`, method);
  }
}
for (const [slug, svc] of Object.entries(services)) {
  write(`registry/services/${slug}.yml`, svc);
}

const manifestPath = resolve(ROOT, "sources/wsdl-manifest.yml");
const manifest = readFileSync(manifestPath, "utf8");
if (!manifest.includes("wsdl.taahhut.production")) {
  const addition = `

  - id: wsdl.taahhut.production
    service: taahhut
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/taahhutIslemleriWS?wsdl

  - id: wsdl.taahhut.test
    service: taahhut
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/taahhutIslemleriWS?wsdl

  - id: wsdl.ortodonti.production
    service: ortodonti
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/ortodontiIslemleriWS?wsdl

  - id: wsdl.ortodonti.test
    service: ortodonti
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/ortodontiIslemleriWS?wsdl
`;
  writeFileSync(manifestPath, manifest.replace(/\n$/, "\n") + addition, "utf8");
  console.log("appended taahhut + ortodonti wsdl entries");
}
console.log("G45b generation complete");
