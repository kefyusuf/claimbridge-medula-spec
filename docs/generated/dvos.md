<!-- This file is generated. Do not edit manually. -->

# DVOs

## `AmeliyatveGirisimBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Description of the performed operation (s.190). |
| `adet` | integer |  | — |  | Quantity of the operation (s.191). |
| `ayniFarkliKesi` | enum |  | ayni-farkli-kesi |  | Same-session/same-incision relation code (s.191); codes 1-5. |
| `bransKodu` | string |  | — |  | Branch code of the operation (s.191). |
| `drTescilNo` | string |  | — |  | Diploma registration number of the performing doctor (s.191). |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.191). |
| `islemSiraNo` | string |  | — |  | Sequence number of the registered service; send null while registering, Medula fills and returns it (s.191). Null-on-input pattern. |
| `islemTarihi` | date |  | — |  | Operation date in dd.mm.yyyy format (s.191). |
| `sagSol` | string |  | — |  | Side code 1/2/3 (Sag, Sol, Sag-Sol ayrimi yok); null saves as 3 (s.191). The DigerIslem table uses R/L instead - divergence noted. |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.191). |
| `euroscore` | enum |  | euroscore |  | Euroscore risk code (s.191); codes 0-3 in the euroscore registry enum. |
| `ozelDurum` | string |  | — |  | Special condition code; see guide Tablo 5.1 OzelDurumVO (s.192). |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.192). |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.192). |

## `BKDSDogrulamaDetayDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `dogrulananTckNo` | string |  | — |  | T.C. identity number of the verified person (s.186) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.186) |
| `dogrulamaTarihi` | date |  | — |  | Verification date (s.186) |
| `araciTckNo` | string |  | — |  | Intermediate person T.C. identity number (s.186) |
| `dogrulamaYontemi` | string |  | — |  | EKDS verification method (s.186) |
| `dogrulamaYontemAciklama` | string |  | — |  | EKDS verification method explanation (s.186) |
| `takipReceteNo` | string |  | — |  | Takip or prescription number associated with the verification (s.186) |

## `BKDSDogrulamaKisiSorguCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bkdsDogrulamaDetayDVO` | array |  | — |  | Verification records (BKDSDogrulamaDetayDVO[], Tablo 4.1.21.c), expanded as a registry entity (s.186) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.186) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.186) |

## `BKDSDogrulamaKisiSorguGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tckNo` | string |  | — |  | Patient T.C. identity number (s.185) |
| `islemTarihi` | date |  | — |  | Verification date (s.185) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.185) |

## `BasvuruTakipDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.172) |
| `takipFaturaDurumu` | string |  | — |  | 0 Odeme sorgusu yapilmamis / 1 sorgulanmis faturalanmamis / 2 sorgulanmis faturalanmis (s.172) |

## `BasvuruTakipOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `basvuruTakip` | array |  | — |  | Takip list (BasvuruTakipDVO[], Tablo 4.1.7.c), expanded as a registry entity (s.172) |
| `hastaBasvuruNo` | string |  | — |  | Application number (s.172) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.172) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.172) |

## `BasvuruTakipOkuDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number whose takips are read (s.172) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.172) |

## `BasvuruYatisBilgileriDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | date |  | — |  | Hospitalization start date (s.171) |
| `bitisTarihi` | date |  | — |  | Discharge date (s.171) |
| `durum` | string |  | — |  | 0 Faturalanmamis / 1 Faturalanmis (s.171) |

## `DigerIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `adet` | integer |  | — |  | Quantity of the operation (s.192). |
| `bransKodu` | string |  | — |  | Branch code of the operation (s.192). |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.192). |
| `drTescilNo` | string |  | — |  | Diploma registration number of the performing doctor (s.192); optional for operations coded 530140 and 530150 per the guide note. |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.192). |
| `islemSiraNo` | string |  | — |  | Sequence number of the registered service; send null while registering, Medula fills and returns it (s.192). Null-on-input pattern. |
| `islemTarihi` | date |  | — |  | Operation date in dd.mm.yyyy format (s.192). |
| `raporTakipNo` | string |  | — |  | Medula record number of a registered report (s.192); mandatory for report-requiring operations (Diyaliz, FTR, etc.). |
| `ozelDurum` | string |  | — |  | Special condition code; see guide Tablo 5.1 OzelDurumVO (s.192). |
| `ayniFarkliKesi` | enum |  | ayni-farkli-kesi |  | Same-session/same-incision relation code (s.192-193); codes 1-5. |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.193). |
| `aciklama` | string |  | — |  | Operation description (s.193). |
| `sagSol` | string |  | — |  | Side code using R (Sag) / L (Sol) letters in this table (s.193) - diverges from the AmeliyatveGirisim 1/2/3 codes; divergence noted. |
| `istemYapanDrTescilNo` | string |  | — |  | Registration number of the requesting doctor (s.193). |
| `istemYapanDrBrans` | string |  | — |  | Branch code of the requesting doctor (s.193). |

