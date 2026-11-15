# claimbridge-medula-spec

Language-neutral, machine-readable, registry-first specification for
Medula-compatible healthcare claim integrations. The first vertical slice is the
core claim workflow:

```text
Hasta Kabul -> Hizmet Kayit -> Fatura Kayit
```

> **Status:** bootstrap (Group 0). Schemas, registry content, tools, and
> generators land group by group — see
> [docs/CLAIMBRIDGE_MEDULA_SPEC_PRD.md](docs/CLAIMBRIDGE_MEDULA_SPEC_PRD.md)
> for the full contract and [§28.1](docs/CLAIMBRIDGE_MEDULA_SPEC_PRD.md) for the
> work-group plan.

## What this repository is

- A canonical YAML registry of Medula-compatible services, methods, DVOs,
  enums, rules, workflows, and sandbox scenarios.
- A JSON-Schema-validated registry with generated docs, generated Mermaid
  diagrams, and a versioned `dist/claimbridge-medula-spec.json` bundle.
- Source-provenance-first: every entity links back to a source reference with
  an explicit review status (`draft | reviewed | deprecated`).

## What this repository is not

- Not a live SGK/Medula connector, SOAP server, or sandbox runtime.
- Not a Laravel/PHP package and not an HBYS product.
- Not affiliated with, endorsed by, or maintained by SGK — see
  [DISCLAIMER.md](DISCLAIMER.md).
- Contains no real patient data or credentials; examples are synthetic-only.

## Quick start

```bash
pnpm install
pnpm validate   # registry validation (Group 0 stub; real checks in Group 5)
pnpm test       # vitest suite
pnpm generate   # dist/docs/diagrams generators (Group 6)
pnpm check      # stale-output guard (Group 6)
```

## Repository layout

| Directory | Purpose |
|---|---|
| `sources/` | Official source manifest, guide versions, WSDL manifest |
| `schemas/` | JSON Schema (Draft 2020-12) for every registry entity |
| `registry/` | Canonical YAML registry: services, methods, dvos, enums, rules, workflows, scenarios |
| `examples/` | Synthetic request/response examples |
| `docs/` | Hand-written overviews plus generated reference docs |
| `diagrams/` | Generated Mermaid diagrams |
| `tools/` | TypeScript validation & generation CLI |
| `tests/` | Vitest suite including valid/invalid fixtures |
| `dist/` | Generated spec bundle (committed; freshness guarded by `pnpm check`) |

## How downstream projects consume this spec

`claimbridge-sandbox`, `claimbridge-laravel-client`, and `claimbridge-gateway`
load `dist/claimbridge-medula-spec.json` as their contract instead of
hardcoding Medula behavior (PRD §3, §30).

## Development workflow

Implementation happens in small work groups following
**TDD → branch → commit → PR** (PR only when a Git remote exists), with a dated
`CHANGELOG.md` entry per group. See PRD §28.

## Source & privacy policy

- Official PDF/WSDL artifacts are not vendored; only URLs, fetch dates, and
  hash fields are stored (PRD §16.3).
- No real T.C. identity numbers, credentials, or production logs — ever
  (PRD §17).
- This repository does not provide legal, medical, regulatory, reimbursement,
  or billing advice.
