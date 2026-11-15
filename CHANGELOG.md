# Changelog

All notable changes to this repository are documented in this file.
Format: [Keep a Changelog](https://keepachangelog.com); versioning: SemVer
(`SPEC_VERSION`).

## [Unreleased]

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
