<!-- This file is generated. Do not edit manually. -->

# DVOs

## `AmeliyatveGirisimBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Description of the performed operation (s.190). |
| `adet` | integer |  | — |  | Quantity of the operation (s.191). |
| `ayniFarkliKesi` | enum |  | ayni-farkli-kesi |  | Same-session/same-incision relation code (s.191); codes 1-5. |
| `bransKodu` | string |  | — |  | Branch code of the operation (s.191). |
| `drTescilNo` | string |  | — |  | Diploma registration number of the performing doctor (s.191). |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.191). |
| `islemSiraNo` | string |  | — |  | Sequence number of the registered service; send null while registering, Medula fills and returns it (s.191). Null-on-input pattern. |
| `islemTarihi` | date |  | — |  | Operation date in dd.mm.yyyy format (s.191). |
| `sagSol` | string |  | — |  | Side code 1/2/3 (Sag, Sol, Sag-Sol ayrimi yok); null saves as 3 (s.191). The DigerIslem table uses R/L instead - divergence noted. |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.191). |
| `euroscore` | enum |  | euroscore |  | Euroscore risk code (s.191); codes 0-3 in the euroscore registry enum. |
| `ozelDurum` | string |  | — |  | Special condition code; see guide Tablo 5.1 OzelDurumVO (s.192). |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.192). |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.192). |

## `AnalikRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | string |  | — |  | Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.260). |
| `bitisTarihi` | string |  | — |  | End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.260). |
| `raporDurumu` | enum |  | calisma-durumu |  | Fit-to-work or control state; mandatory when there was hospitalization (s.260). |
| `isKontTarihi` | string |  | — |  | Return-to-work or control date, "dd.mm.yyyy" (s.260). |
| `hastaneYatisTarihi` | string |  | — |  | Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.260). |
| `hastaneCikisTarihi` | string |  | — |  | Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.260). |
| `bebekDogumTarihi` | string |  | — |  | Birth date of the child, "dd.mm.yyyy" (s.259). |
| `dogumOncBasTarihi` | string |  | — |  | Start of the transferred report period, "dd.mm.yyyy" (s.259). |
| `canliCocukSayisi` | integer |  | — |  | Children alive after the birth (s.259). |
| `doganCocukSayisi` | integer |  | — |  | Children delivered (s.259). |
| `norSezFor` | enum |  | nor-sez-for |  | Birth type: Normal / Sezeryan / Forsebs (s.259). |
| `yatisDevam` | enum |  | yatis-devam-is-kazasi |  | Hospitalization state; three-value list shared with the work-accident branch (s.260). |
| `aktarmaRaporVarmi` | enum |  | aktarma-rapor |  | Transfer-report flag (s.260). |
| `aktarmaRaporTarihi` | string |  | — |  | Date of the week-32 doctor control, "dd.mm.yyyy" (s.260). |
| `gebelikHaftasi` | integer |  | — |  | Pregnancy week at the time of the report (s.260). |
| `taburcuTarihi` | string |  | — |  | Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.260). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.260). |
| `analikRaporTipi` | enum |  | analik-rapor-tipi |  | Pre-birth or post-birth maternity report (s.260). |
| `gebelikTipi` | enum |  | gebelik-tipi |  | Single or multiple pregnancy (s.260). |
| `gebelikHaftasi1` | integer |  | — |  | Week at the pre-birth report visit, typically 32 (s.260). |
| `gebelikHaftasi2` | integer |  | — |  | Week until which work may continue when the pre-birth report is issued as fit, typically 37 (s.260). |
| `bebekDogumHaftasi` | integer |  | — |  | Week of the birth, typically 40 (s.261). |
| `aktarmaHaftasi` | integer |  | — |  | Weeks transferred from the pre-birth leave to the post-birth period; system-calculated (s.261). |

## `BKDSDogrulamaDetayDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `dogrulananTckNo` | string |  | — |  | T.C. identity number of the verified person (s.186) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.186) |
| `dogrulamaTarihi` | date |  | — |  | Verification date (s.186) |
| `araciTckNo` | string |  | — |  | Intermediate person T.C. identity number (s.186) |
| `dogrulamaYontemi` | string |  | — |  | EKDS verification method (s.186) |
| `dogrulamaYontemAciklama` | string |  | — |  | EKDS verification method explanation (s.186) |
| `takipReceteNo` | string |  | — |  | Takip or prescription number associated with the verification (s.186) |

## `BKDSDogrulamaKisiSorguCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bkdsDogrulamaDetayDVO` | array |  | — |  | Verification records (BKDSDogrulamaDetayDVO[], Tablo 4.1.21.c), expanded as a registry entity (s.186) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.186) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.186) |

## `BKDSDogrulamaKisiSorguGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tckNo` | string |  | — |  | Patient T.C. identity number (s.185) |
| `islemTarihi` | date |  | — |  | Verification date (s.185) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.185) |

## `BarkodSutDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `barkod` | string |  | — |  | Barcode (s.302). |
| `firmaTanimlayiciNo` | string |  | — |  | Company identifier (s.302). |
| `sutKodu` | string |  | — |  | SUT code (s.302). |
| `baslangicTarihi` | string |  | — |  | Validity start (s.302). |
| `bitisTarihi` | string |  | — |  | Validity end (s.302). |

## `BarkodSutEslesmeSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.302). |
| `sonucMesaji` | string |  | — |  | Result description (s.302). |
| `eslesmeler` | array |  | — |  | Barcode-SUT mappings; item shape Tablo 4.5.14.c (BarkodSutDVO, this registry) (s.302). |

## `BarkodSutEslesmeSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.301). |
| `tarih` | string |  | — |  | Empty returns the whole mapping list; filled returns mappings valid on that date (s.301). |
| `barkod` | string |  | — |  | Sent when querying by barcode + company identifier (s.301). |
| `firmaTanimlayiciNo` | string |  | — |  | Sent when querying by barcode + company identifier (s.301). |
| `sutKodu` | string |  | — |  | Sent when querying by SUT code (s.301). |

## `BasvuruTakipDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.172) |
| `takipFaturaDurumu` | string |  | — |  | 0 Odeme sorgusu yapilmamis / 1 sorgulanmis faturalanmamis / 2 sorgulanmis faturalanmis (s.172) |

## `BasvuruTakipOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `basvuruTakip` | array |  | — |  | Takip list (BasvuruTakipDVO[], Tablo 4.1.7.c), expanded as a registry entity (s.172) |
| `hastaBasvuruNo` | string |  | — |  | Application number (s.172) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.172) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.172) |

## `BasvuruTakipOkuDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number whose takips are read (s.172) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.172) |

## `BasvuruYatisBilgileriDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | date |  | — |  | Hospitalization start date (s.171) |
| `bitisTarihi` | date |  | — |  | Discharge date (s.171) |
| `durum` | string |  | — |  | 0 Faturalanmamis / 1 Faturalanmis (s.171) |

## `BransGorusBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Health-Ministry branch code of the opining department (s.267). |
| `aciklama` | string |  | — |  | Department opinion (s.267). |

## `CocukBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `cinsiyet` | enum |  | cinsiyet |  | Gender of the newborn (s.266). |
| `kilo` | string |  | — |  | Birth weight, e.g. 3,45 (s.266). |
| `dogumSaati` | string |  | — |  | Birth time, hh:mm (s.266). |

## `DiabetTakipFormuDVO`

Domain: `takip-formu` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipFormuNo` | string |  | — |  | System-generated follow-up form number (s.314). |
| `tcKimlikNo` | string |  | — |  | Patient citizen ID (s.311). |
| `ad` | string |  | — |  | Patient first name (s.311). |
| `soyad` | string |  | — |  | Patient last name (s.311). |
| `cepTel` | string |  | — |  | Mobile number, e.g. 5xxxxxxxxx (s.311). |
| `protokolNo` | string |  | — |  | Protocol number (s.311). |
| `vizitTarihi` | string |  | — |  | Visit date, "dd.mm.yyyy" (s.311). |
| `saglikTesisiKodu` | integer |  | — |  | Facility code; the guide spells this parameter saglikTesisiKodu (extra i) unlike saglikTesisKodu elsewhere — preserved verbatim (s.311). |
| `cinsiyet` | enum |  | cinsiyet |  | E = Erkek, K = Kadın (s.311). |
| `ikametTuru` | enum |  | ikamet-turu |  | Six-value residence list (s.311). |
| `doktorBilgileri` | array |  | — |  | Physicians; item shape Tablo 4.6.1.e (TakipFormuDoktorBilgisiDVO, this registry) (s.311). |
| `tani` | string |  | — |  | Diagnosis ICD-10 code (s.311). |
| `taniTarihi` | string |  | — |  | First date the patient received the diagnosis (s.311). |
| `diabetEgitimi` | object |  | — |  | Diabetes education; shape Tablo 4.6.1.f (TakipFormuDiabetEgitimiDVO, this registry) (s.311). |
| `tibbiBeslenmeTedavisi` | enum |  | tbt-durumu |  | Six-value medical-nutrition adherence list (s.311). |
| `egzersiz` | enum |  | egzersiz-durumu |  | Seven-value exercise adherence list (s.311-312). |
| `hastaliklar` | array |  | — |  | Diseases besides DM; item shape Tablo 4.6.1.g (TakipFormuHastalikDVO, this registry) (s.312). |
| `basvuruNedeni` | enum |  | basvuru-nedeni |  | Six-value admission-reason list (s.312). |
| `aliskanliklar` | array |  | — |  | Habits; item shape Tablo 4.6.1.h (TakipFormuAliskanlikDVO, this registry) (s.312). |
| `glukoMetre` | enum |  | var-yok-bilinmiyor |  | Glucometer presence (s.312). |
| `kanSekeriTakipSayisi` | integer |  | — |  | Daily blood-sugar measurement count (s.312). |
| `kullanilanIlaclar` | array |  | — |  | Medications; item shape Tablo 4.6.1.i (TakipFormuKullanilanIlaclarDVO, this registry) (s.312). |
| `sistolikKanBasinci` | integer |  | — |  | Systolic blood pressure; the guide's required column is empty in the extraction (s.312). |
| `diyastolikKanBasinci` | integer |  | — |  | Diastolic blood pressure; required column empty in the extraction (s.312). |
| `boy` | decimal |  | — |  | Height (s.312). |
| `kilo` | decimal |  | — |  | Weight (s.312). |
| `vki` | decimal |  | — |  | Body-mass index, e.g. 22.3 (s.312). |
| `apg` | decimal |  | — |  | Fasting blood sugar; 0 when unknown (s.313). |
| `tpg` | decimal |  | — |  | Postprandial blood sugar; 0 when unknown (s.313). |
| `hbA1c` | decimal |  | — |  | HbA1c; 0 when unknown (s.313). |
| `kreatinin` | decimal |  | — |  | Creatinine; 0 when unknown (s.313). |
| `trigliserid` | decimal |  | — |  | Triglyceride; 0 when unknown (s.313). |
| `ldlKol` | decimal |  | — |  | LDL cholesterol; 0 when unknown (s.313). |
| `hdlKol` | decimal |  | — |  | HDL cholesterol; 0 when unknown (s.313). |
| `alt` | decimal |  | — |  | ALT; 0 when unknown (s.313). |
| `antiGAD` | enum |  | anti-gad |  | P/N/B result (s.313). |
| `ekg` | enum |  | ekg-durumu |  | Three-value ECG state (s.313). |
| `mikroalbuminuri` | enum |  | var-yok-bilinmiyor |  | V/Y/B (s.313). |
| `gozMuayenesi` | enum |  | goz-muayenesi |  | Seven-value eye-examination state (s.313). |
| `periferikSensoryalNoropati` | enum |  | var-yok-bilinmiyor |  | V/Y/B (s.313). |
| `koronerArterH` | enum |  | var-yok-bilinmiyor |  | V/Y/B; the guide's required column is empty in the extraction (s.314). |
| `serebrovaskulerH` | enum |  | var-yok-bilinmiyor |  | V/Y/B (s.314). |
| `ayakMuayenesi` | enum |  | var-yok-bilinmiyor |  | V = diabetik ülser var, Y = yok, B = bilinmiyor (s.314). |
| `akutKomplikasyon` | enum |  | akut-komplikasyon |  | Four-value complication list (s.314). |
| `yatisGun` | integer |  | — |  | Hospitalization day count of the visit (s.314). |
| `insulinPompasi` | enum |  | var-yok-bilinmiyor |  | Pump presence; the guide's parameter name carries the Turkish capital İ (İnsulinPompasi) — preserved verbatim (s.314). |
| `insulinPompasiVerTarihi` | string |  | — |  | Pump start date, "dd.mm.yyyy"; filled when a pump exists (s.314). |
| `insulinPompasiDegTarihi` | string |  | — |  | Pump change date; filled when a pump exists (s.314). |

## `DiabetTakipFormuKayitDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcKimlikNo` | string |  | — |  | Patient citizen ID (s.311). |
| `ad` | string |  | — |  | Patient first name (s.311). |
| `soyad` | string |  | — |  | Patient last name (s.311). |
| `cepTel` | string |  | — |  | Mobile number, e.g. 5xxxxxxxxx (s.311). |
| `protokolNo` | string |  | — |  | Protocol number (s.311). |
| `vizitTarihi` | string |  | — |  | Visit date, "dd.mm.yyyy" (s.311). |
| `saglikTesisiKodu` | integer |  | — |  | Facility code; the guide spells this parameter saglikTesisiKodu (extra i) unlike saglikTesisKodu elsewhere — preserved verbatim (s.311). |
| `cinsiyet` | enum |  | cinsiyet |  | E = Erkek, K = Kadın (s.311). |
| `ikametTuru` | enum |  | ikamet-turu |  | Six-value residence list (s.311). |
| `doktorBilgileri` | array |  | — |  | Physicians; item shape Tablo 4.6.1.e (TakipFormuDoktorBilgisiDVO, this registry) (s.311). |
| `tani` | string |  | — |  | Diagnosis ICD-10 code (s.311). |
| `taniTarihi` | string |  | — |  | First date the patient received the diagnosis (s.311). |
| `diabetEgitimi` | object |  | — |  | Diabetes education; shape Tablo 4.6.1.f (TakipFormuDiabetEgitimiDVO, this registry) (s.311). |
| `tibbiBeslenmeTedavisi` | enum |  | tbt-durumu |  | Six-value medical-nutrition adherence list (s.311). |
| `egzersiz` | enum |  | egzersiz-durumu |  | Seven-value exercise adherence list (s.311-312). |
| `hastaliklar` | array |  | — |  | Diseases besides DM; item shape Tablo 4.6.1.g (TakipFormuHastalikDVO, this registry) (s.312). |
| `basvuruNedeni` | enum |  | basvuru-nedeni |  | Six-value admission-reason list (s.312). |
| `aliskanliklar` | array |  | — |  | Habits; item shape Tablo 4.6.1.h (TakipFormuAliskanlikDVO, this registry) (s.312). |
| `glukoMetre` | enum |  | var-yok-bilinmiyor |  | Glucometer presence (s.312). |
| `kanSekeriTakipSayisi` | integer |  | — |  | Daily blood-sugar measurement count (s.312). |
| `kullanilanIlaclar` | array |  | — |  | Medications; item shape Tablo 4.6.1.i (TakipFormuKullanilanIlaclarDVO, this registry) (s.312). |
| `sistolikKanBasinci` | integer |  | — |  | Systolic blood pressure; the guide's required column is empty in the extraction (s.312). |
| `diyastolikKanBasinci` | integer |  | — |  | Diastolic blood pressure; required column empty in the extraction (s.312). |
| `boy` | decimal |  | — |  | Height (s.312). |
| `kilo` | decimal |  | — |  | Weight (s.312). |
| `vki` | decimal |  | — |  | Body-mass index, e.g. 22.3 (s.312). |
| `apg` | decimal |  | — |  | Fasting blood sugar; 0 when unknown (s.313). |
| `tpg` | decimal |  | — |  | Postprandial blood sugar; 0 when unknown (s.313). |
| `hbA1c` | decimal |  | — |  | HbA1c; 0 when unknown (s.313). |
| `kreatinin` | decimal |  | — |  | Creatinine; 0 when unknown (s.313). |
| `trigliserid` | decimal |  | — |  | Triglyceride; 0 when unknown (s.313). |
| `ldlKol` | decimal |  | — |  | LDL cholesterol; 0 when unknown (s.313). |
| `hdlKol` | decimal |  | — |  | HDL cholesterol; 0 when unknown (s.313). |
| `alt` | decimal |  | — |  | ALT; 0 when unknown (s.313). |
| `antiGAD` | enum |  | anti-gad |  | P/N/B result (s.313). |
| `ekg` | enum |  | ekg-durumu |  | Three-value ECG state (s.313). |
| `mikroalbuminuri` | enum |  | var-yok-bilinmiyor |  | V/Y/B (s.313). |
| `gozMuayenesi` | enum |  | goz-muayenesi |  | Seven-value eye-examination state (s.313). |
| `periferikSensoryalNoropati` | enum |  | var-yok-bilinmiyor |  | V/Y/B (s.313). |
| `koronerArterH` | enum |  | var-yok-bilinmiyor |  | V/Y/B; the guide's required column is empty in the extraction (s.314). |
| `serebrovaskulerH` | enum |  | var-yok-bilinmiyor |  | V/Y/B (s.314). |
| `ayakMuayenesi` | enum |  | var-yok-bilinmiyor |  | V = diabetik ülser var, Y = yok, B = bilinmiyor (s.314). |
| `akutKomplikasyon` | enum |  | akut-komplikasyon |  | Four-value complication list (s.314). |
| `yatisGun` | integer |  | — |  | Hospitalization day count of the visit (s.314). |
| `insulinPompasi` | enum |  | var-yok-bilinmiyor |  | Pump presence; the guide's parameter name carries the Turkish capital İ (İnsulinPompasi) — preserved verbatim (s.314). |
| `insulinPompasiVerTarihi` | string |  | — |  | Pump start date, "dd.mm.yyyy"; filled when a pump exists (s.314). |
| `insulinPompasiDegTarihi` | string |  | — |  | Pump change date; filled when a pump exists (s.314). |

## `DigerIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `adet` | integer |  | — |  | Quantity of the operation (s.192). |
| `bransKodu` | string |  | — |  | Branch code of the operation (s.192). |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.192). |
| `drTescilNo` | string |  | — |  | Diploma registration number of the performing doctor (s.192); optional for operations coded 530140 and 530150 per the guide note. |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.192). |
| `islemSiraNo` | string |  | — |  | Sequence number of the registered service; send null while registering, Medula fills and returns it (s.192). Null-on-input pattern. |
| `islemTarihi` | date |  | — |  | Operation date in dd.mm.yyyy format (s.192). |
| `raporTakipNo` | string |  | — |  | Medula record number of a registered report (s.192); mandatory for report-requiring operations (Diyaliz, FTR, etc.). |
| `ozelDurum` | string |  | — |  | Special condition code; see guide Tablo 5.1 OzelDurumVO (s.192). |
| `ayniFarkliKesi` | enum |  | ayni-farkli-kesi |  | Same-session/same-incision relation code (s.192-193); codes 1-5. |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.193). |
| `aciklama` | string |  | — |  | Operation description (s.193). |
| `sagSol` | string |  | — |  | Side code using R (Sag) / L (Sol) letters in this table (s.193) - diverges from the AmeliyatveGirisim 1/2/3 codes; divergence noted. |
| `istemYapanDrTescilNo` | string |  | — |  | Registration number of the requesting doctor (s.193). |
| `istemYapanDrBrans` | string |  | — |  | Branch code of the requesting doctor (s.193). |

