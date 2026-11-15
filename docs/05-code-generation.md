# 05 — Code Generation

<!-- This file is hand-written. Generated reference docs live in docs/generated/. -->

The registry is designed to be codegen-ready: every entity is
schema-validated, id-referenced, and versioned. Nothing below is
implemented in v0.1 — this page records the intended targets and what the
bundle provides for each (PRD §22.7).

## PHP DTOs (v0.4 target)

- **Input**: DVO definitions with field names, types, lengths,
  `required`, and `enumRef` constraints.
- **Output**: typed classes per DVO, enums as PHP 8.1 backed enums from
  registry `values` (code => label).
- The bundle's `dvos` and `enums` arrays are the sole input — no PDF or
  WSDL parsing downstream.

## Laravel validation rules (v0.4 target)

- `required-fields.yml` and `conditional-required-fields.yml` map to
  `required` / `required_if` / `present` rules with `appliesTo.method`
  scoping.
- `severity: error` rules become hard validations; `warning` becomes
  reportable-but-permissive.
- The sandbox-code boundary (see 04) must be preserved in generated
  validators: `SANDBOX_*` codes are never shipped as official values.

## TypeScript types (v0.3 target)

- DVO interfaces + discriminated unions for response types
  (`sonucKodu`-based success/error variants).
- Enum const objects from registry values; method contracts as
  `inputDvo`/`outputDvo` type links (nullable contracts render as
  `unknown` until modeled).

## Python models (future)

- Pydantic models mirroring DVO fields; enums as `StrEnum`/`IntEnum`.
- The `length` field (integer or range string) maps to validators.

## Mock fixtures (v0.4 target)

- `examples/` is the seed format; the generator can scale it per method
  × scenario.
- Scenarios give deterministic expected responses
  (`sandbox.deterministic: true`) — the non-deterministic
  `service-timeout` case stays metadata-only.

## OpenAPI-like developer documentation

`docs/generated/*.md` already serves this role for humans. A machine
variant (OpenAPI 3.1 document built from services/methods/DVOs) is a
possible future export; the bundle contains everything needed —
operations, request/response schemas, and error patterns — with the
caveat that Medula is SOAP; an OpenAPI projection would be a developer
convenience, not a wire-accurate description.

## Where codegen should live

Per PRD §31, generated DTO code should live in downstream repositories,
not here — this repo ships the spec bundle; consumers run their own
codegen against it. `introducedIn`/`deprecatedIn` stamps let generators
emit deprecation warnings per target language.
