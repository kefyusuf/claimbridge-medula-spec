# tools

TypeScript CLI for validating and (from Group 6) generating the spec.

## Modules

| Module | Responsibility |
|---|---|
| `loadRegistry.ts` | Walks `registry/` + `sources/` and returns every collection with the source and WSDL manifests. |
| `validateSchemas.ts` | PRD §20.1 — validates every registry file against its JSON Schema (Draft 2020-12, AJV). |
| `validateReferences.ts` | PRD §20.2 — id resolution across services/methods/DVOs/enums/rules/workflows/scenarios, draft-only null contracts (amended §12.2), field `enumRef` contract (amended §12.4), WSDL manifest resolution, source-reference id resolution. |
| `checkSyntheticExamples.ts` | PRD §20.5 — high-signal guard: 11-digit identity values, non-placeholder credentials, log files. |
| `index.ts` | CLI entry. `validate` runs the full PRD §19.1 pipeline; `generate`/`check` arrive with Group 6. |

## Commands

```bash
pnpm validate   # full validation pipeline; exit 1 on any issue
pnpm generate   # (Group 6)
pnpm check      # (Group 6)
```

Sandbox-design sources are self-registered: any `sourceType: sandbox-design`
reference with the reserved `sandbox-design-` id prefix resolves without a
manifest entry. Everything else must resolve against
`sources/official-sources.yml` or `sources/guide-versions.yml`.
