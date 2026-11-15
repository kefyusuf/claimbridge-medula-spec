# Extraction Notes

Manual extraction log for registry content derived from official sources.

## Policy

- Registry data comes from the official MEDULA hospital web services usage
  guide and is entered by hand. Nothing is auto-merged from parsers
  (PRD §8.3, §26).
- Every registry entity carries a `sourceRefs` entry with a `confidence`
  value:
  - `extracted` — the value is taken directly from the cited source.
  - `inferred` — the value follows an established pattern but has not yet
    been verified against the guide/WSDL text.
  - `unknown` — placeholder pending review.
- Registry content starts as `draft`; promotion to `reviewed` requires a
  human pass against the cited source page/section.

## v0.1 status

- The three core "kayit" methods (`hasta-kabul`, `hizmet-kayit`,
  `fatura-kayit`) use the concrete names, contracts, and success pattern
  recorded in the PRD examples: confidence `extracted`.
- The seven read/cancel/amount operations (`*-oku`, `*-iptal`,
  `fatura-tutar-oku`) follow naming and behavior patterns; their
  `documentationHeading`/`operationName` values are marked `inferred` and
  must be verified against the official guide and WSDL before promotion to
  `reviewed`.
- WSDL URLs are recorded as references only; they have not been fetched or
  validated by tooling yet (deferred, PRD §31).
