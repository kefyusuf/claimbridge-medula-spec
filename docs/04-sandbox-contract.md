# 04 — Sandbox Contract

<!-- This file is hand-written. Generated reference docs live in docs/generated/. -->

## How the sandbox will consume this spec

`claimbridge-sandbox` must load `dist/claimbridge-medula-spec.json` —
not copy the registry. From the bundle it resolves:

- **methods** → operation registry, success pattern (`sonucKodu`/`0000`),
  state effects, and default scenario per method;
- **dvos** → request/response shapes for validation and fixture
  generation;
- **rules** → forbidden transitions (required fields, conditional
  requirements, state constraints, invoice and cancellation rules);
- **workflows** → the state machine (step order, requires/creates);
- **scenarios** → expected observable behavior for controlled cases.

The sandbox implements stateful behavior on top of these — this
repository deliberately does not implement any runtime (PRD §6).

## Sandbox-only codes are distinct from official codes

Scenario contracts use sandbox-specific result codes — `SANDBOX_1001`,
`SANDBOX_2001`, `SANDBOX_3001`, `SANDBOX_VALIDATION_ERROR`,
`SANDBOX_TIMEOUT`. Two invariants are enforced:

1. Every `SANDBOX_*` code must be absent from the official `sonuc-kodu`
   enum; every non-sandbox scenario code must be present in it.
2. Scenario `notes` must state that these are sandbox-only codes, never
   official Medula error codes (PRD §15.2).

This keeps the boundary honest: clients integrating against the sandbox
must never treat a `SANDBOX_*` code as something Medula would return.

## Why this repository does not implement runtime behavior

Three reasons:

1. **Provenance** — registry data is mostly `draft` with `inferred`
   values; runtime code would hardcode unverified data as behavior.
2. **Consumer diversity** — PHP, TypeScript, Python, and Go consumers
   need contracts, not a Node-only runtime.
3. **Scope discipline** — the PRD's non-goals keep this repo a spec; the
   sandbox PRD (§30) owns runtime decisions (language, transport,
   latency simulation).

## What the sandbox gets per scenario

| Scenario | Method | Result code | State effect |
|---|---|---|---|
| `happy-path` | hasta-kabul | `0000` | admission + takip created |
| `invalid-takip-no` | hizmet-kayit | `SANDBOX_1001` | state unchanged |
| `missing-required-field` | hasta-kabul | `SANDBOX_VALIDATION_ERROR` | state unchanged, missing path reported |
| `invoice-without-service` | fatura-kayit | `SANDBOX_2001` | no invoice state |
| `duplicate-invoice` | fatura-kayit | `SANDBOX_3001` | no duplicate state |
| `service-timeout` | hasta-kabul | `SANDBOX_TIMEOUT` | `deterministic: false`, `latencyMs: 5000` |

The `service-timeout` scenario is metadata-only: spec validation checks
its shape; the sandbox decides how to simulate delay.

## Known v0.1 gaps the sandbox should expect

- Method contracts for `*-oku` / `*-iptal` / `fatura-tutar-oku` are
  `null` (draft-only); the sandbox should validate against DVOs only
  where contracts resolve.
- The duplicate-invoice code `SANDBOX_3001` was chosen by this spec (the
  PRD leaves it open) and may be renamed in a sandbox-code normalization
  pass.
- Enum values are pattern-based (`inferred`) until the guide is verified
  — the sandbox should treat unknown-but-schema-valid codes gracefully.

Generated reference: [docs/generated/scenarios.md](generated/scenarios.md).
