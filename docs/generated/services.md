<!-- This file is generated. Do not edit manually. -->

# Services

## Fatura Kayit (`medula.hastane.fatura-kayit`)

Invoice registration process that invoices previously registered service records linked to a patient application.

| Field | Value |
| --- | --- |
| Slug | fatura-kayit |
| Status | draft |
| Production WSDL | wsdl.fatura-kayit.production |
| Test WSDL | wsdl.fatura-kayit.test |
| Source refs | medula-hastane-guide-2026-06-17 |

**Methods**

- `medula.hastane.fatura-kayit.fatura-kayit`
- `medula.hastane.fatura-kayit.fatura-oku`
- `medula.hastane.fatura-kayit.fatura-iptal`
- `medula.hastane.fatura-kayit.fatura-tutar-oku`

## Hasta Kabul (`medula.hastane.hasta-kabul`)

Patient admission process that creates a patient application number and an associated tracking number.

| Field | Value |
| --- | --- |
| Slug | hasta-kabul |
| Status | draft |
| Production WSDL | wsdl.hasta-kabul.production |
| Test WSDL | wsdl.hasta-kabul.test |
| Source refs | medula-hastane-guide-2026-06-17 |

**Methods**

- `medula.hastane.hasta-kabul.hasta-kabul`
- `medula.hastane.hasta-kabul.hasta-kabul-oku`
- `medula.hastane.hasta-kabul.hasta-kabul-iptal`
- `medula.hastane.hasta-kabul.hasta-kabul-kimlik-dogrulama`
- `medula.hastane.hasta-kabul.hasta-cikis-kayit`
- `medula.hastane.hasta-kabul.hasta-cikis-iptal`
- `medula.hastane.hasta-kabul.hasta-yatis-oku`
- `medula.hastane.hasta-kabul.basvuru-altindaki-takipleri-oku`
- `medula.hastane.hasta-kabul.sevk-bildir`
- `medula.hastane.hasta-kabul.update-tedavi-tipi`
- `medula.hastane.hasta-kabul.update-provizyon-tipi`
- `medula.hastane.hasta-kabul.kemik-iligi-kabul`
- `medula.hastane.hasta-kabul.kemik-iligi-iptal`
- `medula.hastane.hasta-kabul.kemik-iligi-oku`
- `medula.hastane.hasta-kabul.kemik-iligi-islem-duzeltme`
- `medula.hastane.hasta-kabul.kemik-iligi-tc-ile-sorgu`
- `medula.hastane.hasta-kabul.ekds-kisi-dogrulama-sorgu`
- `medula.hastane.hasta-kabul.ekds-belge-gereken-takip-sorgu`

## Hizmet Kayit (`medula.hastane.hizmet-kayit`)

Service registration process that records medical services against an existing patient application and tracking number.

| Field | Value |
| --- | --- |
| Slug | hizmet-kayit |
| Status | draft |
| Production WSDL | wsdl.hizmet-kayit.production |
| Test WSDL | wsdl.hizmet-kayit.test |
| Source refs | medula-hastane-guide-2026-06-17 |

**Methods**

- `medula.hastane.hizmet-kayit.hizmet-kayit`
- `medula.hastane.hizmet-kayit.hizmet-kaydi-oku`
- `medula.hastane.hizmet-kayit.hizmet-kaydi-iptal`

## E-İmzalı Rapor Islemleri Metotlari (`medula.hastane.imzali-rapor`)

Digitally-signed report operations: approval (physician / board head / chief physician), signed-blob queries, pending-approval queries, deletion and the XML-object approval step. Inputs and query payloads are opaque byte[] signature blobs; raporKaydet (7-page composite, s.329-336) lands with G45c-b.

| Field | Value |
| --- | --- |
| Slug | imzali-rapor |
| Status | reviewed |
| Production WSDL | wsdl.imzali-rapor.production |
| Test WSDL | wsdl.imzali-rapor.test |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**Methods**

- `medula.hastane.imzali-rapor.rapor-onay`
- `medula.hastane.imzali-rapor.kurul-baskani-rapor-onay`
- `medula.hastane.imzali-rapor.bashekim-rapor-onay`
- `medula.hastane.imzali-rapor.rapor-sorgu`
- `medula.hastane.imzali-rapor.tc-ile-rapor-sorgu`
- `medula.hastane.imzali-rapor.kurul-baskani-onay-bekleyen-rapor-sorgu`
- `medula.hastane.imzali-rapor.bashekim-onay-bekleyen-rapor-sorgu`
- `medula.hastane.imzali-rapor.onay-bekleyen-rapor-sorgu`
- `medula.hastane.imzali-rapor.rapor-sil`
- `medula.hastane.imzali-rapor.onay`
- `medula.hastane.imzali-rapor.onay-bekleyen`

## Ortodonti Formu Kayit Metotlari (`medula.hastane.ortodonti`)

Orthodontic form operations: save, cancel and read the orthodontics follow-up form (guide section renumbered 4.5/4.8 across editions).