## `DisBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.193) |
| `anomali` | string |  | — |  | Anomaly flag taking E (Evet) or H (Hayir) (s.193) |
| `adet` | integer |  | — |  | Quantity of the dental operation (s.193) |
| `bransKodu` | string |  | — |  | Branch code of the operation (s.193) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.193) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.193) |
| `islemTarihi` | date |  | — |  | Operation date, dd.mm.yyyy (s.193) |
| `sagAltCene` | string |  | — |  | Teeth of the right lower jaw (s.193) |
| `sagSutAltCene` | string |  | — |  | Milk teeth of the right lower jaw (children) (s.193) |
| `sagSutUstCene` | string |  | — |  | Milk teeth of the right upper jaw (children) (s.194) |
| `sagUstCene` | string |  | — |  | Teeth of the right upper jaw (s.194) |
| `solAltCene` | string |  | — |  | Teeth of the left lower jaw (s.194) |
| `solSutAltCene` | string |  | — |  | Milk teeth of the left lower jaw (children) (s.194) |
| `solSutUstCene` | string |  | — |  | Milk teeth of the left upper jaw (children) (s.194) |
| `solUstCene` | string |  | — |  | Teeth of the left upper jaw (s.194) |
| `sagAltCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `sagUstCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `solAltCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `solUstCeneAnomaliDis` | string |  | — |  | E when an operation was performed on an anomalous tooth (s.194) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.194) |
| `ayniFarkliKesi` | string |  | — |  | Incision/session relation; values diverge from the ameliyat table (cut in extraction, s.194) (s.194) |

## `DiyalizRaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `refakatVarMi` | enum |  | evet-hayir |  | Companion flag, E/H (s.273). |
| `seansGun` | integer |  | — |  | Session day count of the report (s.273). |
| `seansSayi` | integer |  | — |  | Session count of the report (s.273). |
| `butKodu` | string |  | — |  | SUT procedure code (s.273). |

## `DoktorAraCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.285). |
| `sonucMesaji` | string |  | — |  | Result description (s.285). |
| `doktorlar` | array |  | — |  | Physicians; item shape Tablo 4.5.2.c (DoktorListDVO, this registry) (s.285). |

## `DoktorAraGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drAdi` | string |  | — |  | Searched physician first name (s.284). |
| `drSoyadi` | string |  | — |  | Searched physician last name (s.285). |
| `drBransKodu` | string |  | — |  | Searched physician branch code (s.285). |
| `drDiplomaNo` | string |  | — |  | Searched physician diploma number (s.285). |
| `drTescilNo` | string |  | — |  | Searched physician diploma registration number (s.285). |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned code of the calling facility (s.285). |

## `DoktorBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drTescilNo` | string |  | — |  | Physician registration number; note the IlacRaporDuzeltDVO variant uses length 20 (s.281) while this table states 16 (s.272) — intra-guide divergence preserved. |
| `drAdi` | string |  | — |  | Physician first name (s.272). |
| `drSoyadi` | string |  | — |  | Physician last name (s.272). |
| `drBransKodu` | string |  | — |  | Physician branch code per the Health Ministry list (s.272). |
| `tipi` | enum |  | doktor-tipi |  | Physician role in the report (s.272). |

## `DoktorListDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drAdi` | string |  | — |  | Physician first name (s.285). |
| `drSoyadi` | string |  | — |  | Physician last name (s.285). |
| `drDiplomaNo` | string |  | — |  | Physician diploma number (s.285). |
| `drTescilNo` | string |  | — |  | Physician diploma registration number (s.285). |

## `EKDSBelgeGerekenTakipCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ekdsBelgeGerekenTakipDVO` | array |  | — |  | Bone-marrow admissions requiring documents (EKDSBelgeGerekenTakipDVO[], Tablo 4.1.22.c); nested composite, expansion is v0.3 scope (s.187) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.187) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.187) |

## `EKDSBelgeGerekenTakipSorguGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.186) |
| `evrakID` | integer |  | — |  | Period document reference number to query (s.186) |

## `ENabizBildirimSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.305). |
| `sonucMesaji` | string |  | — |  | Result description (s.305). |
| `hizmetler` | array |  | — |  | e-Nabız service notifications; item shape Tablo 4.5.16.c (ENabizHizmetBilgiDVO, this registry); the guide numbers this table under the PREVIOUS section (4.5.16.c) although it belongs to eNabizBildirimSorgu — numbering anomaly preserved (s.305). |

## `ENabizBildirimSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.305). |
| `takipNo` | string |  | — |  | Tracking number (s.305). |
| `hizmetSunucuRefNo` | array |  | — |  | Query by service-provider reference numbers (s.305). |

## `ENabizHizmetBilgiDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hizmetSunucuRefNo` | string |  | — |  | Service-provider reference (s.305). |
| `islemKodu` | string |  | — |  | Barcode or SUT code (s.306). |
| `islemTarihi` | string |  | — |  | "dd.MM.yyyy" procedure date (s.306). |

## `ESWLRaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `butKodu` | string |  | — |  | SUT procedure code (s.273). |
| `eswlRaporuTasSayisi` | integer |  | — |  | Stone count of the report (s.273). |
| `eswlRaporuSeansSayisi` | integer |  | — |  | Session count of the report (s.273). |
| `bobrekBilgisi` | enum |  | bobrek-tarafi |  | Kidney side (s.273). |
| `eswlRaporuTasBilgileri` | array |  | — |  | Stone details; item shape Tablo 4.4.1.cc (ESWLTasBilgisiDVO, this registry) (s.274). |

## `ESWLTasBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tasBoyutu` | string |  | — |  | Stone size in millimetres, e.g. "2x5" (s.276). |
| `tasLokalizasyonKodu` | enum |  | tas-lokalizasyon |  | Stone localization; the published list has no code 1 (s.276). |

## `ESWTRaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `eswtVucutBolgesiKodu` | enum |  | eswt-vucut-bolgesi |  | Twelve-value body-region list (s.274). |
| `seansGun` | integer |  | — |  | Session day count (s.274). |
| `seansSayi` | integer |  | — |  | Session count (s.274). |
| `butKodu` | string |  | — |  | SUT procedure code (s.274). |

## `EmzirmeRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bebekDogumTarihi` | string |  | — |  | Birth date of the child, "dd.mm.yyyy" (s.261). |
| `dogumOncBasTarihi` | string |  | — |  | Start of the transferred report period, "dd.mm.yyyy" (s.261). |
| `canliCocukSayisi` | integer |  | — |  | Children alive after the birth (s.261). |
| `anneTcKimlikNo` | string |  | — |  | Mother's citizen ID when the nursing report is issued on behalf of the father (s.261). |
| `doganCocukSayisi` | integer |  | — |  | Children delivered (s.261). |

## `EvrakKesintiCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.292). |
| `sonucMesaji` | string |  | — |  | Result description (s.292). |
| `evrakReferansNo` | integer |  | — |  | Document reference number of the deducted document (s.292). |
| `takipler` | array |  | — |  | Tracking records; item shape Tablo 4.5.6.c (EvrakTakipDVO, this registry) (s.292). |
| `muayeneKatilimTutari` | decimal |  | — |  | Examination co-payment of the document (s.292). |
| `malzemeKatilimTutari` | decimal |  | — |  | Material co-payment of the document (s.292). |
| `tupBebekKatilimTutari` | decimal |  | — |  | IVF co-payment of the document (s.292). |

## `EvrakKesintiGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `evrakReferansNo` | integer |  | — |  | Document reference number (s.291). |
| `tesisKodu` | integer |  | — |  | Code of the calling facility (s.291). |
| `grupTuru` | enum |  | grup-turu |  | A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.291). |
| `grupKodu` | integer |  | — |  | Group code; values come from the evrakTakipGrupKodlariSorgu method (s.291). |

