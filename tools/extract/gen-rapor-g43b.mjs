/**
 * G43b generator: rapor registration composite from guide pages 252-278.
 * RaporGirisDVO entry + IsgoremezlikRaporDVO branch + IsKazasiRaporDVO +
 * shared leaves (RaporBilgisi/HakSahibi/DoktorBilgisi) + IlacRaporDuzelt's
 * ff/gg item tables + ten new code-list enums + the two registration
 * methods. One-off extraction tool — run once, commit the output.
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

const ENUM = (id, displayName, values, page, notes) => ({
  id,
  displayName,
  values: values.map(([code, label, description]) => ({
    code,
    label,
    description,
  })),
  sourceRefs: [{ ...GUIDE_REF(page), notes }],
  status: "reviewed",
});

// ── enums ─────────────────────────────────────────────────────────
const enums = {
  "isgoremezlik-rapor-turu": ENUM(
    "isgoremezlik-rapor-turu",
    "Isgoremezlik Rapor Turu",
    [
      ["1", "Is Kazasi", "Work incapacity report branch."],
      ["2", "Meslek Hastaligi", "Occupational disease branch."],
      ["3", "Hastalik", "Illness branch."],
      ["4", "Analik", "Maternity branch."],
      ["5", "Emzirme", "Nursing branch."],
    ],
    254,
    "Drives the conditional branches of IsgoremezlikRaporDVO (s.255): turu 1 → isKazasiRaporu, 2 → meslekHastaligiRaporu, 3 → hastalikRaporu, 4 → analikRaporu, 5 → emzirmeRaporu zorunlu.",
  ),
  "rapor-duzenleme-turu": ENUM(
    "rapor-duzenleme-turu",
    "Rapor Duzenleme Turu",
    [
      ["1", "Heyet", "Board-issued report."],
      ["2", "Tek Hekim", "Single-physician report."],
    ],
    255,
  ),
  "olum-durumu": ENUM(
    "olum-durumu",
    "Olum Durumu",
    [
      ["1", "Sag", "Insured alive."],
      ["2", "Olu", "Insured deceased."],
    ],
    255,
  ),
  "devam-durumu": ENUM(
    "devam-durumu",
    "Devam Durumu",
    [
      ["-1", "Hayir", "No continuation (pre-selection answer)."],
      [
        "1",
        "Gecmiste gitmedigi kontrol var, devam mi (evet)",
        "Past missed control exists; continue.",
      ],
      [
        "2",
        "Devam eden raporu var, devam mi (evet)",
        "Ongoing report exists; continue.",
      ],
    ],
    256,
    "Per the pre-selection web service answer (s.256).",
  ),
  "yatis-devam-durumu": ENUM(
    "yatis-devam-durumu",
    "Yatis Devam Durumu",
    [
      ["1", "Yatis Yok", "No hospitalization."],
      ["2", "Yatis Devam Ediyor", "Hospitalization ongoing."],
      ["3", "Yatis Var, Taburcu Olmus", "Hospitalized, discharged."],
      ["4", "Karma", "After discharge, outpatient rest issued."],
    ],
    256,
    "IsgoremezlikRaporDVO.yatisDevam (s.256). The work-accident branch uses a three-value variant: yatis-devam-is-kazasi.",
  ),
  "yatis-devam-is-kazasi": ENUM(
    "yatis-devam-is-kazasi",
    "Yatis Devam Durumu (Is Kazasi Dali)",
    [
      ["1", "Yatis Yok", "No hospitalization."],
      ["2", "Yatis Devam", "Hospitalization ongoing."],
      ["3", "Taburcu", "Discharged."],
    ],
    257,
    "IsKazasiRaporDVO.yatisDevam (s.257) — three-value variant of yatis-devam-durumu.",
  ),
  "adli-vaka-durumu": ENUM(
    "adli-vaka-durumu",
    "Adli Vaka / Trafik Kazasi",
    [
      ["1", "Adli Vaka", "Legal case."],
      ["2", "Trafik Kazasi", "Traffic accident."],
      ["3", "Yok", "Neither."],
    ],
    268,
    "RaporBilgisiDVO.aVakaTKaza (s.268): applies to illness, occupational-disease and work-accident cases.",
  ),
  "doktor-tipi": ENUM(
    "doktor-tipi",
    "Doktor Tipi",
    [
      ["1", "Raporu Isteyen Doktor Hekim", "Requesting physician."],
      [
        "2",
        "Raporu Duzenleyen Doktor Dis Hekimi",
        "Issuing dentist/physician.",
      ],
    ],
    272,
  ),
  "doz-birimi": ENUM(
    "doz-birimi",
    "Doz Birimi",
    [
      ["1", "Adet", "Piece."],
      ["2", "Mililitre", "Millilitre."],
      ["3", "Miligram", "Milligram."],
      ["4", "Gram", "Gram."],
      ["5", "Damla", "Drop."],
      ["6", "Unite", "Unit."],
      ["7", "Kutu", "Box."],
      ["8", "Mikrogram", "Microgram."],
      ["9", "Mikrolitre", "Microlitre."],
      ["A", "Bin Unite", "Thousand units."],
      ["B", "Milyon Unite", "Million units."],
    ],
    277,
  ),
  "periyot-birimi": ENUM(
    "periyot-birimi",
    "Kullanim Periyot Birimi",
    [
      ["1", "Dakika", "Minute."],
      ["2", "Saat", "Hour."],
      ["3", "Gun", "Day."],
      ["4", "Hafta", "Week."],
      ["5", "Ay", "Month."],
      ["6", "Yil", "Year."],
      ["7", "Omur Boyu", "Lifetime."],
    ],
    278,
  ),
  "devredilen-kurum-rapor": ENUM(
    "devredilen-kurum-rapor",
    "Devredilen Kurum (Rapor Grubu Varyanti)",
    [
      ["1", "SSK", "Social Insurance Institution coverage."],
      ["2", "Bagkur", "Bag-Kur coverage."],
      ["3", "Emekli Sandigi", "Retirement Fund coverage."],
      ["4", "Yesil Kart", "Green Card."],
      ["5", "Vatansiz ve sininmacilar", "Stateless persons and refugees."],
      [
        "6",
        "2022 sayili kanun kapsami",
        "Monthly aid under law no. 2022 (65+ needy citizens).",
      ],
      [
        "7",
        "1005 sayili seref ayligi",
        "Independence Medal veteran pension under law no. 1005.",
      ],
      [
        "10",
        "2828 sayili SHCEK",
        "Free social-services care under law no. 2828.",
      ],
      ["12", "S.G.K.", "Social Security Institution."],
      [
        "14",
        "Mutekabiliyet oturma izni",
        "Foreign residents under reciprocity, uninsured abroad.",
      ],
      [
        "15",
        "4447 issizlik / kisa calisma odenegi",
        "Unemployment or short-time work benefit under law no. 4447.",
      ],
      [
        "17",
        "Baska ulkede sigortasi yok / istege tabi",
        "No foreign coverage; voluntary insured.",
      ],
      [
        "18",
        "18 yas alti kapsam disi",
        "Under-18 persons outside social security.",
      ],
      [
        "19",
        "Universite yabanci uyruklu ogrenci",
        "Foreign university students.",
      ],
      ["20", "Stajyer Avukat", "Trainee lawyers."],
      ["21", "Kapsam Disi", "Outside coverage."],
      ["99", "Yurtdisi sigortali", "Insured abroad."],
      ["22", "Acil Hal", "Emergency case."],
      ["23", "TBMM", "Grand National Assembly."],
      ["25", "Ceza Infaz ve Tutukevi Kursiyeri", "Prison inmates."],
      ["26", "AIHM", "European Court of Human Rights."],
      ["27", "60/c1-c3-c9", "Law 5510 article 60/c1-c3-c9."],
      ["28", "3713/21", "Law 3713 article 21."],
      ["31", "60/f12-f13-f14", "Law 5510 article 60/f12-f14."],
      ["98", "Gecici Koruma 6458", "Temporary protection under law 6458."],
      [
        "32",
        "Diyanet Akademisi Ogrencileri",
        "Religious-affairs academy students.",
      ],
      ["97", "Gecici Koruma V174", "Temporary protection (V174)."],
      ["100", "8105 CK ozel duzenleme", "Private arrangement under law 8105."],
      [
        "147",
        "60/15f Milli Egitim Akademisi Aday Ogretmenleri",
        "Trainee teachers of the education academy.",
      ],
      [
        "148",
        "60/16f YTB Kapsamindaki Ogrenciler",
        "Students under the presidency for foreigners.",
      ],
      [
        "149",
        "60/c2 Uluslararasi Koruma",
        "International protection status holders.",
      ],
    ],
    269,
    "Verbatim from the HakSahibiBilgisiDVO.devredilenKurum table (s.269-270) — a LONGER variant than the hasta-kabul group's devredilen-kurum (s.154-158). The 3.1.1 changelog (s.6) renames 147 → 33 and removes 148/149, but this table still lists 147/148/149; the conflict is preserved as-is per the guide-verification norm. Note on s.271: certain pension groups must send code 3 (Emekli Sandigi).",
  ),
};

// ── DVOs ──────────────────────────────────────────────────────────
const DEFERRED = "deferred to G43c with the remaining report branches";

const dvos = {
  "rapor-giris-dvo": {
    id: "RaporGirisDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "ilacRapor",
        "Ilac Raporu",
        "object",
        false,
        null,
        "Drug report branch (use or exemption); shape Tablo 4.4.1.h (IlacRaporDVO) — deferred to G43c. All other branches must be NULL when this is filled.",
        252,
        {
          conditionalRequired: [
            {
              condition: "exactly one report branch is populated",
              note: "guide: diğer alanlar NULL gönderilmelidir (s.252)",
            },
          ],
        },
      ),
      FIELD(
        "maluliyetRapor",
        "Maluliyet Raporu",
        "object",
        false,
        null,
        "Disability report branch; shape Tablo 4.4.1.j (MaluliyetRaporDVO) — " +
          DEFERRED +
          ".",
        252,
        {
          conditionalRequired: [
            {
              condition: "exactly one report branch is populated",
              note: "guide: diğer alanlar NULL gönderilmelidir (s.252)",
            },
          ],
        },
      ),
      FIELD(
        "tedaviRapor",
        "Tedavi Raporu",
        "object",
        false,
        null,
        "Treatment report branch; shape Tablo 4.4.1.i (TedaviRaporDVO) — " +
          DEFERRED +
          ".",
        252,
        {
          conditionalRequired: [
            {
              condition: "exactly one report branch is populated",
              note: "guide: diğer alanlar NULL gönderilmelidir (s.252)",
            },
          ],
        },
      ),
      FIELD(
        "isgoremezlikRapor",
        "Isgoremezlik Raporu",
        "object",
        false,
        null,
        "Incapacity report branch (work accident, occupational disease or illness); shape Tablo 4.4.1.c (IsgoremezlikRaporDVO, this registry).",
        252,
        {
          conditionalRequired: [
            {
              condition: "exactly one report branch is populated",
              note: "guide: diğer alanlar NULL gönderilmelidir (s.252)",
            },
          ],
        },
      ),
      FIELD(
        "kullaniciTesisKodu",
        "Kullanici Tesis Kodu",
        "integer",
        true,
        null,
        "Health facility code of the caller (s.253).",
        253,
      ),
    ],
  },
  "isgoremezlik-rapor-dvo": {
    id: "IsgoremezlikRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "raporBilgisi",
        "Rapor Bilgileri",
        "object",
        true,
        null,
        "Report registry key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry).",
        254,
      ),
      FIELD(
        "isGoremezlikRaporTuru",
        "Is Goremezlik Rapor Turu",
        "enum",
        true,
        1,
        "Incapacity report branch selector (s.254).",
        254,
        { enumRef: "isgoremezlik-rapor-turu" },
      ),
      FIELD(
        "bransKodu",
        "Brans Kodu",
        "string",
        true,
        4,
        "Branch code (s.254).",
        254,
      ),
      FIELD(
        "protokolNo",
        "Protokol Numarasi",
        "string",
        false,
        20,
        "Report protocol number (s.254).",
        254,
      ),
      FIELD(
        "protokolTarihi",
        "Protokol Tarihi",
        "string",
        false,
        10,
        'Report protocol date, "dd.mm.yyyy" (s.254).',
        254,
      ),
      FIELD(
        "duzenlemeTuru",
        "Rapor Duzenleme Turu",
        "enum",
        true,
        1,
        "Issuing style (s.255).",
        255,
        { enumRef: "rapor-duzenleme-turu" },
      ),
      FIELD(
        "teshis",
        "Teshis",
        "string",
        true,
        null,
        "Diagnosis; an ICD-10 code must be used (s.255).",
        255,
        { syntheticOnly: false },
      ),
      FIELD(
        "aciklama",
        "Aciklama",
        "string",
        false,
        255,
        "Branch opinion (s.255).",
        255,
      ),
      FIELD(
        "saglikKuruluRaporTarihi",
        "Saglik Kurulu Rapor Tarihi",
        "string",
        false,
        20,
        "Health-board report date (s.255; parameter name row-wrapped in the guide).",
        255,
      ),
      FIELD(
        "olum",
        "Sigortalinin Olup Olmadigi",
        "enum",
        true,
        1,
        "Alive/deceased selector (s.255).",
        255,
        { enumRef: "olum-durumu" },
      ),
      FIELD(
        "ilkRaporTakipNo",
        "Ilk Rapor Takip No",
        "integer",
        false,
        null,
        "MEDULA tracking number of the initial report when this report is a continuation (s.255).",
        255,
        { syntheticOnly: true },
      ),
      FIELD(
        "isKazasiRaporu",
        "Is Kazasi Raporu",
        "object",
        false,
        null,
        "Work-accident detail; shape Tablo 4.4.1.d (IsKazasiRaporDVO, this registry).",
        255,
        {
          conditionalRequired: [
            {
              condition: "isGoremezlikRaporTuru = 1",
              note: "guide: isGoremezlikRaporTuru 1 ise zorunlu (s.255)",
            },
          ],
        },
      ),
      FIELD(
        "meslekHastaligiRaporu",
        "Meslek Hastaligi Raporu",
        "object",
        false,
        null,
        "Occupational-disease detail; shape Tablo 4.4.1.e (MeslekHastaligiRaporDVO) — " +
          DEFERRED +
          ".",
        255,
        {
          conditionalRequired: [
            {
              condition: "isGoremezlikRaporTuru = 2",
              note: "guide: isGoremezlikRaporTuru 2 ise zorunlu (s.255)",
            },
          ],
        },
      ),
      FIELD(
        "analikRaporu",
        "Analik Raporu",
        "object",
        false,
        null,
        "Maternity detail; shape Tablo 4.4.1.f (AnalikRaporDVO) — " +
          DEFERRED +
          ".",
        255,
        {
          conditionalRequired: [
            {
              condition: "isGoremezlikRaporTuru = 4",
              note: "guide: isGoremezlikRaporTuru 4 ise zorunlu (s.255)",
            },
          ],
        },
      ),
      FIELD(
        "emzirmeRaporu",
        "Emzirme Raporu",
        "object",
        false,
        null,
        "Nursing detail; shape Tablo 4.4.1.g (EmzirmeRaporDVO) — " +
          DEFERRED +
          ".",
        255,
        {
          conditionalRequired: [
            {
              condition: "isGoremezlikRaporTuru = 5",
              note: "guide: isGoremezlikRaporTuru 5 ise zorunlu (s.255)",
            },
          ],
        },
      ),
      FIELD(
        "hastalikRaporu",
        "Hastalik Raporu",
        "object",
        false,
        null,
        "Illness detail; shape Tablo 4.4.1.j (HastalikRaporDVO) — " +
          DEFERRED +
          ".",
        255,
        {
          conditionalRequired: [
            {
              condition: "isGoremezlikRaporTuru = 3",
              note: "guide: isGoremezlikRaporTuru 3 ise zorunlu (s.255)",
            },
          ],
        },
      ),
      FIELD(
        "klinikBulgular",
        "Klinik Bulgular",
        "string",
        false,
        20,
        "Clinical findings (s.255).",
        255,
      ),
      FIELD(
        "ronLabBilgileri",
        "Ron Lab Bilgileri",
        "string",
        false,
        null,
        "Radiology/laboratory findings (s.255; no length given).",
        255,
      ),
      FIELD(
        "karar",
        "Karar",
        "string",
        false,
        20,
        "Board decision (s.255).",
        255,
      ),
      FIELD(
        "doktorlar",
        "Doktor Bilgileri",
        "array",
        true,
        null,
        "Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry); sent as an array (s.255).",
        255,
      ),
      FIELD(
        "bashekimOnayDurumu",
        "Bashekim Onay Durumu",
        "integer",
        false,
        null,
        "Chief-physician approval state (s.255; no code list given).",
        255,
      ),
      FIELD(
        "bashekimTCNo",
        "Bashekim TC No",
        "string",
        false,
        20,
        "Chief-physician citizen ID (s.255).",
        255,
        { sensitive: true },
      ),
      FIELD(
        "hakSahibi",
        "Hak Sahibi Bilgisi",
        "object",
        true,
        null,
        "Beneficiary; shape Tablo 4.4.1.s (HakSahibiBilgisiDVO, this registry).",
        256,
      ),
      FIELD(
        "devammi",
        "Devam Durumu",
        "enum",
        true,
        1,
        "Continuation selector from the pre-selection answer (s.256).",
        256,
        { enumRef: "devam-durumu" },
      ),
      FIELD(
        "yatisDevam",
        "Yatis Devam",
        "enum",
        true,
        1,
        "Hospitalization state (s.256).",
        256,
        { enumRef: "yatis-devam-durumu" },
      ),
    ],
  },
  "is-kazasi-rapor-dvo": {
    id: "IsKazasiRaporDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "baslangicTarihi",
        "Baslangic Tarihi",
        "string",
        false,
        10,
        'Start date, "dd.mm.yyyy"; mandatory when yatisDevam = H-style rest given (s.256).',
        256,
      ),
      FIELD(
        "bitisTarihi",
        "Bitis Tarihi",
        "string",
        false,
        10,
        'End date, "dd.mm.yyyy"; mandatory when hospitalization is over (s.256).',
        256,
      ),
      FIELD(
        "raporDurumu",
        "Rapor Durumu",
        "string",
        false,
        1,
        "1 = Çalışır, 2 = Kontrol; mandatory when there was hospitalization (s.256).",
        256,
      ),
      FIELD(
        "isKontTarihi",
        "Isbasi / Kontrol Tarihi",
        "string",
        true,
        10,
        'Return-to-work or control date, "dd.mm.yyyy"; mandatory when hospitalization is absent (s.256).',
        256,
      ),
      FIELD(
        "hastaneYatisTarihi",
        "Hastane Yatis Tarihi",
        "string",
        false,
        10,
        'Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.256).',
        256,
      ),
      FIELD(
        "hastaneCikisTarihi",
        "Hastane Cikis Tarihi",
        "string",
        false,
        10,
        'Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.256).',
        256,
      ),
      FIELD(
        "nuks",
        "Nuks Durumu",
        "string",
        false,
        1,
        "Relapse status: 1 = Nüks Var, 2 = Nüks Yok (s.257).",
        257,
      ),
      FIELD(
        "yatisDevam",
        "Yatis Devam",
        "enum",
        true,
        1,
        "Hospitalization state; three-value work-accident variant (s.257).",
        257,
        { enumRef: "yatis-devam-is-kazasi" },
      ),
      FIELD(
        "yaraninTuru",
        "Yaranin Turu",
        "string",
        false,
        null,
        'Wound type; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.257).',
        257,
      ),
      FIELD(
        "yaraninYeri",
        "Yaranin Yeri",
        "string",
        false,
        null,
        'Wound site; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.257).',
        257,
      ),
      FIELD(
        "taburcuTarihi",
        "Taburcu Tarihi",
        "string",
        false,
        10,
        'Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.257).',
        257,
      ),
    ],
  },
  "rapor-bilgisi-dvo": {
    id: "RaporBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "raporTesisKodu",
        "Rapor Tesis Kodu",
        "integer",
        true,
        null,
        "Code of the facility that issued the report. Ignored when TakipNoileRaporBilgisiKaydet is used — the facility is resolved from the tracking number (s.268).",
        268,
      ),
      FIELD(
        "raporTarih",
        "Rapor Tarihi",
        "string",
        true,
        10,
        'Report issue date, "dd.mm.yyyy"; guide note: rapor veriliş tarihi girilmelidir. Parameter name row-wrapped ("tarih") in the guide — aligned with the RaporOkuDVO naming (4.4.3.c).',
        268,
      ),
      FIELD(
        "raporNo",
        "Rapor No",
        "string",
        true,
        20,
        'Report number. Parameter name row-wrapped ("no") in the guide — aligned with the RaporOkuDVO naming (4.4.3.c).',
        268,
      ),
      FIELD(
        "raporTakipNo",
        "Rapor Takip No",
        "string",
        true,
        20,
        "Report tracking number (s.268).",
        268,
        { syntheticOnly: true },
      ),
      FIELD(
        "raporSiraNo",
        "Rapor Sira No",
        "integer",
        true,
        null,
        "Report sequence number; Integer here unlike RaporOkuDVO's String raporSiraNo — intra-guide divergence preserved (s.268 vs s.280).",
        268,
      ),
      FIELD(
        "aVakaTKaza",
        "Adli Vaka / Trafik Kazasi",
        "enum",
        true,
        null,
        "Legal-case / traffic-accident flag for illness, occupational-disease and work-accident cases (s.268).",
        268,
        { enumRef: "adli-vaka-durumu" },
      ),
    ],
  },
  "hak-sahibi-bilgisi-dvo": {
    id: "HakSahibiBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "tckimlikNo",
        "T.C. Kimlik Numarasi",
        "string",
        false,
        11,
        "Beneficiary citizen ID; mandatory when neither karneNo nor sosyalGuvenlikNo is provided (s.268).",
        268,
        {
          sensitive: true,
          conditionalRequired: [
            {
              condition: "karneNo ve sosyalGuvenlikNo girilmemisse",
              note: "guide: Karne No ve Sosyal Güvenlik numarası girilmemiş ise girilmelidir (s.268)",
            },
          ],
        },
      ),
      FIELD(
        "karneNo",
        "Karne No",
        "string",
        false,
        null,
        "Beneficiary card number; mandatory when tckimlikNo is not provided (s.268).",
        268,
        {
          conditionalRequired: [
            {
              condition: "tckimlikNo girilmemisse",
              note: "guide: T.C. Kimlik numarası girilmemiş ise girilmelidir (s.268)",
            },
          ],
        },
      ),
      FIELD(
        "sosyalGuvenlikNo",
        "Sosyal Guvenlik Numarasi",
        "string",
        false,
        null,
        "Beneficiary social-security number; mandatory when tckimlikNo is not provided (s.269).",
        269,
        {
          conditionalRequired: [
            {
              condition: "tckimlikNo girilmemisse",
              note: "guide: T.C. Kimlik numarası girilmemiş ise girilmelidir (s.269)",
            },
          ],
        },
      ),
      FIELD(
        "yakinlikKodu",
        "Yakinlik Kodu",
        "string",
        false,
        4,
        "Four-digit kinship code for Bag-Kur patients; empty for other institutions (s.269).",
        269,
      ),
      FIELD(
        "sigortaliTuru",
        "Sigortali Turu",
        "enum",
        true,
        1,
        "Insured type: 1 = Çalışan, 2 = Emekli, 3 = Diğer (s.269). This three-value list is the rapor-group variant of the hasta-kabul sigortali-turu enum.",
        269,
        { enumRef: "sigortali-turu" },
      ),
      FIELD(
        "devredilenKurum",
        "Devredilen Kurum",
        "enum",
        true,
        1,
        "Pre-merger institution of the insured; the rapor-group variant code list (s.269-270) is longer than the hasta-kabul one and conflicts with the changelog — see the devredilen-kurum-rapor enum notes.",
        269,
        { enumRef: "devredilen-kurum-rapor" },
      ),
      FIELD(
        "adres",
        "Adres",
        "string",
        false,
        null,
        "Beneficiary address — first occurrence (s.271; lowercase guide row without a length).",
        271,
      ),
      FIELD(
        "telefon",
        "Telefon",
        "string",
        false,
        null,
        "Beneficiary phone — first occurrence (s.271; lowercase guide row without a length).",
        271,
        { sensitive: true },
      ),
      FIELD(
        "baglibulunanbirim",
        "Bagli Bulunan Birim",
        "string",
        false,
        null,
        "Beneficiary unit — first occurrence (s.271; lowercase guide row without a length).",
        271,
      ),
      FIELD(
        "provizyonTipi",
        "Provizyon Tipi",
        "enum",
        true,
        1,
        "Admission type for the report examination: N = Normal, I = İş kazası, A = Acil (s.271).",
        271,
        { enumRef: "provizyon-tipi" },
      ),
      FIELD(
        "provizyonTarihi",
        "Provizyon Tarihi",
        "string",
        true,
        10,
        'Entitlement examination date — NOT the report date; "dd.mm.yyyy" (s.272).',
        272,
      ),
      FIELD(
        "adi",
        "Sigortalinin Adi",
        "string",
        false,
        50,
        'Beneficiary first name; the guide states "bu alan boş bırakılacaktır" (s.272).',
        272,
      ),
      FIELD(
        "soyadi",
        "Sigortalinin Soyadi",
        "string",
        false,
        50,
        'Beneficiary last name; the guide states "bu alan boş bırakılacaktır" (s.272).',
        272,
      ),
      FIELD(
        "adresDetay",
        "Sigortalinin Adresi",
        "string",
        false,
        100,
        "Beneficiary address — second occurrence with length 100 (s.272); the guide documents both a lowercase and a camelCase address row.",
        272,
      ),
      FIELD(
        "telefonDetay",
        "Sigortalinin Telefonu",
        "string",
        false,
        50,
        "Beneficiary phone — second occurrence with length 50 (s.272).",
        272,
        { sensitive: true },
      ),
      FIELD(
        "bagliBulunanBirim",
        "Sigortalinin Bagli Oldugu Birim",
        "string",
        false,
        50,
        "Beneficiary unit — second occurrence with length 50 (s.272).",
        272,
      ),
      FIELD(
        "emeklimi",
        "Sigortalinin Emeklilik Bilgisi",
        "string",
        false,
        50,
        "Beneficiary retirement info (s.272).",
        272,
      ),
    ],
  },
  "doktor-bilgisi-dvo": {
    id: "DoktorBilgisiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "drTescilNo",
        "Doktor Tescil Numarasi",
        "string",
        true,
        16,
        "Physician registration number; note the IlacRaporDuzeltDVO variant uses length 20 (s.281) while this table states 16 (s.272) — intra-guide divergence preserved.",
        272,
      ),
      FIELD(
        "drAdi",
        "Doktor Adi",
        "string",
        false,
        50,
        "Physician first name (s.272).",
        272,
      ),
      FIELD(
        "drSoyadi",
        "Doktor Soyadi",
        "string",
        false,
        50,
        "Physician last name (s.272).",
        272,
      ),
      FIELD(
        "drBransKodu",
        "Doktor Brans Kodu",
        "string",
        true,
        4,
        "Physician branch code per the Health Ministry list (s.272).",
        272,
      ),
      FIELD(
        "tipi",
        "Doktor Tipi",
        "enum",
        true,
        1,
        "Physician role in the report (s.272).",
        272,
        { enumRef: "doktor-tipi" },
      ),
    ],
  },
  "rapor-etkin-madde-dvo": {
    id: "RaporEtkinMaddeDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "etkinMaddeKodu",
        "Etkin Madde Kodu",
        "string",
        true,
        null,
        "Active-ingredient code (s.277).",
        277,
      ),
      FIELD(
        "kullanimDoz1",
        "Kullanim Doz 1",
        "integer",
        false,
        null,
        "Times per day, e.g. 3 (s.277).",
        277,
      ),
      FIELD(
        "kullanimDoz2",
        "Kullanim Doz 2",
        "integer",
        false,
        null,
        "Dose per intake, e.g. 1 tablet, 100 IU (s.277).",
        277,
      ),
      FIELD(
        "kullanimDozBirim",
        "Doz Birimi",
        "enum",
        false,
        1,
        "Dose unit code list (s.277).",
        277,
        { enumRef: "doz-birimi" },
      ),
      FIELD(
        "kullanimPeriyot",
        "Kullanim Periyot",
        "integer",
        false,
        null,
        "Usage interval value, e.g. every 7 days (s.277).",
        277,
      ),
      FIELD(
        "kullanimPeriyotBirim",
        "Kullanim Periyot Birimi",
        "enum",
        false,
        1,
        "Usage interval unit (s.278).",
        278,
        { enumRef: "periyot-birimi" },
      ),
    ],
  },
  "ilac-teshis-bilgi-dvo": {
    id: "IlacTeshisBilgiDVO",
    domain: "rapor",
    direction: "input",
    fields: [
      FIELD(
        "baslangicTarihi",
        "Rapor Baslangic Tarihi",
        "string",
        true,
        10,
        'Report start date, "dd.mm.yyyy" (s.278).',
        278,
      ),
      FIELD(
        "bitisTarihi",
        "Rapor Bitis Tarihi",
        "string",
        true,
        10,
        'Report end date, "dd.mm.yyyy" (s.278).',
        278,
      ),
      FIELD(
        "teshisKodu",
        "Teshis Kodu",
        "integer",
        true,
        null,
        "Report diagnosis code (s.278).",
        278,
      ),
      FIELD(
        "ICD10Kodu",
        "Tani Listesi",
        "array",
        true,
        null,
        "Diagnosis codes; the guide types this row as TaniBilgisiDVO[] while naming the parameter ICD10Kodu — both facts preserved (s.278); item shape Tablo 4.2.1.k (TaniBilgisiDVO, hizmet-kayit group).",
        278,
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
  notes,
) => ({
  id: `medula.hastane.rapor.${slug}`,
  service: "medula.hastane.rapor",
  names: {
    documentationHeading: operationName,
    operationName,
    aliases: [operationName],
  },
  contract: { inputDvo, outputDvo },
  sourceRefs: [{ ...GUIDE_REF(page), section: `4.4 ${section}`, notes }],
  stateEffects: {
    creates: ["rapor"],
    reads: [],
    updates: [],
    deletes: [],
    generates: ["raporTakipNo"],
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
  "rapor-bilgisi-kaydet": METHOD(
    "rapor-bilgisi-kaydet",
    "RaporBilgisiKaydet",
    "RaporGirisDVO",
    "RaporCevapDVO",
    252,
    "4.4.1 RaporBilgisiKaydet Metodu",
    "Registration dispatches exactly one report branch of RaporGirisDVO (s.252); success code is Integer 0-based (s.254).",
  ),
  "takip-no-ile-rapor-bilgisi-kaydet": METHOD(
    "takip-no-ile-rapor-bilgisi-kaydet",
    "TakipNoileRaporBilgisiKaydet",
    "RaporGirisDVO",
    "RaporCevapDVO",
    279,
    "4.4.2 TakipNoileRaporBilgisiKaydet Metodu",
    "Registration variant reusing RaporGirisDVO (s.279); RaporBilgisiDVO.raporTesisKodu is resolved from the tracking number and ignored (s.268).",
  ),
};

// ── service ───────────────────────────────────────────────────────
const service = {
  id: "medula.hastane.rapor",
  slug: "rapor",
  displayName: "Rapor Bilgisi Kayit",
  description:
    "Report information registry operations: report lookup by report key, deletion, drug report correction, lookups by report tracking number or citizen ID, and report registration (RaporBilgisiKaydet dispatching exactly one report branch; the drug/disability/treatment/illness sub-branch shapes land incrementally).",
  sourceRefs: [
    { ...GUIDE_REF(252), section: "4.4 Rapor Bilgisi Kayit Metotlari" },
  ],
  wsdl: { production: "wsdl.rapor.production", test: "wsdl.rapor.test" },
  methods: [
    "medula.hastane.rapor.rapor-bilgisi-bul",
    "medula.hastane.rapor.rapor-bilgisi-sil",
    "medula.hastane.rapor.ilac-rapor-duzelt",
    "medula.hastane.rapor.rapor-bilgisi-bul-rapor-takip-nodan",
    "medula.hastane.rapor.rapor-bilgisi-bul-tc-kimlik-nodan",
    "medula.hastane.rapor.rapor-bilgisi-kaydet",
    "medula.hastane.rapor.takip-no-ile-rapor-bilgisi-kaydet",
  ],
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
for (const [slug, method] of Object.entries(methods)) {
  write(`registry/methods/rapor/${slug}.yml`, method);
}
write("registry/services/rapor.yml", service);
console.log("G43b generation complete");