| Field | Value |
| --- | --- |
| Slug | ortodonti |
| Status | reviewed |
| Production WSDL | wsdl.ortodonti.production |
| Test WSDL | wsdl.ortodonti.test |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**Methods**

- `medula.hastane.ortodonti.ortodonti-formu-kaydet`
- `medula.hastane.ortodonti.ortodonti-formu-iptal`
- `medula.hastane.ortodonti.ortodonti-formu-oku`

## Rapor Bilgisi Kayit (`medula.hastane.rapor`)

Report information registry operations: report lookup by report key, deletion, drug report correction, lookups by report tracking number or citizen ID, and report registration (RaporBilgisiKaydet dispatching exactly one report branch; the drug/disability/treatment/illness sub-branch shapes land incrementally).

| Field | Value |
| --- | --- |
| Slug | rapor |
| Status | reviewed |
| Production WSDL | wsdl.rapor.production |
| Test WSDL | wsdl.rapor.test |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**Methods**

- `medula.hastane.rapor.rapor-bilgisi-bul`
- `medula.hastane.rapor.rapor-bilgisi-sil`
- `medula.hastane.rapor.ilac-rapor-duzelt`
- `medula.hastane.rapor.rapor-bilgisi-bul-rapor-takip-nodan`
- `medula.hastane.rapor.rapor-bilgisi-bul-tc-kimlik-nodan`
- `medula.hastane.rapor.rapor-bilgisi-kaydet`
- `medula.hastane.rapor.takip-no-ile-rapor-bilgisi-kaydet`

## Taahhut Kayit Metotlari (`medula.hastane.taahhut`)

Dental-prosthesis commitment operations: save (restricted to SUT annex-7 prosthesis codes 404010…404420), read by commitment number, delete, and read a person's prior commitments. Dental codes follow the mouth schema Tablo 4.7.4 (s.325-326).

| Field | Value |
| --- | --- |
| Slug | taahhut |
| Status | reviewed |
| Production WSDL | wsdl.taahhut.production |
| Test WSDL | wsdl.taahhut.test |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**Methods**

- `medula.hastane.taahhut.dis-taahhut-kaydet`
- `medula.hastane.taahhut.dis-taahhut-oku`
- `medula.hastane.taahhut.dis-taahhut-sil`
- `medula.hastane.taahhut.kisi-dis-taahhut-oku`

## Takip Formu Kayit Metotlari (`medula.hastane.takip-formu`)

Diabetes Mellitus follow-up form operations: save, read and delete the DM follow-up form (guide section renumbered 4.3/4.6.1 across editions).

| Field | Value |
| --- | --- |
| Slug | takip-formu |
| Status | reviewed |
| Production WSDL | wsdl.takip-formu.production |
| Test WSDL | wsdl.takip-formu.test |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**Methods**

- `medula.hastane.takip-formu.takip-formu-kaydet`
- `medula.hastane.takip-formu.takip-formu-oku`
- `medula.hastane.takip-formu.takip-formu-sil`

## Yardimci Web Servis Metotlari (`medula.hastane.yardimci-islemler`)

Helper operations: facility, physician, tracking-record and drug searches, plus the remaining helper queries landing in G44b-c. The takip-ara search window may not exceed one month (s.286).

| Field | Value |
| --- | --- |
| Slug | yardimci-islemler |
| Status | reviewed |
| Production WSDL | wsdl.yardimci-islemler.production |
| Test WSDL | wsdl.yardimci-islemler.test |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**Methods**

- `medula.hastane.yardimci-islemler.saglik-tesisi-ara`
- `medula.hastane.yardimci-islemler.doktor-ara`
- `medula.hastane.yardimci-islemler.takip-ara`
- `medula.hastane.yardimci-islemler.ilac-ara`
- `medula.hastane.yardimci-islemler.orneklenmis-takipler`
- `medula.hastane.yardimci-islemler.kesinti-yapilmis-islemler`
- `medula.hastane.yardimci-islemler.katilim-payi-ucreti`
- `medula.hastane.yardimci-islemler.takip-bilgileri-listesi`
- `medula.hastane.yardimci-islemler.yurt-disi-yardim-hakki-getir`
- `medula.hastane.yardimci-islemler.guncel-sut-kodlari`
- `medula.hastane.yardimci-islemler.evrak-takip-grup-kodlari-sorgu`
- `medula.hastane.yardimci-islemler.tesis-yatak-sorgu`
- `medula.hastane.yardimci-islemler.barkod-sut-eslesme-sorgu`
- `medula.hastane.yardimci-islemler.kisi-gecmis-islem-sorgu`
- `medula.hastane.yardimci-islemler.tani-ara`
- `medula.hastane.yardimci-islemler.e-nabiz-bildirim-sorgu`
- `medula.hastane.yardimci-islemler.kisi-vefat-kayit`
- `medula.hastane.yardimci-islemler.kurum-sevk-talep-no-sorgu`
- `medula.hastane.yardimci-islemler.kisi-gen-sorgula`

