<!-- This file is generated. Do not edit manually. -->

# DVOs

## `FaturaCevapDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error. |
| `sonucMesaji` | string |  | — |  | Human-readable result message accompanying the result code. |
| `faturaTeslimNo` | string |  | — |  | Invoice delivery number generated on successful submission; null on failure. |
| `faturaTutari` | decimal |  | — |  | Total invoice amount reported on successful submission. |

## `FaturaGirisDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code of the invoicing institution. |
| `faturaTarihi` | date |  | — |  | Invoice date. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number whose registered services are being invoiced. |
| `faturaRefNo` | string |  | — |  | Institution-side invoice reference number (s.240). |
| `hizmetDetaylari` | array |  | — |  | Service lines being invoiced (FaturaHizmetDetayDVO records). |
| `trafikKazasiOdemeYuzdesi` | integer |  | — |  | Traffic-accident payment percentage; the guide marks it required - traffic invoices pay back by this percentage (s.240). |
| `ilaveUcret` | decimal |  | — |  | Additional difference fee collected from the patient; the guide marks it required (s.240). |
| `ktsHbysKodu` | string |  | — |  | Hospital information system (HBYS) code used by the KTS integration. |
| `hastaTelefon` | string |  | — |  | Patient contact phone. Examples must use synthetic placeholders only. |
| `hastaAdres` | string |  | — |  | Patient contact address. Examples must use synthetic placeholders only. |
| `muvafakatVar` | string |  | — |  | Patient consent flag sent as E (Evet) or H (Hayir) by uncontracted institutions (s.240 and changelog s.12, edition 3.1.1). Verification correction - the v0.1 draft modeled a boolean. |

## `FaturaHizmetDetayDVO`

Domain: `fatura-kayit` · Direction: `shared` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | integer |  | — |  | Sequence number of the registered operation line being invoiced. |
| `islemKodu` | string |  | — |  | Procedure code (SUT movement code) of the invoiced service line. |
| `adet` | integer |  | — |  | Quantity of the invoiced service line. |
| `birimFiyat` | decimal |  | — |  | Unit price of the invoiced service line. |

## `HizmetDetayDVO`

Domain: `hizmet-kayit` · Direction: `shared` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | integer |  | — |  | Sequence number of the registered operation line. |
| `bransKodu` | integer |  | — |  | Medical branch code the service line belongs to. |
| `islemKodu` | string |  | — |  | Procedure code (SUT movement code) of the service line. |
| `hizmetTarihi` | date |  | — |  | Date the service was provided. |
| `adet` | integer |  | — |  | Quantity of the service provided. |

## `HizmetKayitCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.190). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.190). |
| `takipNo` | string |  | — |  | Tracking number of the registration (s.190). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number (s.190). |
| `saglikTesisKodu` | integer |  | — |  | Code of the registering institution (s.190). |
| `islemBilgileri` | array |  | — |  | Registered operation records (KayitliIslemBilgisiDVO, s.190). Verification correction - the v0.1 draft modeled islemSiraNumaralari. |
| `hataliKayitlar` | array |  | — |  | Failed registration records (HataliIslemBilgisiDVO, s.190). |

## `HizmetKayitGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the institution performing the service registration (s.189). |
| `takipNo` | string |  | — |  | Tracking number the services are registered against (s.189). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number; the guide marks it optional here (s.189). |
| `tanilar` | array |  | — |  | Diagnosis entries (TaniBilgisiDVO records, s.189). Verification correction - the guide names this field tanilar. |
| `ameliyatveGirisimBilgileri` | array |  | — |  | Surgery and intervention entries as an array (AmeliyatveGirisimBilgisiDVO, s.189). |
| `digerIslemBilgileri` | array |  | — |  | Other operation entries (DigerIslemBilgisiDVO, s.189). |
| `disBilgileri` | array |  | — |  | Dental entries (DisBilgisiDVO, s.189). |
| `ilacBilgileri` | array |  | — |  | Medication entries (IlacBilgisiDVO, s.189). |
| `konsultasyonBilgileri` | array |  | — |  | Consultation entries (KonsultasyonBilgisiDVO, s.189). |
| `malzemeBilgileri` | array |  | — |  | Material entries (MalzemeBilgisiDVO, s.189). |
| `muayeneBilgisi` | object |  | — |  | Examination entry (MuayeneBilgisiDVO, s.189). |
| `tahlilBilgileri` | array |  | — |  | Lab test entries (TahlilBilgisiDVO, s.189). |
| `tetkikveRadyolojiBilgileri` | array |  | — |  | Imaging and work-up entries (TetkikveRadyolojiBilgisiDVO, s.189). |
| `hastaYatisBilgileri` | array |  | — |  | Hospitalization entries (HastaYatisBilgisiDVO, s.190); mandatory for inpatient takips per the guide note. |
| `kanBilgileri` | array |  | — |  | Blood transfusion entries (KanBilgisiDVO, s.190). |
| `triajBeyani` | string |  | — |  | Triage declaration taking S/K/Y values; mandatory for emergency takips (s.190). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.190). |

