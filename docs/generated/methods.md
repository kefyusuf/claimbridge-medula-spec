<!-- This file is generated. Do not edit manually. -->

# Methods

## `medula.hastane.fatura-kayit.fatura-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.fatura-kayit |
| Documentation heading | FaturaIptal |
| Operation name | faturaIptal |
| Input DVO | FaturaIptalGirisDVO |
| Output DVO | FaturaIptalCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `invoiceRecord`, `takip` |
| updates | `takip` |
| deletes | `invoiceRecord` |
| generates | — |

## `medula.hastane.fatura-kayit.fatura-kayit`

| Field | Value |
| --- | --- |
| Service | medula.hastane.fatura-kayit |
| Documentation heading | FaturaKayit |
| Operation name | FaturaKayit |
| Input DVO | FaturaGirisDVO |
| Output DVO | FaturaCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | `invoiceRecord` |
| reads | `hastaBasvuruNo`, `serviceRecord` |
| updates | `takip` |
| deletes | — |
| generates | `faturaTeslimNo`, `faturaTutari` |

## `medula.hastane.fatura-kayit.fatura-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.fatura-kayit |
| Documentation heading | FaturaOku |
| Operation name | faturaOku |
| Input DVO | FaturaOkuGirisDVO |
| Output DVO | FaturaOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `invoiceRecord` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.fatura-kayit.fatura-tutar-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.fatura-kayit |
| Documentation heading | FaturaTutarOku |
| Operation name | faturaTutarOku |
| Input DVO | FaturaGirisDVO |
| Output DVO | FaturaCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `invoiceRecord`, `serviceRecord` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.basvuru-altindaki-takipleri-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | BasvuruAltindakiTakipleriOku |
| Operation name | BasvuruTakipOku |
| Input DVO | BasvuruTakipOkuDVO |
| Output DVO | BasvuruTakipOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.ekds-belge-gereken-takip-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | ekdsBelgeGerekenTakipSorgu |
| Operation name | ekdsBelgeGerekenTakipSorgu |
| Input DVO | EKDSBelgeGerekenTakipSorguGirisDVO |
| Output DVO | EKDSBelgeGerekenTakipCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.ekds-kisi-dogrulama-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | ekdsKisiDogrulamaSorgu |
| Operation name | ekdsKisiDogrulamaSorgu |
| Input DVO | BKDSDogrulamaKisiSorguGirisDVO |
| Output DVO | BKDSDogrulamaKisiSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.hasta-cikis-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaCikisIptal |
| Operation name | HastaCikisIptal |
| Input DVO | HastaCikisIptalDVO |
| Output DVO | HastaCikisCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.hasta-cikis-kayit`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaCikisKayit |
| Operation name | HastaCikisKayit |
| Input DVO | HastaCikisDVO |
| Output DVO | HastaCikisCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.hasta-kabul`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaKabul |
| Operation name | HastaKabul |
| Input DVO | ProvizyonGirisDVO |
| Output DVO | ProvizyonCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | `patientAdmission`, `takip` |
| reads | — |
| updates | — |
| deletes | — |
| generates | `hastaBasvuruNo`, `takipNo` |

## `medula.hastane.hasta-kabul.hasta-kabul-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaKabulIptal |
| Operation name | hastaKabulIptal |
| Input DVO | TakipSilGirisDVO |
| Output DVO | TakipSilCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `patientAdmission`, `takip` |
| updates | — |
| deletes | `takip` |
| generates | — |

