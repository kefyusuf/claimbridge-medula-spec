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

## `FaturaCevapDetayDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Invoice detail description (s.245). |
| `protokolNo` | string |  | — |  | Protocol number of the invoice (s.245). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Discharge code (s.245-246); codes 1-13 in the taburcu-kodu registry enum. |
| `takipNo` | string |  | — |  | Tracking number of the invoiced episode (s.246). |
| `takipToplamTutar` | decimal |  | — |  | Total amount calculated by GSS for the takip (s.246). |
| `islemDetaylari` | array |  | — |  | Operation detail records (IslemDetayDVO[], Tablo 4.3.1.f, s.246). Nested composite; expansion is v0.3 scope. |

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

## `FaturaIptalCevapDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.243). |
| `sonucMesaji` | string |  | — |  | Result explanation (s.243). |
| `hataKodu` | string |  | — |  | Error code for invoices that could not be cancelled (s.244). |
| `hataMesaji` | string |  | — |  | Error explanation for invoices that could not be cancelled (s.244). |
| `faturaTeslimNo` | string |  | — |  | Delivery number of the invoice that could not be cancelled due to the error (s.244). |

## `FaturaIptalGirisDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.243). |
| `faturaTeslimNo` | array |  | — |  | Delivery numbers of the invoices to cancel, as an array (s.243). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.243). |

## `FaturaOkuCevapDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `faturaRefNo` | string |  | — |  | Reference number of the read invoice (s.245). |
| `faturaTarihi` | date |  | — |  | Invoice date in dd.mm.yyyy format (s.245). |
| `faturaTeslimNo` | array |  | — |  | Delivery numbers returned for the read invoices, as an array (s.245). |
| `faturaTutari` | decimal |  | — |  | Invoice amount calculated by GSS (s.245). |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.245). |
| `sonucMesaji` | string |  | — |  | Result explanation (s.245). |
| `faturaDetaylari` | array |  | — |  | Invoice detail records, expanded as the FaturaCevapDetayDVO registry entity (Tablo 4.3.3.c, s.245-246). |

## `FaturaOkuGirisDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.244). |
| `faturaTeslimNo` | array |  | — |  | Delivery numbers of the invoices to read, as an array (s.244). |
| `faturaRefNo` | string |  | — |  | Reference number of the invoice to read (s.244). |
| `faturaTarihi` | date |  | — |  | Invoice date in dd.mm.yyyy format per the guide (s.244). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.244). |

## `HataliIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hataKodu` | string |  | — |  | Error code (s.235). |
| `hataMesaji` | string |  | — |  | Error explanation (s.236). |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference of the failed operation (s.236). |
| `oncekiIslemBilgisi` | object |  | — |  | Prior-operation composite, expanded as the OncekiIslemBilgisiDVO registry entity (Tablo 4.2.1.p, s.236). |

## `HizmetDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ameliyatveGirisimBilgileri` | array |  | — |  | Surgery/intervention records (AmeliyatveGirisimBilgisiDVO[], Tablo 4.2.1.c, s.190). |
| `digerIslemBilgileri` | array |  | — |  | Other operation records (DigerIslemBilgisiDVO[], Tablo 4.2.1.d, s.190). |
| `disBilgileri` | array |  | — |  | Dental records (DisBilgisiDVO[], Tablo 4.2.1.e, s.190). |
| `ilacBilgileri` | array |  | — |  | Medication records (IlacBilgisiDVO[], Tablo 4.2.1.f, s.190). |
| `konsultasyonBilgileri` | array |  | — |  | Consultation records (KonsultasyonBilgisiDVO[], Tablo 4.2.1.g, s.190). |
| `malzemeBilgileri` | array |  | — |  | Material records (MalzemeBilgisiDVO[], Tablo 4.2.1.h, s.190). |
| `muayeneBilgisi` | object |  | — |  | Examination record (MuayeneBilgisiDVO, Tablo 4.2.1.i, s.190). |
| `tahlilBilgileri` | array |  | — |  | Lab test records (TahlilBilgisiDVO[], Tablo 4.2.1.j, s.190). |
| `tanilar` | array |  | — |  | Diagnosis records (TaniBilgisiDVO[], Tablo 4.2.1.k, s.232). |
| `tetkikveRadyolojiBilgileri` | array |  | — |  | Imaging records (TetkikveRadyolojiBilgisiDVO[], Tablo 4.2.1.l, s.232). |
| `hastaYatisBilgileri` | array |  | — |  | Hospitalization records (HastaYatisBilgisiDVO[], Tablo 4.2.1.o, s.190). |
| `kanBilgileri` | array |  | — |  | Blood product records (KanBilgisiDVO[], Tablo 4.2.1.s, s.190). |
| `takipNo` | string |  | — |  | Tracking number of the read services (s.238). |
| `odemeSorguDurum` | enum |  | odeme-sorgu-durum |  | Payment-inquiry state of the registered services (s.238); codes 0-6 and X. |
| `triajBeyani` | string |  | — |  | Triage declaration taking S/K/Y values (s.238). |

