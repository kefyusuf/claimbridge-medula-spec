<!-- This file is generated. Do not edit manually. -->

# Workflows

## Core Claim Flow (`core-claim-flow`)

Stateful core claim workflow for patient admission, service registration, and invoice registration.

| Step | Method | Requires | Creates | Updates | Deletes | Next |
| --- | --- | --- | --- | --- | --- | --- |
| `patient-admission` | `medula.hastane.hasta-kabul.hasta-kabul` | — | `hastaBasvuruNo`, `takipNo`, `patientAdmission`, `takip` | — | — | `service-registration` |
| `service-registration` | `medula.hastane.hizmet-kayit.hizmet-kayit` | `hastaBasvuruNo`, `takipNo` | `serviceRecord`, `islemSiraNo` | `takip` | — | `invoice-registration` |
| `invoice-registration` | `medula.hastane.fatura-kayit.fatura-kayit` | `hastaBasvuruNo`, `serviceRecord` | `invoiceRecord`, `faturaTeslimNo` | `takip` | — | — |

Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

## Invoice Registration Flow (`invoice-registration-flow`)

Sub-flow covering only the invoice registration step of the core claim flow.

| Step | Method | Requires | Creates | Updates | Deletes | Next |
| --- | --- | --- | --- | --- | --- | --- |
| `invoice-registration` | `medula.hastane.fatura-kayit.fatura-kayit` | `hastaBasvuruNo`, `serviceRecord` | `invoiceRecord`, `faturaTeslimNo` | `takip` | — | — |

Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

## Patient Admission Flow (`patient-admission-flow`)

Sub-flow covering only the patient admission step of the core claim flow.

| Step | Method | Requires | Creates | Updates | Deletes | Next |
| --- | --- | --- | --- | --- | --- | --- |
| `patient-admission` | `medula.hastane.hasta-kabul.hasta-kabul` | — | `hastaBasvuruNo`, `takipNo`, `patientAdmission`, `takip` | — | — | — |

Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

## Service Registration Flow (`service-registration-flow`)

Sub-flow covering only the service registration step of the core claim flow.

| Step | Method | Requires | Creates | Updates | Deletes | Next |
| --- | --- | --- | --- | --- | --- | --- |
| `service-registration` | `medula.hastane.hizmet-kayit.hizmet-kayit` | `hastaBasvuruNo`, `takipNo` | `serviceRecord`, `islemSiraNo` | `takip` | — | — |

Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

