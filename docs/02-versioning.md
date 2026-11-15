# 02 — Versioning

<!-- This file is hand-written. Generated reference docs live in docs/generated/. -->

## Spec SemVer

`SPEC_VERSION` holds the semantic version of the specification and must
stay in sync with `package.json` (enforced by a test). v0.1 is the first
public-ready draft. Breaking changes to the bundle shape or entity
schemas will bump the major version once the contract stabilizes toward
v1.0.

## Official guide version

Every source reference records `guideVersion` and `publishedAt` (the
guide edition it was taken from) plus `fetchedAt` (when we obtained it).
When SGK publishes a new guide edition, new data enters under the new
version id — old and new coexist in `sources/guide-versions.yml`, so a
diff can be computed per entity.

## Source fetch date

`fetchedAt` makes staleness visible: data fetched long ago against an
older guide is a review signal, not an error.

## Review status

Entities move `draft -> reviewed -> (deprecated)`:

- `draft` — entered, schema-valid, but not yet verified by a human
  against the cited source. The default for v0.1.
- `reviewed` — verified against the guide page/section cited in
  `sourceRefs`. Null method contracts are **not** allowed at this level.
- `deprecated` — superseded; kept for history.

`confidence` (`extracted | inferred | unknown`) complements status: it
describes how the value was obtained, status describes how well it was
verified.

## Deprecation approach

Fields carry `introducedIn` / `deprecatedIn` version stamps; methods and
services carry `status`. Nothing is dropped silently — deprecated entries
remain in the registry and in generated docs until a major version.

## Future diff workflow (v0.2+)

Planned loop when a new guide edition lands:

1. Register the new edition in `sources/guide-versions.yml`.
2. Extract changed entities with `confidence: extracted` and
   `status: draft` — never auto-merge (PRD §8.3).
3. Review diffs entity-by-entity against the new pages; promote to
   `reviewed`.
4. Regenerate outputs; `pnpm check` keeps docs, diagrams, and the bundle
   in lockstep.

## Bundle timestamps

`dist/manifest.json` records the `generatedAt` of the last `pnpm
generate` run and sha256 checksums of both bundles. `pnpm check` pins
that timestamp when regenerating, which is what makes byte-level
freshness comparison sound.
