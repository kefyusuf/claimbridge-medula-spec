# PRD: ClaimBridge Medula Spec

**Document Type:** Product Requirements Document  
**Target Executor:** Codex / code-generation agent  
**Primary Repository:** `claimbridge-medula-spec`  
**Status:** Draft v0.1  
**Language:** English  
**Owner:** Yusuf / ClaimBridge project  
**Last Updated:** 2026-11-15 (v0.1 amendments: fixture layout, nullable method contracts, field enumRef, generated-output commit policy, LICENSE decision, TDD work-group workflow)

---

## 1. Executive Summary

Build a standalone, language-neutral specification repository for Medula-compatible healthcare claim integrations.

This repository must not be an implementation of Medula, a live SGK connector, a sandbox runtime, or an HBYS product. Its job is to become the canonical, machine-readable source of truth for the domain objects, service methods, workflow states, validation rules, scenarios, source references, and generated documentation required by future projects.

The next repositories, especially `claimbridge-sandbox`, `claimbridge-laravel-client`, and `claimbridge-gateway`, must consume this specification instead of hardcoding Medula behavior directly in application code.

The first implementation target is the core claim workflow:

```text
Hasta Kabul -> Hizmet Kayit -> Fatura Kayit
```

The repository must be designed so future service groups such as Rapor, Yardimci Islemler, Takip Formu, Taahhut, Ortodonti, Sevk, and Imzali Rapor can be added without changing the architecture.

---

## 2. Background and Source Basis

The official Medula Web Services usage guide is a large technical document. It describes Medula hospital web service processes, service methods, DTO/DVO structures, field tables, service URLs, and result patterns.

Important source assumptions for this PRD:

1. The guide is technical documentation, not legal or regulatory advice.
2. Medula hospital web services contain three main operational processes:
   - Hasta Kabul
   - Hizmet Kayit
   - Fatura Kayit
3. The guide also references side processes such as Rapor Bilgisi Kayit and Yardimci Servisler.
4. The Hasta Kabul process generates a `HastaBasvuruNo` and a related `takipNo`.
5. Hizmet Kayit uses the previously generated application and tracking information to register services.
6. Fatura Kayit invoices previously registered service records linked to the patient application/treatment flow.
7. Many response objects use `sonucKodu`; `0000` means success, non-`0000` means an error.
8. Real and test WSDL endpoints exist per service group.
9. Health data is sensitive. This repository must not contain real patient data, real credentials, or real institution secrets.

Reference URL:

```text
https://medula.sgk.gov.tr/hastane/kilavuz/MEDULA_Kullanim_Kilavuzu.pdf
```

---

## 3. Product Vision

Create a reliable, versioned, machine-readable Medula-compatible domain specification that can generate documentation, diagrams, fixtures, schema bundles, and eventually SDK/server code.

The repository should be useful even before any runtime project exists.

Long-term target architecture:

```text
claimbridge-medula-spec
        ↓
claimbridge-sandbox
        ↓
claimbridge-laravel-client / php-client / ts-client / python-client
        ↓
claimbridge-gateway
        ↓
claimbridge-intelligence / docs explorer / MCP server
```

---

## 4. Problem Statement

Medula integration knowledge is currently scattered across PDF tables, WSDL contracts, changelog notes, process descriptions, and implementation-specific code in HBYS/healthcare software systems.

Directly building the sandbox first would create several problems:

1. Domain rules would be mixed with Laravel/PHP runtime code.
2. Future clients in PHP, Go, Python, or TypeScript would duplicate mappings.
3. Documentation and diagrams would drift from implementation.
4. PDF/WSDL extraction errors could silently become runtime behavior.
5. Conditional requirements and stateful workflow rules would be hard to audit.
6. Future Medula changes would be difficult to trace to exact affected fields, DVOs, methods, and workflows.

Therefore, build the spec repository first.

---

## 5. Goals

### 5.1 Primary Goals

1. Define a canonical repository structure for Medula-compatible domain specification.
2. Store source data in a human-readable and machine-readable format.
3. Make YAML registry files the source of truth.
4. Use JSON Schema to validate registry files.
5. Generate a bundled `dist/claimbridge-medula-spec.json` artifact.
6. Generate Mermaid diagrams from the registry, not by hand.
7. Generate Markdown documentation from the registry, not by hand.
8. Define the core claim flow with services, methods, DVOs, fields, rules, workflows, and sandbox scenarios.
9. Provide quality gates so future changes cannot break references silently.
10. Avoid storing real patient data, real Medula credentials, or non-synthetic health records.

### 5.2 Secondary Goals

1. Support future code generation for DTOs, enums, validators, mock responses, and client packages.
2. Support future PDF/WSDL extraction tooling.
3. Support human review of parsed changes.
4. Support provenance tracking: every field/method/rule should link back to a source reference.
5. Provide a strong open-source portfolio artifact that demonstrates domain modeling, specification design, and healthcare integration architecture.

---

## 6. Non-Goals

The first repository must not do the following:

1. It must not connect to live SGK/Medula services.
2. It must not implement a SOAP server runtime.
3. It must not implement the future sandbox runtime.
4. It must not implement a Laravel package.
5. It must not process real patient records.
6. It must not store real credentials.
7. It must not claim official SGK affiliation.
8. It must not provide legal, reimbursement, medical, or regulatory advice.
9. It must not auto-merge PDF parser results without human review.
10. It must not vendor official PDF/WSDL files into Git unless a later legal/source policy explicitly allows it.

---

## 7. Target Users

### 7.1 Primary Users

| User | Need |
|---|---|
| Sandbox developer | Needs machine-readable workflows, DVOs, methods, scenarios, and state effects. |
| Laravel/PHP client developer | Needs method contracts, DTO definitions, enums, response patterns, and examples. |
| HBYS integration developer | Needs readable documentation and examples without reading hundreds of PDF pages. |
| Repository maintainer | Needs source references, versioning, validation, and generated diff visibility. |

### 7.2 Secondary Users