## `EvrakTakipDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.292). |
| `toplamTutar` | decimal |  | — |  | Total amount of the takip (s.292). |
| `kesintiler` | array |  | — |  | Deductions; item shape Tablo 4.5.6.d (TakipIslemKesintiDVO, this registry) (s.292). |
| `grupTuru` | enum |  | grup-turu |  | A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.292). |
| `grupKodu` | integer |  | — |  | Group code; values come from the evrakTakipGrupKodlariSorgu method (s.292). |

## `EvrakTakipGrupKoduDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kodu` | integer |  | — |  | Group code (s.299). |
| `adi` | string |  | — |  | Group name (s.299). |

## `EvrakTakipGrupKoduSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.299). |
| `sonucMesaji` | string |  | — |  | Result description (s.299). |
| `grupKodlari` | array |  | — |  | Group codes; item shape Tablo 4.5.12.c (EvrakTakipGrupKoduDVO, this registry) (s.299). |

## `EvrakTakipGrupKoduSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.299). |

## `FTRRaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ftrVucutBolgesiKodu` | enum |  | ftr-vucut-bolgesi |  | Seventeen-value body-region list; guide order preserved (11 listed last on s.275) (s.274-275). |
| `seansGun` | integer |  | — |  | Session day count (s.275). |
| `seansSayi` | integer |  | — |  | Session count (s.275). |
| `butKodu` | string |  | — |  | SUT procedure code (s.275). |
| `tedaviTuru` | enum |  | tedavi-turu |  | A = Ayaktan, Y = Yatarak (s.275); binds the hasta-kabul group's tedavi-turu enum. |
| `robotikRehabilitasyon` | string |  | — |  | Guide row carries NO length, value list or description — registered verbatim as an empty-description required string (s.275). |

## `FaturaCevapDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error. |
| `sonucMesaji` | string |  | — |  | Human-readable result message accompanying the result code. |
| `faturaTeslimNo` | string |  | — |  | Invoice delivery number generated on successful submission; null on failure. |
| `faturaTutari` | decimal |  | — |  | Total invoice amount reported on successful submission. |

## `FaturaCevapDetayDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Invoice detail description (s.245). |
| `protokolNo` | string |  | — |  | Protocol number of the invoice (s.245). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Discharge code (s.245-246); codes 1-13 in the taburcu-kodu registry enum. |
| `takipNo` | string |  | — |  | Tracking number of the invoiced episode (s.246). |
| `takipToplamTutar` | decimal |  | — |  | Total amount calculated by GSS for the takip (s.246). |
| `islemDetaylari` | array |  | — |  | Operation detail records, expanded as the IslemDetayDVO registry entity (Tablo 4.3.1.f, s.242-243). |

## `FaturaGirisDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code of the invoicing institution. |
| `faturaTarihi` | date |  | — |  | Invoice date. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number whose registered services are being invoiced. |
| `faturaRefNo` | string |  | — |  | Institution-side invoice reference number (s.240). |
| `hizmetDetaylari` | array |  | — |  | Service lines being invoiced (FaturaHizmetDetayDVO records). |
| `trafikKazasiOdemeYuzdesi` | integer |  | — |  | Traffic-accident payment percentage; the guide marks it required - traffic invoices pay back by this percentage (s.240). |
| `ilaveUcret` | decimal |  | — |  | Additional difference fee collected from the patient; the guide marks it required (s.240). |
| `ktsHbysKodu` | string |  | — |  | Hospital information system (HBYS) code used by the KTS integration. |
| `hastaTelefon` | string |  | — |  | Patient contact phone. Examples must use synthetic placeholders only. |
| `hastaAdres` | string |  | — |  | Patient contact address. Examples must use synthetic placeholders only. |
| `muvafakatVar` | string |  | — |  | Patient consent flag sent as E (Evet) or H (Hayir) by uncontracted institutions (s.240 and changelog s.12, edition 3.1.1). Verification correction - the v0.1 draft modeled a boolean. |

## `FaturaHizmetDetayDVO`

Domain: `fatura-kayit` · Direction: `shared` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | integer |  | — |  | Sequence number of the registered operation line being invoiced. |
| `islemKodu` | string |  | — |  | Procedure code (SUT movement code) of the invoiced service line. |
| `adet` | integer |  | — |  | Quantity of the invoiced service line. |
| `birimFiyat` | decimal |  | — |  | Unit price of the invoiced service line. |

## `FaturaIptalCevapDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.243). |
| `sonucMesaji` | string |  | — |  | Result explanation (s.243). |
| `hataKodu` | string |  | — |  | Error code for invoices that could not be cancelled (s.244). |
| `hataMesaji` | string |  | — |  | Error explanation for invoices that could not be cancelled (s.244). |
| `faturaTeslimNo` | string |  | — |  | Delivery number of the invoice that could not be cancelled due to the error (s.244). |

## `FaturaIptalGirisDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.243). |
| `faturaTeslimNo` | array |  | — |  | Delivery numbers of the invoices to cancel, as an array (s.243). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.243). |

## `FaturaOkuCevapDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `faturaRefNo` | string |  | — |  | Reference number of the read invoice (s.245). |
| `faturaTarihi` | date |  | — |  | Invoice date in dd.mm.yyyy format (s.245). |
| `faturaTeslimNo` | array |  | — |  | Delivery numbers returned for the read invoices, as an array (s.245). |
| `faturaTutari` | decimal |  | — |  | Invoice amount calculated by GSS (s.245). |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.245). |
| `sonucMesaji` | string |  | — |  | Result explanation (s.245). |
| `faturaDetaylari` | array |  | — |  | Invoice detail records, expanded as the FaturaCevapDetayDVO registry entity (Tablo 4.3.3.c, s.245-246). |

## `FaturaOkuGirisDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.244). |
| `faturaTeslimNo` | array |  | — |  | Delivery numbers of the invoices to read, as an array (s.244). |
| `faturaRefNo` | string |  | — |  | Reference number of the invoice to read (s.244). |
| `faturaTarihi` | date |  | — |  | Invoice date in dd.mm.yyyy format per the guide (s.244). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.244). |

## `FiyatListDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `fiyat` | decimal |  | — |  | Drug price; KDV-inclusive per the Health Ministry publication — discounts and KDV are subtracted from this figure during payment queries (s.289). |
| `gecerlilikTarihi` | string |  | — |  | Price validity date (s.289). |

## `GenBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `genKodu` | string |  | — |  | Gene code; the table closes at s.232 with TaniBilgisiDVO following (s.231) |

## `GuncelSutSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.298). |
| `sonucMesaji` | string |  | — |  | Result description (s.298). |
| `sutKodlari` | array |  | — |  | SUT code list; item shape Tablo 4.5.11.c (SutFiyatDVO, this registry) (s.298). |

## `GuncelSutSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.297). |
| `tarih` | string |  | — |  | "dd.MM.yyyy"; empty returns the whole current list, filled returns changes after the queried date (s.297). |

## `HOTRaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `seansGun` | integer |  | — |  | Session day count (s.275). |
| `seansSayi` | integer |  | — |  | Session count (s.275). |
| `tedaviSuresi` | integer |  | — |  | Report treatment duration (s.275). |

## `HakSahibiBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tckimlikNo` | string |  | — |  | Beneficiary citizen ID; mandatory when neither karneNo nor sosyalGuvenlikNo is provided (s.268). |
| `karneNo` | string |  | — |  | Beneficiary card number; mandatory when tckimlikNo is not provided (s.268). |
| `sosyalGuvenlikNo` | string |  | — |  | Beneficiary social-security number; mandatory when tckimlikNo is not provided (s.269). |
| `yakinlikKodu` | string |  | — |  | Four-digit kinship code for Bag-Kur patients; empty for other institutions (s.269). |
| `sigortaliTuru` | enum |  | sigortali-turu |  | Insured type: 1 = Çalışan, 2 = Emekli, 3 = Diğer (s.269). This three-value list is the rapor-group variant of the hasta-kabul sigortali-turu enum. |
| `devredilenKurum` | enum |  | devredilen-kurum-rapor |  | Pre-merger institution of the insured; the rapor-group variant code list (s.269-270) is longer than the hasta-kabul one and conflicts with the changelog — see the devredilen-kurum-rapor enum notes. |
| `adres` | string |  | — |  | Beneficiary address — first occurrence (s.271; lowercase guide row without a length). |
| `telefon` | string |  | — |  | Beneficiary phone — first occurrence (s.271; lowercase guide row without a length). |
| `baglibulunanbirim` | string |  | — |  | Beneficiary unit — first occurrence (s.271; lowercase guide row without a length). |
| `provizyonTipi` | enum |  | provizyon-tipi |  | Admission type for the report examination: N = Normal, I = İş kazası, A = Acil (s.271). |
| `provizyonTarihi` | string |  | — |  | Entitlement examination date — NOT the report date; "dd.mm.yyyy" (s.272). |
| `adi` | string |  | — |  | Beneficiary first name; the guide states "bu alan boş bırakılacaktır" (s.272). |
| `soyadi` | string |  | — |  | Beneficiary last name; the guide states "bu alan boş bırakılacaktır" (s.272). |
| `adresDetay` | string |  | — |  | Beneficiary address — second occurrence with length 100 (s.272); the guide documents both a lowercase and a camelCase address row. |
| `telefonDetay` | string |  | — |  | Beneficiary phone — second occurrence with length 50 (s.272). |
| `bagliBulunanBirim` | string |  | — |  | Beneficiary unit — second occurrence with length 50 (s.272). |
| `emeklimi` | string |  | — |  | Beneficiary retirement info (s.272). |

## `HastaCikisCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.169) |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.169) |
| `yatisBaslangicTarihi` | date |  | — |  | Hospitalization start date of the discharge (s.169) |
| `yatisBitisTarihi` | date |  | — |  | Hospitalization end date of the discharge (s.169) |

## `HastaCikisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number the discharge is recorded against (s.168) |
| `hastaCikisTarihi` | date |  | — |  | Discharge date of the hospitalized patient, dd.mm.yyyy (s.168) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned code of the institution (s.168) |

## `HastaCikisIptalDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number the discharge cancellation is recorded against (s.169) |
| `hastaCikisTarihi` | date |  | — |  | Original discharge date being cancelled (s.170) |
| `yeniHastaCikisTarihi` | date |  | — |  | New discharge date replacing the cancelled one (s.170) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.170) |

## `HastaYatisBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the hospitalization (s.234) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.234) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.234) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.234) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.234) |
| `refakatciGunSayisi` | string |  | — |  | Companion days; empty when no companion (s.234) |
| `yatisBaslangicTarihi` | date |  | — |  | Hospitalization start date, dd.mm.yyyy (s.234) |
| `yatisBitisTarihi` | date |  | — |  | Hospitalization end date, dd.mm.yyyy (s.234) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.234) |
| `aciklama` | string |  | — |  | Hospitalization description (s.234) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.234) |

## `HastaYatisBilgisiRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `yatisTarihi` | string |  | — |  | Hospital admission date, "dd.mm.yyyy" (s.266). |
| `cikisTarihi` | string |  | — |  | Hospital discharge date, "dd.mm.yyyy" (s.266). |

## `HastaYatisOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisiKodu` | string |  | — |  | Institution code (spelled saglikTesisiKodu in the guide) (s.170) |
| `hastaBasvuruNo` | string |  | — |  | Application number (s.170) |
| `basvuruYatisBilgileri` | array |  | — |  | Hospitalization records (BasvuruYatisBilgileriDVO[], Tablo 4.1.6.c, s.171), expanded as a registry entity (s.171) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.171) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.171) |
| `yeniDoganDogumTarihi` | date |  | — |  | Birth date when the hospitalization is a newborn episode (s.171) |
| `yeniDoganCocukSiraNo` | string |  | — |  | Child order when the hospitalization is a newborn episode (s.171) |
| `donorTck` | string |  | — |  | Donor identity number when the episode is a donation (s.171) |

## `HastaYatisOkuDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaBasvuruNo` | string |  | — |  | Application number whose hospitalizations are read (s.170) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.170) |

## `HastalikRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | string |  | — |  | Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.263). |
| `bitisTarihi` | string |  | — |  | End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.263). |
| `raporDurumu` | enum |  | calisma-durumu |  | Fit-to-work or control state; mandatory when there was hospitalization (s.263). |
| `isKontTarihi` | string |  | — |  | Return-to-work or control date, "dd.mm.yyyy" (s.263). |
| `hastaneYatisTarihi` | string |  | — |  | Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.263). |
| `hastaneCikisTarihi` | string |  | — |  | Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.263). |
| `nuks` | enum |  | nuks-durumu |  | Relapse status; no length given in the illness branch (s.263). |
| `yatisDevam` | enum |  | yatis-devam-is-kazasi |  | Hospitalization state; three-value list shared with the work-accident branch (s.263). |
| `taburcuTarihi` | string |  | — |  | Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.263). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.263). |

## `HataliIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hataKodu` | string |  | — |  | Error code (s.235). |
| `hataMesaji` | string |  | — |  | Error explanation (s.236). |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference of the failed operation (s.236). |
| `oncekiIslemBilgisi` | object |  | — |  | Prior-operation composite, expanded as the OncekiIslemBilgisiDVO registry entity (Tablo 4.2.1.p, s.236). |

