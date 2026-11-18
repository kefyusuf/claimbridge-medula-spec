# PRD: ClaimBridge Sandbox

**Document Type:** Product Requirements Document (handoff)
**Target Executor:** the `claimbridge-sandbox` repository
**Primary Source:** `dist/claimbridge-medula-spec.json` from this repository (v0.3.0+)
**Status:** Draft v0.1
**Language:** English
**Owner:** Yusuf / ClaimBridge project
**Last Updated:** 2026-11-18

---

## 1. Executive Summary

Build a standalone, stateful sandbox that **emulates the MEDULA-compatible
claim flow** defined by `claimbridge-medula-spec` — without connecting to
live SGK services and without duplicating the registry.

The spec repository owns the **what** (methods, DVOs, enums, rules,
workflows, scenarios). The sandbox owns the **how**: it loads the
generated bundle, maintains episode state, validates requests against
DVO/rule contracts, replays scenario contracts, and returns responses
matching the verified result patterns.

## 2. Source of Truth

- **Must** load `dist/claimbridge-medula-spec.json` (v0.3.0+) — the
  generated, checksum-guarded bundle.
- **Must not duplicate the registry** (the bundle is the only source; the registry must not be duplicated in code) — no method/DVO/enum/rule tables
  hardcoded in application code; everything resolves from the bundle.
- **Must not** connect to live SGK/Medula services.
- **Must not** contain real patient data or credentials (synthetic-only).

## 3. State Model

State is organized per **patient application episode**
(`hastaBasvuruNo` as the episode key). The workflows in the bundle
drive all state transitions:

| Workflow step | Requires | Creates | Updates | Deletes |
| --- | --- | --- | --- | --- |
| patient-admission | — | hastaBasvuruNo, takipNo, patientAdmission, takip | — | — |
| service-registration | hastaBasvuruNo, takipNo | serviceRecord, islemSiraNo | takip | — |
| invoice-registration | hastaBasvuruNo, serviceRecord | invoiceRecord, faturaTeslimNo | takip | — |

The `creates` lists mix two concepts (a documented v0.1 simplification):
**state entities** (patientAdmission, takip, serviceRecord,
invoiceRecord) and **generated identifiers** (hastaBasvuruNo, takipNo,
islemSiraNo, faturaTeslimNo). The sandbox state model should treat them
as two separate maps: `entities` and `identifiers`.

## 4. Contract Surface

All 25 methods resolve from the bundle. **24 are `reviewed`** with
resolved contracts; only the guide-disabled
`hasta-kabul-kimlik-dogrulama` stays draft. The sandbox implements the
response pattern every response DVO declares: `sonucKodu` (String 4,
`0000` = success) + `sonucMesaji`.

Contracts are the single dispatch table: the sandbox routes each call
by method id → input DVO → validate → state effect → output DVO.

## 5. Scenario Engine

The six scenario contracts in the bundle define observable behavior:

| Scenario | Method | Result | State effect |
| --- | --- | --- | --- |
| happy-path | hasta-kabul | 0000 | admission + takip created |
| invalid-takip-no | hizmet-kayit | SANDBOX_1001 | unchanged |
| missing-required-field | hasta-kabul | SANDBOX_VALIDATION_ERROR | missing path reported |
| invoice-without-service | fatura-kayit | SANDBOX_2001 | no invoice state |
| duplicate-invoice | fatura-kayit | SANDBOX_3001 | no duplicate state |
| service-timeout | hasta-kabul | SANDBOX_TIMEOUT | deterministic: false, latencyMs: 5000 |

SANDBOX_* codes are **never** official Medula codes (enforced by the
spec suite). The sandbox replays the `given` state, applies the
request, and returns the `expected` result.

## 6. Rules as Validation

Rules from the bundle are the validation layer: required-field rules
reject missing mandatory fields, conditional-required rules handle
context-dependent fields (e.g. takipNo when takipTipi is B, tanilar
per takip), state-transition rules reject out-of-order calls
(invoice-without-service), and cancellation rules enforce referential
integrity (hasta-cikis-iptal deletes the associated takip).

## 7. Tech Stack

**Recommended:** Node.js 22 LTS + TypeScript — matches the spec
toolchain, shares the AJV schema validation, and keeps the monorepo-adjacent
ecosystem coherent. SOAP transport (axis-style envelope) wraps the
internal stateful core; the transport is a thin adapter, the state
engine is transport-agnostic.

**Alternatives evaluated:** Laravel/PHP (fits downstream clients but
duplicates schema validation), Go (fast but no shared schema stack).

## 8. Non-Goals

- No live SGK connection (PRD §6 of the spec repo).
- No persistence beyond the episode lifecycle (in-memory per test run).
- No authentication beyond the synthetic ktsHbysKodu check.
- No real patient data ever (synthetic-only, enforced).

## 9. Milestones

| Milestone | Deliverable |
| --- | --- |
| M0 | Bundle loader + episode state map |
| M1 | hasta-kabul (admission) with happy-path + 3 error scenarios |
| M2 | hizmet-kayit with tanilar validation + rules layer |
| M3 | fatura-kayit/oku/iptal with duplicate detection |
| M4 | full core-claim-flow end-to-end + CI |

## 10. Open Questions

1. SOAP transport library (node-soap vs custom envelope builder).
2. Persistence for cross-run scenario replay (file-based fixture store).
3. Whether the sandbox ships as a library (importable) or a service.

## 11. Handoff Checklist

- [ ] Load and validate `dist/claimbridge-medula-spec.json` at startup.
- [ ] Route all 25 methods (24 reviewed) via the bundle contract table.
- [ ] Implement the six scenario contracts verbatim.
- [ ] Preserve the SANDBOX_* code isolation invariant.
- [ ] Synthetic-only data guarantee (no real patient data, ever).