| User | Need |
|---|---|
| Healthcare IT consultant | Needs workflow-level explanation of Medula-compatible integration behavior. |
| AI/MCP tool | Needs structured domain knowledge for question answering and code assistance. |
| Future Go/Python/TypeScript SDK author | Needs language-neutral schema and codegen-ready definitions. |

---

## 8. Product Principles

1. **Registry-first:** YAML registry files are the canonical source.
2. **Generated docs:** Markdown docs and Mermaid diagrams must be generated from the registry where possible.
3. **Human review:** Extracted or changed source data must be marked with review status.
4. **Source provenance:** Every entity should know where it came from.
5. **Implementation-neutral:** Do not encode Laravel/PHP-specific assumptions in the spec.
6. **Sandbox-ready:** Workflows and scenarios must be structured enough for a future stateful sandbox.
7. **Synthetic-only examples:** Examples must never use real patient data.
8. **Official-neutral naming:** Avoid implying SGK ownership, endorsement, or affiliation.
9. **Small vertical slice first:** Fully model the core claim workflow before expanding to all Medula domains.
10. **Fail loudly:** Broken references, stale generated files, invalid schemas, and missing provenance must fail CI.

---

## 9. Recommended Tech Stack

Because this repository is language-neutral and spec-oriented, use a lightweight Node.js/TypeScript toolchain for validation and generation.

| Layer | Choice | Rationale |
|---|---|---|
| Runtime | Node.js 22 LTS | Portable and common in documentation/spec tooling. |
| Package manager | pnpm | Fast, deterministic lockfile. |
| Language | TypeScript | Strong typing for generators and validators. |
| Registry format | YAML | Human-friendly source files. |
| Validation | JSON Schema Draft 2020-12 + AJV | Mature schema validation. |
| Tests | Vitest | Simple test runner for TypeScript. |
| Docs | Generated Markdown | No heavy docs framework in v0.1. |
| Diagrams | Generated Mermaid `.mmd` | GitHub-friendly diagrams. |
| CI | GitHub Actions | Validate, test, generate-check. |

Alternative acceptable implementation: Python + Pydantic + PyYAML. However, Codex should prefer the TypeScript stack unless the user explicitly requests Python.

---

## 10. Repository Name

Recommended repository name:

```text
claimbridge-medula-spec
```

Alternative names:

```text
claimbridge-spec
tr-health-claim-spec
medula-compatible-spec
sutflow-spec
```

Use `claimbridge-medula-spec` for this PRD.

---

## 11. Required Repository Structure

Codex must create this structure:

```text
claimbridge-medula-spec/
├─ README.md
├─ LICENSE
├─ DISCLAIMER.md
├─ CHANGELOG.md
├─ SPEC_VERSION
├─ package.json
├─ pnpm-lock.yaml
├─ tsconfig.json
├─ vitest.config.ts
├─ .gitignore
├─ .editorconfig
├─ .github/
│  └─ workflows/
│     └─ ci.yml
│
├─ sources/
│  ├─ official-sources.yml
│  ├─ guide-versions.yml
│  ├─ wsdl-manifest.yml
│  └─ extraction-notes.md
│
├─ schemas/
│  ├─ common.schema.json
│  ├─ service.schema.json
│  ├─ method.schema.json
│  ├─ dvo.schema.json
│  ├─ field.schema.json
│  ├─ enum.schema.json
│  ├─ rule.schema.json
│  ├─ workflow.schema.json
│  ├─ scenario.schema.json
│  └─ source-reference.schema.json
│
├─ registry/
│  ├─ services/
│  │  ├─ hasta-kabul.yml
│  │  ├─ hizmet-kayit.yml
│  │  └─ fatura-kayit.yml
│  │
│  ├─ methods/
│  │  ├─ hasta-kabul/
│  │  │  ├─ hasta-kabul.yml
│  │  │  ├─ hasta-kabul-oku.yml
│  │  │  └─ hasta-kabul-iptal.yml
│  │  │
│  │  ├─ hizmet-kayit/
│  │  │  ├─ hizmet-kayit.yml
│  │  │  ├─ hizmet-kaydi-oku.yml
│  │  │  └─ hizmet-kaydi-iptal.yml
│  │  │
│  │  └─ fatura-kayit/
│  │     ├─ fatura-kayit.yml
│  │     ├─ fatura-oku.yml
│  │     ├─ fatura-iptal.yml
│  │     └─ fatura-tutar-oku.yml
│  │
│  ├─ dvos/
│  │  ├─ hasta-kabul/
│  │  │  ├─ provizyon-giris-dvo.yml
│  │  │  ├─ provizyon-cevap-dvo.yml
│  │  │  └─ takip-dvo.yml
│  │  │
│  │  ├─ hizmet-kayit/
│  │  │  ├─ hizmet-kayit-giris-dvo.yml
│  │  │  ├─ hizmet-kayit-cevap-dvo.yml
│  │  │  └─ hizmet-detay-dvo.yml
│  │  │
│  │  └─ fatura-kayit/
│  │     ├─ fatura-giris-dvo.yml
│  │     ├─ fatura-cevap-dvo.yml
│  │     └─ fatura-hizmet-detay-dvo.yml
│  │
│  ├─ enums/
│  │  ├─ takip-tipi.yml
│  │  ├─ tedavi-turu.yml
│  │  ├─ provizyon-tipi.yml
│  │  ├─ takip-durumu.yml
│  │  └─ sonuc-kodu.yml
│  │
│  ├─ rules/
│  │  ├─ required-fields.yml
│  │  ├─ conditional-required-fields.yml
│  │  ├─ state-transition-rules.yml
│  │  ├─ invoice-rules.yml
│  │  └─ cancellation-rules.yml
│  │
│  ├─ workflows/
│  │  ├─ core-claim-flow.yml
│  │  ├─ patient-admission-flow.yml
│  │  ├─ service-registration-flow.yml
│  │  └─ invoice-registration-flow.yml
│  │
│  └─ scenarios/
│     ├─ happy-path.yml
│     ├─ invalid-takip-no.yml
│     ├─ missing-required-field.yml
│     ├─ invoice-without-service.yml
│     ├─ duplicate-invoice.yml
│     └─ service-timeout.yml
│
├─ examples/
│  ├─ hasta-kabul/
│  │  ├─ hasta-kabul-request.json
│  │  └─ hasta-kabul-response.json
│  ├─ hizmet-kayit/
│  │  ├─ hizmet-kayit-request.json
│  │  └─ hizmet-kayit-response.json
│  └─ fatura-kayit/
│     ├─ fatura-kayit-request.json
│     └─ fatura-kayit-response.json
│
├─ docs/
│  ├─ 00-overview.md
│  ├─ 01-domain-model.md
│  ├─ 02-versioning.md
│  ├─ 03-workflows.md
│  ├─ 04-sandbox-contract.md
│  ├─ 05-code-generation.md
│  └─ generated/
│     ├─ services.md
│     ├─ methods.md
│     ├─ dvos.md
│     ├─ workflows.md
│     └─ scenarios.md
│
├─ diagrams/
│  ├─ generated/
│  │  ├─ er-diagram.mmd
│  │  ├─ core-flow.mmd
│  │  └─ service-map.mmd
│  └─ README.md
│
├─ tools/
│  ├─ src/
│  │  ├─ index.ts
│  │  ├─ loadRegistry.ts
│  │  ├─ validateSchemas.ts
│  │  ├─ validateReferences.ts
│  │  ├─ generateDist.ts
│  │  ├─ generateDocs.ts
│  │  ├─ generateMermaid.ts
│  │  └─ checkSyntheticExamples.ts
│  └─ README.md
│
├─ tests/
│  ├─ fixtures/
│  │  ├─ valid/
│  │  │  ├─ service.valid.yml
│  │  │  ├─ method.valid.yml
│  │  │  ├─ dvo.valid.yml
│  │  │  ├─ workflow.valid.yml
│  │  │  └─ scenario.valid.yml
│  │  └─ invalid/
│  │     ├─ service-missing-id.yml
│  │     ├─ method-bad-status.yml
│  │     ├─ method-unknown-dvo-ref.yml
│  │     ├─ dvo-invalid-field-type.yml
│  │     ├─ field-bad-enum-ref.yml
│  │     ├─ workflow-missing-method-ref.yml
│  │     └─ scenario-missing-method-ref.yml
│  ├─ schema-validation.test.ts
│  ├─ reference-validation.test.ts
│  ├─ generation.test.ts
│  └─ synthetic-examples.test.ts
│
└─ dist/
   ├─ claimbridge-medula-spec.json
   ├─ claimbridge-medula-spec.min.json
   └─ manifest.json
```