## `HizmetDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ameliyatveGirisimBilgileri` | array |  | — |  | Surgery/intervention records (AmeliyatveGirisimBilgisiDVO[], Tablo 4.2.1.c, s.190). |
| `digerIslemBilgileri` | array |  | — |  | Other operation records (DigerIslemBilgisiDVO[], Tablo 4.2.1.d, s.190). |
| `disBilgileri` | array |  | — |  | Dental records (DisBilgisiDVO[], Tablo 4.2.1.e, s.190). |
| `ilacBilgileri` | array |  | — |  | Medication records (IlacBilgisiDVO[], Tablo 4.2.1.f, s.190). |
| `konsultasyonBilgileri` | array |  | — |  | Consultation records (KonsultasyonBilgisiDVO[], Tablo 4.2.1.g, s.190). |
| `malzemeBilgileri` | array |  | — |  | Material records (MalzemeBilgisiDVO[], Tablo 4.2.1.h, s.190). |
| `muayeneBilgisi` | object |  | — |  | Examination record (MuayeneBilgisiDVO, Tablo 4.2.1.i, s.190). |
| `tahlilBilgileri` | array |  | — |  | Lab test records (TahlilBilgisiDVO[], Tablo 4.2.1.j, s.190). |
| `tanilar` | array |  | — |  | Diagnosis records (TaniBilgisiDVO[], Tablo 4.2.1.k, s.232). |
| `tetkikveRadyolojiBilgileri` | array |  | — |  | Imaging records (TetkikveRadyolojiBilgisiDVO[], Tablo 4.2.1.l, s.232). |
| `hastaYatisBilgileri` | array |  | — |  | Hospitalization records (HastaYatisBilgisiDVO[], Tablo 4.2.1.o, s.190). |
| `kanBilgileri` | array |  | — |  | Blood product records (KanBilgisiDVO[], Tablo 4.2.1.s, s.190). |
| `takipNo` | string |  | — |  | Tracking number of the read services (s.238). |
| `odemeSorguDurum` | enum |  | odeme-sorgu-durum |  | Payment-inquiry state of the registered services (s.238); codes 0-6 and X. |
| `triajBeyani` | string |  | — |  | Triage declaration taking S/K/Y values (s.238). |

## `HizmetDetayDVO`

Domain: `fatura-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Description of the service provided by the institution (s.241). |
| `protokolNo` | string |  | — |  | Protocol number assigned by the institution (s.241). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Discharge code (s.241-242); codes 1-13 in the taburcu-kodu registry enum. |
| `takipNo` | string |  | — |  | Tracking number (s.242). |

## `HizmetIptalCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.239). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.239). |

## `HizmetIptalGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNumaralari` | array |  | — |  | Operation sequence numbers to cancel only the specified operations; empty cancels all registered operations (s.239). |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.239). |
| `takipNo` | string |  | — |  | Tracking number whose operations are cancelled (s.239). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.239). |

## `HizmetKayitCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.190). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.190). |
| `takipNo` | string |  | — |  | Tracking number of the registration (s.190). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number (s.190). |
| `saglikTesisKodu` | integer |  | — |  | Code of the registering institution (s.190). |
| `islemBilgileri` | array |  | — |  | Registered operation records as KayitliIslemBilgisiDVO registry entities (Tablo 4.2.1.m, s.235). |
| `hataliKayitlar` | array |  | — |  | Failed registration records (HataliIslemBilgisiDVO, s.190). |

## `HizmetKayitGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the institution performing the service registration (s.189). |
| `takipNo` | string |  | — |  | Tracking number the services are registered against (s.189). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number; the guide marks it optional here (s.189). |
| `tanilar` | array |  | — |  | Diagnosis entries as an array of TaniBilgisiDVO (Tablo 4.2.1.k, s.232). Verification correction - the guide names this field tanilar. |
| `ameliyatveGirisimBilgileri` | array |  | — |  | Surgery and intervention entries as an array (AmeliyatveGirisimBilgisiDVO, s.189). |
| `digerIslemBilgileri` | array |  | — |  | Other operation entries (DigerIslemBilgisiDVO, s.189). |
| `disBilgileri` | array |  | — |  | Dental entries (DisBilgisiDVO, s.189). |
| `ilacBilgileri` | array |  | — |  | Medication entries (IlacBilgisiDVO, s.189). |
| `konsultasyonBilgileri` | array |  | — |  | Consultation entries (KonsultasyonBilgisiDVO, s.189). |
| `malzemeBilgileri` | array |  | — |  | Material entries (MalzemeBilgisiDVO, s.189). |
| `muayeneBilgisi` | object |  | — |  | Examination entry (MuayeneBilgisiDVO, s.189). |
| `tahlilBilgileri` | array |  | — |  | Lab test entries (TahlilBilgisiDVO, s.189). |
| `tetkikveRadyolojiBilgileri` | array |  | — |  | Imaging and work-up entries (TetkikveRadyolojiBilgisiDVO, s.189). |
| `hastaYatisBilgileri` | array |  | — |  | Hospitalization entries (HastaYatisBilgisiDVO, s.190); mandatory for inpatient takips per the guide note. |
| `kanBilgileri` | array |  | — |  | Blood transfusion entries (KanBilgisiDVO, s.190). |
| `triajBeyani` | string |  | — |  | Triage declaration taking S/K/Y values; mandatory for emergency takips (s.190). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.190). |

## `HizmetOkuCevapDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hizmetler` | object |  | — |  | Composite service read result, expanded as the HizmetDVO registry entity (Tablo 4.2.2.c, s.237-238) carrying all categorized service arrays. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number (s.237). |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.237). |
| `sonucMesaji` | string |  | — |  | Result explanation (s.237). |

## `HizmetOkuGirisDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNumaralari` | array |  | — |  | Operation sequence numbers to read only the specified operations; empty reads all registered operations (s.236). |
| `hizmetSunucuRefNolari` | array |  | — |  | Service-provider reference numbers to filter the read (s.237); empty reads all registered operations. |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code (s.237). |
| `takipNo` | string |  | — |  | Tracking number whose registered operations are read (s.237). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.237). |

## `IlacAraCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.287). |
| `sonucMesaji` | string |  | — |  | Result description (s.287). |
| `ilaclar` | array |  | — |  | Drugs; item shape Tablo 4.5.4.c (IlacListDVO, this registry) (s.287). |

## `IlacAraGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `barkod` | string |  | — |  | Drug barcode (s.287). |
| `ilacAdi` | string |  | — |  | Drug name (s.287). |
| `saglikTesisKodu` | integer |  | — |  | Code of the searching facility (s.287). |

## `IlacBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Drug description; majistral drugs carry the content here (s.198) |
| `adet` | decimal |  | — |  | Drug quantity; the usage unit comes from the Yardimci Servisleri ilac-ara method (s.198) |
| `barkod` | string |  | — |  | Drug barcode registered in GSS; mandatory except for majistral drugs (s.198) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.198) |
| `ilacTuru` | enum |  | ilac-turu |  | Drug type - 1 Barkodlu, 2 Majistral, 3 Radyofarmasotik Ajan (s.198) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.198) |
| `islemTarihi` | date |  | — |  | Drug usage date, dd.mm.yyyy (s.198) |
| `tutar` | decimal |  | — |  | Amount for majistral drugs and radiopharmaceutical agents (s.198) |
| `paketHaric` | string |  | — |  | 0 when included in the package, 1 when excluded (s.198) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.198) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.198) |
| `seriNo` | string |  | — |  | Drug serial number (s.199) |
| `sonKullanimTarihi` | date |  | — |  | Drug expiry date (s.199) |
| `batchNo` | string |  | — |  | Drug batch number (s.199) |
| `itsBirimSarfId` | string |  | — |  | Unit consumption ID received from the ITS system (s.199) |
| `majistralIlac` | object |  | — |  | Majistral drug composite, expanded as the MajistralIlacDVO registry entity (Tablo 4.2.1.f.1, s.199-200) (s.199) |
| `birlikteYapilanIslemSUTKodu` | string |  | — |  | SUT code of the concurrently performed operation (s.199) |
| `birlikteYapilanIslemHizmetSunucuRefNo` | string |  | — |  | Institution reference of the concurrently performed operation (s.199) |

## `IlacIndirimDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kamuIndOranAlt` | decimal |  | — |  | Public discount lower rate (s.289). |
| `kamuIndOranUst` | decimal |  | — |  | Public discount upper rate (s.289). |
| `gecerlilikTarihi` | string |  | — |  | Validity date (s.289). |
| `ilac_id` | integer |  | — |  | Drug unique id (s.290). |
| `indirimOrani1` | decimal |  | — |  | Discount rate 1 (s.290). |
| `indirimOrani2` | decimal |  | — |  | Discount rate 2 (s.290). |
| `indirimOrani3` | decimal |  | — |  | Discount rate 3 (s.290). |
| `indirimOrani4` | decimal |  | — |  | Discount rate 4; the guide's description column erroneously repeats "İndirim Oranı 3" (s.290). |

## `IlacListDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ilacFiyatlari` | array |  | — |  | Price history; item shape Tablo 4.5.4.d (FiyatListDVO, this registry) (s.287). |
| `ambalajToplamBirimMiktari` | decimal |  | — |  | Total unit quantity per package (s.287; renamed from kullanimBirimi per the 3.1.1 changelog s.7). |
| `barkod` | string |  | — |  | Drug barcode (s.287). |
| `ilacAdi` | string |  | — |  | Drug name (s.288). |
| `eczAktifPasif` | enum |  | aktif-pasif |  | Pharmacy activity state (s.288). |
| `hasAktifPasif` | enum |  | aktif-pasif |  | Hospital activity state (s.288). |
| `ayaktanOdenme` | enum |  | odenme-durumu |  | Outpatient reimbursement state (s.288). |
| `yatanOdenme` | enum |  | odenme-durumu |  | Inpatient reimbursement state (s.288). |
| `guncelKamuIndirimliFiyati` | decimal |  | — |  | Current public discounted rate (s.288). |
| `ilacIndirimDVO` | array |  | — |  | Discount rates; item shape Tablo 4.5.4.e (IlacIndirimDVO, this registry) (s.288). |
| `yatanMaksimumKullanimPeriyot` | integer |  | — |  | Maximum usage period for inpatient takips (s.288). |
| `yatanMaksimumKullanimPeriyotBirim` | integer |  | — |  | Maximum usage period unit for inpatient takips (s.288). |
| `yatanMaksimumKullanimDoz1` | integer |  | — |  | Maximum usage doze-1 multiplier for inpatient takips (s.288). |
| `yatanMaksimumKullanimDoz2` | decimal |  | — |  | Maximum usage doze-2 multiplier for inpatient takips (s.288). |
| `ayaktanMaksimumKullanimPeriyot` | integer |  | — |  | Maximum usage period for outpatient takips (s.288). |
| `ayaktanMaksimumKullanimPeriyotBirim` | integer |  | — |  | Maximum usage period unit for outpatient takips (s.288). |
| `ayaktanMaksimumKullanimDoz1` | integer |  | — |  | Maximum usage doze-1 multiplier for outpatient takips (s.289). |
| `ayaktanMaksimumKullanimDoz2` | decimal |  | — |  | Maximum usage doze-2 multiplier for outpatient takips (s.289). |
| `esdegerGrupFiyati` | decimal |  | — |  | Price computed over the equivalent group (s.289). |
| `esdegerKullanimBirimi` | decimal |  | — |  | Usage unit computed over the equivalent group (s.289). |
| `esdegerBarkod` | string |  | — |  | Barcode of the equivalent-group drug (s.289). |
| `farmasotikFormAdi` | string |  | — |  | Pharmaceutical form name (s.289). |

## `IlacRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporDVO` | object |  | — |  | Report core; shape Tablo 4.4.1.k (RaporDVO, this registry). |
| `raporEtkinMaddeler` | array |  | — |  | Active ingredients; item shape Tablo 4.4.1.ff (RaporEtkinMaddeDVO, this registry). The required column is not visible in the text extraction (s.261). |
| `takipFormuNo` | string |  | — |  | Follow-up form number when the drug report is filed with a diabetes diagnosis (s.261). |

## `IlacRaporDuzeltDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drTescilNo` | string |  | — |  | Doctor diploma registration number. The guide's description column erroneously repeats the RaporCevapDVO result-code text here; the parameter name and clear name (Dr diploma tescil numarası) are authoritative. |
| `duzeltmeBilgisi` | string |  | — |  | Additional annotation appended to the drug report (s.281). |
| `duzeltmeTarihi` | string |  | — |  | Correction date, "dd.mm.yyyy" format (s.281). |
| `raporNo` | string |  | — |  | Report number (s.281). |
| `raporTarihi` | string |  | — |  | Report date, "dd.mm.yyyy" format (s.281). |
| `raporTuru` | enum |  | rapor-turu |  | Report type; this method only applies to drug reports: 10 = İlaç Kullanım (s.281). |
| `tesisKodu` | integer |  | — |  | Code of the facility that issued the report (s.281). |
| `raporEtkinMaddeler` | array |  | — |  | Active ingredients; item shape in Tablo 4.4.1.ff (RaporEtkinMaddeDVO) — deferred to G43b with the RaporBilgisiKaydet composite set. |
| `tanilar` | array |  | — |  | ICD-10 diagnoses; item shape in Tablo 4.2.1.k (TaniBilgisiDVO) — already used by the hizmet-kayit group. |
| `ilacTeshisler` | array |  | — |  | Drug report diagnoses; item shape in Tablo 4.4.1.gg (IlacTeshisBilgiDVO). The guide marks this field mandatory for drug reports (s.281) despite listing it as optional in the required column. |

## `IlacTeshisBilgiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | string |  | — |  | Report start date, "dd.mm.yyyy" (s.278). |
| `bitisTarihi` | string |  | — |  | Report end date, "dd.mm.yyyy" (s.278). |
| `teshisKodu` | integer |  | — |  | Report diagnosis code (s.278). |
| `ICD10Kodu` | array |  | — |  | Diagnosis codes; the guide types this row as TaniBilgisiDVO[] while naming the parameter ICD10Kodu — both facts preserved (s.278); item shape Tablo 4.2.1.k (TaniBilgisiDVO, hizmet-kayit group). |

