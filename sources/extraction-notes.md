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

## Group 9 verification pass (2026-11-15)

The official guide (edition stamp 19/10/2026, version line 3.1.1, 354
pages, sha256 recorded in `guide-versions.yml`) was fetched directly from
`medula.sgk.gov.tr` — it is publicly downloadable without login. Full text
extracted locally (gitignored `local-guide/`) and the core vertical slice
was verified page-by-page. Corrections applied:

- `provizyonTipi` is a 16-code set (N,I,A,T,V,M,K,C,H,R,L,G,U,D,E,S) —
  the draft's N/S/A was wrong (S means Istisnai hal; Kurum Sevki is K).
- `takipTipi` is an 11-code set (N,E,U,K,T,Y,P,S,C,F,B) — the draft's
  Y/B "yeni/bagli" model was wrong: linked takips are requested through
  `takipNo` (empty for first takips), not a type code.
- `takipDurumu` is 0/1 (payment inquiry state) — the draft's A/I/K was
  wrong.
- `tedaviTuru` uses letter codes A/Y/G — the draft's 1/2 was wrong; the
  detailed profile lives in the separate `tedaviTipi` field (codes 0-22).
- `bransKodu` is String(4), not integer; `ktsHbysKodu` is required in
  ProvizyonGirisDVO; `muvafakatVar` is E/H string, not boolean;
  `trafikKazasiOdemeYuzdesi` and `ilaveUcret` are required in
  FaturaGirisDVO; `faturaRefNo` is String(20).
- New guide fields added to ProvizyonGirisDVO: `sigortaliTuru`,
  `devredilenKurum`, `provizyonTarihi`, `tedaviTipi`, `istisnaiHal`,
  `hastaTelefon` (String 10), `hastaAdres` (String 100).
- `doktorTescilNo` does not exist anywhere in the guide (full-text
  search); kept for PRD 13.4 compatibility with `deprecatedIn: 0.2.0`.
- `HastaKabulKimlikDogrulama` is disabled per the guide changelog
  (04.03.2025); `hastaKabulOku` responds with `TakipDVO` (confirms the
  v0.1 model). `HastaKabulIptal` uses `TakipSilGirisDVO` /
  `TakipSilCevapDVO` — new DVOs slated for Group 10.

Promoted to `reviewed` with page references: the five enums,
ProvizyonGirisDVO, TakipDVO, FaturaGirisDVO, and the three core kayit
methods. The seven oku/iptal methods stay `draft` until their contracts
resolve (Group 10).