## `DisBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.193) |
| `anomali` | string |  | — |  | Anomaly flag taking E (Evet) or H (Hayir) (s.193) |
| `adet` | integer |  | — |  | Quantity of the dental operation (s.193) |
| `bransKodu` | string |  | — |  | Branch code of the operation (s.193) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.193) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.193) |
| `islemTarihi` | date |  | — |  | Operation date, dd.mm.yyyy (s.193) |
| `sagAltCene` | string |  | — |  | Teeth of the right lower jaw (s.193) |
| `sagSutAltCene` | string |  | — |  | Milk teeth of the right lower jaw (children) (s.193) |
| `sagSutUstCene` | string |  | — |  | Milk teeth of the right upper jaw (children) (s.194) |
| `sagUstCene` | string |  | — |  | Teeth of the right upper jaw (s.194) |
| `solAltCene` | string |  | — |  | Teeth of the left lower jaw (s.194) |
| `solSutAltCene` | string |  | — |  | Milk teeth of the left lower jaw (children) (s.194) |
| `solSutUstCene` | string |  | — |  | Milk teeth of the left upper jaw (children) (s.194) |
| `solUstCene` | string |  | — |  | Teeth of the left upper jaw (s.194) |
| `sagAltCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `sagUstCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `solAltCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `solUstCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.194) |
| `ayniFarkliKesi` | string |  | — |  | Incision/session relation; values diverge from the ameliyat table (cut in extraction, s.194) (s.194) |

## `EKDSBelgeGerekenTakipCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ekdsBelgeGerekenTakipDVO` | array |  | — |  | Bone-marrow admissions requiring documents (EKDSBelgeGerekenTakipDVO[], Tablo 4.1.22.c); nested composite, expansion is v0.3 scope (s.187) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.187) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.187) |

## `EKDSBelgeGerekenTakipSorguGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.186) |
| `evrakID` | integer |  | — |  | Period document reference number to query (s.186) |

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
| `islemDetaylari` | array |  | — |  | Operation detail records, expanded as the IslemDetayDVO registry entity (Tablo 4.3.1.f, s.242-243). |

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

## `GenBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `genKodu` | string |  | — |  | Gene code; the table closes at s.232 with TaniBilgisiDVO following (s.231) |

## `HastaCikisCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.169) |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.169) |
| `yatisBaslangicTarihi` | date |  | — |  | Hospitalization start date of the discharge (s.169) |
| `yatisBitisTarihi` | date |  | — |  | Hospitalization end date of the discharge (s.169) |

## `HastaCikisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number the discharge is recorded against (s.168) |
| `hastaCikisTarihi` | date |  | — |  | Discharge date of the hospitalized patient, dd.mm.yyyy (s.168) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned code of the institution (s.168) |

## `HastaCikisIptalDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number the discharge cancellation is recorded against (s.169) |
| `hastaCikisTarihi` | date |  | — |  | Original discharge date being cancelled (s.170) |
| `yeniHastaCikisTarihi` | date |  | — |  | New discharge date replacing the cancelled one (s.170) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.170) |

## `HastaYatisBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the hospitalization (s.234) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.234) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.234) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.234) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.234) |
| `refakatciGunSayisi` | string |  | — |  | Companion days; empty when no companion (s.234) |
| `yatisBaslangicTarihi` | date |  | — |  | Hospitalization start date, dd.mm.yyyy (s.234) |
| `yatisBitisTarihi` | date |  | — |  | Hospitalization end date, dd.mm.yyyy (s.234) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.234) |
| `aciklama` | string |  | — |  | Hospitalization description (s.234) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.234) |

