# Changelog

All notable changes to this repository are documented in this file.
Format: [Keep a Changelog](https://keepachangelog.com); versioning: SemVer
(`SPEC_VERSION`).

## [Unreleased]

_Nothing yet — v0.8.0 scope is complete._

## [0.8.0] — 2026-11-21

Eighth release: **Laravel validation rules codegen**. `pnpm generate` now
emits 123 rule classes (`ClaimBridge\Medula\Rules\<Domain>\`) — one per
input DVO — each exposing `rules(): array` with Laravel-ready rule arrays
built from the guide-verified registry: `required`/`nullable` from the
guide's columns, `integer`/`string`/`numeric`/`date`/`array` types,
`max:N` from the guide lengths, and `in:...` membership lists from the
81 registry enums. Conditional exceptions (linked-takip style) are
annotated as inline comments. All 416 generated PHP files pass `php -l`.

## [0.7.0] — 2026-11-21

Seventh release: **PHP DTO codegen** (the v0.4 roadmap item). `pnpm
generate` now also emits a self-contained composer package into
`dist/php` — one string-backed enum per registry enum (81) and one
readonly DTO class per registry DVO (212) grouped by domain, each with
`fromArray()` / `toArray()`, enum-bound fields typed with the generated
enum classes (coerced via `tryFrom`, never throwing on codes added by
later guide editions), guide provenance docblocks, and a PSR-4
`composer.json`. All 293 generated files pass `php -l`. Deterministic:
regeneration is byte-identical.

## [0.6.0] — 2026-11-20

Sixth release: every main section of the guide's method catalogue is now
extracted. Four work slices (G44a-c, G45a-c) added the **Yardimci Islemler**
service (19 helper methods: facility/physician/tracking/drug searches,
document-deduction and co-payment chains, abroad entitlements, bed and
barcode-SUT catalogues, person history, diagnosis search, e-Nabiz
notifications, death registration, institution referrals, gen queries), the
**Takip Formu** service (diabetes follow-up form: save/read/delete with the
47-field DiabetTakipFormuKayitDVO), the **Taahhut** service (dental
prosthesis commitments restricted to SUT annex-7 codes, with PDF output and
the mouth-schema tooth numbering) and the **Ortodonti** service (form
save/cancel/read), and the **E-İmzalı Rapor** service (12 methods whose
inputs are opaque byte[] signature blobs — registration dispatching the
Maluliyet/Engellilik/TibbiGereklilik composite chains, the three-tier
approval workflow, signed-blob queries, the XML-object approval step and
deletion). Twenty-nine new guide-verified enums, dozens of preserved guide
anomalies (duplicate TYPE-as-PARAMETER names, underscored parameters,
String-typed prices and facility codes, ordering anomalies, changelog
conflicts). Registry now: 9 services, 73 methods (72 reviewed + 1 draft),
212 DVOs, 81 enums.

## [0.5.0] — 2026-11-19

Fifth release: the **Rapor Bilgisi Kayit** service group landed in four
work groups (G43a-d) from guide section 4.4 (pages 252-283) — the
`medula.hastane.rapor` service with guide-verified WSDL endpoints, seven
reviewed methods (report lookup, deletion, drug-report correction, two
citizen/tracking-number lookups, and the two registration variants), the
full report-composite set (26 report-domain DVOs including the
exactly-one-branch RaporGirisDVO dispatch, the incapacity branch, the
maternity model, the shared RaporDVO core and the seven treatment-specific
specialist tables), and twenty-one new guide-verified code-list enums
(rapor-turu, devredilen-kurum-rapor variant, two distinct yatisDevam lists,
ESWT/FTR body regions, and more). Intra-guide divergences preserved with
annotations: Integer 0-based sonucKodu in this group, drTescilNo length
16-vs-20, raporSiraNo Integer-vs-String, the changelog-vs-table conflict on
codes 147/148/149, the "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" wound
fields, and the unnumbered code-1 gap in tas-lokalizasyon. Registry now:
4 services, 32 methods (31 reviewed + 1 draft), 106 DVOs, 50 enums.

## [0.4.0] — 2026-11-19

Fourth release: the Field schema gained the optional codeSystem
attribute (HL7 FHIR CodeSystem reference norm) and the full sweep
annotated every externally-coded field across all 70 DVOs (taniKodu →
ICD-10-WHO, sutKodu/islemKodu/yeniIslemKodu/malzemeKodu → SUT, barkod →
GS1). Registry-enum-bound fields normalized to explicit codeSystem:
null. Invariant suite added to keep the two attributes mutually
exclusive. Majistral raw-material catalog registered (620 values,
s.201-223). Mimosa deep scan re-run: zero findings.

## [0.3.0] — 2026-11-18

Third release: the composite and enum layer reached full guide coverage
for the HastaKabul section (KemikIligi oku/duzeltme, SevkBildir, ekds*,
ProvizyonDegistir composites), the transfer-institution code system
(devredilen-kurum, 35 codes) and the lab-type catalog tahlil-tipi
(72 values) registered as reviewed enums, and repository governance
landed (SECURITY.md, CONTRIBUTING.md, CITATION.cff, Dependabot) per
public-repo norms. Mimosa deep scan: zero findings.

### Group 37 — release/v0.3.0 governance (2026-11-18)

TDD-first governance suite (6 checks) pinned the release contract:
SECURITY.md, CONTRIBUTING.md, CITATION.cff (v0.3.0), Dependabot config,
and the SPEC_VERSION/package.json bump — all verified red before the
artifacts landed.

### Group 36 — feat/v03-devredilen-kurum (2026-11-18)

First group merged through a real GitHub PR (#2) after the remote setup.

- TDD red first: devredilen-kurum suite (4 checks) committed and verified
  failing (4/4 red) before the enum existed (`60e786c`).
- New enum `devredilen-kurum` (35 codes, s.154-158, four page citations):
  31 numeric codes (1 SSK, 2 Bagkur, 3 Emekli Sandigi, 4 Yesil Kart,
  5-31 exceptional/other coverage, 32, 97/98 gecici koruma, 99 yurtdisi,
  100 8105 CK, 147-149) + 4 letter codes (I Is kazasi, M Meslek
  hastaligi, B Madde bagimliligi, V Acil hal).
- ProvizyonGirisDVO `devredilenKurum` bound via enumRef (string → enum).
- Registry now: **22 enums**; dist regenerated.

Validation output: `pnpm test` → 203/203 passed (35 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 35 — infra/remote-setup (2026-11-18)

GitHub remote established (first PR via the real PR flow — PRD §28
step 6 no longer applies).

- Public repo: https://github.com/kefyusuf/claimbridge-medula-spec
- 128 local commits + the v0.2.0 tag pushed; main tracking origin/main
- First remote CI run: all steps green (install, format:check, validate,
  test, check) — the PRD §29 checklist verified on GitHub infrastructure
- Mimosa deep scan re-confirmed clean on the published state
- Naming decision documented in README (descriptive compatibility use)

## [0.2.0] — 2026-11-18

Second release: the official guide (3.1.1, 19/10/2026, 354 pages) verified
the core registry page-by-page — 24/25 methods reviewed with page
references, 15 contract resolutions beyond the vertical slice, the
composite and enum layer expanded to 70 DVOs and 21 enums (incl. the 72-
value tahlilTipi catalog and the 30-code ambalajBoyutu catalog), and the
HastaKabul method set registered in full. Mimosa deep scan: zero findings.
Naming decision retained: claimbridge-medula-spec (descriptive
compatibility use; see README Naming).

### Group 33 — feat/v03-tahlil-tipi (2026-11-18)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: tahlilTipi catalog suite (4 checks) committed and
  verified failing (4/4 red) before the enum existed (`b5c0925`).
- New enum `tahlil-tipi` (72 values, s.229-231, both pages cited): code
  0 Diğer + HEM102-121 hemogram (20) + IDR102-128 idrar (26) + KGAZ01-17
  kan gazları (17) + OGTT01-08 tolerans (8).
- Guide numbering irregularities preserved in the notes: IDR114 appears
  out of sequence after IDR128 (as "Lok") and IDR124 is skipped.
- TahlilBilgisiDVO `tahlilTipi` bound via enumRef (string → enum).
- Registry now: **21 enums**; dist regenerated.

Validation output: `pnpm test` → 195/195 passed (33 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 32 — feat/v03-ambalaj-boyutu (2026-11-18)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: ambalaj-boyutu suite (3 checks) committed and verified
  failing (3/3 red) before the enum existed (`dc33c23`).
- New enum `ambalaj-boyutu` (30 codes, s.200): 1-10 ecza şişesi
  (10-1000 cc), 11-19 merhem kutusu (30-1200 cc), 21-31 kilitli torba
  (07x06-31x23) — code 20 is skipped by the guide itself.
- MajistralIlacDVO `ambalajBoyutu` bound via enumRef (string → enum).
- Registry now: **20 enums**; dist regenerated.

Validation output: `pnpm test` → 191/191 passed (32 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 31 — audit/mimosa-scan (2026-11-18)

Local group: no file changes — a verification-only pass closing the audit
debt accumulated from the PreToolUse hook's compat-mode warnings.

- Full Mimosa deep security scan run on the merged `main` state:
  scanId `scan-2026-11-17T21-31-13.877Z-a5d72b72ee19`, seal
  `sha256:d09ee177…`, 8 packages scanned, **0 findings**, 0 matched
  advisories.
- Confirms the registry/spec content and tooling carry no security
  findings; the compat-mode warnings from earlier commits are cleared.

No registry, tooling, or test changes. No TODOs.

### Group 30 — feat/v03-final-contracts (2026-11-18)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: final contract suite (6 checks) committed and verified
  failing (6/6 red) before the composites existed (`2cfe637`).
- Seven new reviewed DVOs: KemikIligiTCIleOkuGiris/CevapDVO (4.1.20,
  s.184 — the Cevap reuses KemikIligiOkuCevapDVO as a list),
  BKDSDogrulamaKisiSorguGiris/CevapDVO + BKDSDogrulamaDetayDVO (4.1.21,
  s.185-186 — 7-field verification record), EKDSBelgeGerekenTakipSorgu
  Giris/CevapDVO (4.1.22, s.186-187) with the nested
  EKDSBelgeGerekenTakipDVO placeholder.
- IslemDuzeltmeCevapDVO enriched with the s.184 tail fields
  (yeniIslemKodu, bildirimNo).
- **All three final contracts resolved** — reviewed methods now **24/25**
  (only the guide-disabled HastaKabulKimlikDogrulama stays draft, per
  the changelog s.13).
- Registry now: **70 DVOs, 19 enums**; dist regenerated.

Validation output: `pnpm test` → 188/188 passed (31 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 29 — feat/v03-kemik-oku (2026-11-18)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: KemikIligiOku/IslemDuzeltme suite (4 checks) committed
  and verified failing (4/4 red) before the composites existed
  (`f5214fe`).
- Four new reviewed DVOs: KemikIligiOkuGiris/CevapDVO (4.1.18.a/b,
  s.182 — 5-field read input incl. bildirimNo, 7-field response with
  the aktifPasif form-state) and KemikIligiIslemDuzeltmeGiris/CevapDVO
  (4.1.19.a/b, s.183 — the Eski/Yeni SUT code correction pair).
- Two more contracts resolved and reviewed: kemik-iligi-oku and
  kemik-iligi-islem-duzeltme — reviewed methods now 22/25. Only
  kemik-iligi-tc-ile-sorgu, ekds×2, and the disabled KimlikDogrulama
  remain draft.
- Registry now: **63 DVOs**; dist regenerated.

Validation output: `pnpm test` → 182/182 passed (30 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 28 — feat/v03-kemik-iligi (2026-11-17)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: KemikIligi contract suite (4 checks) committed and
  verified failing (4/4 red) before the composites existed (`1b74ab0`).
- Four new reviewed DVOs: KemikIligiKabulDVO/CevapDVO (4.1.16.a/b,
  s.180) and KemikIligiIptalGiris/CevapDVO (4.1.17.a/b, s.181) — hastaTcNo
  flagged sensitive, `bildirimNo` Integer response identifier.
- Two more contracts resolved and reviewed: kemik-iligi-kabul and
  kemik-iligi-iptal — reviewed methods now 20/25.
- Registry now: **59 DVOs**; dist regenerated.

Validation output: `pnpm test` → 178/178 passed (29 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 27 — feat/v03-sevk (2026-11-16)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: sevk/update suite (5 checks) committed and verified
  failing (5/5 red) before the composites existed (`0a4397a`).
- Four new reviewed DVOs: SevkBildirGirisDVO (4.1.8.a, s.173 — yesil kart
  referral fields), SevkBildirSonucDVO (4.1.8.b), ProvizyonDegistirGiris/
  CevapDVO (4.1.10.a/b, s.174).
- Three more contracts resolved and reviewed: sevk-bildir,
  update-tedavi-tipi (zero-new-DVO reuse of TakipOkuGirisDVO/TakipDVO
  per 4.1.9), update-provizyon-tipi — reviewed methods now 18/25.
- A YAML colon-in-plain-scalar issue (length per guide: 4) caught by the
  validator before commit and fixed.

Validation output: `pnpm test` → 174/174 passed (28 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 26 — feat/v03-cikis-iptal (2026-11-16)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: cikis-iptal/oku suite (6 checks) committed and verified
  failing (6/6 red) before the composites existed (`3b0317d`).
- Seven new reviewed DVOs: HastaCikisIptalDVO (4.1.5, s.169-170 — reuses
  HastaCikisCevapDVO with the yeniHastaCikisTarihi correction field),
  HastaYatisOkuDVO/CevapDVO (4.1.6, s.170-171) with the saglikTesisiKodu
  spelling noted, BasvuruYatisBilgileriDVO (4.1.6.c — faturalanma
  durumu 0/1), BasvuruTakipOkuDVO/CevapDVO + BasvuruTakipDVO (4.1.7,
  s.171-172 — takipFaturaDurumu 0/1/2).
- Three more contracts resolved and reviewed: hasta-cikis-iptal,
  hasta-yatis-oku, basvuru-altindaki-takipleri-oku — reviewed methods
  now 14/25.
- §12.2 living proof: BasvuruAltindakiTakipleriOku (guide list, s.149)
  vs BasvuruTakipOku (method table, s.172) captured as
  documentationHeading vs operationName with the alias.
- Registry now: **51 DVOs**; dist regenerated.

Validation output: `pnpm test` → 169/169 passed (27 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 25 — feat/v03-cikis (2026-11-16)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: HastaCikis contract suite (4 checks) committed and
  verified failing (4/4 red) before the DVOs existed (`883e71a`).
- `HastaCikisDVO` (4.1.4.a, s.168) and `HastaCikisCevapDVO` (4.1.4.b,
  s.169) registered as reviewed; `hasta-cikis-kayit` contract resolved
  and promoted to `reviewed` (s.169) — the first expanded method beyond
  the original vertical slice.
- The G24 draft-entry expectations updated to reflect the resolution
  (14 draft + 1 reviewed within the expansion set).

Validation output: `pnpm test` → 163/163 passed (26 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 24 — feat/hasta-kabul-methods (2026-11-16)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: HastaKabul expansion suite (5 checks) committed and
  verified failing (5/5 red) before the methods existed (`1d07686`).
- Fifteen guide-listed HastaKabul methods registered as draft entries
  (method list verified on s.149): HastaCikisKayit/Iptal, HastaYatisOku,
  BasvuruAltindakiTakipleriOku, SevkBildir, UpdateTedaviTipi/
  UpdateProvizyonTipi, KemikIligi* (5), ekdsKisiDogrulamaSorgu,
  ekdsBelgeGerekenTakipSorgu, HastaKabulKimlikDogrulama.
- `HastaKabulKimlikDogrulama` sandbox-disabled with the devre-disi
  changelog citation (s.13, 04.03.2025); all new methods stay on null
  draft contracts until their tables are read.
- hasta-kabul service method list extended; reference-validation suite
  updated (25 methods; draft null contracts allowed per the amended
  §12.2).
- Registry now: **25 methods** across 3 services; dist regenerated.

Validation output: `pnpm test` → 159/159 passed (25 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 23 — feat/v03-nested-3 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: MajistralEklenenIlac suite (3 checks) committed and
  verified failing (3/3 red) before the composite existed (`a8c05da`).
- `MajistralEklenenIlacDVO` registered (Tablo 4.2.1.f.1.2, s.223-224,
  3 fields: islemSiraNo / barkod String(14) / adet Decimal(4)) — the
  table also explains the String(14) barkod seen at the Ilac tail.
- MajistralIlacDVO `eklenenIlaclar` placeholder resolved to the registry
  entity.
- Registry now: **42 DVOs, 19 enums**; dist regenerated.

Validation output: `pnpm test` → 154/154 passed (24 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 22 — feat/v03-nested-2 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: final nested suite (6 checks) committed and verified
  failing (6/6 red) before the composites existed (`7539d69`).
- Three new reviewed DVOs: `MajistralHamMaddeDVO` (4.2.1.f.1.1, s.201 —
  guide spelling MajistralHamMadde, 4 fields incl. the raw-material
  catalog reference 4.2.1.f.1.1.1), `GenBilgisiDVO` (4.2.1.j.2, s.231 —
  single-field genKodu record), `IslemDetayDVO` (4.3.1.f, s.242-243 —
  islemSiraNo(20)/islemTutari).
- New enum `ham-madde-birimi` (Gram/Miligram, s.201).
- TahlilBilgisiDVO enriched with the s.231 tail fields: tahlilTipi (HEM/
  IDR/KGAZ/OGTT catalog reference), birim, sagSol, ayniFarkliKesi (bound
  to the existing enum — this table uses the 1-5 codes), aciklama.
- MajistralIlacDVO gained the missed `eklenenIlaclar` field
  (MajistralEklenenIlacDVO, 4.2.1.f.1.2). Placeholders resolved:
  MajistralIlac.hamMaddeler, Tahlil.genBilgisi, FaturaCevapDetay.
  islemDetaylari.
- Registry now: **41 DVOs, 19 enums**; dist regenerated.

Remaining v0.3: MajistralEklenenIlacDVO (4.2.1.f.1.2), GenBilgisi visual
check, raw-material/tahlilTipi catalogs (v0.3 enums), devredilenKurum,
new HastaKabul methods, Mimosa audit, GitHub remote.

Validation output: `pnpm test` → 151/151 passed (23 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 21 — feat/v03-nested (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: nested composite suite (6 checks) committed and verified
  failing (6/6 red) before the files existed (`3b0f81c`).
- `MajistralIlacDVO` (4.2.1.f.1, s.199-200, 7 fields): preparatTuru and
  ambalajTuru enum bindings, the bolunmusTozTuru conditional
  (preparatTuru=3), ~30-code ambalajBoyutu noted as a v0.3 enum
  candidate, and the hamMaddeler nested reference
  (MajistralHammaddeDVO, 4.2.1.f.1.1).
- `TahlilSonucDVO` (4.2.1.j.1, s.228): the two-field lab result record
  (islemSiraNo + sonuc taking +/- or numeric values).
- New enums `preparat-turu` (8 codes) and `ambalaj-turu` (3 codes).
- IlacBilgisiDVO `majistralIlac` placeholder resolved to the registry
  entity.
- Registry now: **38 DVOs, 18 enums**; dist regenerated.

Deferred: MajistralHammaddeDVO (4.2.1.f.1.1), GenBilgisiDVO (4.2.1.j.2),
IslemDetayDVO (4.3.1.f), ambalajBoyutu enum, devredilenKurum enum, new
HastaKabul methods, Mimosa audit, GitHub remote.

Validation output: `pnpm test` → 145/145 passed (22 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 20 — feat/v03-ilac (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: IlacBilgisiDVO suite (4 checks) committed and verified
  failing (4/4 red) before the DVO existed (`bcc5880`).
- `IlacBilgisiDVO` registered with the verified core of the 26-page drug
  table (Tablo 4.2.1.f, s.198-199, 18 fields): `ilacTuru` enum binding
  (1 Barkodlu / 2 Majistral / 3 Radyofarmasotik), the barkod exception
  (majistral harici zorunlu), `adet` Decimal with the usage-unit note
  (Yardimci Servisleri ilac-ara), majistral/radyofarma `tutar`,
  `paketHaric`, ITS/batch/serial tracking fields, and the
  `majistralIlac` nested placeholder (MajistralIlacDVO, Tablo 4.2.1.f.1).
- New enum `ilac-turu` (3 codes, s.198).
- Honest extraction boundary: s.200-223 rows recorded as a v0.3
  continuation in the DVO sourceRefs notes; `MajistralIlacDVO` expansion
  deferred.
- Registry now: **36 DVOs, 16 enums**; dist regenerated.

Validation output: `pnpm test` → 139/139 passed (21 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 19 — feat/v03-entries-3 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: entry composite suite part 3 (5 checks) committed and
  verified failing (5/5 red) before the composites existed (`7250e7a`).
- `DisBilgisiDVO` (4.2.1.e, s.193-194, 21 fields): the complete dental
  chart (8 cene fields incl. sut-diş variants + 4 anomali-diş flags),
  anomali E/H flag, and a table-divergent ayniFarkliKesi (values cut in
  extraction — noted).
- `MalzemeBilgisiDVO` (4.2.1.h, s.224-226, 23 fields): procurement chain
  (kodsuzMalzeme* price/name, malzemeTuru, paketHaric, katkiPayi, kdv,
  bayiNo(13) mandatory since 02.07.2018, ihale/ikNo fields mandatory for
  public institutions since 01.10.2014, donorId for allografts,
  birlikteYapilanIslem pair from the changelog).
- New enum `malzeme-turu` (3 codes, s.225).
- `TahlilBilgisiDVO` (4.2.1.j, s.227-228, 12 fields) with the genBilgisi
  nested placeholder (GenBilgisiDVO, Tablo 4.2.1.j.2) — v0.3 scope.
- Registry now: **35 DVOs, 15 enums**; dist regenerated.

Validation output: `pnpm test` → 135/135 passed (20 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

### Group 18 — feat/v03-entries-2 (2026-11-15)

Local group: no remote yet, so the PR step is replaced by a local
`--no-ff` merge to `main` (PRD §28 step 6 fallback).

- TDD red first: entry composite suite part 2 (5 checks) committed and
  verified failing (5/5 red) before the composites existed (`7fea73b`).
- Four new reviewed DVOs from the guide tables:
  `KonsultasyonBilgisiDVO` (4.2.1.g, s.224, 8 fields),
  `MuayeneBilgisiDVO` (4.2.1.i, s.226-227, 8 fields),
  `HastaYatisBilgisiDVO` (4.2.1.o, s.234, 11 fields incl.
  refakatciGunSayisi and the yatis date pair), `KanBilgisiDVO`
  (4.2.1.s, s.234-235, ISBT bilesen/unite fields).
- The shared service-entry pattern (bransKodu/drTescilNo/sutKodu/
  hizmetSunucuRefNo/islemSiraNo null-on-input/ozelDurum/cokluOzelDurum)
  is now consistent across five entry composites.
- Registry now: **32 DVOs, 14 enums**; dist regenerated.

Deferred to Group 19: `IlacBilgisiDVO` (the 26-page drug table, s.198-223),
`DisBilgisiDVO` (dental chart, s.193-195), `TahlilBilgisiDVO` (s.227-228
boundary), `MalzemeBilgisiDVO` (s.224-226 boundary), devredilenKurum
enum, new HastaKabul methods, Mimosa audit, GitHub remote.

Validation output: `pnpm test` → 130/130 passed (19 suites); `tsc
--noEmit` → clean; `pnpm validate` → OK; `pnpm check` → OK;
`pnpm format:check` → OK.

Remaining TODOs: none for this group.

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