## `IsKazasiRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | string |  | — |  | Start date, "dd.mm.yyyy"; mandatory when yatisDevam = H-style rest given (s.256). |
| `bitisTarihi` | string |  | — |  | End date, "dd.mm.yyyy"; mandatory when hospitalization is over (s.256). |
| `raporDurumu` | string |  | — |  | 1 = Çalışır, 2 = Kontrol; mandatory when there was hospitalization (s.256). |
| `isKontTarihi` | string |  | — |  | Return-to-work or control date, "dd.mm.yyyy"; mandatory when hospitalization is absent (s.256). |
| `hastaneYatisTarihi` | string |  | — |  | Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.256). |
| `hastaneCikisTarihi` | string |  | — |  | Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.256). |
| `nuks` | string |  | — |  | Relapse status: 1 = Nüks Var, 2 = Nüks Yok (s.257). |
| `yatisDevam` | enum |  | yatis-devam-is-kazasi |  | Hospitalization state; three-value work-accident variant (s.257). |
| `yaraninTuru` | string |  | — |  | Wound type; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.257). |
| `yaraninYeri` | string |  | — |  | Wound site; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.257). |
| `taburcuTarihi` | string |  | — |  | Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.257). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.257). |
| `isKazasiTarihi` | string |  | — |  | Work-accident date, "dd.mm.yyyy"; filled when the relapse flag is set (s.257). |

## `IsgoremezlikRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporBilgisi` | object |  | — |  | Report registry key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry). |
| `isGoremezlikRaporTuru` | enum |  | isgoremezlik-rapor-turu |  | Incapacity report branch selector (s.254). |
| `bransKodu` | string |  | — |  | Branch code (s.254). |
| `protokolNo` | string |  | — |  | Report protocol number (s.254). |
| `protokolTarihi` | string |  | — |  | Report protocol date, "dd.mm.yyyy" (s.254). |
| `duzenlemeTuru` | enum |  | rapor-duzenleme-turu |  | Issuing style (s.255). |
| `teshis` | string |  | — |  | Diagnosis; an ICD-10 code must be used (s.255). |
| `aciklama` | string |  | — |  | Branch opinion (s.255). |
| `saglikKuruluRaporTarihi` | string |  | — |  | Health-board report date (s.255; parameter name row-wrapped in the guide). |
| `olum` | enum |  | olum-durumu |  | Alive/deceased selector (s.255). |
| `ilkRaporTakipNo` | integer |  | — |  | MEDULA tracking number of the initial report when this report is a continuation (s.255). |
| `isKazasiRaporu` | object |  | — |  | Work-accident detail; shape Tablo 4.4.1.d (IsKazasiRaporDVO, this registry). |
| `meslekHastaligiRaporu` | object |  | — |  | Occupational-disease detail; shape Tablo 4.4.1.e (MeslekHastaligiRaporDVO) — deferred to G43c with the remaining report branches. |
| `analikRaporu` | object |  | — |  | Maternity detail; shape Tablo 4.4.1.f (AnalikRaporDVO) — deferred to G43c with the remaining report branches. |
| `emzirmeRaporu` | object |  | — |  | Nursing detail; shape Tablo 4.4.1.g (EmzirmeRaporDVO) — deferred to G43c with the remaining report branches. |
| `hastalikRaporu` | object |  | — |  | Illness detail; shape Tablo 4.4.1.j (HastalikRaporDVO) — deferred to G43c with the remaining report branches. |
| `klinikBulgular` | string |  | — |  | Clinical findings (s.255). |
| `ronLabBilgileri` | string |  | — |  | Radiology/laboratory findings (s.255; no length given). |
| `karar` | string |  | — |  | Board decision (s.255). |
| `doktorlar` | array |  | — |  | Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry); sent as an array (s.255). |
| `bashekimOnayDurumu` | integer |  | — |  | Chief-physician approval state (s.255; no code list given). |
| `bashekimTCNo` | string |  | — |  | Chief-physician citizen ID (s.255). |
| `hakSahibi` | object |  | — |  | Beneficiary; shape Tablo 4.4.1.s (HakSahibiBilgisiDVO, this registry). |
| `devammi` | enum |  | devam-durumu |  | Continuation selector from the pre-selection answer (s.256). |
| `yatisDevam` | enum |  | yatis-devam-durumu |  | Hospitalization state (s.256). |

## `IsgoremezlikRaporEkDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aciklama` | string |  | — |  | Attachment description (s.276). |
| `bitisTarihi` | string |  | — |  | Attachment end date, "dd.mm.yyyy" (s.276). |
| `durum` | enum |  | ek-durumu |  | Initial or attachment report (s.276). |
| `duzenlemeTuru` | enum |  | rapor-duzenleme-turu |  | Issuing style (s.276). |
| `hastaYatisVarMi` | enum |  | evet-hayir |  | E when hospitalized (H when not) — the yatislar array must then carry at least one stay (s.276). |
| `kontrolMu` | enum |  | evet-hayir |  | Control examination flag: E = Evet, H = Hayir (s.276). |
| `kontrolTarihi` | string |  | — |  | Control date, "dd.mm.yyyy" (s.276). |
| `protokolNo` | string |  | — |  | Protocol number (s.277). |
| `protokolTarihi` | string |  | — |  | Protocol date, "dd.mm.yyyy" (s.277). |
| `yatislar` | array |  | — |  | Hospital stays; item shape Tablo 4.4.1.l (HastaYatisBilgisiRaporDVO, this registry); mandatory when hastaYatisVarMi = E (s.277). |
| `raporBilgisiDVO` | object |  | — |  | Report key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry); the guide's parameter name carries a DVO suffix here. |
| `doktorlar` | array |  | — |  | Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry) (s.277). |
| `tanilar` | array |  | — |  | Diagnoses; item shape Tablo 4.4.1.u (TaniBilgisiDVO, hizmet-kayit group); parameter name capitalized (Tanilar) in the guide (s.277). |
| `kullaniciTesisKodu` | integer |  | — |  | Health facility code of the caller (s.277). |

## `IslemDetayDVO`

Domain: `fatura-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Medula sequence number of the operation (s.243) |
| `islemTutari` | decimal |  | — |  | Operation-specific amount within the takip (s.243) |

## `KanBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the transfusion (s.234) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.235) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.235) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.235) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.235) |
| `adet` | integer |  | — |  | Quantity of blood products (s.235) |
| `isbtBilesenNo` | string |  | — |  | ISBT component number of the blood product (s.235) |
| `isbtUniteNo` | string |  | — |  | ISBT unit number of the blood product (s.235) |
| `islemTarihi` | date |  | — |  | Transfusion date, dd.mm.yyyy (s.235) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.235) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.235) |

## `KatilimPayiCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.293). |
| `sonucMesaji` | string |  | — |  | Result description (s.294). |
| `evrakRefNo` | integer |  | — |  | Document reference number of the deducted document (s.294). |
| `KatilimPayiDVO` | array |  | — |  | Co-payment records; the guide uses the TYPE name as the PARAMETER name here — preserved verbatim; item shape Tablo 4.5.7.c (KatilimPayiDVO, this registry) (s.294). |

## `KatilimPayiDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.294). |
| `muayeneKatilimTutari` | decimal |  | — |  | Examination co-payment of the takip (s.294). |
| `malzemeKatilimTutari` | decimal |  | — |  | Material co-payment of the takip (s.294). |
| `tupBebekKatilimTutari` | decimal |  | — |  | IVF co-payment of the takip (s.294). |

## `KatilimPayiGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `evrakRefNo` | integer |  | — |  | Document reference number (s.293). |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.293). |

## `KayitliIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference of the registered operation (s.235). |
| `islemSiraNo` | string |  | — |  | Medula-assigned sequence number of the registered operation (s.235). |

## `KemikIligiIptalCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.181) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.181) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.181) |

## `KemikIligiIptalGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.181) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.181) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered bone-marrow admission (s.181) |

## `KemikIligiIslemDuzeltmeCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number of the corrected admission (s.183) |
| `islemTarihi` | date |  | — |  | Date of the corrected admission (continues on s.184 with the result fields) (s.183) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (standard result pattern) (s.183) |
| `sonucMesaji` | string |  | — |  | Result explanation (standard result pattern) (s.183) |
| `yeniIslemKodu` | string |  | — |  | New (corrected) SUT operation code (s.184) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered admission (s.184) |

## `KemikIligiIslemDuzeltmeGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.183) |
| `islemTarihi` | date |  | — |  | Planned operation date (s.183) |
| `islemKodu` | string |  | — |  | Eski (old) SUT operation code being corrected (s.183) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.183) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered admission (s.183) |
| `yeniIslemKodu` | string |  | — |  | Yeni (new) SUT operation code (s.183) |

## `KemikIligiKabulCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number of the registered bone-marrow admission (s.180) |
| `islemTarihi` | date |  | — |  | Date of the registered bone-marrow admission (s.180) |
| `bildirimNo` | integer |  | — |  | Unique notification number of the registered bone-marrow admission (s.180) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.180) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.180) |

## `KemikIligiKabulDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.180) |
| `islemTarihi` | date |  | — |  | Planned operation date, dd.mm.yyyy (s.180) |
| `islemKodu` | string |  | — |  | SUT operation code of the planned bone-marrow procedure (s.180) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.180) |

## `KemikIligiOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number of the registered admission (s.182) |
| `islemTarihi` | date |  | — |  | Date of the registered admission (s.182) |
| `islemKodu` | string |  | — |  | SUT operation code of the planned procedure (s.182) |
| `aktifPasif` | string |  | — |  | Form activity state; returns Aktif or Pasif (s.182) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered admission (s.182) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.182) |
| `sonucMesaji` | string |  | — |  | Result explanation (continues on s.183) (s.182) |

## `KemikIligiOkuGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTcNo` | string |  | — |  | Patient T.C. identity number (s.182) |
| `islemTarihi` | date |  | — |  | Planned operation date (s.182) |
| `islemKodu` | string |  | — |  | SUT operation code of the planned bone-marrow procedure (s.182) |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned institution code (s.182) |
| `bildirimNo` | integer |  | — |  | Notification number of the registered bone-marrow admission (s.182) |

## `KemikIligiTCIleOkuCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kemikIligiCevapDVO` | array |  | — |  | Bone-marrow admission records (KemikIligiOkuCevapDVO[], Tablo 4.1.19.b), expanded as a registry entity (s.184) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.184) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.184) |

## `KemikIligiTCIleOkuGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcNo` | string |  | — |  | Patient T.C. identity number (s.184) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.184) |

## `KisiGecmisIslemlerCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.303). |
| `sonucMesaji` | string |  | — |  | Result description (s.303). |
| `oncekiIslemler` | array |  | — |  | Past procedures; item shape Tablo 4.5.15.c (KisiIslemDVO, this registry) (s.303). |

## `KisiGecmisIslemlerGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.303). |
| `hastaTCKimlikNo` | integer |  | — |  | Citizen ID of the queried person; the guide types it long (s.303). |
| `sutKodu` | string |  | — |  | SUT code to query (s.303). |

## `KisiGenSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemTarihi` | string |  | — |  | "dd.MM.yyyy" referral date; the guide labels the field islemTarihi while the clear name says Sevk Tarihi (s.309). |
| `tesisKodu` | integer |  | — |  | Facility code (s.309). |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.309). |
| `sonucMesaji` | string |  | — |  | Result description (s.310). |

## `KisiGenSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTCKimlikNo` | integer |  | — |  | Citizen ID of the queried person; the guide types it long (s.309). |
| `saglikTesisKodu` | integer |  | — |  | Facility code (s.309). |
| `sutKodu` | string |  | — |  | SUT code; sutKodu or genKodu is mandatory (s.309). |
| `genKodu` | string |  | — |  | Gen code to query; sutKodu or genKodu is mandatory (s.309). |

## `KisiIslemDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tesisKodu` | integer |  | — |  | Facility code (s.303). |
| `tesisAdi` | string |  | — |  | Name of the facility where the procedure was performed (s.303). |
| `islemTarihi` | string |  | — |  | Procedure date (s.303). |

## `KisiOlumKayitCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.306). |
| `sonucMesaji` | string |  | — |  | Result description (s.306). |
| `kisiOlumKayitDetay` | array |  | — |  | Death-registration details; item shape Tablo 4.5.18.c (KisiOlumKayitDetayDVO, this registry) (s.307). |

## `KisiOlumKayitDetayDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcKimlikNo` | string |  | — |  | Citizen ID — the guide's description column erroneously repeats 'Hizmet Sunucu Ref' (s.307). |
| `adi` | string |  | — |  | First name — the guide's description column erroneously repeats 'İşlem Kodu' (s.307). |
| `soyadi` | string |  | — |  | Last name — the guide's description column erroneously repeats 'İşlem Tarihi' (s.307). |
| `olumTarihi` | string |  | — |  | "dd.MM.yyyy" death date (s.307). |
| `saglikTesisKodu` | integer |  | — |  | Facility code (s.307). |
| `olumSaati` | string |  | — |  | "HH:MM" death time (s.307). |
| `olumBelgesiAdi` | string |  | — |  | Death-certificate name (s.307). |
| `olumBelgesiIcerik` | array |  | — |  | Certificate content as a byte array (s.307). |

## `KisiOlumKayitGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcKimlikNo` | integer |  | — |  | Citizen ID of the person to register; the guide types it long (s.306). |
| `olumTarihi` | string |  | — |  | "dd.MM.yyyy" death date (s.306). |
| `saglikTesisKodu` | string |  | — |  | Facility code — typed String here unlike the Integer elsewhere in the group (s.306). |
| `olumSaati` | string |  | — |  | "HH:MM" death time (s.306). |
| `olumBelgesiAdi` | string |  | — |  | Death-certificate name (s.306). |
| `olumBelgesiIcerik` | array |  | — |  | Certificate content as a byte array — full file name with extension per the guide (s.306). |

