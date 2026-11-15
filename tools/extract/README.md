# tools/extract — Non-Authoritative Extraction Workspace (PRD §25.4)

Scratch workspace for pulling data out of the official MEDULA guide. **Nothing
here is authoritative**: extracted values must be reviewed, entered into the
registry with `confidence: extracted`, and cited by page before they become
spec data. The guide PDF itself is never vendored into Git (PRD §16.3) — it
lives in the gitignored `local-guide/` directory.

## Workflow used for the Group 9-11 verification passes

1. **Fetch** the guide (publicly downloadable, no login):
   `https://medula.sgk.gov.tr/hastane/kilavuz/MEDULA_Kullanim_Kilavuzu.pdf`
   → save to `local-guide/official-guide.pdf`, record `sha256` and
   `fetchedAt` in `sources/guide-versions.yml`.
2. **Extract text**: run the `pdf` skill's
   `pdf.py extract.text local-guide/official-guide.pdf` and redirect the
   JSON (354 pages, `{page, chars, text}` per page) to
   `local-guide/guide-text.json`.
3. **Locate sections**: search the JSON for table titles
   (`Tablo 4.1.1.a`, `4.2.1.a`, `4.3.1.a`, ...) — see
   [guide-page-map.md](guide-page-map.md) for the discovered locations.
4. **Read the pages** and enter values into the registry with
   `confidence: extracted`, `page`, and `section` references. Values that
   follow a pattern without direct table evidence stay `inferred`.
5. **Promote**: flip entity `status` to `reviewed` only when the cited
   page was actually inspected.
6. **Regenerate**: `pnpm generate && pnpm check` keeps docs, diagrams, and
   the bundle in lockstep.

## Rule of thumb

`tools/extract` never writes registry files. Registry edits happen through
reviewed commits on feature branches, with the extraction as evidence.
