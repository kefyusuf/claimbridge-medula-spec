<!-- This file is generated. Do not edit manually. -->

# Methods

## `medula.hastane.fatura-kayit.fatura-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.fatura-kayit |
| Documentation heading | FaturaIptal |
| Operation name | faturaIptal |
| Input DVO | null |
| Output DVO | null |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | draft |
| Source refs | medula-hastane-guide-2026-06-17 |

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
| Input DVO | null |
| Output DVO | null |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | draft |
| Source refs | medula-hastane-guide-2026-06-17 |

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
| Input DVO | null |
| Output DVO | null |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | draft |
| Source refs | medula-hastane-guide-2026-06-17 |

**State effects**

| Effect | Targets |
| --- | --- |
| creates | — |
| reads | `invoiceRecord`, `serviceRecord` |
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

## `medula.hastane.hizmet-kayit.hizmet-kaydi-iptal`

| Field | Value |
| --- | --- |
| Service | medula.hastane.hizmet-kayit |
| Documentation heading | HizmetKaydiIptal |
| Operation name | hizmetKaydiIptal |
| Input DVO | null |
| Output DVO | null |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | draft |
| Source refs | medula-hastane-guide-2026-06-17 |

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
| Input DVO | null |
| Output DVO | null |
| Success | sonucKodu = 0000 (sonucMesaji) |
| Sandbox supported |  |
| Status | draft |
| Source refs | medula-hastane-guide-2026-06-17 |

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

