# Security Policy

## Supported Versions

| Version | Supported |
| --- | --- |
| 0.3.x | ✅ |
| < 0.3.0 | ❌ |

## Reporting a Vulnerability

Report vulnerabilities **privately** via [GitHub Security Advisories](https://github.com/kefyusuf/claimbridge-medula-spec/security/advisories/new).

- Do **not** open a public issue for a vulnerability.
- You will receive an initial response within 5 business days.
- Coordinated disclosure: a fix is released before any public detail.

## Scope

In scope: anything in this repository that could leak real personal
data (identity numbers, patient data, credentials), break the
synthetic-only data guarantee (PRD §17), or allow the generated bundle
to silently diverge from the registry (`pnpm check` bypass).

Out of scope: MEDULA itself — this project is an unaffiliated
specification (see [DISCLAIMER.md](DISCLAIMER.md)); vulnerabilities in
SGK systems must be reported to SGK directly.

## Data Guarantee

This repository contains **no real patient data and no credentials**.
The synthetic-data guard (`tests` + `pnpm validate`) fails CI on
11-digit identity-like values or non-placeholder credentials.