## `HizmetDetayDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Description of the service provided by the institution (s.241). |
| `protokolNo` | string |  | — |  | Protocol number assigned by the institution (s.241). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Discharge code (s.241-242); codes 1-13 in the taburcu-kodu registry enum. |
| `takipNo` | string |  | — |  | Tracking number (s.242). |

## `HizmetIptalCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.239). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.239). |

## `HizmetIptalGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNumaralari` | array |  | — |  | Operation sequence numbers to cancel only the specified operations; empty cancels all registered operations (s.239). |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.239). |
| `takipNo` | string |  | — |  | Tracking number whose operations are cancelled (s.239). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.239). |

## `HizmetKayitCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.190). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.190). |
| `takipNo` | string |  | — |  | Tracking number of the registration (s.190). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number (s.190). |
| `saglikTesisKodu` | integer |  | — |  | Code of the registering institution (s.190). |
| `islemBilgileri` | array |  | — |  | Registered operation records as KayitliIslemBilgisiDVO registry entities (Tablo 4.2.1.m, s.235). |
| `hataliKayitlar` | array |  | — |  | Failed registration records (HataliIslemBilgisiDVO, s.190). |

## `HizmetKayitGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the institution performing the service registration (s.189). |
| `takipNo` | string |  | — |  | Tracking number the services are registered against (s.189). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number; the guide marks it optional here (s.189). |
| `tanilar` | array |  | — |  | Diagnosis entries as an array of TaniBilgisiDVO (Tablo 4.2.1.k, s.232). Verification correction - the guide names this field tanilar. |
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

## `HizmetOkuCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hizmetler` | object |  | — |  | Composite service read result, expanded as the HizmetDVO registry entity (Tablo 4.2.2.c, s.237-238) carrying all categorized service arrays. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number (s.237). |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.237). |
| `sonucMesaji` | string |  | — |  | Result explanation (s.237). |

## `HizmetOkuGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNumaralari` | array |  | — |  | Operation sequence numbers to read only the specified operations; empty reads all registered operations (s.236). |
| `hizmetSunucuRefNolari` | array |  | — |  | Service-provider reference numbers to filter the read (s.237); empty reads all registered operations. |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.237). |
| `takipNo` | string |  | — |  | Tracking number whose registered operations are read (s.237). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.237). |

## `KayitliIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference of the registered operation (s.235). |
| `islemSiraNo` | string |  | — |  | Medula-assigned sequence number of the registered operation (s.235). |

## `OncekiIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemAdedi` | integer |  | — |  | Count of the prior operations (s.236). |
| `islemTarihi` | date |  | — |  | Date the prior operations were performed, dd.mm.yyyy per the guide (s.236). |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned code of the institution that performed the prior operations (s.236). |
| `tesisAdi` | string |  | — |  | Name of the institution that performed the prior operations (s.236). |

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
| `ekdsYontemGerekce` | enum |  | ekds-yontem-gerekce |  | EKDS verification method justification codes; Integer[] in the guide, modeled as an array of ekds-yontem-gerekce codes (s.167, changelog s.13). |
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
| `ekdsYontemGerekce` | enum |  | ekds-yontem-gerekce |  | EKDS verification method justification codes; Integer[] in the guide, modeled as an array of ekds-yontem-gerekce codes (s.167, changelog s.13). |

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

## `TaniBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `shared` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number of the registered service; send null while registering, Medula fills and returns it (s.232). |
| `birincilTani` | string |  | — |  | Primary diagnosis flag taking E (Evet) or H (Hayir) (s.232). |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.232). Synthetic placeholders in examples. |
| `taniKodu` | string |  | — |  | ICD-10 diagnosis code (s.232). |
| `taniTipi` | enum |  | tani-tipi |  | Diagnosis type - 1 On tani, 2 Kesin tani, 3 Ayirici tani (s.232). |
| `ozelDurum` | string |  | — |  | Special condition code; see guide Tablo 5.1 OzelDurumVO (s.232). |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes, valid alongside ozelDurum (s.232). |

