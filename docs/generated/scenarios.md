<!-- This file is generated. Do not edit manually. -->

# Scenarios

## The same claim flow is invoiced twice (`duplicate-invoice`)

| Field | Value |
| --- | --- |
| Method | `medula.hastane.fatura-kayit.fatura-kayit` |
| Expected sonucKodu | `SANDBOX_3001` |
| Expected sonucMesaji | Bu basvuru icin fatura zaten olusturulmus. |
| Deterministic |  |
| HTTP status |  |
| Latency (ms) |  |
| Status | draft |
| Source refs | sandbox-design-v0.1 |

## Happy path across the full core claim flow (`happy-path`)

| Field | Value |
| --- | --- |
| Method | `medula.hastane.hasta-kabul.hasta-kabul` |
| Expected sonucKodu | `0000` |
| Expected sonucMesaji | Islem basari ile tamamlandi. |
| Deterministic |  |
| HTTP status |  |
| Latency (ms) |  |
| Status | draft |
| Source refs | sandbox-design-v0.1 |

## Service registration against a non-existing tracking number (`invalid-takip-no`)

| Field | Value |
| --- | --- |
| Method | `medula.hastane.hizmet-kayit.hizmet-kayit` |
| Expected sonucKodu | `SANDBOX_1001` |
| Expected sonucMesaji | Takip bulunamadi. |
| Deterministic |  |
| HTTP status |  |
| Latency (ms) |  |
| Status | draft |
| Source refs | sandbox-design-v0.1 |

## Invoice registration before any service record exists (`invoice-without-service`)

| Field | Value |
| --- | --- |
| Method | `medula.hastane.fatura-kayit.fatura-kayit` |
| Expected sonucKodu | `SANDBOX_2001` |
| Expected sonucMesaji | Kayitli hizmet bulunamadi. |
| Deterministic |  |
| HTTP status |  |
| Latency (ms) |  |
| Status | draft |
| Source refs | sandbox-design-v0.1 |

## Admission request missing a required field (`missing-required-field`)

| Field | Value |
| --- | --- |
| Method | `medula.hastane.hasta-kabul.hasta-kabul` |
| Expected sonucKodu | `SANDBOX_VALIDATION_ERROR` |
| Expected sonucMesaji | Zorunlu alan eksik - hastaTCKimlikNo. |
| Deterministic |  |
| HTTP status |  |
| Latency (ms) |  |
| Status | draft |
| Source refs | sandbox-design-v0.1 |

## Simulated service latency and timeout (`service-timeout`)

| Field | Value |
| --- | --- |
| Method | `medula.hastane.hasta-kabul.hasta-kabul` |
| Expected sonucKodu | `SANDBOX_TIMEOUT` |
| Expected sonucMesaji | Servis zaman asimi simule edildi. |
| Deterministic |  |
| HTTP status |  |
| Latency (ms) |  |
| Status | draft |
| Source refs | sandbox-design-v0.1 |