## `medula.hastane.hasta-kabul.hasta-kabul-kimlik-dogrulama`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaKabulKimlikDogrulama |
| Operation name | HastaKabulKimlikDogrulama |
| Input DVO | null |
| Output DVO | null |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | draft |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.hasta-kabul-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaKabulOku |
| Operation name | hastaKabulOku |
| Input DVO | TakipOkuGirisDVO |
| Output DVO | TakipDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `patientAdmission`, `takip` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.hasta-yatis-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | HastaYatisOku |
| Operation name | HastaYatisOku |
| Input DVO | HastaYatisOkuDVO |
| Output DVO | HastaYatisOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.kemik-iligi-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | KemikIligiIptal |
| Operation name | KemikIligiIptal |
| Input DVO | KemikIligiIptalGirisDVO |
| Output DVO | KemikIligiIptalCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.kemik-iligi-islem-duzeltme`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | KemikIligiIslemDuzeltme |
| Operation name | KemikIligiIslemDuzeltme |
| Input DVO | KemikIligiIslemDuzeltmeGirisDVO |
| Output DVO | KemikIligiIslemDuzeltmeCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.kemik-iligi-kabul`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | KemikIligiKabul |
| Operation name | KemikIligiKabul |
| Input DVO | KemikIligiKabulDVO |
| Output DVO | KemikIligiKabulCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.kemik-iligi-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | KemikIligiOku |
| Operation name | KemikIligiOku |
| Input DVO | KemikIligiOkuGirisDVO |
| Output DVO | KemikIligiOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.kemik-iligi-tc-ile-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | KemikIligiTCIleSorgu |
| Operation name | KemikIligiTCIleSorgu |
| Input DVO | KemikIligiTCIleOkuGirisDVO |
| Output DVO | KemikIligiTCIleOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.sevk-bildir`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | SevkBildir |
| Operation name | SevkBildir |
| Input DVO | SevkBildirGirisDVO |
| Output DVO | SevkBildirSonucDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.update-provizyon-tipi`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | UpdateProvizyonTipi |
| Operation name | UpdateProvizyonTipi |
| Input DVO | ProvizyonDegistirGirisDVO |
| Output DVO | ProvizyonDegistirCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hasta-kabul.update-tedavi-tipi`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hasta-kabul |
| Documentation heading | UpdateTedaviTipi |
| Operation name | UpdateTedaviTipi |
| Input DVO | TakipOkuGirisDVO |
| Output DVO | TakipDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hizmet-kayit.hizmet-kaydi-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hizmet-kayit |
| Documentation heading | HizmetKaydiIptal |
| Operation name | hizmetKaydiIptal |
| Input DVO | HizmetIptalGirisDVO |
| Output DVO | HizmetIptalCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `serviceRecord`, `takip` |
| updates | `takip` |
| deletes | `serviceRecord` |
| generates | — |

## `medula.hastane.hizmet-kayit.hizmet-kaydi-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hizmet-kayit |
| Documentation heading | HizmetKaydiOku |
| Operation name | hizmetKaydiOku |
| Input DVO | HizmetOkuGirisDVO |
| Output DVO | HizmetOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `serviceRecord`, `takip` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.hizmet-kayit.hizmet-kayit`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hizmet-kayit |
| Documentation heading | HizmetKayit |
| Operation name | HizmetKayit |
| Input DVO | HizmetKayitGirisDVO |
| Output DVO | HizmetKayitCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-2026-06-17, medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | `serviceRecord`, `islemSiraNo` |
| reads | `hastaBasvuruNo`, `takipNo` |
| updates | `takip` |
| deletes | — |
| generates | `islemSiraNo` |

## `medula.hastane.rapor.ilac-rapor-duzelt`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | IlacRaporDuzelt |
| Operation name | IlacRaporDuzelt |
| Input DVO | IlacRaporDuzeltDVO |
| Output DVO | RaporCevapDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `rapor` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.rapor.rapor-bilgisi-bul`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | RaporBilgisiBul |
| Operation name | RaporBilgisiBul |
| Input DVO | RaporSorguDVO |
| Output DVO | RaporCevapDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `rapor` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.rapor.rapor-bilgisi-bul-rapor-takip-nodan`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | RaporBilgisiBulRaporTakipNodan |
| Operation name | RaporBilgisiBulRaporTakipNodan |
| Input DVO | RaporOkuRaporTakipNodanDVO |
| Output DVO | RaporCevapDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `rapor` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.rapor.rapor-bilgisi-bul-tc-kimlik-nodan`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | RaporBilgisiBulTCKimlikNodan |
| Operation name | RaporBilgisiBulTCKimlikNodan |
| Input DVO | RaporOkuTCKimlikNodanDVO |
| Output DVO | RaporCevapTCKimlikNodanDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `rapor` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.rapor.rapor-bilgisi-kaydet`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | RaporBilgisiKaydet |
| Operation name | RaporBilgisiKaydet |
| Input DVO | RaporGirisDVO |
| Output DVO | RaporCevapDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | `rapor` |
| reads | — |
| updates | — |
| deletes | — |
| generates | `raporTakipNo` |

## `medula.hastane.rapor.rapor-bilgisi-sil`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | RaporBilgisiSil |
| Operation name | RaporBilgisiSil |
| Input DVO | RaporSorguDVO |
| Output DVO | RaporCevapDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `rapor` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.rapor.takip-no-ile-rapor-bilgisi-kaydet`

| Field | Value |
| --- | --- |
| Service | medula.hastane.rapor |
| Documentation heading | TakipNoileRaporBilgisiKaydet |
| Operation name | TakipNoileRaporBilgisiKaydet |
| Input DVO | RaporGirisDVO |
| Output DVO | RaporCevapDVO |
| Success | sonucKodu = 0 (sonucAciklamasi) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | `rapor` |
| reads | — |
| updates | — |
| deletes | — |
| generates | `raporTakipNo` |

## `medula.hastane.takip-formu.takip-formu-kaydet`

| Field | Value |
| --- | --- |
| Service | medula.hastane.takip-formu |
| Documentation heading | takipFormuKaydet |
| Operation name | takipFormuKaydet |
| Input DVO | TakipFormuKaydetGirisDVO |
| Output DVO | TakipFormuKaydetCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | `takipFormu` |
| reads | — |
| updates | — |
| deletes | — |
| generates | `takipFormuNo` |

## `medula.hastane.takip-formu.takip-formu-oku`

