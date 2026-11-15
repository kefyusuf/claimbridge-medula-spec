# 03 — Workflows

<!-- This file is hand-written. Generated reference docs live in docs/generated/. -->

## Core claim flow

`registry/workflows/core-claim-flow.yml` models the stateful spine of the
vertical slice (PRD §14), copied verbatim from the PRD:

```text
patient-admission      medula.hastane.hasta-kabul.hasta-kabul
        requires: —                         creates: hastaBasvuruNo, takipNo, patientAdmission, takip
        next: service-registration
service-registration   medula.hastane.hizmet-kayit.hizmet-kayit
        requires: hastaBasvuruNo, takipNo   creates: serviceRecord, islemSiraNo
        updates: takip                      next: invoice-registration
invoice-registration   medula.hastane.fatura-kayit.fatura-kayit
        requires: hastaBasvuruNo, serviceRecord   creates: invoiceRecord, faturaTeslimNo
        updates: takip
```

Three single-step sub-flows (`patient-admission-flow`,
`service-registration-flow`, `invoice-registration-flow`) isolate each
stage so the sandbox can compose or test them independently.

## State effects

Each step declares five effect lists. The distinction matters for the
sandbox state machine:

- `requires` — state keys that must exist before the step may run
  (violations produce the `invalid-takip-no` / `invoice-without-service`
  scenarios).
- `creates` / `updates` / `deletes` — the state entities touched.
- `generates` — identifiers produced by the call (`hastaBasvuruNo`,
  `takipNo`, `islemSiraNumaralari`, `hizmetKayitReferansNo`,
  `faturaTeslimNo`, `faturaTutari`).

Note that `creates` mixes state entities (`patientAdmission`, `takip`)
and generated identifier values (`hastaBasvuruNo`); this is a known v0.1
modeling simplification tracked in the research notes — the sandbox state
model should treat them as two concepts.

## Required objects and ordering

The flow is sequential by construction: admission creates the application
and tracking numbers; registration needs both; invoicing needs the
application number plus at least one registered service. Skipping stages
must fail — the rules in `registry/rules/state-transition-rules.yml`
encode exactly this (hizmet-kayit requires an active takip; fatura-kayit
requires registered services), and scenarios give the sandbox the
expected failure codes.

## Generated identifiers

On success each method generates identifiers that later steps consume.
The response DVOs mark them with `conditionalRequired` entries bound to
`sonucKodu = 0000` — present only on success. Synthetic examples use
`SYNTHETIC_*` placeholders for all of them.

## Relationship to the future sandbox

The sandbox will load workflows from `dist/claimbridge-medula-spec.json`,
treat each step's effects as its state machine transitions, and play the
scenario contracts when calls succeed or fail. Workflows describe
**what** must happen; scenarios describe **what is observed**; rules
describe **what is forbidden**. See
[04-sandbox-contract.md](04-sandbox-contract.md).

Generated reference: [docs/generated/workflows.md](generated/workflows.md).
