# Guide Page Map — edition 3.1.1 (stamp 19/10/2026, 354 pages)

Discovered locations of the tables used by the registry. Page numbers refer
to the PDF text extraction of `local-guide/official-guide.pdf`
(sha256 `87489834…`, recorded in `sources/guide-versions.yml`).

## Hasta Kabul (section 4.1)

| Table / section | Pages | Registry usage |
|---|---|---|
| Metot listesi (§3 Süreçler) | 149 | method names for hasta-kabul/hizmet-kayit/fatura-kayit groups |
| Tablo 4.1.1.a ProvizyonGirisDVO | 154-159 | input DVO fields + provizyonTipi/takipTipi/tedaviTuru/tedaviTipi/sigortaliTuru/devredilenKurum/istisnaiHal code lists |
| Tablo 4.1.1.b ProvizyonCevapDVO | 159-160 | response fields |
| Tablo 4.1.1.c HastaBilgileriDVO | 164 | foreign-patient info composite |
| Tablo 4.1.1.d YeniDoganBilgisiDVO | 164 | newborn info |
| Tablo 4.1.2.a TakipOkuGirisDVO | 164-165 | hasta-kabul-oku input |
| Tablo 4.1.2.b TakipDVO | 165-167 | takip response incl. takipDurumu 0/1 |
| Hasta kabul hata kodları | 167-168 | sonuc-kodu catalog sample |
| Tablo 4.1.3.a/b TakipSilGiris/CevapDVO | 168 | hasta-kabul-iptal contract |

## Hizmet Kayıt (section 4.2)

| Table / section | Pages | Registry usage |
|---|---|---|
| Tablo 4.2.1.a HizmetKayitGirisDVO | 189-190 | input DVO (tanilar + categorized arrays) |
| Tablo 4.2.1.b HizmetKayitCevapDVO | 190 | response DVO |
| Tablo 4.2.1.c-… nested entry DVOs | 190-235 | v0.3 scope (per-service-line composites) |
| Tablo 4.2.2.a HizmetOkuGirisDVO | 236-237 | hizmet-kaydi-oku input |
| Tablo 4.2.2.b/c HizmetOkuCevapDVO + HizmetDVO | 237-238 | hizmet-kaydi-oku response (composite) |
| Tablo 4.2.3.a/b HizmetIptalGiris/CevapDVO | 239 | hizmet-kaydi-iptal contract |
| UtsKullanimKesinlestirme | 246 | UTS material confirmation (v0.3 scope) |

## Fatura Kayıt (section 4.3)

| Table / section | Pages | Registry usage |
|---|---|---|
| Tablo 4.3.1.a FaturaGirisDVO | 240-241 | input DVO (muvafakatVar E/H, required fees) |
| Tablo 4.3.1.b FaturaCevapDVO | 241 | response DVO |
| Tablo 4.3.1.c HizmetDetayDVO | 241+ | invoice service-line composite (v0.3 scope) |
| Tablo 4.3.2.a/b FaturaIptalGiris/CevapDVO | 243-244 | fatura-iptal contract |
| Tablo 4.3.3.a/b/c FaturaOku* | 244-245 | fatura-oku contract |
| 4.3.4 FaturaTutarOku | 246 | contract reuses FaturaGirisDVO/FaturaCevapDVO |

## Rapor Bilgisi Kayıt (section 4.4)