---

## 12. Core Data Model

### 12.1 Service

A service represents a Medula service group such as Hasta Kabul, Hizmet Kayit, or Fatura Kayit.

Required fields:

```yaml
id: string
slug: string
displayName: string
description: string
sourceRefs: SourceReference[]
wsdl:
  productionUrl: string | null
  testUrl: string | null
methods: string[]
status: draft | reviewed | deprecated
```

### 12.2 Method

A method represents an operation exposed by a service.

Required fields:

```yaml
id: string
service: string
names:
  documentationHeading: string
  operationName: string
  aliases: string[]
contract:
  inputDvo: string | null
  outputDvo: string | null
sourceRefs: SourceReference[]
stateEffects:
  creates: string[]
  reads: string[]
  updates: string[]
  deletes: string[]
  generates: string[]
success:
  resultCodeField: string
  successCode: string
  messageField: string
sandbox:
  supported: boolean
  defaultScenario: string | null
status: draft | reviewed | deprecated
```

Important rule:

`documentationHeading` and `operationName` must be separate. The official guide may use a section title that differs from the actual operation name. For example, a documented section may be named like `FaturaKayit`, while the operation row may expose a different operation name. The spec must preserve both.

MVP note: read/cancel/invoice-amount operations (`*-oku`, `*-iptal`, `fatura-tutar-oku`) may set `contract.inputDvo`/`contract.outputDvo` to `null` until their DVOs are modeled in a later version. A `null` contract is allowed only while the method status is `draft`; `reviewed` methods must have a fully resolved contract.

### 12.3 DVO

A DVO is a domain value object / data transfer object used as an input or output structure.

Required fields:

```yaml
id: string
domain: string
direction: input | output | shared
sourceRefs: SourceReference[]
fields: Field[]
status: draft | reviewed | deprecated
```

### 12.4 Field

A field belongs to a DVO.

Required fields:

```yaml
name: string
displayName: string | null
type: string
enumRef: string | null
required: boolean
length: integer | string | null
description: string | null
sensitive: boolean
syntheticOnlyRecommended: boolean
sourceRefs: SourceReference[]
conditionalRequired: ConditionalRule[]
introducedIn: string | null
deprecatedIn: string | null
```

Supported field types in v0.1:

```text
string
integer
decimal
boolean
date
array
object
enum
```

When `type` is `enum`, the field must declare `enumRef` with the id of a registry enum file. `enumRef` must be `null` for all other types.

### 12.5 Enum

An enum defines controlled values used by fields or rules.

Required fields:

```yaml
id: string
displayName: string
values:
  - code: string
    label: string
    description: string | null
sourceRefs: SourceReference[]
status: draft | reviewed | deprecated
```

### 12.6 Rule

Rules express validation behavior, conditional required fields, state transitions, cancellation constraints, and invoice rules.

Required fields:

```yaml
id: string
type: required-field | conditional-required-field | state-transition | invoice-rule | cancellation-rule | sandbox-only
appliesTo:
  service: string | null
  method: string | null
  dvo: string | null
  field: string | null
condition: string | null
assertion: string
severity: info | warning | error
sourceRefs: SourceReference[]
status: draft | reviewed | deprecated
```

### 12.7 Workflow

A workflow defines a stateful process sequence. This is required for the future sandbox.

Required fields:

```yaml
id: string
name: string
description: string
steps:
  - id: string
    method: string
    requires: string[]
    creates: string[]
    updates: string[]
    deletes: string[]
    next: string[]
sourceRefs: SourceReference[]
status: draft | reviewed | deprecated
```

### 12.8 Scenario

