# claimbridge-medula-dto (generated)

PHP 8.3 DTOs and string-backed enums generated from the
claimbridge-medula-spec registry (guide 3.1.1). **Do not edit by hand** —
regenerate with `pnpm generate` in the spec repository.

- `src/Enum/` — 81 string-backed enums
- `src/Dto/` — 221 readonly DTO classes grouped by domain

Every DTO exposes `fromArray()` / `toArray()`; enum-bound fields are typed
with the generated enum class and coerced via `tryFrom` (never throws on
codes added by later guide editions).

All content is guide-verified with page-level provenance; the package
contains no real patient data.
