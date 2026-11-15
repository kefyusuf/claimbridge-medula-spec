# Changelog

All notable changes to this repository are documented in this file.
Format: [Keep a Changelog](https://keepachangelog.com); versioning: SemVer
(`SPEC_VERSION`).

## [Unreleased]

### Group 4 — feat/flows (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: flows suite (11 checks) committed and verified failing
  (5/11 red) before workflows, scenarios, or examples existed (`1b9b4e0`).
- Four workflows (`ef4d204`): `core-claim-flow` copies PRD §14 verbatim
  (three chained steps, exact requires/creates/updates/next); three
  single-step sub-flows isolate each stage for sandbox reuse.
- Six scenarios per PRD §15 (`5e4b6fa`): happy-path, invalid-takip-no
  (`SANDBOX_1001`), missing-required-field (`SANDBOX_VALIDATION_ERROR` +
  `missingFieldPath` in stateChanges), invoice-without-service
  (`SANDBOX_2001`), duplicate-invoice (`SANDBOX_3001`), service-timeout
  (`SANDBOX_TIMEOUT`, `deterministic: false`, `latencyMs: 5000`).
- Six synthetic examples (`b99de9f`): request/response pairs for the three
  domains using `SYNTHETIC_*` placeholders per PRD §17.2.
- Suite enforces: step graph integrity (next resolution + exactly one entry
  step), scenario→method resolution, `defaultScenario` resolution, sandbox
  code isolation (any `SANDBOX_*` result must be absent from the official
  sonuc-kodu enum; non-sandbox codes must be present), and an example
  identity guard (no 11-digit identity values).

Decisions:
- Scenario model stays per-method (PRD §12.8); full-flow orchestration is
  documented via the core-claim-flow workflow and a `note` in happy-path
  stateChanges rather than inventing a multi-method scenario shape.
- Duplicate-invoice sandbox code set to `SANDBOX_3001` (PRD §15.5 leaves
  the exact code open) — noted as pending the sandbox-code naming
  normalization tracked in research gap #5.

Validation output: `pnpm test` → 49/49 passed (4 smoke + 13 schema +
11 reference + 10 registry-data + 11 flows); `tsc --noEmit` → clean.

Remaining TODOs: none for this group. Next: Group 5 — `feat/tools`
(registry loader, schema/reference/synthetic validators, validate CLI).

### Group 3 — feat/registry-data (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: registry-data suite (10 checks) committed and verified
  failing (5/10 red) before any DVO/enum/rule file existed (`90760cd`).
- Nine DVO files per PRD §13.3 (`ba5e438`): six contract DVOs carry the
  §13.4 minimum field sets; three shared DVOs model a minimal vertical-slice
  field set with verification notes.
- Five enum files per PRD §11 (`b322e42`): sonuc-kodu documents only the
  extracted success code `0000`; pattern-based values marked
  `confidence: inferred` pending guide verification.
- Five rule files with twelve draft rules (`6d12ce9`): required-field (3),
  conditional-required-field (2), state-transition (3), invoice-rule (2),
  cancellation-rule (2).
- Suite enforces the amended PRD §12.4 enumRef contract both ways
  (enum-typed fields must resolve; non-enum fields must stay null) and
  resolves rule `appliesTo` into registered services, methods, DVOs, and
  fields.

Decisions:
- Sensitive fields (`hastaTCKimlikNo`, `hastaTelefon`, `hastaAdres`) are
  flagged `sensitive: true` + `syntheticOnlyRecommended: true`.
- The foreign-patient identity case is recorded as a conditional note on
  `hastaTCKimlikNo` and stays deferred to v0.2 (research gap #7).
- Sandbox-design rules carry `sourceType: sandbox-design`,
  `confidence: unknown` — they encode sandbox contracts, not official
  behavior.
- One test-expectation fix during green (rule file paths include the
  directory prefix); no registry data changes were needed.

Validation output: `pnpm test` → 38/38 passed (4 smoke + 13 schema +
11 reference + 10 registry-data); `tsc --noEmit` → clean.

Remaining TODOs: none for this group. Next: Group 4 — `feat/flows`
(4 workflows + 6 scenarios + synthetic examples).

### Group 2 — feat/registry-core (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: reference-validation suite (11 checks) committed and
  verified failing before any registry data existed (`a89f647`).
- Source manifests (PRD §16): `official-sources` (guide entry),
  `guide-versions`, `wsdl-manifest` (6 production/test ids), extraction
  notes with the provenance policy (`fec37d2`).
- Three service registry files per PRD §13.1/§23.1 (`954c0cd`).
- Ten method registry files per PRD §13.2 (`6010bae`):
  - core `kayit` methods carry resolved contracts into the nine planned
    DVO ids (DVO files arrive in Group 3),
  - read/cancel/amount operations keep null contracts with `draft` status
    (amended PRD §12.2) and `confidence: inferred` names pending guide/WSDL
    verification,
  - all methods share the `sonucKodu`/`0000`/`sonucMesaji` success pattern.
- Reference suite covers: file counts, per-file schema validation,
  method↔service id resolution both ways, `medula.hastane.<slug>` id
  convention, WSDL manifest resolution with environment checks.

Decisions:
- `sourceRefs` entries are full SourceReference objects (PRD §12.9), not
  the bare-id shorthand shown in PRD §23.1 — the schema is authoritative.
- Six stale `.gitkeep` markers removed from populated directories.

Validation output: `pnpm test` → 28/28 passed (4 smoke + 13 schema +
11 reference); `tsc --noEmit` → clean.

Remaining TODOs: none for this group. Next: Group 3 — `feat/registry-data`
(9 DVOs, 5 enums, 5 rule files).

### Group 1 — feat/schemas (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: schema-validation suite + 12 fixtures (5 valid, 7 invalid)
  committed and verified failing before any schema existed (`301d0db`).
- 10 JSON Schemas (Draft 2020-12) per PRD §11: common shared defs, service,
  method, dvo, field, enum, rule, workflow, scenario, standalone
  source-reference (`3f9e1ba`).
- Schema design decisions:
  - Cross-file refs resolve through `$id` base
    (`https://claimbridge.dev/schemas/...`); AJV loads every schema file.
  - Method `contract` is required but its members are nullable — a `null`
    contract is draft-only (amended PRD §12.2); full resolution checks are
    Group 5 reference validation.
  - Field `enumRef` (amended PRD §12.4): string|null; enum-typed fields point
    at registry enum ids.
  - Rule files aggregate multiple rules under a top-level `rules` array;
    PRD §12.6 defines the single-rule object (kept as `$defs.rule`).
  - `ConditionalRule` minimal shape introduced: `{ condition, note? }` — PRD
    never defined it; flagged as decision for later groups.
  - Dates use an ISO pattern; no `format` keywords (ajv-formats wiring
    deferred to Group 5).
- Suite details: AJV 2020 with `allErrors` + `allowUnionTypes` (the
  intentional `length: integer|string|null` union); 4 reference-invalid
  fixtures are asserted schema-valid — reference failures belong to Group 5.

Validation output: `pnpm test` → 17/17 passed (4 smoke + 13 schema);
`tsc --noEmit` → clean; `pnpm validate` → OK (stub).

Remaining TODOs: none for this group. Next: Group 2 — `feat/registry-core`.

### Group 0 — chore/bootstrap (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- `git init` on `main`; amended PRD committed as the root commit (`076769b`).
- PRD §11 directory skeleton with 19 `.gitkeep` markers (sources, schemas,
  registry/*, examples/*, docs/generated, diagrams/generated, dist).
- Toolchain: pnpm 11.1.1 (pinned in `packageManager`), Node >=22 engines,
  TypeScript 5.9 (NodeNext, strict), vitest 3.2, tsx, ajv/ajv-formats + yaml
  (ready for Group 5), prettier.
- CLI stub: `pnpm validate` exits 0 (real checks arrive in Group 5);
  `pnpm generate` / `pnpm check` fail fast as not-implemented (Group 6).
- Smoke tests (4): SPEC_VERSION is semver and in sync with package.json,
  required scripts exist, generated outputs are not gitignored (PRD §18.4).
- CI skeleton: install → validate → test (format:check and check arrive in
  Group 7).
- LICENSE: MIT. README and DISCLAIMER initial versions.
- Decisions:
  - pnpm 11 reads build approvals from `pnpm-workspace.yaml`
    (`allowBuilds: esbuild: true`) — the `package.json` `pnpm` field is
    legacy and ignored by pnpm 11.
  - `.gitattributes` forces LF on all text files so Windows checkouts and
    CI see identical bytes (needed for `format:check` later).

Validation output: `pnpm test` → 4/4 passed; `pnpm validate` → OK (spec
0.1.0); `tsc --noEmit` → clean; `pnpm install` → clean with frozen lockfile.

Remaining TODOs: none for this group. Next: Group 1 — `feat/schemas`.
