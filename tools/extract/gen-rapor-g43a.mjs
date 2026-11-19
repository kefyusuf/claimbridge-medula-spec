/**
 * G43a generator: rapor query service group from guide pages 252-283.
 * Emits registry YAML files (service, methods, dvos, enum) + wsdl manifest
 * entries. One-off extraction tool — run once, commit the output.
 */
import { readFileSync, writeFileSync, mkdirSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";

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
  codeSystem: null,
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

const RAPOR_TURU_ACIKLAMA =
  "Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet.";

// ── enum: rapor-turu ──────────────────────────────────────────────
const raporTuru = {
  id: "rapor-turu",
  displayName: "Rapor Turu",
  values: [
    ["1", "Tedavi", "Treatment report."],
    ["2", "Is Kazasi", "Work accident report."],
    ["3", "Meslek Hastaligi", "Occupational disease report."],
    ["4", "Hastalik", "Illness report."],
    ["5", "Dogum Oncesi Calisabilir", "Fit-to-work-before-birth report."],
    ["6", "Analik", "Maternity report."],
    ["7", "Dogum", "Birth report."],
    ["8", "Protez", "Prosthesis report."],
    ["9", "Maluliyet", "Disability report."],
    ["10", "Ilac Kullanim", "Drug use report."],
    ["11", "Ilac Muafiyet", "Drug exemption report."],
  ].map(([code, label, description]) => ({ code, label, description })),
  sourceRefs: [
    {
      ...GUIDE_REF(280),
      notes:
        "Value list reproduced identically on s.282 (RaporOkuTCKimlikNodanDVO.raporTuru) and s.254 (RaporCevapDVO.raporTuru, Integer).",
    },
  ],
  status: "reviewed",
};

// ── DVOs ──────────────────────────────────────────────────────────
const dvos = {
  "rapor-sorgu-dvo": {
    id: "RaporSorguDVO",
    domain: "rapor",
    direction: "input",
    tableRef: "Tablo 4.4.3.a (s.279)",
    fields: [
      FIELD(
        "raporBilgisi",
        "Rapor Bilgisi",
        "object",
        true,
        null,
        "Report lookup key object; shape in Tablo 4.4.3.c (RaporOkuDVO, this registry).",
        279,
      ),
      FIELD(
        "kullaniciTesisKodu",
        "Kullanici Tesis Kodu",
        "integer",
        true,
        null,
        "Health facility code of the caller (s.279).",
        279,
      ),
    ],
  },
  "rapor-oku-dvo": {
    id: "RaporOkuDVO",
    domain: "rapor",
    direction: "input",
    tableRef: "Tablo 4.4.3.c (s.279-280)",
    fields: [
      FIELD(
        "raporTesisKodu",
        "Rapor Veren Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the facility that issued the report (s.280).",
        280,
      ),
      FIELD(
        "raporNo",
        "Rapor Numarasi",
        "string",
        true,
        20,
        "Report number (s.280).",
        280,
      ),
      FIELD(
        "raporTarih",
        "Rapor Tarihi",
        "string",
        true,
        10,
        'Report date, "dd.mm.yyyy" format (s.280).',
        280,
      ),
      FIELD(
        "raporTuru",
        "Rapor Turu",
        "enum",
        true,
        1,
        RAPOR_TURU_ACIKLAMA,
        280,
        { enumRef: "rapor-turu" },
      ),
      FIELD(
        "raporSiraNo",
        "Rapor Sira No",
        "string",
        true,
        null,
        "Report sequence number (s.280).",
        280,
      ),
    ],
  },
  "ilac-rapor-duzelt-dvo": {
    id: "IlacRaporDuzeltDVO",
    domain: "rapor",
    direction: "input",
    tableRef: "Tablo 4.4.6.a (s.281)",
    fields: [
      FIELD(
        "drTescilNo",
        "Dr Diploma Tescil Numarasi",
        "string",
        true,
        20,
        "Doctor diploma registration number. The guide's description column erroneously repeats the RaporCevapDVO result-code text here; the parameter name and clear name (Dr diploma tescil numarası) are authoritative.",
        281,
      ),
      FIELD(
        "duzeltmeBilgisi",
        "Duzeltme Aciklamasi",
        "string",
        true,
        2000,
        "Additional annotation appended to the drug report (s.281).",
        281,
      ),
      FIELD(
        "duzeltmeTarihi",
        "Duzeltme Tarihi",
        "string",
        true,
        10,
        'Correction date, "dd.mm.yyyy" format (s.281).',
        281,
      ),
      FIELD(
        "raporNo",
        "Rapor Numarasi",
        "string",
        true,
        20,
        "Report number (s.281).",
        281,
      ),
      FIELD(
        "raporTarihi",
        "Rapor Tarihi",
        "string",
        true,
        10,
        'Report date, "dd.mm.yyyy" format (s.281).',
        281,
      ),
      FIELD(
        "raporTuru",
        "Rapor Turu",
        "enum",
        true,
        1,
        "Report type; this method only applies to drug reports: 10 = İlaç Kullanım (s.281).",
        281,
        { enumRef: "rapor-turu" },
      ),
      FIELD(
        "tesisKodu",
        "Raporu Veren Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the facility that issued the report (s.281).",
        281,
      ),
      FIELD(
        "raporEtkinMaddeler",
        "Etkin Maddeler",
        "array",
        false,
        null,
        "Active ingredients; item shape in Tablo 4.4.1.ff (RaporEtkinMaddeDVO) — deferred to G43b with the RaporBilgisiKaydet composite set.",
        281,
      ),
      FIELD(
        "tanilar",
        "ICD10 Tanilar",
        "array",
        false,
        null,
        "ICD-10 diagnoses; item shape in Tablo 4.2.1.k (TaniBilgisiDVO) — already used by the hizmet-kayit group.",
        281,
      ),
      FIELD(
        "ilacTeshisler",
        "Ilac Teshisler",
        "array",
        false,
        null,
        "Drug report diagnoses; item shape in Tablo 4.4.1.gg (IlacTeshisBilgiDVO). The guide marks this field mandatory for drug reports (s.281) despite listing it as optional in the required column.",
        281,
        {
          conditionalRequired: [
            {
              condition: "the report is a drug report (raporTuru 10)",
              note: "guide text: ilaç raporlarında gönderilmesi zorunlu (s.281)",
            },
          ],
        },
      ),
    ],
  },
  "rapor-oku-rapor-takip-nodan-dvo": {
    id: "RaporOkuRaporTakipNodanDVO",
    domain: "rapor",
    direction: "input",
    tableRef: "Tablo 4.4.7.a (s.281-282)",
    fields: [
      FIELD(
        "raporTakipNo",
        "Rapor Takip Numarasi",
        "string",
        true,
        null,
        "Report tracking number (s.281).",
        281,
        { syntheticOnly: true },
      ),
      FIELD(
        "kullaniciTesisKodu",
        "Kullanici Tesis Kodu",
        "integer",
        true,
        null,
        "Health facility code of the caller (s.282).",
        282,
      ),
      FIELD(
        "raporSiraNo",
        "Rapor Sira No",
        "string",
        true,
        null,
        "Report sequence number (s.282).",
        282,
      ),
    ],
  },
  "rapor-oku-tc-kimlik-nodan-dvo": {
    id: "RaporOkuTCKimlikNodanDVO",
    domain: "rapor",
    direction: "input",
    tableRef: "Tablo 4.4.8.a (s.282)",
    fields: [
      FIELD(
        "tckimlikNo",
        "TC Kimlik Numarasi",
        "string",
        true,
        null,
        "Citizen ID of the report owner. The guide's description column erroneously repeats 'Rapor Takip Numarası'; the parameter name tckimlikNo is authoritative.",
        282,
        { sensitive: true },
      ),
      FIELD(
        "raporTuru",
        "Rapor Turu",
        "enum",
        true,
        1,
        RAPOR_TURU_ACIKLAMA,
        282,
        { enumRef: "rapor-turu" },
      ),
      FIELD(
        "kullaniciTesisKodu",
        "Kullanici Tesis Kodu",
        "integer",
        true,
        null,
        "Health facility code of the caller (s.282).",
        282,
      ),
    ],
  },
  "rapor-cevap-dvo": {
    id: "RaporCevapDVO",
    domain: "rapor",
    direction: "output",
    tableRef: "Tablo 4.4.1.b (s.253-254)",
    fields: [
      FIELD(
        "raporTakipNo",
        "Rapor Takip No",
        "integer",
        false,
        null,
        "System-generated unique number of the saved report (s.253).",
        253,
        { syntheticOnly: true },
      ),
      FIELD(
        "analikRapor",
        "Analik Isgoremezlik Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a maternity incapacity report; shape Tablo 4.4.1.f (AnalikIsgoremezlikRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "dogumOncesiCalisabilirRapor",
        "Dogum Oncesi Calisabilir Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a fit-to-work-before-birth report; shape Tablo 4.4.1.d (DogumOncesiCalisabilirRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "dogumRapor",
        "Dogum Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a birth report; shape Tablo 4.4.1.e (DogumRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "ilacRapor",
        "Ilac Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a drug report (use or exemption); shape Tablo 4.4.1.h (IlacRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "maluliyetRapor",
        "Maluliyet Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a disability report; shape Tablo 4.4.1.j (MaluliyetRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "protezRapor",
        "Protez Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a prosthesis report; shape Tablo 4.4.1.g (ProtezRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "tedaviRapor",
        "Tedavi Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is a treatment report; shape Tablo 4.4.1.i (TedaviRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "isgoremezlikRapor",
        "Isgoremezlik Raporu",
        "object",
        false,
        null,
        "Populated when the saved report is an incapacity report (work accident, occupational disease or illness); shape Tablo 4.4.1.c (IsgoremezlikRaporDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "isgoremezlikRaporEkleri",
        "Isgoremezlik Raporu Ekleri",
        "array",
        false,
        null,
        "Incapacity report attachments; item shape Tablo 4.4.1.ee (IsgoremezlikRaporEkDVO) — deferred to G43b.",
        253,
      ),
      FIELD(
        "sonucAciklamasi",
        "Sonuc Aciklamasi",
        "string",
        false,
        null,
        "Result description; the failure reason is stated here (s.253).",
        253,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "integer",
        true,
        null,
        'Result code; 0 (zero) means success, any other value is an error. Intra-guide divergence: this group is Integer 0-based, unlike the hasta-kabul group\'s String "0000".',
        254,
      ),
      FIELD(
        "raporTuru",
        "Rapor Turu",
        "enum",
        false,
        null,
        "Type of the saved report; " + RAPOR_TURU_ACIKLAMA,
        254,
        { enumRef: "rapor-turu" },
      ),
    ],
  },
  "rapor-cevap-tc-kimlik-nodan-dvo": {
    id: "RaporCevapTCKimlikNodanDVO",
    domain: "rapor",
    direction: "output",
    tableRef: "Tablo 4.4.8.b (s.283)",
    fields: [
      FIELD(
        "raporlar",
        "Raporlar",
        "array",
        false,
        null,
        "Reports found for the citizen; items are RaporCevapDVO (this registry).",
        283,
      ),
      FIELD(
        "sonucAciklamasi",
        "Sonuc Aciklamasi",
        "string",
        false,
        null,
        "Result description; the failure reason is stated here (s.283).",
        283,
      ),
      FIELD(
        "sonucKodu",
        "Sonuc Kodu",
        "integer",
        true,
        null,
        "Result code; 0 (zero) means success, any other value is an error (s.283).",
        283,
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
  successNote,
) => ({
  id: `medula.hastane.rapor.${slug}`,
  service: "medula.hastane.rapor",
  names: {
    documentationHeading: operationName,
    operationName,
    aliases: [operationName],
  },
  contract: { inputDvo, outputDvo },
  sourceRefs: [
    {
      ...GUIDE_REF(page),
      section: `4.4 ${section}`,
      notes: successNote,
    },
  ],
  stateEffects: {
    creates: [],
    reads: ["rapor"],
    updates: [],
    deletes: [],
    generates: [],
  },
  success: {
    resultCodeField: "sonucKodu",
    successCode: "0",
    messageField: "sonucAciklamasi",
  },
  sandbox: { supported: false, defaultScenario: null },
  status: "reviewed",
});

const methods = {
  "rapor-bilgisi-bul": METHOD(
    "rapor-bilgisi-bul",
    "RaporBilgisiBul",
    "RaporSorguDVO",
    "RaporCevapDVO",
    279,
    "4.4.3 RaporBilgisiBul Metodu",
    'Integer 0-based success code (s.254) — not the "0000" string of the hasta-kabul group.',
  ),
  "rapor-bilgisi-sil": METHOD(
    "rapor-bilgisi-sil",
    "RaporBilgisiSil",
    "RaporSorguDVO",
    "RaporCevapDVO",
    280,
    "4.4.4 RaporBilgisiSil Metodu",
    "Integer 0-based success code (s.254).",
  ),
  "ilac-rapor-duzelt": METHOD(
    "ilac-rapor-duzelt",
    "IlacRaporDuzelt",
    "IlacRaporDuzeltDVO",
    "RaporCevapDVO",
    280,
    "4.4.5 IlacRaporDuzelt Metodu",
    "Integer 0-based success code (s.254).",
  ),
  "rapor-bilgisi-bul-rapor-takip-nodan": METHOD(
    "rapor-bilgisi-bul-rapor-takip-nodan",
    "RaporBilgisiBulRaporTakipNodan",
    "RaporOkuRaporTakipNodanDVO",
    "RaporCevapDVO",
    281,
    "4.4.6 RaporBilgisiBulRaporTakipNodan Metodu",
    "Integer 0-based success code (s.254).",
  ),
  "rapor-bilgisi-bul-tc-kimlik-nodan": METHOD(
    "rapor-bilgisi-bul-tc-kimlik-nodan",
    "RaporBilgisiBulTCKimlikNodan",
    "RaporOkuTCKimlikNodanDVO",
    "RaporCevapTCKimlikNodanDVO",
    282,
    "4.4.7 RaporBilgisiBulTCKimlikNodan Metodu",
    "Integer 0-based success code (s.283).",
  ),
};

// ── service ───────────────────────────────────────────────────────
const service = {
  id: "medula.hastane.rapor",
  slug: "rapor",
  displayName: "Rapor Bilgisi Kayit",
  description:
    "Report information registry operations: report lookup by report key, deletion, drug report correction and lookups by report tracking number or citizen ID. Registration (RaporBilgisiKaydet / TakipNoileRaporBilgisiKaydet) lands with G43b once the RaporGirisDVO composite set is extracted.",
  sourceRefs: [
    {
      ...GUIDE_REF(252),
      section: "4.4 Rapor Bilgisi Kayit Metotlari",
    },
  ],
  wsdl: {
    production: "wsdl.rapor.production",
    test: "wsdl.rapor.test",
  },
  methods: Object.keys(methods).map((slug) => `medula.hastane.rapor.${slug}`),
  status: "reviewed",
};

// ── emit ──────────────────────────────────────────────────────────
import { stringify } from "yaml";

function write(rel, data) {
  const path = resolve(ROOT, rel);
  mkdirSync(dirname(path), { recursive: true });
  writeFileSync(path, stringify(data, { lineWidth: 0 }), "utf8");
  console.log("wrote", rel);
}

write("registry/enums/rapor-turu.yml", raporTuru);
for (const [name, dvo] of Object.entries(dvos)) {
  const { tableRef, ...rest } = dvo;
  write(`registry/dvos/rapor/${name}.yml`, {
    ...rest,
    sourceRefs: [{ ...GUIDE_REF(279), section: dvo.tableRef }],
    status: "reviewed",
  });
}
for (const [slug, method] of Object.entries(methods)) {
  write(`registry/methods/rapor/${slug}.yml`, method);
}
write("registry/services/rapor.yml", service);

// wsdl manifest merge
const manifestPath = resolve(ROOT, "sources/wsdl-manifest.yml");
const manifest = readFileSync(manifestPath, "utf8");
if (!manifest.includes("wsdl.rapor.production")) {
  const addition = `

  - id: wsdl.rapor.production
    service: rapor
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/raporIslemleriWS?wsdl

  - id: wsdl.rapor.test
    service: rapor
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/raporIslemleriWS?wsdl
`;
  writeFileSync(manifestPath, manifest.replace(/\n$/, "\n") + addition, "utf8");
  console.log("appended rapor wsdl entries to sources/wsdl-manifest.yml");
}
