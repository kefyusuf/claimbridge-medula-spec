# Contributing

Thanks for considering a contribution. This repository carries a
**guide-verified specification** — contributions must preserve its two
core guarantees: **provenance** (every entity cites the guide edition
and page) and **synthetic-only data** (PRD §17).

## Workflow (PRD §28)

Every change follows the same **TDD** cycle:

1. **branch** — from `main`: `feat/*`, `fix/*`, `chore/*`, `docs/*`, `ci/*`
2. **red** — failing tests first; a change without a test that pins it is not accepted
3. **green** — minimal change making the suite pass
4. **validate** — `pnpm validate && pnpm test && pnpm check && pnpm format:check`
5. **commit** — atomic, conventional-commit style
6. **PR** — CI must be green before merge; no direct commits to `main`
7. **log** — dated CHANGELOG entry per work group

## Provenance Rules

- Registry values are `extracted` (from the cited guide page),
  `inferred` (pattern-based, needs verification), or `unknown`.
- Never auto-merge extraction results; a human reviews against the
  cited page before `reviewed` promotion.
- Every entity/field cites its source: `sources/official-sources.yml`
  ids, or the reserved `sandbox-design-` prefix for our own contracts.

## Data Rules (non-negotiable)

- **No real patient data. No credentials.** The synthetic guard fails
  CI on 11-digit identity-like values or non-placeholder credentials.
- Guide PDFs are never vendored into Git; only URLs, hashes, and fetch
  dates live in `sources/`.

## Local Setup

```bash
pnpm install --frozen-lockfile
pnpm validate && pnpm test && pnpm check
```

See the [PRD §29 checklist](docs/CLAIMBRIDGE_MEDULA_SPEC_PRD.md) for the
full command set.