## `HastaYatisOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisiKodu` | string |  | — |  | Institution code (spelled saglikTesisiKodu in the guide) (s.170) |
| `hastaBasvuruNo` | string |  | — |  | Application number (s.170) |
| `basvuruYatisBilgileri` | array |  | — |  | Hospitalization records (BasvuruYatisBilgileriDVO[], Tablo 4.1.6.c, s.171), expanded as a registry entity (s.171) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.171) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.171) |
| `yeniDoganDogumTarihi` | date |  | — |  | Birth date when the hospitalization is a newborn episode (s.171) |
| `yeniDoganCocukSiraNo` | string |  | — |  | Child order when the hospitalization is a newborn episode (s.171) |
| `donorTck` | string |  | — |  | Donor identity number when the episode is a donation (s.171) |

## `HastaYatisOkuDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number whose hospitalizations are read (s.170) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.170) |

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

## `IlacBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Drug description; majistral drugs carry the content here (s.198) |
| `adet` | decimal |  | — |  | Drug quantity; the usage unit comes from the Yardimci Servisleri ilac-ara method (s.198) |
| `barkod` | string |  | — |  | Drug barcode registered in GSS; mandatory except for majistral drugs (s.198) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.198) |
| `ilacTuru` | enum |  | ilac-turu |  | Drug type - 1 Barkodlu, 2 Majistral, 3 Radyofarmasotik Ajan (s.198) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.198) |
| `islemTarihi` | date |  | — |  | Drug usage date, dd.mm.yyyy (s.198) |
| `tutar` | decimal |  | — |  | Amount for majistral drugs and radiopharmaceutical agents (s.198) |
| `paketHaric` | string |  | — |  | 0 when included in the package, 1 when excluded (s.198) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.198) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.198) |
| `seriNo` | string |  | — |  | Drug serial number (s.199) |
| `sonKullanimTarihi` | date |  | — |  | Drug expiry date (s.199) |
| `batchNo` | string |  | — |  | Drug batch number (s.199) |
| `itsBirimSarfId` | string |  | — |  | Unit consumption ID received from the ITS system (s.199) |
| `majistralIlac` | object |  | — |  | Majistral drug composite, expanded as the MajistralIlacDVO registry entity (Tablo 4.2.1.f.1, s.199-200) (s.199) |
| `birlikteYapilanIslemSUTKodu` | string |  | — |  | SUT code of the concurrently performed operation (s.199) |
| `birlikteYapilanIslemHizmetSunucuRefNo` | string |  | — |  | Institution reference of the concurrently performed operation (s.199) |

## `IslemDetayDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Medula sequence number of the operation (s.243) |
| `islemTutari` | decimal |  | — |  | Operation-specific amount within the takip (s.243) |

## `KanBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the transfusion (s.234) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.235) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.235) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.235) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.235) |
| `adet` | integer |  | — |  | Quantity of blood products (s.235) |
| `isbtBilesenNo` | string |  | — |  | ISBT component number of the blood product (s.235) |
| `isbtUniteNo` | string |  | — |  | ISBT unit number of the blood product (s.235) |
| `islemTarihi` | date |  | — |  | Transfusion date, dd.mm.yyyy (s.235) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.235) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.235) |

## `KayitliIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference of the registered operation (s.235). |
| `islemSiraNo` | string |  | — |  | Medula-assigned sequence number of the registered operation (s.235). |

## `KemikIligiIptalCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.181) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.181) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.181) |

## `KemikIligiIptalGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.181) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.181) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered bone-marrow admission (s.181) |

## `KemikIligiIslemDuzeltmeCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number of the corrected admission (s.183) |
| `islemTarihi` | date |  | — |  | Date of the corrected admission (continues on s.184 with the result fields) (s.183) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (standard result pattern) (s.183) |
| `sonucMesaji` | string |  | — |  | Result explanation (standard result pattern) (s.183) |
| `yeniIslemKodu` | string |  | — |  | New (corrected) SUT operation code (s.184) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered admission (s.184) |

## `KemikIligiIslemDuzeltmeGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.183) |
| `islemTarihi` | date |  | — |  | Planned operation date (s.183) |
| `islemKodu` | string |  | — |  | Eski (old) SUT operation code being corrected (s.183) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.183) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered admission (s.183) |
| `yeniIslemKodu` | string |  | — |  | Yeni (new) SUT operation code (s.183) |

## `KemikIligiKabulCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number of the registered bone-marrow admission (s.180) |
| `islemTarihi` | date |  | — |  | Date of the registered bone-marrow admission (s.180) |
| `bildirimNo` | integer |  | — |  | Unique notification number of the registered bone-marrow admission (s.180) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.180) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.180) |

