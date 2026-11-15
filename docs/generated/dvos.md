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

Domain: `fatura-kayit` · Direction: `input` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code of the invoicing institution. |
| `faturaTarihi` | date |  | — |  | Invoice date. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number whose registered services are being invoiced. |
| `faturaRefNo` | string |  | — |  | Institution-side invoice reference number. |
| `hizmetDetaylari` | array |  | — |  | Service lines being invoiced (FaturaHizmetDetayDVO records). |
| `trafikKazasiOdemeYuzdesi` | integer |  | — |  | Traffic-accident payment percentage when the claim is traffic-accident related. |
| `ilaveUcret` | decimal |  | — |  | Additional fee amount declared with the invoice. |
| `ktsHbysKodu` | string |  | — |  | Hospital information system (HBYS) code used by the KTS integration. |
| `hastaTelefon` | string |  | — |  | Patient contact phone. Examples must use synthetic placeholders only. |
| `hastaAdres` | string |  | — |  | Patient contact address. Examples must use synthetic placeholders only. |
| `muvafakatVar` | boolean |  | — |  | Whether the patient consent (muvafakat) is on file. |

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

Domain: `hizmet-kayit` · Direction: `output` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error. |
| `sonucMesaji` | string |  | — |  | Human-readable result message accompanying the result code. |
| `islemSiraNumaralari` | array |  | — |  | Operation sequence numbers generated for the registered procedures; present on success. |
| `hizmetKayitReferansNo` | string |  | — |  | Service registration reference number linking the registered lines; present on success. |

## `HizmetKayitGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code of the registering institution. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number produced by the admission flow. |
| `takipNo` | string |  | — |  | Tracking number the services are registered against. |
| `taniBilgileri` | array |  | — |  | Diagnosis entries (ICD-10 codes with type qualifiers) for this episode. |
| `islemBilgileri` | array |  | — |  | Procedure/operation entries performed during the episode. |
| `hizmetDetaylari` | array |  | — |  | Detailed service lines (HizmetDetayDVO records) to register. |
| `ktsHbysKodu` | string |  | — |  | Hospital information system (HBYS) code used by the KTS integration. |

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

Domain: `hasta-kabul` · Direction: `input` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code assigned to the institution. |
| `hastaTCKimlikNo` | string |  | — |  | Patient identity number. Examples must use synthetic placeholders only. |
| `takipNo` | string |  | — |  | Existing tracking number used when requesting a related (bagli) follow-up tracking number. |
| `provizyonTipi` | enum |  | provizyon-tipi |  | Provision type controlling how SGK covers the admission. |
| `tedaviTuru` | enum |  | tedavi-turu |  | Treatment type of the admission (inpatient or outpatient). |
| `takipTipi` | enum |  | takip-tipi |  | Whether this is a new tracking record or one attached to an existing tracking number. |
| `bransKodu` | integer |  | — |  | Medical branch (specialty) code of the admitting department. |
| `doktorTescilNo` | string |  | — |  | Registration number of the admitting doctor. Examples use synthetic placeholders. |
| `ktsHbysKodu` | string |  | — |  | Hospital information system (HBYS) code used by the KTS integration. |

## `TakipDVO`

Domain: `hasta-kabul` · Direction: `shared` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number identifying this treatment episode. |
| `takipTipi` | enum |  | takip-tipi |  | Whether the tracking record is new or attached to an existing one. |
| `takipDurumu` | enum |  | takip-durumu |  | Current state of the tracking record. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number this tracking record belongs to. |

