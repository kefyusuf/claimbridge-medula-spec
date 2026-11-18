# 01 — Domain Model

<!-- This file is hand-written. Generated reference docs live in docs/generated/. -->

The registry models nine entity kinds. Schemas for all of them live in
`schemas/` (Draft 2020-12); this page explains their roles.

## Service

A service group from Medula (e.g. `medula.hastane.hasta-kabul`). Holds
the WSDL manifest references (production/test), the list of method ids,
and provenance. Three services exist in v0.1.

## Method

An operation a service exposes. Key design points:

- `names` stores three spellings separately — `documentationHeading` (the
  guide's section title), `operationName` (the real WSDL operation), and
  `aliases` — because the guide and the wire format frequently disagree.
- `contract` names the input/output DVOs; it is nullable **only** while
  the method is `draft` (read/cancel operations are modeled this way in
  v0.1).
- `stateEffects` declares what the operation does to sandbox state:
  `creates`, `reads`, `updates`, `deletes`, and `generates` (produced
  identifiers like `hastaBasvuruNo`).
- `success` captures the result pattern: `sonucKodu = "0000"` with
  `sonucMesaji`.
- `sandbox.defaultScenario` points at the scenario the future sandbox
  plays by default.

## DVO

A domain value object — the request/response structures of methods. Nine
exist in v0.1 across the three domains. `direction` is `input`, `output`,
or `shared`.

## Field

A DVO member. Typed by eight allowed types (`string`, `integer`,
`decimal`, `boolean`, `date`, `array`, `object`, `enum`). Fields flagged
`sensitive: true` (identity, phone, address) must be `syntheticOnlyRecommended`
in examples. Two contracts are enforced by tooling:

- `type: enum` fields **must** declare `enumRef` pointing at a registry
  enum; all other types must keep it `null`.
- `conditionalRequired` records structured conditions (e.g. `takipNo`
  becomes required when `takipTipi` is `B`).

## Enum

A controlled value set (`takip-tipi`, `tedavi-turu`, `provizyon-tipi`,
`takip-durumu`, `sonuc-kodu`). Only the success code `0000` is
`extracted` so far; pattern-based values are `inferred` pending guide
verification.

## Rule

Validation behavior as structured metadata — six types
(`required-field`, `conditional-required-field`, `state-transition`,
`invoice-rule`, `cancellation-rule`, `sandbox-only`) with `severity` and
`appliesTo` (service/method/DVO/field, all resolvable). Rule files
aggregate multiple rules under a top-level `rules` array; v0.1 ships
twelve draft rules. The intent is metadata-first: a rule engine is
explicitly out of scope for v0.1.

## Workflow

A stateful step sequence for the future sandbox. Each step names its
`method`, what it `requires`/`creates`/`updates`/`deletes`, and which
steps come `next`. The canonical example is `core-claim-flow`
(see [03-workflows.md](03-workflows.md)).

## Scenario

A sandbox behavior contract for one method call: `given` state, `request`
payload, `expected.result` (`sonucKodu`/`sonucMesaji`) plus
`stateChanges`, and `sandbox` metadata (`deterministic`, `httpStatus`,
`latencyMs`). Six scenarios ship in v0.1 — see
[04-sandbox-contract.md](04-sandbox-contract.md).

## Code system references

Fields whose values come from **external** code systems declare their
system via `codeSystem` (e.g. `ICD-10-WHO` for `taniKodu`, `SUT` for
operation codes) — the HL7 FHIR CodeSystem reference norm. Fields bound
to registry enums use `enumRef` instead: the registry **is** the code
system in that case. Both attributes are mutually exclusive per field
and enforced by the validator.

## Source reference

The provenance record every entity embeds — `sourceType`, optional
url/version/page/section/table, `confidence`, and `notes`. Ids must
resolve against the source manifests, except `sandbox-design-` prefixed
internal entries. See [00-overview.md](00-overview.md).
