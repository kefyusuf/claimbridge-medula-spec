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