## `KemikIligiKabulDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.180) |
| `islemTarihi` | date |  | — |  | Planned operation date, dd.mm.yyyy (s.180) |
| `islemKodu` | string |  | — |  | SUT operation code of the planned bone-marrow procedure (s.180) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.180) |

## `KemikIligiOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number of the registered admission (s.182) |
| `islemTarihi` | date |  | — |  | Date of the registered admission (s.182) |
| `islemKodu` | string |  | — |  | SUT operation code of the planned procedure (s.182) |
| `aktifPasif` | string |  | — |  | Form activity state; returns Aktif or Pasif (s.182) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered admission (s.182) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.182) |
| `sonucMesaji` | string |  | — |  | Result explanation (continues on s.183) (s.182) |

## `KemikIligiOkuGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.182) |
| `islemTarihi` | date |  | — |  | Planned operation date (s.182) |
| `islemKodu` | string |  | — |  | SUT operation code of the planned bone-marrow procedure (s.182) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.182) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered bone-marrow admission (s.182) |

## `KemikIligiTCIleOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kemikIligiCevapDVO` | array |  | — |  | Bone-marrow admission records (KemikIligiOkuCevapDVO[], Tablo 4.1.19.b), expanded as a registry entity (s.184) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.184) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.184) |

## `KemikIligiTCIleOkuGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcNo` | string |  | — |  | Patient T.C. identity number (s.184) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.184) |

## `KonsultasyonBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | (Branch code of the consultation) s.224 |
| `drTescilNo` | string |  | — |  | (Registration number of the performing doctor) s.224 |
| `sutKodu` | string |  | — |  | (SUT-defined operation code) s.224 |
| `hizmetSunucuRefNo` | string |  | — |  | (Institution reference paired with islemSiraNo) s.224 |
| `islemSiraNo` | string |  | — |  | (Sequence number; null-on-input pattern) s.224 |
| `islemTarihi` | date |  | — |  | (Consultation date, dd.mm.yyyy) s.224 |
| `ozelDurum` | string |  | — |  | (Special condition code, Tablo 5.1 OzelDurumVO) s.224 |
| `cokluOzelDurum` | array |  | — |  | (Multiple special-condition codes) s.224 |

## `MajistralEklenenIlacDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.223) |
| `barkod` | string |  | — |  | Barcode of the added drug registered in GSS (s.224) |
| `adet` | decimal |  | — |  | Quantity of the added drug (s.224) |

## `MajistralHamMaddeDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.201) |
| `majistralHamMaddeKodu` | integer |  | — |  | Raw-material code from the guide catalog (Tablo 4.2.1.f.1.1.1, s.201+); catalog enum is v0.3 scope (s.201) |
| `miktar` | integer |  | — |  | Raw-material quantity (s.201) |
| `hamMaddeBirimi` | enum |  | ham-madde-birimi |  | Raw-material unit - 1 Gram / 2 Miligram (s.201) |

## `MajistralIlacDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.199) |
| `preparatTuru` | enum |  | preparat-turu |  | Preparation type - codes 1-8 in the preparat-turu registry enum (s.199) |
| `bolunmusTozTuru` | string |  | — |  | Powder-division type; required when preparatTuru is 3 (s.199) |
| `ambalajTuru` | enum |  | ambalaj-turu |  | Packaging type - codes 1-3 in the ambalaj-turu registry enum (s.200) |
| `ambalajBoyutu` | enum |  | ambalaj-boyutu |  | Packaging size code; the guide lists ~30 codes (1-19, 21-31) - enum candidate for v0.3 (s.200) |
| `ambalajAdet` | string |  | — |  | Packaging quantity (s.200) |
| `hamMaddeler` | array |  | — |  | Raw-material records, expanded as the MajistralHamMaddeDVO registry entity (Tablo 4.2.1.f.1.1, s.201) |
| `eklenenIlaclar` | array |  | — |  | Added-drug records, expanded as the MajistralEklenenIlacDVO registry entity (Tablo 4.2.1.f.1.2, s.223-224) |