| Table / section | Pages | Registry usage |
|---|---|---|
| 4.4.1 RaporBilgisiKaydet + Tablo 4.4.1.a RaporGirisDVO | 252-279 | registration composite (G43b) |
| Tablo 4.4.1.b RaporCevapDVO | 253-254 | response DVO (G43a: top-level fields verified; nested report VOs 4.4.1.c-j/ee deferred to G43b) |
| 4.4.2 TakipNoileRaporBilgisiKaydet | 279 | registration variant reusing RaporGirisDVO (G43b) |
| Tablo 4.4.3.a/c RaporSorguDVO / RaporOkuDVO | 279-280 | rapor-bilgisi-bul / sil input (G43a) |
| Tablo 4.4.6.a IlacRaporDuzeltDVO | 281 | ilac-rapor-duzelt input (G43a; drTescilNo description column is a guide copy-paste error) |
| Tablo 4.4.7.a RaporOkuRaporTakipNodanDVO | 281-282 | lookup by report tracking no (G43a) |
| Tablo 4.4.8.a/b RaporOku/CevapTCKimlikNodanDVO | 282-283 | lookup by citizen ID (G43a; tckimlikNo description column is a guide copy-paste error) |
| Tablo 4.4.1.a RaporGirisDVO + kullaniciTesisKodu | 252-253 | registration dispatch composite (G43b) |
| Tablo 4.4.1.c IsgoremezlikRaporDVO | 254-256 | incapacity branch (G43b, 25 fields) |
| Tablo 4.4.1.d IsKazasiRaporDVO | 256-257 | work-accident branch (G43b; yaraninTuru/yeri "sonra yayınlanacak" quirks) |
| Tablo 4.4.1.r RaporBilgisiDVO | 268 | report key (G43b; raporSiraNo Integer divergence) |
| Tablo 4.4.1.s HakSahibiBilgisiDVO | 268-272 | beneficiary (G43b; devredilenKurum variant list 269-270, duplicate address rows) |
| Tablo 4.4.1.t DoktorBilgisiDVO | 272 | physicians (G43b; drTescilNo length 16 vs 20 divergence) |
| Tablo 4.4.1.ff RaporEtkinMaddeDVO / 4.4.1.gg IlacTeshisBilgiDVO | 277-278 | drug-report item tables (G43b; ICD10Kodu typed TaniBilgisiDVO[] quirk) |
| rapor-turu values (11) | 280, 282, 254 | registry enum rapor-turu |
| rapor group code lists (10) | 254-258, 268-278 | isgoremezlik-rapor-turu, rapor-duzenleme-turu, olum-durumu, devam-durumu, yatis-devam-durumu, yatis-devam-is-kazasi, adli-vaka-durumu, doktor-tipi, doz-birimi, periyot-birimi |
| G43c branch tables | 257-267, 276-277 | 4.4.1.e MeslekHastaligi, 4.4.1.f Analik, 4.4.1.g Emzirme, 4.4.1.h Ilac, 4.4.1.i Tedavi, 4.4.1.j Hastalik, 4.4.1.k RaporDVO, 4.4.1.l-p small composites, 4.4.1.ee IsgoremezlikRaporEk |
| G43c code lists (10) | 259-262, 266, 276 | nor-sez-for, aktarma-rapor, analik-rapor-tipi, gebelik-tipi, cinsiyet, tedavi-rapor-turu, calisma-durumu, nuks-durumu, ek-durumu, evet-hayir |
| G43d specialist tables | 273-276 | 4.4.1.v TeshisBilgisiDVO, 4.4.1.w Diyaliz, 4.4.1.x ESWL, 4.4.1.y ESWT, 4.4.1.z FTR (code-11-ordering anomaly), 4.4.1.aa HOT, 4.4.1.bb TupBebek, 4.4.1.cc ESWLTas (no code 1) |
| G43d code lists (5) | 273-276 | bobrek-tarafi, eswt-vucut-bolgesi, ftr-vucut-bolgesi, tup-bebek-turu, tas-lokalizasyon |
| WSDL raporIslemleriWS | 91, 353 | production + test endpoints |

**Section 4.4 status: FULLY EXTRACTED as of v0.5.0** — every table in
§4.4 Rapor Bilgisi Kayit Metotları (pages 252-283) is registered; the only
open rapor item is the §4.6 E-İmzalı Rapor group (separate service, v0.5+
roadmap).

## Yardimci Islemler (section 4.5)

| Table / section | Pages | Registry usage |
|---|---|---|
| 4.5.1-4.5.4 SaglikTesisiAra / DoktorAra / TakipAra / IlacAra | 283-290 | G44a search methods |
| 4.5.5-4.5.10 getOrneklenmisTakipler … guncelSutKodlari | 290-298 | G44b query methods |
| 4.5.11-4.5.20 remaining helpers | 298-310 | G44c final helpers |