## `KonsultasyonBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | (Branch code of the consultation) s.224 |
| `drTescilNo` | string |  | — |  | (Registration number of the performing doctor) s.224 |
| `sutKodu` | string |  | — |  | (SUT-defined operation code) s.224 |
| `hizmetSunucuRefNo` | string |  | — |  | (Institution reference paired with islemSiraNo) s.224 |
| `islemSiraNo` | string |  | — |  | (Sequence number; null-on-input pattern) s.224 |
| `islemTarihi` | date |  | — |  | (Consultation date, dd.mm.yyyy) s.224 |
| `ozelDurum` | string |  | — |  | (Special condition code, Tablo 5.1 OzelDurumVO) s.224 |
| `cokluOzelDurum` | array |  | — |  | (Multiple special-condition codes) s.224 |

## `KurumSevkTalepNoSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.308). |
| `sonucMesaji` | string |  | — |  | Result description (s.308). |
| `KurumSevkTalepNoSorguDetay` | array |  | — |  | Institution-referred person details; the guide uses the TYPE name as the PARAMETER name — preserved verbatim; item shape Tablo 4.5.19.c (KurumSevkTalepNoSorguDetayDVO, this registry) (s.308). |

## `KurumSevkTalepNoSorguDetayDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kurumSevkTalepNo` | string |  | — |  | The "e-Talep MALULİYET SEVK FORMU" number issued by the province directorate / social-security center (s.308). |
| `tcKimlikNo` | string |  | — |  | Patient citizen ID (s.308). |
| `sevkTarihi` | string |  | — |  | "dd.MM.yyyy" referral date (s.308). |
| `saglikTesisKodu` | integer |  | — |  | Facility code (s.308). |
| `hastaBasvuruNo` | string |  | — |  | Populated when a takip was taken with this referral number (s.308). |
| `raporTakipNo` | string |  | — |  | Populated when a report was registered with this referral number (s.308). |
| `aciklama` | string |  | — |  | Report remark (s.308). |
| `sigortaliTcNo` | string |  | — |  | Citizen ID of the applicant's insured person (s.308). |
| `ucret` | string |  | — |  | Whether treatment costs are covered by the "Kurum" or the "Sigortalı" (s.308). |
| `araKarar` | enum |  | ara-karar |  | Referral decision type (s.309). |

## `KurumSevkTalepNoSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcKimlikNo` | integer |  | — |  | Citizen ID of the queried person; the guide types it long (s.308). |
| `saglikTesisKodu` | string |  | — |  | Facility code — typed String here unlike the Integer elsewhere (s.308). |

## `MajistralEklenenIlacDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.223) |
| `barkod` | string |  | — |  | Barcode of the added drug registered in GSS (s.224) |
| `adet` | decimal |  | — |  | Quantity of the added drug (s.224) |

## `MajistralHamMaddeDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.201) |
| `majistralHamMaddeKodu` | enum |  | majistral-ham-madde |  | Raw-material code (guide declares Integer; semantically a coded value) - codes 1-620 in the majistral-ham-madde registry enum (s.201) |
| `miktar` | integer |  | — |  | Raw-material quantity (s.201) |
| `hamMaddeBirimi` | enum |  | ham-madde-birimi |  | Raw-material unit - 1 Gram / 2 Miligram (s.201) |

## `MajistralIlacDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.199) |
| `preparatTuru` | enum |  | preparat-turu |  | Preparation type - codes 1-8 in the preparat-turu registry enum (s.199) |
| `bolunmusTozTuru` | string |  | — |  | Powder-division type; required when preparatTuru is 3 (s.199) |
| `ambalajTuru` | enum |  | ambalaj-turu |  | Packaging type - codes 1-3 in the ambalaj-turu registry enum (s.200) |
| `ambalajBoyutu` | enum |  | ambalaj-boyutu |  | Packaging size code; the guide lists ~30 codes (1-19, 21-31) - enum candidate for v0.3 (s.200) |
| `ambalajAdet` | string |  | — |  | Packaging quantity (s.200) |
| `hamMaddeler` | array |  | — |  | Raw-material records, expanded as the MajistralHamMaddeDVO registry entity (Tablo 4.2.1.f.1.1, s.201) |
| `eklenenIlaclar` | array |  | — |  | Added-drug records, expanded as the MajistralEklenenIlacDVO registry entity (Tablo 4.2.1.f.1.2, s.223-224) |

## `MalzemeBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kodsuzMalzemeAdi` | string |  | — |  | Name of the uncoded material; required when malzemeTuru is 3 (s.224) |
| `adet` | decimal |  | — |  | Quantity of the used material (s.224) |
| `barkod` | string |  | — |  | UBB material barcode; required since 01.02.2008 (s.225) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.225) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.225) |
| `islemTarihi` | date |  | — |  | Date the material was used, dd.mm.yyyy (s.225) |
| `kodsuzMalzemeFiyati` | decimal |  | — |  | Price of the uncoded material; sent for coded materials too (s.225) |
| `malzemeKodu` | string |  | — |  | Material code; required for SUT and protocol materials (s.225) |
| `malzemeTuru` | enum |  | malzeme-turu |  | Material type - 1 SUT kodlu, 2 Emekli Sandigi protokol kodlu, 3 kodsuz (s.225) |
| `paketHaric` | string |  | — |  | 0 when included in the package, 1 when excluded (s.225) |
| `katkiPayi` | string |  | — |  | E when a patient contribution exists, H when not (s.225) |
| `kdv` | integer |  | — |  | VAT amount of the material (s.225) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.225) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.226) |
| `malzemeSatinAlisTarihi` | date |  | — |  | Date the material was purchased (s.226) |
| `donorId` | string |  | — |  | Mandatory for allograft shipments (s.226) |
| `ihaleKesinlesmeTarihi` | date |  | — |  | Mandatory for public institutions for uncoded materials used on or after 01.10.2014 (s.226) |
| `ikNoAlimNo` | string |  | — |  | Mandatory for public institutions for uncoded materials used on or after 01.10.2014 (s.226) |
| `bayiNo` | string |  | — |  | Vendor identifier of the material supplier (mandatory since 02.07.2018) (s.226) |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.226) |
| `sagSol` | string |  | — |  | R (Sag) / L (Sol) side code (s.226) |
| `birlikteYapilanIslemSUTKodu` | string |  | — |  | SUT code of the concurrently performed operation (s.226) |
| `birlikteYapilanIslemHizmetSunucuRefNo` | string |  | — |  | Institution reference of the concurrently performed operation (s.226) |

## `MalzemeBilgisiRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `malzemeKodu` | string |  | — |  | Material code; mandatory when malzemeTuru is 1 or 2 (s.266). Coded per SUT — externally-coded codeSystem annotation per the G42 sweep norm. |
| `malzemeAdi` | string |  | — |  | Material name; mandatory when malzemeTuru is 3 (s.266). |
| `malzemeTuru` | enum |  | malzeme-turu |  | SUT-coded / retirement-fund-protocol / uncoded material (s.266). |
| `adet` | integer |  | — |  | Material count (s.266). |

## `MeslekHastaligiRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | string |  | — |  | Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.258). |
| `bitisTarihi` | string |  | — |  | End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.258). |
| `raporDurumu` | enum |  | calisma-durumu |  | Fit-to-work or control state; mandatory when there was hospitalization (s.258). |
| `isKontTarihi` | string |  | — |  | Return-to-work or control date, "dd.mm.yyyy" (s.258). |
| `hastaneYatisTarihi` | string |  | — |  | Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.258). |
| `hastaneCikisTarihi` | string |  | — |  | Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.258). |
| `nuks` | enum |  | nuks-durumu |  | Relapse status (s.258). |
| `yatisDevam` | enum |  | yatis-devam-is-kazasi |  | Hospitalization state; three-value list shared with the work-accident branch (s.258). |
| `yaraninTuru` | string |  | — |  | Wound type; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.258). |
| `yaraninYeri` | string |  | — |  | Wound site; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.258). |
| `taburcuTarihi` | string |  | — |  | Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.258). |
| `taburcuKodu` | enum |  | taburcu-kodu |  | Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.258). |
| `isKazasiTarihi` | string |  | — |  | Work-accident date; present here too, mirroring IsKazasiRaporDVO (s.258-259 table continuation). |

## `MuayeneBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the examination (s.226) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.226) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.226) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.226) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.227) |
| `muayeneTarihi` | date |  | — |  | Examination date, dd.mm.yyyy (s.227) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.227) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.227) |

## `OncekiIslemBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemAdedi` | integer |  | — |  | Count of the prior operations (s.236). |
| `islemTarihi` | date |  | — |  | Date the prior operations were performed, dd.mm.yyyy per the guide (s.236). |
| `saglikTesisKodu` | integer |  | — |  | GSS-assigned code of the institution that performed the prior operations (s.236). |
| `tesisAdi` | string |  | — |  | Name of the institution that performed the prior operations (s.236). |

## `OrneklenmisCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.291). |
| `sonucMesaji` | string |  | — |  | Result description (s.291). |
| `saglikTesisKodu` | integer |  | — |  | Code of the facility that searched the sampled takips (s.291). |
| `takipler` | array |  | — |  | Sampled tracking records; item shape Tablo 4.5.6.c (EvrakTakipDVO, this registry) (s.291). |

## `OrneklenmisGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `evrakRefNo` | integer |  | — |  | Document reference number (s.290). |
| `saglikTesisKodu` | integer |  | — |  | Code of the searching facility (s.290). |
| `grupTuru` | enum |  | grup-turu |  | A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.290). |
| `grupKodu` | integer |  | — |  | Group code; values come from the evrakTakipGrupKodlariSorgu method (s.290). |

## `ProvizyonCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `draft` · Source refs: medula-hastane-guide-2026-06-17

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error. |
| `sonucMesaji` | string |  | — |  | Human-readable result message accompanying the result code. |
| `hastaBasvuruNo` | string |  | — |  | Patient application number generated on successful admission; null on failure. |
| `takipNo` | string |  | — |  | Primary tracking number generated on successful admission; null on failure. |
| `takipler` | array |  | — |  | List of TakipDVO records; a bagli-takip request can return more than one tracking record. |

## `ProvizyonDegistirCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.174) |
| `yeniProvizyonTipi` | string |  | — |  | New provision type applied (s.174) |
| `hastaBasvuruNo` | string |  | — |  | Application number (length per the guide is 4) (s.174) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (guide lists N/A length here) (s.174) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.174) |

## `ProvizyonDegistirGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number whose provision type changes (s.174) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.174) |
| `yeniProvizyonTipi` | string |  | — |  | New provision type (provizyon-tipi codes) (s.174) |

## `ProvizyonGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code assigned by GSS (s.154). |
| `hastaTCKimlikNo` | string |  | — |  | Patient identity number (s.154). Examples must use synthetic placeholders only. |
| `sigortaliTuru` | enum |  | sigortali-turu |  | Insured person type (s.154). Codes 1-4 in the sigortali-turu registry enum. |
| `bransKodu` | string |  | — |  | Medical branch (specialty) code (s.154). Verification correction - the guide defines String(4), not integer. |
| `devredilenKurum` | enum |  | devredilen-kurum |  | Institution the person was transferred from before the SGK merger (s.154-158); 34 codes in the devredilen-kurum registry enum. |
| `provizyonTarihi` | date |  | — |  | Date the provision was requested, dd.mm.yyyy format in the guide (s.156). |
| `provizyonTipi` | enum |  | provizyon-tipi |  | Provision type controlling how SGK covers the admission (s.156-157). |
| `tedaviTuru` | enum |  | tedavi-turu |  | Treatment type of the admission - A/Y/G letter codes (s.158). |
| `tedaviTipi` | enum |  | tedavi-tipi |  | Detailed treatment profile (s.158-159); codes 0-22 (no 3) in the tedavi-tipi registry enum. |
| `takipTipi` | enum |  | takip-tipi |  | Tracking record type (s.157). Linked takips are requested through takipNo, not through this field. |
| `takipNo` | string |  | — |  | Existing tracking number used when requesting a linked takip; empty for first takips (s.157). |
| `istisnaiHal` | string |  | — |  | Exceptional-case code (s.157). Codes 1-9 (1 Acil hal, 2 Is kazasi ile meslek hastaligi, ...). Enum candidate for v0.2. |
| `hastaTelefon` | string |  | — |  | Patient contact phone in 3121234567 format; mandatory on first takips (s.159). Synthetic placeholders only. |
| `hastaAdres` | string |  | — |  | Patient contact address; mandatory on first takips (s.159). Synthetic placeholders only. |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.159). Verification correction - the guide marks this required. |
| `ekdsYontemGerekce` | enum |  | ekds-yontem-gerekce |  | EKDS verification method justification codes; Integer[] in the guide, modeled as an array of ekds-yontem-gerekce codes (s.167, changelog s.13). |
| `doktorTescilNo` | string |  | — |  | Registration number of the admitting doctor. Verification finding - this field does not appear in Tablo 4.1.1.a; kept for PRD 13.4 compatibility and slated for removal in 0.2.0. |

## `RaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporTesisKodu` | integer |  | — |  | Code of the facility that issued the report. Ignored when TakipNoileRaporBilgisiKaydet is used — the facility is resolved from the tracking number (s.268). |
| `raporTarih` | string |  | — |  | Report issue date, "dd.mm.yyyy"; guide note: rapor veriliş tarihi girilmelidir. Parameter name row-wrapped ("tarih") in the guide — aligned with the RaporOkuDVO naming (4.4.3.c). |
| `raporNo` | string |  | — |  | Report number. Parameter name row-wrapped ("no") in the guide — aligned with the RaporOkuDVO naming (4.4.3.c). |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.268). |
| `raporSiraNo` | integer |  | — |  | Report sequence number; Integer here unlike RaporOkuDVO's String raporSiraNo — intra-guide divergence preserved (s.268 vs s.280). |
| `aVakaTKaza` | enum |  | adli-vaka-durumu |  | Legal-case / traffic-accident flag for illness, occupational-disease and work-accident cases (s.268). |

