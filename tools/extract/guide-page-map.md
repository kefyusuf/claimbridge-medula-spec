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
| rapor-turu values (11) | 280, 282, 254 | registry enum rapor-turu |
| WSDL raporIslemleriWS | 91, 353 | production + test endpoints |

## Not yet extracted

- Complete sonucKodu error catalogs per method (pages beyond 167-168).
- istisnaiHal and devredilenKurum code lists (column mapping ambiguity in
  the text extraction; needs a visual pass of pages 154-158).
- Nested composites (Tablo 4.2.1.c-l, 4.3.1.c-e, 4.3.3.c) — v0.3 scope.
- New HastaKabul methods: ekds*, SevkBildir, HastaCikis*, KemikIligi*,
  HastaKabulKimlikDogrulama (disabled), UTS kesinleştirme.
- Rapor registration composites (G43b): RaporGirisDVO (Tablo 4.4.1.a,
  pages 252-279) with IlacRaporDVO/MaluliyetRaporDVO/TedaviRaporDVO/
  IsgoremezlikRaporDVO (4.4.1.c-j) and ekleri 4.4.1.ee; plus
  RaporEtkinMaddeDVO (4.4.1.ff) and IlacTeshisBilgiDVO (4.4.1.gg).
- E-İmzalı Rapor methods (section 4.6, pages 329-351, 12 methods) — v0.5+
  roadmap; requires the signature workflow states.
- Yardımcı Web Servis methods (section 4.5, pages 283-321, 20 methods).
