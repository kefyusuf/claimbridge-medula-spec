# 00 — Overview

<!-- This file is hand-written. Generated reference docs live in docs/generated/. -->

## Domain context

MEDULA is the hospital web service platform of SGK (Sosyal Guvenlik
Kurumu), Turkey's social security institution. Healthcare institutions
(hospitals, clinics) integrate with it to:

1. **Hasta Kabul** — open a patient admission and obtain a patient
   application number (`hastaBasvuruNo`) plus tracking numbers
   (`takipNo`).
2. **Hizmet Kayit** — register the medical services provided against a
   tracking number.
3. **Fatura Kayit** — invoice the registered services to SGK.

Each operation exchanges DTO-style objects called DVOs, returns a
`sonucKodu` (`0000` means success), and is exposed as SOAP endpoints with
production and test WSDLs. The full behavior is documented in SGK's
official usage guide — a large technical PDF that changes over time.

## Why spec-first

Medula integration knowledge today lives in PDF tables, WSDL contracts,
and HBYS-specific code. Building a sandbox or client first would scatter
domain rules across runtimes: Laravel code would own the rules, other
languages would copy them, docs would drift, and PDF extraction mistakes
would silently become runtime behavior.

This repository inverts that: the **registry is the single source of
truth**. YAML files describe the domain; JSON Schemas validate them; the
CLI verifies every reference; docs and diagrams are generated; CI fails on
any drift. Downstream projects (sandbox, clients, gateway) consume the
generated `dist/claimbridge-medula-spec.json` bundle instead of
hardcoding behavior.

## Official documentation vs. this spec

The official guide is authoritative for what Medula does. This
repository is a **developer-oriented derived spec**: a re-modeled,
machine-readable subset built for local tooling, sandbox design, and code
generation. It is not affiliated with SGK, never vendors official
artifacts, and never claims to state official policy. When the guide and
this spec disagree, the guide wins and this spec gets corrected with a
source reference.

## How source provenance works

Every entity carries `sourceRefs` — entries pointing at a registered
source (see `sources/official-sources.yml` and
`sources/guide-versions.yml`) with:

- `guideVersion` / `fetchedAt` — which edition the data came from.
- `confidence` — `extracted` (taken from the cited source), `inferred`
  (pattern-based, pending verification), or `unknown` (placeholder).
- `status` — `draft` until a human verifies the entity against the cited
  page/section, then `reviewed`; `deprecated` marks retired entries.

Sandbox-design entries use the reserved `sandbox-design-` id prefix: they
describe contracts we designed for the future sandbox, not official
behavior, and are visually distinguishable everywhere.

Read next: [01-domain-model.md](01-domain-model.md).