**Section 4.5 status: FULLY EXTRACTED as of G44c** — 19/19 numbered methods.

## Takip Formu / Taahhüt / Ortodonti / E-İmzalı Rapor (renumbered 4.3-4.6)

| Table / section | Pages | Registry usage |
|---|---|---|
| 4.6.1.a-i TakipFormu* + DiabetTakipFormuKayitDVO | 310-321 | G45a takip-formu service |
| 4.7.1.a-d Taahhut* | 322-324 | G45b taahhut service |
| 4.7.4 Ağız Şeması + SUT ek-7 restriction | 325-326 | TaahhutDisDVO.disNo semantics |
| 4.8.1-4.8.3 OrtodontiFormu* | 326-329 | G45b ortodonti service |
| 4.9.1.a-b ImzaliRaporGiris/CevapDVO | 330 | G45c-b rapor-kaydet |
| 4.9.1.c-j Maluliyet/Engellilik/TibbiGereklilik chains | 330-336 | G45c-b composites |
| 4.9.2-4.9.12 workflow methods | 336-349 | G45c-a imzali-rapor service |
| G49 scenario/rules | 286, 323, 326 | takip-ara-window-limit + taahhut annex-7 restriction / ilçe–il uyuşmazlığı rule files (SANDBOX_4001/4002) |
| G50 result-code catalog resolution | 103, 143, 165-168 | RESOLVED: the guide has no per-method error catalog — every response table states only "0000 = success, anything else = error, reason in sonucMesaji" (s.165/168); the one documented extra code is 9000 = success-with-warning, NOT an error (s.103), with the under-18 provision branch carrying a verbatim warning message (s.143) → sonuc-kodu enum values 0000 + 9000, scenario provizyon-under18-warning |
| G54 code-list visual pass | 154-158 | RESOLVED: the s.154-156 devredilenKurum list is numeric-only (31 codes, 1…149); the s.158 letter rows I/M/B/V close the istisnaiHal list — the earlier column-flow inference had misattributed the letter codes to devredilenKurum. istisnai-hal now 13 values (1-9 + I/M/B/V), devredilen-kurum 31 values |
| G57 final 4.1 methods | 176-180 | getYesilKartliSevkliHasta (4.1.12) + UpdateTedaviTuru (4.1.13) + UpdateTakipTipi (4.1.14) + getMustehaklikKapsamKodu (4.1.15); 9 new DVOs (YesilKartli×3, Degistir×4, Mustehaklik×2); hastaBasvuruNo "String 4" guide anomaly annotated (s.178/179); the stale HastaKabul backlog row was already mostly extracted (ekds*/Sevk/HastaCikis*/KemikIligi* landed in v0.3+) — §4.1 is now COMPLETE at 22 methods |

**Guide method-catalogue status as of v0.12.0: all main sections (§4.1-4.6
plus Takip Formu / Taahhüt / Ortodonti / E-İmzalı Rapor) are FULLY
EXTRACTED.**

## Not yet extracted

- Nested composites (Tablo 4.2.1.c-l, 4.3.1.c-e, 4.3.3.c) — v0.3 scope.
- Rapor remaining uzman rapor tabloları (G43d): Tablo 4.4.1.v TeshisBilgisiDVO,
  4.4.1.w DiyalizRaporBilgisiDVO, 4.4.1.x ESWLRaporBilgisiDVO,
  4.4.1.y ESWTRaporBilgisiDVO, 4.4.1.z FTRRaporBilgisiDVO,
  4.4.1.aa HOTRaporBilgisiDVO, 4.4.1.bb TupBebekRaporBilgisiDVO,
  4.4.1.cc ESWLTasBilgisiDVO (pages 273-276).
- E-İmzalı Rapor methods (section 4.6, pages 329-351, 12 methods) — v0.5+
  roadmap; requires the signature workflow states.
- Yardımcı Web Servis methods (section 4.5, pages 283-321, 20 methods).
