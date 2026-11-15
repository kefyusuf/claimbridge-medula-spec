# Changelog

All notable changes to this repository are documented in this file.
Format: [Keep a Changelog](https://keepachangelog.com); versioning: SemVer
(`SPEC_VERSION`).

## [Unreleased]

### Group 17 — feat/v03-entries-1 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: entry composite suite part 1 (5 checks) committed and
  verified failing (5/5 red) before the composites existed (`11af938`).
- `AmeliyatveGirisimBilgisiDVO` (4.2.1.c, s.190-192, 14 fields) and
  `DigerIslemBilgisiDVO` (4.2.1.d, s.192-193, 15 fields) registered —
  both `reviewed` with per-field page references; the null-on-input
  `islemSiraNo` pattern, the 530140/530150 drTescil exception, and the
  report-requiring `raporTakipNo` condition documented.
- New enums `ayni-farkli-kesi` (5 codes, s.191) and `euroscore` (4 risk
  codes, s.191).
- Guide divergence documented: `sagSol` uses 1/2/3 in Ameliyat table but
  R/L in DigerIslem table — fields modeled per-table with notes, no
  shared enum (kılavuz kendi içinde tutarsız).
- Registry now: **28 DVOs, 14 enums**; dist regenerated.

Deferred to Group 18: DisBilgisiDVO (4.2.1.e, s.193-195 dental chart
fields), IlacBilgisiDVO, KonsultasyonBilgisiDVO, MalzemeBilgisiDVO,
MuayeneBilgisiDVO, TahlilBilgisiDVO, TetkikveRadyolojiBilgisiDVO,
HastaYatisBilgisiDVO, KanBilgisiDVO.

Validation output: `pnpm test` → 125/125 passed (18 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 16 — feat/v03-composites (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: v0.3 composite suite (5 checks) committed and verified
  failing (5/5 red) before the composites existed (`f81ecac`).
- Three new reviewed DVOs: `KayitliIslemBilgisiDVO` (4.2.1.m, s.235 — the
  two-field pairing record hizmetSunucuRefNo/islemSiraNo),
  `OncekiIslemBilgisiDVO` (4.2.1.p, s.236), `FaturaCevapDetayDVO`
  (4.3.3.c, s.245-246, both pages cited; taburcuKodu bound to the
  taburcu-kodu enum; takipToplamTutar Double).
- Nested placeholder resolutions: HataliIslemBilgisiDVO.oncekiIslemBilgisi
  → OncekiIslemBilgisiDVO entity; HizmetKayitCevapDVO.islemBilgileri →
  KayitliIslemBilgisiDVO; FaturaOkuCevapDVO.faturaDetaylari →
  FaturaCevapDetayDVO.
- Registry now: **26 DVOs, 12 enums**; dist regenerated.

Remaining v0.3 backlog: IslemDetayDVO (4.3.1.f), the entry composites
(4.2.1.c-j, s.190-235), devredilenKurum enum, new HastaKabul methods,
Mimosa audit, GitHub remote decision.

Validation output: `pnpm test` → 120/120 passed (17 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 15 — feat/v02-composites-3 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: fatura composite suite (5 checks) committed and verified
  failing before the data landed (`5383cf6`).
- `HataliIslemBilgisiDVO` registered (Tablo 4.2.1.n, s.235-236, both
  pages cited): hataKodu/hataMesaji/hizmetSunucuRefNo + oncekiIslemBilgisi
  nested placeholder (4.2.1.p).
- New enum `taburcu-kodu` (13 discharge codes, s.241-242).
- Invoice `HizmetDetayDVO` moved to the fatura domain per guide Tablo
  4.3.1.c (aciklama/protokolNo/taburcuKodu/takipNo); the PRD-era
  service-line variant removed with a PRD §13.3 amendment marker. The
  draft-only `dvos: 20 → 23` journey documented in the manifest.
- Registry now: **23 DVOs, 12 enums**; dist regenerated.

Validation output: `pnpm test` → 115/115 passed (16 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 14 — feat/v02-composites-2 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: composite-2 suite (4 checks) committed and verified
  failing (4/4 red) before the files existed (`4272d35`).
- New enum `odeme-sorgu-durum` (8 codes 0-6 + X, s.238).
- `HizmetDVO` composite registered from Tablo 4.2.2.c (s.237-238): all
  categorized service arrays (ameliyat/diger/dis/ilac/konsultasyon/
  malzeme/muayene/tahlil/tanilar/tetkik/hastaYatis/kan), takipNo,
  odemeSorguDurum (enumRef), triajBeyani — both pages cited.
- HizmetOkuCevapDVO `hizmetler` placeholder resolved to the registry
  entity.
- Registry now: **22 DVOs, 11 enums**; dist regenerated.

Deferred to v0.3: FaturaCevapDetayDVO (4.3.3.c), Kayitli/HataliIslem
(4.2.1.m/n), invoice HizmetDetayDVO (4.3.1.c), devredilenKurum enum,
new HastaKabul methods, Mimosa audit, GitHub remote.

Validation output: `pnpm test` → 110/110 passed (15 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 13 — feat/v02-composites (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: composite suite (4 checks) committed and verified failing
  (4/4 red) before TaniBilgisiDVO existed (`ae71f3f`).
- `TaniBilgisiDVO` registered from Tablo 4.2.1.k (s.232) — the diagnosis
  entry composite: `islemSiraNo` (null-on-input pattern), `birincilTani`
  E/H, `hizmetSunucuRefNo` String(20) pairing key, `taniKodu` ICD-10
  String(10), `taniTipi`, `ozelDurum`/`cokluOzelDurum` (OzelDurumVO refs).
- New enum `tani-tipi` (1 On tani / 2 Kesin tani / 3 Ayirici tani, s.232).
- HizmetKayitGirisDVO `tanilar` now cites the composite (Tablo 4.2.1.k);
  example diagnosis entries guide-shaped.
- First nested composite resolved; remaining placeholders (HizmetDVO
  4.2.2.c, FaturaCevapDetayDVO 4.3.3.c, Kayitli/HataliIslemBilgisiDVO
  4.2.1.m/n, invoice HizmetDetayDVO 4.3.1.c) stay cited-but-deferred —
  their tables span page boundaries in the text extraction.
- Registry now: **21 DVOs, 10 enums**; dist regenerated.

Validation output: `pnpm test` → 106/106 passed (14 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 12 — feat/v02-catalog (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: catalog suite (5 checks) committed and verified failing
  (5/5 red) before the corrections landed (`79f69d7`).
- **Self-correction**: the codes 33/34/35/99 added to `sonuc-kodu` in
  Group 9 were EKDS verification-reason codes (s.167-168), not result
  codes — sonuc-kodu now carries only the verified `0000`, with a note
  that the guide ships no global result-code catalog.
- New enum `ekds-yontem-gerekce` (13 codes, s.167-168): pin/fotograf/
  fiziksel doğrulama gerekçeleri; `ekdsYontemGerekce` field added to
  ProvizyonGirisDVO and TakipDVO (changelog s.13 + s.167).
- New enum `istisnai-hal` (9 codes, s.157-158) with a column-flow note;
  devredilenKurum stays deferred until a visual pass of p.155-158.
- Registry now: 20 DVOs, **9 enums**, 13 rules; dist regenerated.

Validation output: `pnpm test` → 102/102 passed (13 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 11 — feat/v02-contracts (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: contract resolution suite (6 checks) committed and
  verified failing (6/6 red) before the new DVOs existed (`9c5160f`).
- Eight new DVOs, all `reviewed` with page references (`11a29b2`):
  HizmetOkuGiris/CevapDVO (4.2.2, s.236-238), HizmetIptalGiris/CevapDVO
  (4.2.3, s.239), FaturaOkuGiris/CevapDVO (4.3.3, s.244-245),
  FaturaIptalGiris/CevapDVO (4.3.2, s.243-244).
- **Every method contract now resolves**: hizmet-kaydi-oku/iptal and
  fatura-oku/iptal/fatura-tutar-oku are `reviewed`; fatura-tutar-oku
  reuses FaturaGirisDVO/FaturaCevapDVO per 4.3.4 (s.246). The draft-only
  null-contract allowance is no longer used anywhere.
- Mutually-exclusive read filters documented
  (`islemSiraNumaralari` vs `hizmetSunucuRefNolari`, s.237); fatura-kayit
  gains the `FaturaBilgisiKaydet` alias evidence (s.239).
- `tools/extract` workspace shipped (PRD §25.4): README workflow +
  `guide-page-map.md` documenting every discovered table location
  (s.149, 154-159, 165-168, 189-190, 236-246, 240-245).
- Nested composites (HizmetDVO, FaturaCevapDetayDVO) modeled as
  placeholders with page citations — v0.3 scope.

Deferred to v0.3: nested composite expansion (Tablo 4.2.1.c-l, 4.3.1.c-e,
4.3.3.c); complete sonucKodu catalog; istisnaiHal/devredilenKurum enums
(visual pass needed for column mapping); new HastaKabul methods; UTS
kesinleştirme; Mimosa full security audit re-run.

Validation output: `pnpm test` → 97/97 passed (12 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 10 — feat/v02-enrichment (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: v0.2 enrichment suite (10 checks) committed and verified
  failing (10/10 red) before any guide-aligned data existed (`04eabb8`).
- Three new guide-derived DVOs: `TakipSilGirisDVO` / `TakipSilCevapDVO`
  (Tablo 4.1.3.a/b, s.168) and `TakipOkuGirisDVO` (Tablo 4.1.2.a,
  s.164-165) — `hasta-kabul-oku` and `hasta-kabul-iptal` contracts now
  resolve and both methods are `reviewed` (`fd85073`).
- Two new value-set enums: `sigortali-turu` (1-4, s.154) and `tedavi-tipi`
  (0-22 without 3, s.158-159) — ProvizyonGirisDVO `sigortaliTuru`/
  `tedaviTipi` bound via `enumRef`.
- HizmetKayit DVOs aligned with Tablo 4.2.1.a/b (`5ee5810`):
  HizmetKayitGirisDVO carries the guide field set (`tanilar` replaces the
  PRD's `taniBilgileri`; hastaBasvuruNo optional per s.189; categorized
  service arrays; triajBeyani S/K/Y; hastaYatisBilgileri for inpatient
  takips); HizmetKayitCevapDVO follows Tablo 4.2.1.b (`islemBilgileri`,
  `hataliKayitlar`). Rules updated (`required-hizmet-kayit-giris-fields`
  reviewed; new `conditional-tani-per-takip`). PRD §13.4 amended with a
  Group 10 marker; example request guide-aligned.
- Registry now: 3 services, 10 methods, **12 DVOs**, **7 enums**, 13
  rules, 4 workflows, 6 scenarios; dist regenerated.

Deferred to Group 11: remaining oku/iptal contract tables (hizmet-kaydi
4.2.2/4.2.3, fatura 4.3.2-4.3.4); sonucKodu catalog completion; istisnai
hal and devredilen kurum enum extraction; new HastaKabul methods
(ekds*, SevkBildir, HastaCikis*, KemikIligi*); tools/extract scratch
workspace (PRD §25.4).

Validation output: `pnpm test` → 91/91 passed; `tsc --noEmit` → clean;
`pnpm validate` → OK; `pnpm check` → OK; `pnpm format:check` → OK.

Remaining TODOs: none for this group. Next: Group 11 — remaining oku/iptal
contracts and the sonucKodu catalog.

### Group 9 — feat/guide-verification (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- The official guide is publicly downloadable without login: fetched
  directly from `medula.sgk.gov.tr` (edition stamp 19/10/2026, version
  line 3.1.1, 354 pages, sha256 `87489834…` recorded in
  `guide-versions.yml`; PDF kept in gitignored `local-guide/`, never
  vendored — PRD §16.3).
- TDD red first: verification contract suite (9 checks) committed and
  verified failing (8/9 red) before any registry correction (`079ef7a`).
- Guide corrections applied (see `sources/extraction-notes.md` for the
  full list): provizyonTipi → 16 codes; takipTipi → 11 codes (the Y/B
  yeni/bagli model was wrong — linked takips go through `takipNo`);
  takipDurumu → 0/1 (A/I/K was wrong); tedaviTuru → A/Y/G (1/2 was
  wrong, detailed profile is the separate `tedaviTipi` 0-22 field);
  bransKodu → String(4); ktsHbysKodu required; muvafakatVar → E/H
  string; trafikKazasiOdemeYuzdesi + ilaveUcret required;
  faturaRefNo → String(20); six new guide fields added to
  ProvizyonGirisDVO; doktorTescilNo marked absent from the guide
  (`deprecatedIn: 0.2.0`).
- Promoted to `reviewed` with page references: the five enums,
  ProvizyonGirisDVO, TakipDVO, FaturaGirisDVO, and the three core kayit
  methods (method list verified on guide page 149). oku/iptal methods
  stay `draft` until their TakipSil* contracts resolve.
- Scenarios and examples updated to the verified codes; dist outputs
  regenerated.

Deferred to Group 10 (v0.2): TakipSil* DVOs and full oku/iptal contract
resolution; sonucKodu error-code catalog completion; enum extraction for
sigortaliTuru/devredilenKurum/tedaviTipi/istisnaiHal; PRD §13.4 revision
(taniBilgileri→tanilar naming, doktorTescilNo removal); new HastaKabul
methods (ekdsKisiDogrulamaSorgu, ekdsBelgeGerekenTakipSorgu, SevkBildir,
HastaCikis*, KemikIligi*).

Validation output: `pnpm test` → 81/81 passed; `tsc --noEmit` → clean;
`pnpm validate` → OK; `pnpm check` → OK; `pnpm format:check` → OK.

Remaining TODOs: none for this group. Next: Group 10 — v0.2 enrichment
(PRD §25 items 1-4).

## [0.1.0] — 2026-11-15

First public-ready draft (PRD Milestone 6): canonical registry (3
services, 10 methods, 9 DVOs, 5 enums, 12 rules in 5 files, 4 workflows,
6 scenarios), ten JSON Schemas, real validate/generate/check tooling,
committed generated outputs guarded by checksums, full CI, synthetic-data
guards, and the hand-written documentation set. A future
`claimbridge-sandbox` can consume `dist/claimbridge-medula-spec.json` as
its contract (PRD §30). Delivered as nine TDD work groups (see entries
below).

### Group 8 — docs/readme (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: documentation contract suite (3 checks — PRD §22.2-22.7
  document set, §22.1 README coverage, 0.1.0 release record) committed
  and verified failing before any content existed (`2d170ff`).
- Hand-written documentation set: `00-overview` (domain context, why
  spec-first, provenance), `01-domain-model` (the nine entities),
  `02-versioning` (SemVer, guide versions, review status, diff
  workflow), `03-workflows` (state effects, generated identifiers),
  `04-sandbox-contract` (consumption contract, sandbox-code isolation,
  known v0.1 gaps), `05-code-generation` (future targets).
- README rewritten to cover all ten PRD §22.1 requirements: architecture
  diagram, layout, quick start, validate/generate/check how-to,
  downstream consumption, documentation map, disclaimer summary, source
  policy, license.
- CHANGELOG gains the `0.1.0` release section; SPEC_VERSION stays
  `0.1.0`.

Validation output: `pnpm test` → 72/72 passed; `tsc --noEmit` → clean;
full PRD §29 checklist green.

Remaining TODOs: none — v0.1 scope complete.

### Group 7 — ci/pipeline (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: CI contract suite (2 checks — PRD §21 step order and
  format:check pass) committed and verified failing before the pipeline
  existed (`56e0b4c`).
- Prettier scope decision (`4c298ec`): `.prettierignore` excludes generated
  outputs (they are byte-compared by `check` — prettier must never touch
  them), hand-authored prose (`*.md`), diagram sources (`*.mmd`), and the
  lockfile. Formatting applied across tooling, tests, schemas, registry
  manifests, and fixtures; `pnpm check` verified registry semantics stayed
  byte-identical through the reformat.
- Full CI (`fcb20a3`): install → format:check → validate → test → check on
  push/PR per PRD §21. pnpm version comes from `packageManager`
  (11.1.1) instead of the PRD's pinned `version: 9` input.

Validation output (full PRD §29 checklist green): `pnpm install
--frozen-lockfile` ✓, `pnpm format:check` ✓, `pnpm validate` ✓, `pnpm test`
→ 69/69 ✓, `pnpm generate` ✓, `pnpm check` ✓, `tsc --noEmit` clean.

Remaining TODOs: none for this group. Next: Group 8 — `docs/readme`
(final public-ready polish: README refresh, CHANGELOG 0.1.0 entry).

### Group 6 — feat/generators (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: generation suite (8 checks) committed and verified failing
  (generator modules absent) before any generator code existed (`60a15cf`).
- Generators (`9cd9d9b`): `generateDist` (PRD §18.1 bundle + minified +
  manifest with counts and sha256 checksums), `generateDocs` (five §18.2
  documents with the do-not-edit header), `generateMermaid` (three §18.3
  diagrams: ER model, core claim flow, service map).
- Real `check` command: validates, regenerates in memory with the committed
  `generatedAt`, compares bundle/minified/manifest/docs/diagrams
  byte-for-byte, exits non-zero with a STALE list (§19.3).
- Generated outputs committed per PRD §18.4 (`eed32df`); stale `.gitkeep`
  markers removed.

Decisions:
- Bundle is byte-deterministic for a pinned `generatedAt` (collections
  sorted by id, rules falling back to file name); `check` pins the
  committed manifest timestamp — this is what makes byte comparison sound.
- Mermaid entity ids are sanitized to `[A-Za-z0-9_]`; enum ids appear as
  `provizyon_tipi` style in diagrams.
- `tools/README.md` command table updated to reflect live commands.

Validation output: `pnpm test` → 67/67 passed (incl. generate→check happy
path and stale-detection negative test); `tsc --noEmit` → clean;
`pnpm generate` → OK (3/10/9/5/5/4/6); `pnpm check` → OK; `pnpm validate`
→ OK.

Remaining TODOs: none for this group. Next: Group 7 — `ci/pipeline` (full
CI: format:check, validate, test, check).

### Group 5 — feat/tools (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: tooling suite (10 checks) committed and verified failing
  (module imports absent) before any tool code existed (`4283549`).
- Four modules + CLI (`10f2a9c`): `loadRegistry`, `validateSchemas` (PRD
  §20.1), `validateReferences` (PRD §20.2), `checkSyntheticExamples`
  (PRD §20.5), and the `validate` command replacing the Group 0 stub.
- `pnpm validate` now runs the real PRD §19.1 pipeline: 42 registry files
  → schemas → references → synthetic examples, exit 1 on any issue.
- Negative tests inject breakage into a loaded registry (missing service,
  null contract on a reviewed method, unresolved enumRef) and temp
  fixtures (real-looking identity value, non-placeholder credential);
  nothing invalid is committed.
- `tools/README.md` documents module responsibilities and the
  sandbox-design self-registration rule.

Decisions:
- Sandbox-design sources are self-registered through the reserved
  `sandbox-design-` id prefix (`sourceType: sandbox-design`); all other
  source ids must resolve against `official-sources.yml` /
  `guide-versions.yml` — avoids inventing a new manifest file.
- The validate CLI reports per-stage issues with `process.exitCode` and a
  final `validate: OK` line consumed by the CLI exit test.

Validation output: `pnpm test` → 59/59 passed; `tsc --noEmit` → clean;
`pnpm validate` → OK (42 files, schemas/references/synthetic-examples all
green).

Remaining TODOs: none for this group. Next: Group 6 — `feat/generators`
(dist bundle, manifest with checksums, docs, mermaid, check command).

### Group 4 — feat/flows (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: flows suite (11 checks) committed and verified failing
  (5/11 red) before workflows, scenarios, or examples existed (`1b9b4e0`).
- Four workflows (`ef4d204`): `core-claim-flow` copies PRD §14 verbatim
  (three chained steps, exact requires/creates/updates/next); three
  single-step sub-flows isolate each stage for sandbox reuse.
- Six scenarios per PRD §15 (`5e4b6fa`): happy-path, invalid-takip-no
  (`SANDBOX_1001`), missing-required-field (`SANDBOX_VALIDATION_ERROR` +
  `missingFieldPath` in stateChanges), invoice-without-service
  (`SANDBOX_2001`), duplicate-invoice (`SANDBOX_3001`), service-timeout
  (`SANDBOX_TIMEOUT`, `deterministic: false`, `latencyMs: 5000`).
- Six synthetic examples (`b99de9f`): request/response pairs for the three
  domains using `SYNTHETIC_*` placeholders per PRD §17.2.
- Suite enforces: step graph integrity (next resolution + exactly one entry
  step), scenario→method resolution, `defaultScenario` resolution, sandbox
  code isolation (any `SANDBOX_*` result must be absent from the official
  sonuc-kodu enum; non-sandbox codes must be present), and an example
  identity guard (no 11-digit identity values).

Decisions:
- Scenario model stays per-method (PRD §12.8); full-flow orchestration is
  documented via the core-claim-flow workflow and a `note` in happy-path
  stateChanges rather than inventing a multi-method scenario shape.
- Duplicate-invoice sandbox code set to `SANDBOX_3001` (PRD §15.5 leaves
  the exact code open) — noted as pending the sandbox-code naming
  normalization tracked in research gap #5.

Validation output: `pnpm test` → 49/49 passed (4 smoke + 13 schema +
11 reference + 10 registry-data + 11 flows); `tsc --noEmit` → clean.

Remaining TODOs: none for this group. Next: Group 5 — `feat/tools`
(registry loader, schema/reference/synthetic validators, validate CLI).

### Group 3 — feat/registry-data (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: registry-data suite (10 checks) committed and verified
  failing (5/10 red) before any DVO/enum/rule file existed (`90760cd`).
- Nine DVO files per PRD §13.3 (`ba5e438`): six contract DVOs carry the
  §13.4 minimum field sets; three shared DVOs model a minimal vertical-slice
  field set with verification notes.
- Five enum files per PRD §11 (`b322e42`): sonuc-kodu documents only the
  extracted success code `0000`; pattern-based values marked
  `confidence: inferred` pending guide verification.
- Five rule files with twelve draft rules (`6d12ce9`): required-field (3),
  conditional-required-field (2), state-transition (3), invoice-rule (2),
  cancellation-rule (2).
- Suite enforces the amended PRD §12.4 enumRef contract both ways
  (enum-typed fields must resolve; non-enum fields must stay null) and
  resolves rule `appliesTo` into registered services, methods, DVOs, and
  fields.

Decisions:
- Sensitive fields (`hastaTCKimlikNo`, `hastaTelefon`, `hastaAdres`) are
  flagged `sensitive: true` + `syntheticOnlyRecommended: true`.
- The foreign-patient identity case is recorded as a conditional note on
  `hastaTCKimlikNo` and stays deferred to v0.2 (research gap #7).
- Sandbox-design rules carry `sourceType: sandbox-design`,
  `confidence: unknown` — they encode sandbox contracts, not official
  behavior.
- One test-expectation fix during green (rule file paths include the
  directory prefix); no registry data changes were needed.

Validation output: `pnpm test` → 38/38 passed (4 smoke + 13 schema +
11 reference + 10 registry-data); `tsc --noEmit` → clean.

Remaining TODOs: none for this group. Next: Group 4 — `feat/flows`
(4 workflows + 6 scenarios + synthetic examples).

### Group 2 — feat/registry-core (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: reference-validation suite (11 checks) committed and
  verified failing before any registry data existed (`a89f647`).
- Source manifests (PRD §16): `official-sources` (guide entry),
  `guide-versions`, `wsdl-manifest` (6 production/test ids), extraction
  notes with the provenance policy (`fec37d2`).
- Three service registry files per PRD §13.1/§23.1 (`954c0cd`).
- Ten method registry files per PRD §13.2 (`6010bae`):
  - core `kayit` methods carry resolved contracts into the nine planned
    DVO ids (DVO files arrive in Group 3),
  - read/cancel/amount operations keep null contracts with `draft` status
    (amended PRD §12.2) and `confidence: inferred` names pending guide/WSDL
    verification,
  - all methods share the `sonucKodu`/`0000`/`sonucMesaji` success pattern.
- Reference suite covers: file counts, per-file schema validation,
  method↔service id resolution both ways, `medula.hastane.<slug>` id
  convention, WSDL manifest resolution with environment checks.

Decisions:
- `sourceRefs` entries are full SourceReference objects (PRD §12.9), not
  the bare-id shorthand shown in PRD §23.1 — the schema is authoritative.
- Six stale `.gitkeep` markers removed from populated directories.

Validation output: `pnpm test` → 28/28 passed (4 smoke + 13 schema +
11 reference); `tsc --noEmit` → clean.

Remaining TODOs: none for this group. Next: Group 3 — `feat/registry-data`
(9 DVOs, 5 enums, 5 rule files).

### Group 1 — feat/schemas (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local `--no-ff`
merge to `main` (PRD §28 step 6 fallback).

- TDD red first: schema-validation suite + 12 fixtures (5 valid, 7 invalid)
  committed and verified failing before any schema existed (`301d0db`).
- 10 JSON Schemas (Draft 2020-12) per PRD §11: common shared defs, service,
  method, dvo, field, enum, rule, workflow, scenario, standalone
  source-reference (`3f9e1ba`).
- Schema design decisions:
  - Cross-file refs resolve through `$id` base
    (`https://claimbridge.dev/schemas/...`); AJV loads every schema file.
  - Method `contract` is required but its members are nullable — a `null`
    contract is draft-only (amended PRD §12.2); full resolution checks are
    Group 5 reference validation.
  - Field `enumRef` (amended PRD §12.4): string|null; enum-typed fields point
    at registry enum ids.
  - Rule files aggregate multiple rules under a top-level `rules` array;
    PRD §12.6 defines the single-rule object (kept as `$defs.rule`).
  - `ConditionalRule` minimal shape introduced: `{ condition, note? }` — PRD
    never defined it; flagged as decision for later groups.
  - Dates use an ISO pattern; no `format` keywords (ajv-formats wiring
    deferred to Group 5).
- Suite details: AJV 2020 with `allErrors` + `allowUnionTypes` (the
  intentional `length: integer|string|null` union); 4 reference-invalid
  fixtures are asserted schema-valid — reference failures belong to Group 5.

Validation output: `pnpm test` → 17/17 passed (4 smoke + 13 schema);
`tsc --noEmit` → clean; `pnpm validate` → OK (stub).

Remaining TODOs: none for this group. Next: Group 2 — `feat/registry-core`.

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