A scenario defines expected sandbox behavior for a controlled case.

Required fields:

```yaml
id: string
title: string
method: string
given: object
request: object
expected:
  result:
    sonucKodu: string
    sonucMesaji: string
  stateChanges: object
sandbox:
  deterministic: boolean
  httpStatus: integer
  latencyMs: integer | null
sourceRefs: SourceReference[]
status: draft | reviewed | deprecated
```

### 12.9 Source Reference

Every important entity must be traceable.

Required fields:

```yaml
id: string
sourceType: official-guide | official-wsdl | manual-review | derived | sandbox-design
url: string | null
guideVersion: string | null
publishedAt: string | null
fetchedAt: string | null
page: integer | null
section: string | null
table: string | null
lineHint: string | null
confidence: extracted | reviewed | inferred | unknown
notes: string | null
```

---

## 13. Initial Registry Scope

### 13.1 Services

Create three service files in MVP:

```text
registry/services/hasta-kabul.yml
registry/services/hizmet-kayit.yml
registry/services/fatura-kayit.yml
```

Each must include production/test WSDL references from `sources/wsdl-manifest.yml`, but avoid duplicating the URLs manually in every file if a reference ID can be used.

### 13.2 Methods

Create these method specs:

#### Hasta Kabul

```text
hasta-kabul
hasta-kabul-oku
hasta-kabul-iptal
```

#### Hizmet Kayit

```text
hizmet-kayit
hizmet-kaydi-oku
hizmet-kaydi-iptal
```

#### Fatura Kayit

```text
fatura-kayit
fatura-oku
fatura-iptal
fatura-tutar-oku
```

### 13.3 DVOs

Create initial DVO specs:

```text
ProvizyonGirisDVO
ProvizyonCevapDVO
TakipDVO
HizmetKayitGirisDVO
HizmetKayitCevapDVO
HizmetDetayDVO
FaturaGirisDVO
FaturaCevapDVO
FaturaHizmetDetayDVO
```

Do not attempt to model every field from the official guide in v0.1. Add enough fields to support the core vertical slice and validation architecture.

### 13.4 Minimum Fields for MVP

#### ProvizyonGirisDVO

```yaml
- saglikTesisKodu
- hastaTCKimlikNo
- takipNo
- provizyonTipi
- tedaviTuru
- takipTipi
- bransKodu
- doktorTescilNo
- ktsHbysKodu
```

#### ProvizyonCevapDVO

```yaml
- sonucKodu
- sonucMesaji
- hastaBasvuruNo
- takipNo
- takipler
```

> **Group 15 amendment (2026-11-15):** HizmetDetayDVO now lives in the fatura domain per guide Tablo 4.3.1.c (aciklama/protokolNo/taburcuKodu/takipNo); the PRD-era service-line variant was removed.
>
> **Group 10 amendment (2026-11-15):** HizmetKayitGirisDVO and
> HizmetKayitCevapDVO minimum sets are aligned with the official guide
> (Tablo 4.2.1.a/b, edition 3.1.1): `tanilar` replaces `taniBilgileri`;
> `hastaBasvuruNo` is optional in the input (s.189); the response follows
> Tablo 4.2.1.b (`takipNo`, `hastaBasvuruNo`, `saglikTesisKodu`,
> `islemBilgileri`, `hataliKayitlar`). `doktorTescilNo` is absent from the
> guide and deprecated for 0.2.0. Source:
> `medula-hastane-guide-3-1-1-2026-10-19`.

#### HizmetKayitGirisDVO

```yaml
- saglikTesisKodu
- takipNo
- tanilar
- ktsHbysKodu
- ameliyatveGirisimBilgileri
- digerIslemBilgileri
- disBilgileri
- ilacBilgileri
- konsultasyonBilgileri
- malzemeBilgileri
- muayeneBilgisi
- tahlilBilgileri
- tetkikveRadyolojiBilgileri
- hastaYatisBilgileri
- kanBilgileri
- triajBeyani
- hastaBasvuruNo (optional per s.189)
```

#### HizmetKayitCevapDVO

```yaml
- sonucKodu
- sonucMesaji
- takipNo
- hastaBasvuruNo
- saglikTesisKodu
- islemBilgileri
- hataliKayitlar
```

#### FaturaGirisDVO

```yaml
- saglikTesisKodu
- faturaTarihi
- hastaBasvuruNo
- faturaRefNo
- hizmetDetaylari
- trafikKazasiOdemeYuzdesi
- ilaveUcret
- ktsHbysKodu
- hastaTelefon
- hastaAdres
- muvafakatVar
```

#### FaturaCevapDVO

```yaml
- sonucKodu
- sonucMesaji
- faturaTeslimNo
- faturaTutari
```

---

## 14. Workflow Requirements

Create `registry/workflows/core-claim-flow.yml`:

```yaml
id: core-claim-flow
name: Core Claim Flow
description: Stateful core claim workflow for patient admission, service registration, and invoice registration.

steps:
  - id: patient-admission
    method: medula.hastane.hasta-kabul.hasta-kabul
    requires: []
    creates:
      - hastaBasvuruNo
      - takipNo
      - patientAdmission
      - takip
    updates: []
    deletes: []
    next:
      - service-registration

  - id: service-registration
    method: medula.hastane.hizmet-kayit.hizmet-kayit
    requires:
      - hastaBasvuruNo
      - takipNo
    creates:
      - serviceRecord
      - islemSiraNo
    updates:
      - takip
    deletes: []
    next:
      - invoice-registration

  - id: invoice-registration
    method: medula.hastane.fatura-kayit.fatura-kayit
    requires:
      - hastaBasvuruNo
      - serviceRecord
    creates:
      - invoiceRecord
      - faturaTeslimNo
    updates:
      - takip
    deletes: []
    next: []
```

The workflow must be validated against method IDs in the registry.

---

## 15. Scenario Requirements

Create six initial scenarios.

### 15.1 `happy-path.yml`

Successful Hasta Kabul -> Hizmet Kayit -> Fatura Kayit flow.

Expected behavior:

```text
HastaKabul returns sonucKodu 0000 and generated hastaBasvuruNo/takipNo.
HizmetKayit returns sonucKodu 0000 and generated islemSiraNumaralari.
FaturaKayit returns sonucKodu 0000 and generated faturaTeslimNo/faturaTutari.
```

### 15.2 `invalid-takip-no.yml`

HizmetKayit is called with a non-existing takipNo.

Expected behavior:

```text
Sandbox returns a sandbox-specific non-success code.
State remains unchanged.
```

Use a sandbox-only code, for example:

```text
SANDBOX_1001
```

Do not claim that sandbox-only error codes are official Medula error codes.

### 15.3 `missing-required-field.yml`

A required field is missing.

Expected behavior:

```text
Sandbox returns SANDBOX_VALIDATION_ERROR.
Response includes the missing field path.
```

### 15.4 `invoice-without-service.yml`

FaturaKayit is called before any service record exists.

Expected behavior:

```text
Sandbox returns SANDBOX_2001.
No invoice state is created.
```

### 15.5 `duplicate-invoice.yml`

The same claim flow is invoiced twice.

Expected behavior:

```text
First invoice succeeds.
Second invoice returns a non-success sandbox-specific code.
No duplicate invoice state is created.
```

### 15.6 `service-timeout.yml`

Simulated service latency/timeout.

Expected behavior:

```text
Scenario metadata tells the future sandbox to delay or timeout.
Spec validation only verifies the scenario shape.
```

---

## 16. Source and Provenance Policy

### 16.1 Official Sources

Create `sources/official-sources.yml`:

```yaml
sources:
  - id: medula-hastane-guide-2026-06-17
    title: MEDULA Web Servisleri Kullanim Kilavuzu
    sourceType: official-guide
    url: https://medula.sgk.gov.tr/hastane/kilavuz/MEDULA_Kullanim_Kilavuzu.pdf
    publishedAt: "2026-06-17"
    fetchedAt: "2026-07-06"
    notes: Official technical usage guide. Not legal/regulatory advice.
```

### 16.2 WSDL Manifest

Create `sources/wsdl-manifest.yml`:

```yaml
wsdls:
  - id: wsdl.hasta-kabul.production
    service: hasta-kabul
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/hastaKabulIslemleriWS?wsdl

  - id: wsdl.hasta-kabul.test
    service: hasta-kabul
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/hastaKabulIslemleriWS?wsdl

  - id: wsdl.hizmet-kayit.production
    service: hizmet-kayit
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/hizmetKayitIslemleriWS?wsdl

  - id: wsdl.hizmet-kayit.test
    service: hizmet-kayit
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/hizmetKayitIslemleriWS?wsdl

  - id: wsdl.fatura-kayit.production
    service: fatura-kayit
    environment: production
    url: https://medula.sgk.gov.tr/medula/hastane/faturaKayitIslemleriWS?wsdl

  - id: wsdl.fatura-kayit.test
    service: fatura-kayit
    environment: test
    url: https://sgkt.sgk.gov.tr/medula/hastane/faturaKayitIslemleriWS?wsdl
```

### 16.3 Raw Artifact Policy

Do not commit official PDF or WSDL raw files in v0.1.

Allowed:

```text
- URL references
- fetch date
- source title
- source version/date
- hash fields if later fetched by tooling
- manual extraction notes
```

Not allowed:

```text
- real patient data
- real credentials
- institution credentials
- copied full official PDFs
- copied full WSDL files without explicit source policy
```

---

## 17. Privacy and Security Requirements

This repository must be safe for public GitHub use.

### 17.1 Hard Requirements

1. No real patient data.
2. No real T.C. identity numbers.
3. No real Medula usernames/passwords.
4. No real hospital credentials.
5. No screenshots containing identifiable patient/institution data.
6. No production request/response logs.
7. No `.env` files with secrets.
8. Examples must use clearly synthetic identifiers.
9. Include `DISCLAIMER.md`.
10. Include synthetic example validation.

### 17.2 Synthetic Data Rules

Examples may use placeholders such as:

```text
SYNTHETIC_TC_000000001
SYNTHETIC_PATIENT_001
SYNTHETIC_FACILITY_001
SYNTHETIC_DOCTOR_001
```

Avoid realistic-looking 11-digit T.C. identity numbers in examples. Even fake numbers may be mistaken for real values.

### 17.3 Disclaimer Requirements

`DISCLAIMER.md` must state:

```text
This project is not affiliated with, endorsed by, or maintained by SGK or the official Medula system.
This repository is a developer-oriented domain specification for local tooling, documentation, sandbox, and code generation experiments.
It does not provide legal, medical, regulatory, reimbursement, or billing advice.
Do not use real patient data, real credentials, or production Medula traffic in this repository.
```

---

## 18. Generated Outputs

### 18.1 Dist Bundle

Generate:

```text
dist/claimbridge-medula-spec.json
dist/claimbridge-medula-spec.min.json
dist/manifest.json
```

The full bundle must contain:

```json
{
  "specVersion": "0.1.0",
  "generatedAt": "ISO-8601 timestamp",
  "sources": [],
  "services": [],
  "methods": [],
  "dvos": [],
  "enums": [],
  "rules": [],
  "workflows": [],
  "scenarios": []
}
```

`manifest.json` must contain:

```json
{
  "specVersion": "0.1.0",
  "generatedAt": "ISO-8601 timestamp",
  "bundle": "claimbridge-medula-spec.json",
  "minifiedBundle": "claimbridge-medula-spec.min.json",
  "counts": {
    "services": 3,
    "methods": 10,
    "dvos": 9,
    "enums": 5,
    "rules": 5,
    "workflows": 4,
    "scenarios": 6
  },
  "checksums": {
    "claimbridge-medula-spec.json": "sha256:...",
    "claimbridge-medula-spec.min.json": "sha256:..."
  }
}
```

### 18.2 Generated Docs

Generate:

```text
docs/generated/services.md
docs/generated/methods.md
docs/generated/dvos.md
docs/generated/workflows.md
docs/generated/scenarios.md
```

Generated docs must include a header:

```md
<!-- This file is generated. Do not edit manually. -->
```