| Field | Value |
| --- | --- |
| Service | medula.hastane.takip-formu |
| Documentation heading | takipFormuOku |
| Operation name | takipFormuOku |
| Input DVO | TakipFormuOkuGirisDVO |
| Output DVO | TakipFormuOkuCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `takipFormu` |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.takip-formu.takip-formu-sil`

| Field | Value |
| --- | --- |
| Service | medula.hastane.takip-formu |
| Documentation heading | takipFormuSil |
| Operation name | takipFormuSil |
| Input DVO | TakipFormuSilGirisDVO |
| Output DVO | TakipFormuSilCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | `takipFormu` |
| generates | — |

## `medula.hastane.yardimci-islemler.barkod-sut-eslesme-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | barkodSutEslesmeSorgu |
| Operation name | barkodSutEslesmeSorgu |
| Input DVO | BarkodSutEslesmeSorguGirisDVO |
| Output DVO | BarkodSutEslesmeSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.doktor-ara`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | DoktorAra |
| Operation name | DoktorAra |
| Input DVO | DoktorAraGirisDVO |
| Output DVO | DoktorAraCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.e-nabiz-bildirim-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | eNabizBildirimSorgu |
| Operation name | eNabizBildirimSorgu |
| Input DVO | ENabizBildirimSorguGirisDVO |
| Output DVO | ENabizBildirimSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.evrak-takip-grup-kodlari-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | evrakTakipGrupKodlariSorgu |
| Operation name | evrakTakipGrupKodlariSorgu |
| Input DVO | EvrakTakipGrupKoduSorguGirisDVO |
| Output DVO | EvrakTakipGrupKoduSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.guncel-sut-kodlari`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | guncelSutKodlari |
| Operation name | guncelSutKodlari |
| Input DVO | GuncelSutSorguGirisDVO |
| Output DVO | GuncelSutSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.ilac-ara`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | IlacAra |
| Operation name | IlacAra |
| Input DVO | IlacAraGirisDVO |
| Output DVO | IlacAraCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.katilim-payi-ucreti`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | katilimPayiUcreti |
| Operation name | katilimPayiUcreti |
| Input DVO | KatilimPayiGirisDVO |
| Output DVO | KatilimPayiCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.kesinti-yapilmis-islemler`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | kesintiYapilmisIslemler |
| Operation name | kesintiYapilmisIslemler |
| Input DVO | EvrakKesintiGirisDVO |
| Output DVO | EvrakKesintiCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.kisi-gecmis-islem-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | kisiGecmisİslemSorgu |
| Operation name | kisiGecmisİslemSorgu |
| Input DVO | KisiGecmisIslemlerGirisDVO |
| Output DVO | KisiGecmisIslemlerCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.kisi-gen-sorgula`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | KisiGenSorgula |
| Operation name | KisiGenSorgula |
| Input DVO | KisiGenSorguGirisDVO |
| Output DVO | KisiGenSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.kisi-vefat-kayit`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | kisiVefatKayit |
| Operation name | kisiVefatKayit |
| Input DVO | KisiOlumKayitGirisDVO |
| Output DVO | KisiOlumKayitCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.kurum-sevk-talep-no-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | kurumSevkTalepNoSorgu |
| Operation name | kurumSevkTalepNoSorgu |
| Input DVO | KurumSevkTalepNoSorguGirisDVO |
| Output DVO | KurumSevkTalepNoSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.orneklenmis-takipler`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | getOrneklenmisTakipler |
| Operation name | getOrneklenmisTakipler |
| Input DVO | OrneklenmisGirisDVO |
| Output DVO | OrneklenmisCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.saglik-tesisi-ara`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | SaglikTesisiAra |
| Operation name | SaglikTesisiAra |
| Input DVO | SaglikTesisiAraGirisDVO |
| Output DVO | SaglikTesisiAraCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.takip-ara`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | TakipAra |
| Operation name | TakipAra |
| Input DVO | TakipAraGirisDVO |
| Output DVO | TakipAraCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.takip-bilgileri-listesi`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | takipBilgileriListesi |
| Operation name | takipBilgileriListesi |
| Input DVO | TakipBilgisiGirisDVO |
| Output DVO | TakipBilgisiCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.tani-ara`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | taniAra |
| Operation name | taniAra |
| Input DVO | TaniAraGirisWSDVO |
| Output DVO | TaniAraCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.tesis-yatak-sorgu`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | tesisYatakSorgu |
| Operation name | tesisYatakSorgu |
| Input DVO | TesisYatakSorguGirisDVO |
| Output DVO | TesisYatakSorguCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

## `medula.hastane.yardimci-islemler.yurt-disi-yardim-hakki-getir`

| Field | Value |
| --- | --- |
| Service | medula.hastane.yardimci-islemler |
| Documentation heading | yurtDisiYardimHakkiGetir |
| Operation name | yurtDisiYardimHakkiGetir |
| Input DVO | YurtDisiYardimHakkiGetirGirisDVO |
| Output DVO | YurtDisiYardimHakkiGetirCevapDVO |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | reviewed |
| Source refs | medula-hastane-guide-3-1-1-2026-10-19 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | — |
| updates | — |
| deletes | — |
| generates | — |