## `MalzemeBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kodsuzMalzemeAdi` | string |  | — |  | Name of the uncoded material; required when malzemeTuru is 3 (s.224) |
| `adet` | decimal |  | — |  | Quantity of the used material (s.224) |
| `barkod` | string |  | — |  | UBB material barcode; required since 01.02.2008 (s.225) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.225) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.225) |
| `islemTarihi` | date |  | — |  | Date the material was used, dd.mm.yyyy (s.225) |
| `kodsuzMalzemeFiyati` | decimal |  | — |  | Price of the uncoded material; sent for coded materials too (s.225) |
| `malzemeKodu` | string |  | — |  | Material code; required for SUT and protocol materials (s.225) |
| `malzemeTuru` | enum |  | malzeme-turu |  | Material type - 1 SUT kodlu, 2 Emekli Sandigi protokol kodlu, 3 kodsuz (s.225) |
| `paketHaric` | string |  | — |  | 0 when included in the package, 1 when excluded (s.225) |
| `katkiPayi` | string |  | — |  | E when a patient contribution exists, H when not (s.225) |
| `kdv` | integer |  | — |  | VAT amount of the material (s.225) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.225) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.226) |
| `malzemeSatinAlisTarihi` | date |  | — |  | Date the material was purchased (s.226) |
| `donorId` | string |  | — |  | Mandatory for allograft shipments (s.226) |
| `ihaleKesinlesmeTarihi` | date |  | — |  | Mandatory for public institutions for uncoded materials used on or after 01.10.2014 (s.226) |
| `ikNoAlimNo` | string |  | — |  | Mandatory for public institutions for uncoded materials used on or after 01.10.2014 (s.226) |
| `bayiNo` | string |  | — |  | Vendor identifier of the material supplier (mandatory since 02.07.2018) (s.226) |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.226) |
| `sagSol` | string |  | — |  | R (Sag) / L (Sol) side code (s.226) |
| `birlikteYapilanIslemSUTKodu` | string |  | — |  | SUT code of the concurrently performed operation (s.226) |
| `birlikteYapilanIslemHizmetSunucuRefNo` | string |  | — |  | Institution reference of the concurrently performed operation (s.226) |

## `MuayeneBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the examination (s.226) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.226) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.226) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.226) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.227) |
| `muayeneTarihi` | date |  | — |  | Examination date, dd.mm.yyyy (s.227) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.227) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.227) |

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

## `ProvizyonDegistirCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.174) |
| `yeniProvizyonTipi` | string |  | — |  | New provision type applied (s.174) |
| `hastaBasvuruNo` | string |  | — |  | Application number (length per the guide is 4) (s.174) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (guide lists N/A length here) (s.174) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.174) |

## `ProvizyonDegistirGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number whose provision type changes (s.174) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.174) |
| `yeniProvizyonTipi` | string |  | — |  | New provision type (provizyon-tipi codes) (s.174) |

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

## `SevkBildirGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number being referred (s.173) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.173) |
| `sevkEdilisTarihi` | date |  | — |  | Referral date, dd.mm.yyyy (s.173) |
| `yesilKartSevkEdilenBransKodu` | string |  | — |  | Branch code of the green-card referral target (s.173) |
| `yesilKartSevkEdilenTedaviTipi` | integer |  | — |  | Treatment type of the green-card referral target (s.173) |
| `yesilKartSevkEdilenTakipTipi` | string |  | — |  | Takip type of the green-card referral target (s.173) |

## `SevkBildirSonucDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.173) |
| `sevkEdilisTarihi` | date |  | — |  | Referral date, dd.mm.yyyy (s.173) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.173) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.173) |

## `TahlilBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the lab test (s.227) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.227) |
| `istemYapanDrTescilNo` | string |  | — |  | Registration number of the requesting doctor (s.227) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.227) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.227) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.227) |
| `islemTarihi` | date |  | — |  | Lab test date, dd.mm.yyyy (s.228) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.228) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.228) |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.228) |
| `istemYapanDrBrans` | string |  | — |  | Branch code of the requesting doctor (s.228) |
| `genBilgisi` | array |  | — |  | Gene details, expanded as the GenBilgisiDVO registry entity (Tablo 4.2.1.j.2, s.231) (s.228) |
| `tahlilTipi` | string |  | — |  | Lab-type code catalog (HEM/IDR/KGAZ/OGTT prefixes, s.229-231); catalog enum is v0.3 scope |
| `birim` | string |  | — |  | Result unit (s.231) |
| `sagSol` | string |  | — |  | R (Sag) / L (Sol) side code (s.231) |
| `ayniFarkliKesi` | enum |  | ayni-farkli-kesi |  | Incision/session relation; codes 1-5 match the ayni-farkli-kesi enum (s.231) |
| `aciklama` | string |  | — |  | Lab description (s.231) |

## `TahlilSonucDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern while registering (s.228) |
| `sonuc` | string |  | — |  | Lab result value; must be +, - or a numeric value (s.228) |

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