### 18.3 Generated Mermaid

Generate:

```text
diagrams/generated/er-diagram.mmd
diagrams/generated/core-flow.mmd
diagrams/generated/service-map.mmd
```

Generated diagrams must include a header comment where Mermaid syntax allows it.

### 18.4 Commit Policy for Generated Outputs

Generated outputs (`dist/`, `docs/generated/`, `diagrams/generated/`) are committed to Git and must not be listed in `.gitignore`.

Rationale: `pnpm check` validates freshness by regenerating outputs and comparing them against the committed copies. Uncommitted generated outputs would make this check meaningless and would hide drift in CI.

---

## 19. CLI Commands

Add these scripts to `package.json`:

```json
{
  "scripts": {
    "validate": "tsx tools/src/index.ts validate",
    "generate": "tsx tools/src/index.ts generate",
    "check": "tsx tools/src/index.ts check",
    "test": "vitest run",
    "format": "prettier --write .",
    "format:check": "prettier --check ."
  }
}
```

### 19.1 `pnpm validate`

Must perform:

1. YAML parse validation.
2. JSON Schema validation.
3. Registry reference validation.
4. Source reference validation.
5. Synthetic example validation.

### 19.2 `pnpm generate`

Must perform:

1. Generate `dist` bundle.
2. Generate docs.
3. Generate Mermaid diagrams.
4. Generate manifest with checksums.

### 19.3 `pnpm check`

Must perform:

1. Run validation.
2. Regenerate files in memory or temp directory.
3. Compare generated outputs with committed outputs.
4. Fail if generated files are stale.

---

## 20. Validation Rules

Codex must implement these checks.

### 20.1 Schema Validation

Each YAML file must validate against its declared schema.

Recommended approach:

```yaml
schema: service.schema.json
```

or infer schema from folder path.

### 20.2 Reference Validation

Fail if:

1. A method references a missing service.
2. A method references a missing input DVO. A `null` `contract.inputDvo` is allowed only while the method status is `draft`.
3. A method references a missing output DVO. A `null` `contract.outputDvo` is allowed only while the method status is `draft`.
4. A workflow step references a missing method.
5. A scenario references a missing method.
6. A field with `type: enum` and a non-null `enumRef` references a missing enum id, or a field with any other type declares a non-null `enumRef`.
7. A service references a missing WSDL ID.
8. A source reference ID does not exist.

### 20.3 Status Validation

Allowed statuses:

```text
draft
reviewed
deprecated
```

### 20.4 Field Type Validation

Allowed field types:

```text
string
integer
decimal
boolean
date
array
object
enum
```

### 20.5 Sensitive Data Validation

Fail if example files contain likely real data patterns:

1. `tcKimlikNo` values that look like an 11-digit number.
2. `password`, `sifre`, `username`, `kullaniciAdi` values that are not placeholders.
3. Values matching obvious secret patterns.
4. Request/response logs.

Do not over-engineer this. Implement a simple high-signal guard.

---

## 21. CI Requirements

Create `.github/workflows/ci.yml`:

```yaml
name: CI

on:
  pull_request:
  push:
    branches:
      - main

jobs:
  validate:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: pnpm/action-setup@v4
        with:
          version: 9
      - uses: actions/setup-node@v4
        with:
          node-version: 22
          cache: pnpm
      - run: pnpm install --frozen-lockfile
      - run: pnpm format:check
      - run: pnpm validate
      - run: pnpm test
      - run: pnpm check
```

---

## 22. Documentation Requirements

### 22.1 README.md

README must include:

1. What this repository is.
2. What this repository is not.
3. Architecture diagram.
4. Repository structure.
5. Quick start commands.
6. How to validate.
7. How to generate docs/dist/diagrams.
8. How future sandbox/client/gateway projects will consume the spec.
9. Disclaimer summary.
10. Source policy.

### 22.2 `docs/00-overview.md`

Must explain:

1. Domain context.
2. Why spec-first.
3. Difference between official documentation and this derived developer spec.
4. How source provenance works.

### 22.3 `docs/01-domain-model.md`

Must explain:

1. Service.
2. Method.
3. DVO.
4. Field.
5. Enum.
6. Rule.
7. Workflow.
8. Scenario.
9. Source reference.

### 22.4 `docs/02-versioning.md`

Must explain:

1. Spec SemVer.
2. Official guide version/date.
3. Source fetch date.
4. Review status.
5. Deprecation approach.
6. Future diff workflow.

### 22.5 `docs/03-workflows.md`

Must explain:

1. Core claim flow.
2. State effects.
3. Required objects.
4. Generated identifiers.
5. Relationship to future sandbox.

### 22.6 `docs/04-sandbox-contract.md`

Must explain:

1. How the sandbox will consume methods, DVOs, rules, workflows, and scenarios.
2. Why sandbox-only codes must be distinct from official codes.
3. Why this repo does not implement runtime behavior.

### 22.7 `docs/05-code-generation.md`

Must explain future code generation targets:

1. PHP DTOs.
2. Laravel validators.
3. TypeScript types.
4. Python models.
5. Mock fixtures.
6. OpenAPI-like developer documentation.

---

## 23. Example Registry Files

Codex should include concrete files, not only schemas.

### 23.1 Service Example

`registry/services/hasta-kabul.yml`:

```yaml
id: medula.hastane.hasta-kabul
slug: hasta-kabul
displayName: Hasta Kabul
description: Patient admission process that creates a patient application number and an associated tracking number.
sourceRefs:
  - medula-hastane-guide-2026-06-17
wsdl:
  production: wsdl.hasta-kabul.production
  test: wsdl.hasta-kabul.test
methods:
  - medula.hastane.hasta-kabul.hasta-kabul
  - medula.hastane.hasta-kabul.hasta-kabul-oku
  - medula.hastane.hasta-kabul.hasta-kabul-iptal
status: draft
```

### 23.2 Method Example

`registry/methods/hasta-kabul/hasta-kabul.yml`:

```yaml
id: medula.hastane.hasta-kabul.hasta-kabul
service: medula.hastane.hasta-kabul
names:
  documentationHeading: HastaKabul
  operationName: HastaKabul
  aliases:
    - hastaKabul
    - HastaKabul Metodu
contract:
  inputDvo: ProvizyonGirisDVO
  outputDvo: ProvizyonCevapDVO
sourceRefs:
  - medula-hastane-guide-2026-06-17
stateEffects:
  creates:
    - patientAdmission
    - takip
  reads: []
  updates: []
  deletes: []
  generates:
    - hastaBasvuruNo
    - takipNo
success:
  resultCodeField: sonucKodu
  successCode: "0000"
  messageField: sonucMesaji
sandbox:
  supported: true
  defaultScenario: happy-path
status: draft
```

### 23.3 Field/DVO Example

`registry/dvos/hasta-kabul/provizyon-giris-dvo.yml`:

```yaml
id: ProvizyonGirisDVO
domain: hasta-kabul
direction: input
sourceRefs:
  - medula-hastane-guide-2026-06-17
fields:
  - name: saglikTesisKodu
    displayName: Tesis kodu
    type: integer
    required: true
    length: null
    description: Healthcare facility code.
    sensitive: false
    syntheticOnlyRecommended: false
    sourceRefs:
      - medula-hastane-guide-2026-06-17
    conditionalRequired: []
    introducedIn: null
    deprecatedIn: null

  - name: hastaTCKimlikNo
    displayName: Hastanin TC Kimlik Numarasi
    type: string
    required: true
    length: 11
    description: Patient identity number. Examples must use synthetic placeholders only.
    sensitive: true
    syntheticOnlyRecommended: true
    sourceRefs:
      - medula-hastane-guide-2026-06-17
    conditionalRequired: []
    introducedIn: null
    deprecatedIn: null

  - name: takipNo
    displayName: Takip Numarasi
    type: string
    required: false
    length: null
    description: Existing tracking number used when requesting a related follow-up tracking number.
    sensitive: false
    syntheticOnlyRecommended: true
    sourceRefs:
      - medula-hastane-guide-2026-06-17
    conditionalRequired: []
    introducedIn: null
    deprecatedIn: null

  - name: provizyonTipi
    displayName: Provizyon Tipi
    type: enum
    enumRef: provizyon-tipi
    required: true
    length: null
    description: Provision type. References the provizyon-tipi registry enum.
    sensitive: false
    syntheticOnlyRecommended: false
    sourceRefs:
      - medula-hastane-guide-2026-06-17
    conditionalRequired: []
    introducedIn: null
    deprecatedIn: null
status: draft
```

---

## 24. Milestones and Acceptance Criteria

### Milestone 0: Repository Bootstrap

Deliverables:

1. Repository structure.
2. Node/TypeScript tooling.
3. README.
4. DISCLAIMER.
5. LICENSE.
6. CI skeleton.

Acceptance criteria:

```text
pnpm install succeeds.
pnpm test succeeds with placeholder tests.
pnpm validate runs and exits successfully on initial fixtures.
```

### Milestone 1: JSON Schemas

Deliverables:

1. All schema files under `schemas/`.
2. Schema validation command.
3. Tests for valid and invalid fixtures.

Acceptance criteria:

```text
Invalid service fixture fails.
Invalid method fixture fails.
Invalid DVO fixture fails.
Invalid workflow fixture fails.
Invalid scenario fixture fails.
```

### Milestone 2: Core Registry

Deliverables:

1. Three services.
2. Ten methods.
3. Nine DVOs.
4. Five enums.
5. Initial rules.
6. Source files.

Acceptance criteria:

```text
Every method resolves to an existing service.
Every method input/output DVO resolves.
Every service method reference resolves.
Every DVO validates.
```

### Milestone 3: Workflows and Scenarios

Deliverables:

1. Core claim flow.
2. Patient admission flow.
3. Service registration flow.
4. Invoice registration flow.
5. Six scenarios.

Acceptance criteria:

```text
Every workflow step references an existing method.
Every scenario references an existing method.
Scenario expected result shape validates.
```

### Milestone 4: Generators

Deliverables:

1. Dist bundle generator.
2. Manifest generator with checksums.
3. Markdown docs generator.
4. Mermaid diagram generator.

Acceptance criteria:

```text
pnpm generate creates dist files.
pnpm generate creates docs/generated files.
pnpm generate creates diagrams/generated files.
pnpm check fails if generated files are stale.
```

### Milestone 5: Quality Gates

Deliverables:

1. CI runs validation, test, format check, and generated output check.
2. Sensitive example guard.
3. Reference validation tests.

Acceptance criteria:

```text
CI passes on main.
CI fails if an example contains an 11-digit tcKimlikNo value.
CI fails if method references missing DVO.
CI fails if generated docs are stale.
```

### Milestone 6: First Public-Ready Draft

Deliverables:

1. Clean README.
2. Clear disclaimer.
3. Generated docs.
4. Generated diagrams.
5. Initial dist bundle.
6. Changelog entry for v0.1.0.

Acceptance criteria:

```text
A new developer can understand the repo purpose in under 5 minutes.
A future sandbox developer can consume dist/claimbridge-medula-spec.json.
No implementation-specific runtime code exists.
No real patient/credential data exists.
```

---

## 25. Future Roadmap

### v0.2

1. Add more fields for the initial DVOs.
2. Add more detailed conditional rules.
3. Add source page/table references per field.
4. Add parser scratch workspace under `tools/extract` but keep it non-authoritative.
5. Add package export for npm if useful.

### v0.3

1. Add Rapor service group.
2. Add Yardimci Islemler service group.
3. Add more enums.
4. Add richer scenario definitions.
5. Add codegen prototype for TypeScript types.

### v0.4

1. Add PHP DTO codegen prototype.
2. Add Laravel validation rule codegen prototype.
3. Add sandbox fixture generator.
4. Add MCP-ready JSON export.

### v1.0

1. Reviewed core claim flow.
2. Stable schema model.
3. Stable dist bundle format.
4. Sandbox repository can depend on this spec.
5. Backward compatibility policy defined.

---

## 26. Risks and Mitigations