## `ProvizyonCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error. |
| `sonucMesaji` | string |  | — |  | Human-readable result message accompanying the result code. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number generated on successful admission; null on failure. |
| `takipNo` | string |  | — |  | Primary tracking number generated on successful admission; null on failure. |
| `takipler` | array |  | — |  | List of TakipDVO records; a bagli-takip request can return more than one tracking record. |

## `ProvizyonGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code assigned by GSS (s.154). |
| `hastaTCKimlikNo` | string |  | — |  | Patient identity number (s.154). Examples must use synthetic placeholders only. |
| `sigortaliTuru` | enum |  | sigortali-turu |  | Insured person type (s.154). Codes 1-4 in the sigortali-turu registry enum. |
| `bransKodu` | string |  | — |  | Medical branch (specialty) code (s.154). Verification correction - the guide defines String(4), not integer. |
| `devredilenKurum` | string |  | — |  | Institution the person was transferred from before the SGK merger (s.154-155). Codes include 1-9, 32, 97, 100, 147-149, I, M, B, V. Enum registry candidate for v0.2. |
| `provizyonTarihi` | date |  | — |  | Date the provision was requested, dd.mm.yyyy format in the guide (s.156). |
| `provizyonTipi` | enum |  | provizyon-tipi |  | Provision type controlling how SGK covers the admission (s.156-157). |
| `tedaviTuru` | enum |  | tedavi-turu |  | Treatment type of the admission - A/Y/G letter codes (s.158). |
| `tedaviTipi` | enum |  | tedavi-tipi |  | Detailed treatment profile (s.158-159); codes 0-22 (no 3) in the tedavi-tipi registry enum. |
| `takipTipi` | enum |  | takip-tipi |  | Tracking record type (s.157). Linked takips are requested through takipNo, not through this field. |
| `takipNo` | string |  | — |  | Existing tracking number used when requesting a linked takip; empty for first takips (s.157). |
| `istisnaiHal` | string |  | — |  | Exceptional-case code (s.157). Codes 1-9 (1 Acil hal, 2 Is kazasi ile meslek hastaligi, ...). Enum candidate for v0.2. |
| `hastaTelefon` | string |  | — |  | Patient contact phone in 3121234567 format; mandatory on first takips (s.159). Synthetic placeholders only. |
| `hastaAdres` | string |  | — |  | Patient contact address; mandatory on first takips (s.159). Synthetic placeholders only. |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.159). Verification correction - the guide marks this required. |
| `doktorTescilNo` | string |  | — |  | Registration number of the admitting doctor. Verification finding - this field does not appear in Tablo 4.1.1.a; kept for PRD 13.4 compatibility and slated for removal in 0.2.0. |

## `TakipDVO`

Domain: `hasta-kabul` · Direction: `shared` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number identifying this treatment episode; returned for control purposes (s.165). |
| `ilkTakipNo` | string |  | — |  | Number of the first takip when this record is a linked takip produced from another one (s.165). |
| `takipTipi` | enum |  | takip-tipi |  | Tracking record type (s.157, Tablo 4.1.1.a; mirrored in TakipDVO context s.166). |
| `takipDurumu` | enum |  | takip-durumu |  | Payment-inquiry state of the tracking record - 0/1 only (s.166). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number this tracking record belongs to. |
| `bransKodu` | string |  | — |  | Branch code of the service (s.165). Verification correction - String(4) in the guide. |

## `TakipOkuGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code assigned by GSS (s.164). |
| `takipNo` | string |  | — |  | Tracking number to be read (s.164-165). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.165). |

## `TakipSilCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.168). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.168). |
| `takipNo` | string |  | — |  | Cancelled tracking number returned for control (s.168). |

## `TakipSilGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code of the cancelling institution (s.168). Only the institution's own takips can be cancelled. |
| `takipNo` | string |  | — |  | Tracking number to be cancelled (s.168). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.168). |