## `RaporCevapDVO`

Domain: `rapor` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporTakipNo` | integer |  | — |  | System-generated unique number of the saved report (s.253). |
| `analikRapor` | object |  | — |  | Populated when the saved report is a maternity incapacity report; shape Tablo 4.4.1.f (AnalikIsgoremezlikRaporDVO) — deferred to G43b. |
| `dogumOncesiCalisabilirRapor` | object |  | — |  | Populated when the saved report is a fit-to-work-before-birth report; shape Tablo 4.4.1.d (DogumOncesiCalisabilirRaporDVO) — deferred to G43b. |
| `dogumRapor` | object |  | — |  | Populated when the saved report is a birth report; shape Tablo 4.4.1.e (DogumRaporDVO) — deferred to G43b. |
| `ilacRapor` | object |  | — |  | Populated when the saved report is a drug report (use or exemption); shape Tablo 4.4.1.h (IlacRaporDVO) — deferred to G43b. |
| `maluliyetRapor` | object |  | — |  | Populated when the saved report is a disability report; shape Tablo 4.4.1.j (MaluliyetRaporDVO) — deferred to G43b. |
| `protezRapor` | object |  | — |  | Populated when the saved report is a prosthesis report; shape Tablo 4.4.1.g (ProtezRaporDVO) — deferred to G43b. |
| `tedaviRapor` | object |  | — |  | Populated when the saved report is a treatment report; shape Tablo 4.4.1.i (TedaviRaporDVO) — deferred to G43b. |
| `isgoremezlikRapor` | object |  | — |  | Populated when the saved report is an incapacity report (work accident, occupational disease or illness); shape Tablo 4.4.1.c (IsgoremezlikRaporDVO) — deferred to G43b. |
| `isgoremezlikRaporEkleri` | array |  | — |  | Incapacity report attachments; item shape Tablo 4.4.1.ee (IsgoremezlikRaporEkDVO) — deferred to G43b. |
| `sonucAciklamasi` | string |  | — |  | Result description; the failure reason is stated here (s.253). |
| `sonucKodu` | integer |  | — |  | Result code; 0 (zero) means success, any other value is an error. Intra-guide divergence: this group is Integer 0-based, unlike the hasta-kabul group's String "0000". |
| `raporTuru` | enum |  | rapor-turu |  | Type of the saved report; Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet. |

## `RaporCevapTCKimlikNodanDVO`

Domain: `rapor` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporlar` | array |  | — |  | Reports found for the citizen; items are RaporCevapDVO (this registry). |
| `sonucAciklamasi` | string |  | — |  | Result description; the failure reason is stated here (s.283). |
| `sonucKodu` | integer |  | — |  | Result code; 0 (zero) means success, any other value is an error (s.283). |

## `RaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporBilgisi` | object |  | — |  | Report key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry). |
| `turu` | enum |  | rapor-turu |  | Report type (s.263-264). |
| `baslangicTarihi` | string |  | — |  | Report start date, "dd.mm.yyyy"; guide: Evet for all reports except prosthesis and fit-to-work-before-birth (s.264). |
| `bitisTarihi` | string |  | — |  | Report end date, "dd.mm.yyyy"; same exception rule (s.264). |
| `duzenlemeTuru` | enum |  | rapor-duzenleme-turu |  | Issuing style (s.264). |
| `hakSahibi` | object |  | — |  | Beneficiary; shape Tablo 4.4.1.s (HakSahibiBilgisiDVO, this registry); NULL when TakipNoileRaporBilgisiKaydet is used — resolved from the tracking number (s.264). |
| `protokolNo` | string |  | — |  | Report protocol number (s.264). |
| `protokolTarihi` | string |  | — |  | Report protocol date, "dd.mm.yyyy" (s.264). |
| `durum` | string |  | — |  | Sent empty; value list contains 1 = Taslak (draft) (s.264). |
| `aciklama` | string |  | — |  | Report description (s.264). |
| `doktorlar` | array |  | — |  | Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry); sent as an array (s.264). |
| `tanilar` | array |  | — |  | Diagnoses; item shape Tablo 4.4.1.u (TaniBilgisiDVO, hizmet-kayit group); NOT sent for drug reports (s.264). |
| `teshisler` | array |  | — |  | Diagnosis details; item shape Tablo 4.4.1.v (TeshisBilgisiDVO) — deferred to G43d; NOT sent for drug reports (s.264). |
| `ilacTeshisler` | array |  | — |  | Drug diagnoses; item shape Tablo 4.4.1.gg (IlacTeshisBilgiDVO, this registry); MANDATORY for drug reports (s.264). |
| `takipNo` | string |  | — |  | GSS-generated tracking number from the admission; filled when TakipNoileRaporBilgisiKaydet is used (s.265). |
| `klinikTani` | string |  | — |  | Clinical diagnosis (s.265; parameter name row-wrapped in the guide). |
| `ozelDurum` | integer |  | — |  | Special-case code; 0 when none. 1 = surgery/botulinum for mobility, 2-3 = 3713-law disability categories (s.265). Full catalogue in Tablo 5.1 OzelDurumVO per the changelog. |

## `RaporEtkinMaddeDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `etkinMaddeKodu` | string |  | — |  | Active-ingredient code (s.277). |
| `kullanimDoz1` | integer |  | — |  | Times per day, e.g. 3 (s.277). |
| `kullanimDoz2` | integer |  | — |  | Dose per intake, e.g. 1 tablet, 100 IU (s.277). |
| `kullanimDozBirim` | enum |  | doz-birimi |  | Dose unit code list (s.277). |
| `kullanimPeriyot` | integer |  | — |  | Usage interval value, e.g. every 7 days (s.277). |
| `kullanimPeriyotBirim` | enum |  | periyot-birimi |  | Usage interval unit (s.278). |

## `RaporGirisDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `ilacRapor` | object |  | — |  | Drug report branch (use or exemption); shape Tablo 4.4.1.h (IlacRaporDVO) — deferred to G43c. All other branches must be NULL when this is filled. |
| `maluliyetRapor` | object |  | — |  | Disability report branch; shape Tablo 4.4.1.j (MaluliyetRaporDVO) — deferred to G43c with the remaining report branches. |
| `tedaviRapor` | object |  | — |  | Treatment report branch; shape Tablo 4.4.1.i (TedaviRaporDVO) — deferred to G43c with the remaining report branches. |
| `isgoremezlikRapor` | object |  | — |  | Incapacity report branch (work accident, occupational disease or illness); shape Tablo 4.4.1.c (IsgoremezlikRaporDVO, this registry). |
| `kullaniciTesisKodu` | integer |  | — |  | Health facility code of the caller (s.253). |

## `RaporOkuDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporTesisKodu` | integer |  | — |  | Code of the facility that issued the report (s.280). |
| `raporNo` | string |  | — |  | Report number (s.280). |
| `raporTarih` | string |  | — |  | Report date, "dd.mm.yyyy" format (s.280). |
| `raporTuru` | enum |  | rapor-turu |  | Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet. |
| `raporSiraNo` | string |  | — |  | Report sequence number (s.280). |

## `RaporOkuRaporTakipNodanDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.281). |
| `kullaniciTesisKodu` | integer |  | — |  | Health facility code of the caller (s.282). |
| `raporSiraNo` | string |  | — |  | Report sequence number (s.282). |

## `RaporOkuTCKimlikNodanDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tckimlikNo` | string |  | — |  | Citizen ID of the report owner. The guide's description column erroneously repeats 'Rapor Takip Numarası'; the parameter name tckimlikNo is authoritative. |
| `raporTuru` | enum |  | rapor-turu |  | Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet. |
| `kullaniciTesisKodu` | integer |  | — |  | Health facility code of the caller (s.282). |

## `RaporSorguDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporBilgisi` | object |  | — |  | Report lookup key object; shape in Tablo 4.4.3.c (RaporOkuDVO, this registry). |
| `kullaniciTesisKodu` | integer |  | — |  | Health facility code of the caller (s.279). |

## `SaglikTesisiAraCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.283) — this group uses the String 0000 pattern. |
| `sonucMesaji` | string |  | — |  | Result description; the failure reason is stated here (s.284). |
| `tesisler` | array |  | — |  | Facilities; item shape Tablo 4.5.1.c (SaglikTesisiListDVO, this registry) (s.284). |

## `SaglikTesisiAraGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the facility calling the method (s.283). |
| `saglikTesisAdi` | string |  | — |  | Searched facility name; partial-letter search supported (s.283). |
| `tesisIlKodu` | string |  | — |  | Province code of the searched facility (s.283). |
| `tesisKodu` | integer |  | — |  | Facility code when known — the remaining fields are then fetched for it; otherwise empty (s.283). |
| `tesisTuru` | string |  | — |  | Facility type code; the type list lives in the FAQ section (s.283). |

## `SaglikTesisiListDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tesisIl` | string |  | — |  | Facility province code (s.284). |
| `tesisAdi` | string |  | — |  | Facility name (s.284). |
| `tesisKodu` | integer |  | — |  | Facility code (s.284). |
| `tesisSinifKodu` | string |  | — |  | Facility class code (s.284). |
| `tesisTuru` | string |  | — |  | Facility type code (s.284). |
| `tesisIlAdi` | string |  | — |  | Facility province name — the guide states length 2 for a NAME column, likely an extraction or guide-table artifact (s.284). |
| `tesisIlceKodu` | string |  | — |  | Facility district code (s.284). |
| `tesisIlceAdi` | string |  | — |  | Facility district name (s.284). |
| `tesisTuruAdi` | string |  | — |  | Facility type name (s.284). |

## `SevkBildirGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number being referred (s.173) |
| `tesisKodu` | integer |  | — |  | GSS-assigned institution code (s.173) |
| `sevkEdilisTarihi` | date |  | — |  | Referral date, dd.mm.yyyy (s.173) |
| `yesilKartSevkEdilenBransKodu` | string |  | — |  | Branch code of the green-card referral target (s.173) |
| `yesilKartSevkEdilenTedaviTipi` | integer |  | — |  | Treatment type of the green-card referral target (s.173) |
| `yesilKartSevkEdilenTakipTipi` | string |  | — |  | Takip type of the green-card referral target (s.173) |

## `SevkBildirSonucDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.173) |
| `sevkEdilisTarihi` | date |  | — |  | Referral date, dd.mm.yyyy (s.173) |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success (s.173) |
| `sonucMesaji` | string |  | — |  | Result explanation (s.173) |

## `SutFiyatDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sutKodu` | string |  | — |  | SUT procedure code (s.298). |
| `adi` | string |  | — |  | SUT code name (s.298). |
| `fiyat` | string |  | — |  | Price at the queried date — the guide types this String despite being a price (s.298). |
| `turu` | enum |  | sut-hizmet-turu |  | Ten-value service-type list (s.298). |
| `gecerlilikTarihi` | string |  | — |  | Validity date (s.298). |

## `TahlilBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19, medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bransKodu` | string |  | — |  | Branch code of the lab test (s.227) |
| `drTescilNo` | string |  | — |  | Registration number of the performing doctor (s.227) |
| `istemYapanDrTescilNo` | string |  | — |  | Registration number of the requesting doctor (s.227) |
| `sutKodu` | string |  | — |  | SUT-defined operation code (s.227) |
| `hizmetSunucuRefNo` | string |  | — |  | Institution reference paired with islemSiraNo (s.227) |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern (s.227) |
| `islemTarihi` | date |  | — |  | Lab test date, dd.mm.yyyy (s.228) |
| `ozelDurum` | string |  | — |  | Special condition code, Tablo 5.1 OzelDurumVO (s.228) |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes (s.228) |
| `raporTakipNo` | string |  | — |  | Report tracking number (s.228) |
| `istemYapanDrBrans` | string |  | — |  | Branch code of the requesting doctor (s.228) |
| `genBilgisi` | array |  | — |  | Gene details, expanded as the GenBilgisiDVO registry entity (Tablo 4.2.1.j.2, s.231) (s.228) |
| `tahlilTipi` | enum |  | tahlil-tipi |  | Lab-type code - codes 0, HEM102-121, IDR102-128, KGAZ01-17, OGTT01-08 in the tahlil-tipi registry enum |
| `birim` | string |  | — |  | Result unit (s.231) |
| `sagSol` | string |  | — |  | R (Sag) / L (Sol) side code (s.231) |
| `ayniFarkliKesi` | enum |  | ayni-farkli-kesi |  | Incision/session relation; codes 1-5 match the ayni-farkli-kesi enum (s.231) |
| `aciklama` | string |  | — |  | Lab description (s.231) |

## `TahlilSonucDVO`

Domain: `hizmet-kayit` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number; null-on-input pattern while registering (s.228) |
| `sonuc` | string |  | — |  | Lab result value; must be +, - or a numeric value (s.228) |

## `TakipAraCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.286). |
| `sonucMesaji` | string |  | — |  | Result description (s.286). |
| `takipler` | array |  | — |  | Tracking records; item shape Tablo 4.1.2.b (TakipDVO, hasta-kabul group) (s.286). |

## `TakipAraGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastaTCK` | string |  | — |  | Patient citizen ID (s.286). |
| `baslangicTarihi` | string |  | — |  | Search-window start, "dd.mm.yyyy" (s.286). |
| `bitisTarihi` | string |  | — |  | Search-window end, "dd.mm.yyyy"; guide note: the window may not exceed one month (s.286). |
| `sevkDurumu` | enum |  | evet-hayir |  | E: referred notifications in the window across all facilities; H: the calling facility's own takips in the window (s.286). |
| `saglikTesisKodu` | integer |  | — |  | Code of the searching facility (s.286). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.286). |