| Risk | Mitigation |
|---|---|
| Official documentation changes frequently. | Use source versioning, fetchedAt, guideVersion, and changelog. |
| PDF extraction mistakes become trusted data. | Require human review status and never auto-merge extraction results. |
| Docs drift from registry. | Generate docs from registry and enforce `pnpm check`. |
| Diagrams drift from registry. | Generate Mermaid diagrams from registry. |
| Official-source licensing ambiguity. | Store URLs and manifests first; do not vendor full official artifacts in v0.1. |
| Real patient data accidentally added. | Add synthetic example guard and contributor policy. |
| Spec becomes too broad too early. | Start with core claim flow only. |
| Method naming confusion. | Store documentation heading, operation name, and aliases separately. |
| Conditional rules become too complex. | Store rules as structured metadata first; avoid building a full rule engine in v0.1. |

---

## 27. Definition of Done

The repository is considered complete for v0.1 when:

1. Required directory structure exists.
2. Required schemas exist.
3. Core registry files exist.
4. Workflows exist.
5. Scenarios exist.
6. Examples exist and use synthetic data.
7. Validation command works.
8. Generation command works.
9. Dist bundle exists.
10. Generated docs exist.
11. Generated Mermaid diagrams exist.
12. CI passes.
13. README and DISCLAIMER are clear.
14. No real personal data or credentials exist.
15. Future `claimbridge-sandbox` can consume `dist/claimbridge-medula-spec.json` as its initial contract.

---

## 28. Implementation Workflow (TDD -> Branch -> Commit -> PR)

The implementing agent (Codex or any other executor) implements this PRD in small, reviewable work groups. Every group follows the same cycle:

```text
1. branch     create a dedicated branch from main: chore/*, feat/*, test/*, ci/*, docs/*
2. red        write the failing tests and fixtures for the group first (TDD)
3. green      implement the minimum schemas/code/registry data to make tests pass
4. validate   pnpm validate && pnpm test (and pnpm check once generators exist)
5. commit     one or more atomic conventional commits scoped to the group
6. push/PR    if a Git remote exists, push the branch and open a PR; merge only when green
              if no remote exists, the group ends with local commits
7. log        append a dated group entry to CHANGELOG.md: commits, tests added,
              validation output summary, decisions made
```

Rules:

1. Never commit directly on `main`.
2. Never skip the red step: a group that starts without failing tests is not a TDD group.
3. If a remote is added later, merge historical groups as-is; do not retro-open PRs.

Before each commit, record:

1. Files changed.
2. Why they changed.
3. Validation command output.
4. Whether generated files were updated.
5. Any remaining TODOs.

Do not skip validation.

### 28.1 Work Groups

```text
Group 0  chore/bootstrap        git init; amended PRD committed; repo skeleton; toolchain;
                                LICENSE (MIT); placeholder tests; CI skeleton
Group 1  feat/schemas           10 JSON schemas; TDD: schema-validation tests with
                                tests/fixtures/valid and tests/fixtures/invalid first
Group 2  feat/registry-core     3 services + 10 methods; TDD: reference-validation tests first
Group 3  feat/registry-data     9 DVOs + 5 enums + 5 rule files; TDD: schema + reference tests
Group 4  feat/flows             4 workflows + 6 scenarios + synthetic examples;
                                TDD: method-resolution tests first
Group 5  feat/tools             loadRegistry, validateSchemas, validateReferences,
                                checkSyntheticExamples; validate CLI command
Group 6  feat/generators        dist bundle, manifest + checksums, docs, mermaid;
                                generation tests (golden files); check command
Group 7  ci/pipeline            full CI: format:check, validate, test, check
Group 8  docs/readme            README, DISCLAIMER, CHANGELOG entries, committed
                                generated outputs
```

Dependencies: Group 0 stands alone. Groups 1-4 are sequential. Groups 5-6 depend on 1-4. Group 7 depends on 5-6. Group 8 is last.

---

## 29. Command Checklist for Codex

At the end of implementation, these commands must pass:

```bash
pnpm install --frozen-lockfile
pnpm format:check
pnpm validate
pnpm test
pnpm generate
pnpm check
```

If using a non-pnpm environment, document the alternative clearly.

---

## 30. Handoff to Next Repository — FULFILLED (Group 40, 2026-11-18)

The sandbox PRD was delivered as docs/CLAIMBRIDGE_SANDBOX_PRD.md
(Group 40): it consumes dist/claimbridge-medula-spec.json (v0.3.0+),
implements the state model per the workflows, replays the six scenario
contracts, enforces the rules layer, and treats SANDBOX_* codes as
never-official. The handoff checklist in that document is the sandbox
repo M0 backlog.

Original instruction: after this repository reaches v0.1, create a separate PRD for:

```text
claimbridge-sandbox
```

That PRD must consume:

```text
dist/claimbridge-medula-spec.json
```

The sandbox should not duplicate the registry manually. It should load the spec, resolve methods/DVOs/rules/workflows/scenarios, and implement stateful behavior based on this contract.

---

## 31. Open Questions

These should not block v0.1:

1. Should the spec be published as an npm package?
2. Should the future sandbox use Laravel, Node.js, or Go?
3. Should official WSDL snapshots ever be stored in the repository?
4. Should extraction tooling live in this repository or a separate `claimbridge-medula-extractor` repository?
5. Should scenario rules eventually use JSONLogic, CEL, or a custom expression language?
6. Should generated DTO code be committed or generated only in downstream repositories?

Default v0.1 decisions:

```text
License: MIT (Apache-2.0 acceptable alternative; decide at Milestone 0).
Do not publish npm package yet.
Do not vendor official raw artifacts.
Do not build parser automation yet.
Do not build runtime sandbox yet.
Do not use a complex rule expression language yet.
```

---

## 32. Final Product Statement

`claimbridge-medula-spec` is the canonical machine-readable contract for future ClaimBridge Medula-compatible tooling.

Its first deliverable is not a working Medula mock server. Its first deliverable is a trustworthy, validated, generated, source-referenced specification that makes the mock server possible without hardcoding domain behavior.