## `TakipBilgisiCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.295). |
| `sonucMesaji` | string |  | — |  | Result description (s.295). |
| `takipBilgisiListDVO` | array |  | — |  | Takips of the given document id; the guide's TYPE column says Integer while the name is TakipBilgisiListDVO[] — extraction artifact, the array-of-DVO reading is authoritative (s.295); item shape Tablo 4.5.8.c (TakipBilgisiListDVO, this registry). |
| `evrakRefNo` | integer |  | — |  | Document reference number (s.295). |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.295). |

## `TakipBilgisiGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `evrakRefNo` | integer |  | — |  | Document reference number (s.295). |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.295). |
| `grupTuru` | enum |  | grup-turu |  | A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.295). |
| `grupKodu` | integer |  | — |  | Group code; values come from the evrakTakipGrupKodlariSorgu method (s.295). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.295). |

## `TakipBilgisiListDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number (s.295). |
| `grupTuru` | string |  | — |  | Ödeme grup türü ADI — the guide returns the group-type NAME here, not the code (s.295). |
| `grupAdi` | string |  | — |  | Ödeme group name (s.295). |
| `toplamTutar` | decimal |  | — |  | Total amount of the takip (s.295). |

## `TakipDVO`

Domain: `hasta-kabul` · Direction: `shared` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipNo` | string |  | — |  | Tracking number identifying this treatment episode; returned for control purposes (s.165). |
| `ilkTakipNo` | string |  | — |  | Number of the first takip when this record is a linked takip produced from another one (s.165). |
| `takipTipi` | enum |  | takip-tipi |  | Tracking record type (s.157, Tablo 4.1.1.a; mirrored in TakipDVO context s.166). |
| `takipDurumu` | enum |  | takip-durumu |  | Payment-inquiry state of the tracking record - 0/1 only (s.166). |
| `hastaBasvuruNo` | string |  | — |  | Patient application number this tracking record belongs to. |
| `bransKodu` | string |  | — |  | Branch code of the service (s.165). Verification correction - String(4) in the guide. |
| `ekdsYontemGerekce` | enum |  | ekds-yontem-gerekce |  | EKDS verification method justification codes; Integer[] in the guide, modeled as an array of ekds-yontem-gerekce codes (s.167, changelog s.13). |

## `TakipFormuAliskanlikDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `aliskanlik` | enum |  | aliskanlik |  | Four-value habit list (s.319). |

## `TakipFormuDiabetEgitimiDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `bireyselEgitimSayisi` | integer |  | — |  | Individual DM education count (s.319). |
| `grupEgitimSayisi` | integer |  | — |  | Group DM education count (s.319). |
| `dmEgitimiAlmisMi` | enum |  | evet-hayir |  | E/H (s.319). |

## `TakipFormuDoktorBilgisiDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `drTescilNo` | string |  | — |  | Physician registration number (s.318). |
| `drBransKodu` | string |  | — |  | Physician branch code (s.318). |
| `dmEgitimiAlmisMi` | enum |  | evet-hayir |  | E/H (s.318). |

## `TakipFormuHastalikDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `hastalikKodu` | enum |  | diabet-hastalik |  | Fifteen-value disease list including 0 = Diğer (s.319). |
| `digerHastalikTaniKodu` | string |  | — |  | Diagnosis code of a disease outside the list; filled when hastalikKodu = 0 (s.319). |

## `TakipFormuKaydetCevapDVO`

Domain: `takip-formu` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `diabetTakipFormu` | object |  | — |  | Saved form; shape Tablo 4.6.1.d (DiabetTakipFormuDVO, this registry) (s.310). |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.310). |
| `sonucMesaji` | string |  | — |  | Result description (s.310). |

## `TakipFormuKaydetGirisDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `diabetTakipFormu` | object |  | — |  | Diabetes follow-up form; shape Tablo 4.6.1.c (DiabetTakipFormuKayitDVO, this registry) (s.310). |
| `kullaniciTesisKodu` | integer |  | — |  | Facility code (s.310). |

## `TakipFormuKullanilanIlaclarDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `barkod` | string |  | — |  | Drug barcode (s.320). |
| `gunlukDoz` | string |  | — |  | Daily dose; units written for insulin (s.320). |

## `TakipFormuOkuCevapDVO`

Domain: `takip-formu` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `diabetTakipFormu` | array |  | — |  | Saved forms; item shape Tablo 4.6.1.d (DiabetTakipFormuDVO, this registry) (s.320). |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.320). |
| `sonucMesaji` | string |  | — |  | Result description (s.320). |

## `TakipFormuOkuGirisDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tcKimlikNo` | string |  | — |  | Patient citizen ID (s.320). |
| `saglikTesisKodu` | integer |  | — |  | Facility code (s.320). |

## `TakipFormuSilCevapDVO`

Domain: `takip-formu` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.321). |
| `sonucMesaji` | string |  | — |  | Result description (s.321). |

## `TakipFormuSilGirisDVO`

Domain: `takip-formu` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `takipFormuNo` | string |  | — |  | Follow-up form number (s.321). |
| `saglikTesisKodu` | integer |  | — |  | Facility code (s.321). |

## `TakipIslemKesintiDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Service procedure sequence number (s.292). |
| `hizmetSunucuRefNo` | string |  | — |  | Service-provider reference number (s.292). |
| `islemTarihi` | date |  | — |  | Date the service was performed (s.292). |
| `sutKodu` | string |  | — |  | SUT procedure code (s.293). |
| `islemAdi` | string |  | — |  | Name of the SUT code (s.293). |
| `tutar` | decimal |  | — |  | Amount of the SUT-coded procedure (s.293). |
| `kesintiTutari` | decimal |  | — |  | Deduction amount applied by the reviewer (s.293). |
| `aciklama` | string |  | — |  | Reviewer's deduction remark (s.293). |

## `TakipOkuGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code assigned by GSS (s.164). |
| `takipNo` | string |  | — |  | Tracking number to be read (s.164-165). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.165). |

## `TakipSilCevapDVO`

Domain: `hasta-kabul` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; 0000 means success, any other value is an error (s.168). |
| `sonucMesaji` | string |  | — |  | Result explanation; the error cause is reported here (s.168). |
| `takipNo` | string |  | — |  | Cancelled tracking number returned for control (s.168). |

## `TakipSilGirisDVO`

Domain: `hasta-kabul` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Healthcare facility code of the cancelling institution (s.168). Only the institution's own takips can be cancelled. |
| `takipNo` | string |  | — |  | Tracking number to be cancelled (s.168). |
| `ktsHbysKodu` | string |  | — |  | Software vendor KTS code (s.168). |

## `TaniAraCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.304). |
| `sonucMesaji` | string |  | — |  | Result description (s.304). |
| `tanilar` | array |  | — |  | Diagnosis list; item shape Tablo 4.5.16.c (TaniListDVO, this registry) (s.304). |

## `TaniAraGirisWSDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.304). |
| `icd10Kodu` | string |  | — |  | Diagnosis code to query; partial prefixes allowed, e.g. "A", "A0" (s.304). |

## `TaniBilgisiDVO`

Domain: `hizmet-kayit` · Direction: `shared` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `islemSiraNo` | string |  | — |  | Sequence number of the registered service; send null while registering, Medula fills and returns it (s.232). |
| `birincilTani` | string |  | — |  | Primary diagnosis flag taking E (Evet) or H (Hayir) (s.232). |
| `hizmetSunucuRefNo` | string |  | — |  | Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.232). Synthetic placeholders in examples. |
| `taniKodu` | string |  | — |  | ICD-10 diagnosis code; belongs to the ICD-10-WHO code system (s.232). |
| `taniTipi` | enum |  | tani-tipi |  | Diagnosis type - 1 On tani, 2 Kesin tani, 3 Ayirici tani (s.232). |
| `ozelDurum` | string |  | — |  | Special condition code; see guide Tablo 5.1 OzelDurumVO (s.232). |
| `cokluOzelDurum` | array |  | — |  | Multiple special-condition codes, valid alongside ozelDurum (s.232). |

## `TaniListDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `icd10Kodu` | string |  | — |  | ICD-10 code (s.304). |
| `taniAdi` | string |  | — |  | Diagnosis name (s.304). |

## `TedaviIslemBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `diyalizRaporBilgisi` | object |  | — |  | Populated when the treatment type is dialysis; shape Tablo 4.4.1.w (DiyalizRaporBilgisiDVO) — deferred to G43d. |
| `eswlRaporBilgisi` | object |  | — |  | Populated for ESWL; shape Tablo 4.4.1.x (ESWLRaporBilgisiDVO) — deferred to G43d. |
| `eswtRaporBilgisi` | object |  | — |  | Populated for ESWT; shape Tablo 4.4.1.y (ESWTRaporBilgisiDVO) — deferred to G43d. |
| `ftrRaporBilgisi` | object |  | — |  | Populated for physical therapy; shape Tablo 4.4.1.z (FTRRaporBilgisiDVO) — deferred to G43d. |
| `hotRaporBilgisi` | object |  | — |  | Populated for hyperbaric oxygen; shape Tablo 4.4.1.aa (HOTRaporBilgisiDVO) — deferred to G43d. |
| `tupBebekRaporBilgisi` | object |  | — |  | Populated for IVF; shape Tablo 4.4.1.bb (TupBebekRaporBilgisiDVO) — deferred to G43d. |
| `evHemodiyaliziRaporBilgisi` | object |  | — |  | Populated for home haemodialysis; shape Tablo 4.4.1.hh (EvHemodiyaliziRaporBilgisiDVO) — deferred to G43d. The guide's reference column says 4.4.1.bb, a cross-reference typo (4.4.1.hh is the home-haemodialysis table, s.278). |
| `pulmonerRaporBilgisi` | object |  | — |  | Populated for pulmonary rehabilitation; shape Tablo 4.4.1.ii (PulmonerRaporBilgisiDVO) — deferred to G43d. |

## `TedaviRaporDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `raporDVO` | object |  | — |  | Report core; shape Tablo 4.4.1.k (RaporDVO, this registry). |
| `islemler` | array |  | — |  | Treatment procedures; only the object matching tedaviRaporTuru is populated, the rest NULL; item shape Tablo 4.4.1.o (TedaviIslemBilgisiDVO, this registry) (s.262). |
| `tedaviRaporTuru` | enum |  | tedavi-rapor-turu |  | Nine-value treatment type list (s.262). |

## `TeshisBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `baslangicTarihi` | string |  | — |  | Report start date, "dd.mm.yyyy" (s.273). |
| `bitisTarihi` | string |  | — |  | Report end date, "dd.mm.yyyy" (s.273). |
| `teshisKodu` | integer |  | — |  | Report diagnosis code (s.273). |

## `TesisYatakBilgiDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `yatakKodu` | string |  | — |  | Bed code (s.300). |
| `turu` | enum |  | yatak-turu |  | Adult / neonatal / palliative (s.300). |
| `tescilTuru` | enum |  | tescil-turu |  | Registration state (s.300). |
| `seviye` | enum |  | yatak-seviyesi |  | Intensive-care level (s.301). |
| `gecerlilikBaslangicTarihi` | string |  | — |  | Validity start date (s.301). |
| `gecerlilikBitisTarihi` | string |  | — |  | Validity end date (s.301). |

## `TesisYatakSorguCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.300). |
| `sonucMesaji` | string |  | — |  | Result description (s.300). |
| `yataklar` | array |  | — |  | Bed list; item shape Tablo 4.5.13.c (TesisYatakBilgiDVO, this registry) (s.300). |

## `TesisYatakSorguGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.300). |
| `tarih` | string |  | — |  | Empty returns the whole bed list; filled returns the beds valid on that date (s.300). |

## `TupBebekRaporBilgisiDVO`

Domain: `rapor` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `tupBebekRaporTuru` | enum |  | tup-bebek-turu |  | Disease-treatment vs other IVF procedures (s.276). |
| `butKodu` | string |  | — |  | SUT procedure code (s.276). |

## `YurtDisiYardimHakkiGetirCevapDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `sonucKodu` | string |  | — |  | Result code; "0000" means success (s.296). |
| `sonucMesaji` | string |  | — |  | Result description (s.296). |
| `yurtDisiDetay` | array |  | — |  | Entitlement verification list; item shape Tablo 4.5.10.c (YurtDisiYardimHakkiGetirCevapDetayDVO, this registry) (s.296). |

## `YurtDisiYardimHakkiGetirCevapDetayDVO`

Domain: `yardimci-islemler` · Direction: `output` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `id` | integer |  | — |  | Entitlement id to be used at patient admission (s.297). |
| `kisiNo` | string |  | — |  | Person's YUPASS number (s.297). |
| `adi` | string |  | — |  | First name (s.297). |
| `soyadi` | string |  | — |  | Last name (s.297). |
| `formulAdi` | string |  | — |  | Formula name (s.297). |
| `odemeTuru` | string |  | — |  | Payment type (s.297). |
| `tedaviKapsami` | string |  | — |  | Treatment coverage (s.297). |
| `sorguTarihi` | string |  | — |  | Date of the query (s.297). |
| `aciklama` | string |  | — |  | Remark; the guide's description column carries only the label (s.297). |

## `YurtDisiYardimHakkiGetirGirisDVO`

Domain: `yardimci-islemler` · Direction: `input` · Status: `reviewed` · Source refs: medula-hastane-guide-3-1-1-2026-10-19

| Field | Type | Required | Enum ref | Sensitive | Description |
| --- | --- | --- | --- | --- | --- |
| `kisiNo` | string |  | — |  | Abroad person number (s.296). |
| `provizyonTarihi` | string |  | — |  | Operation date (s.296; no format given). |
| `saglikTesisKodu` | integer |  | — |  | Code of the calling facility (s.296). |

