<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;

use ClaimBridge\Medula\Enum\AkutKomplikasyon;
use ClaimBridge\Medula\Enum\AntiGad;
use ClaimBridge\Medula\Enum\BasvuruNedeni;
use ClaimBridge\Medula\Enum\Cinsiyet;
use ClaimBridge\Medula\Enum\EgzersizDurumu;
use ClaimBridge\Medula\Enum\EkgDurumu;
use ClaimBridge\Medula\Enum\GozMuayenesi;
use ClaimBridge\Medula\Enum\IkametTuru;
use ClaimBridge\Medula\Enum\TbtDurumu;
use ClaimBridge\Medula\Enum\VarYokBilinmiyor;

/**
 * DiabetTakipFormuKayitDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DiabetTakipFormuKayitDVO
{
    public function __construct(
    /** Patient citizen ID (s.311). */
    public readonly ?string $tcKimlikNo = null,
    /** Patient first name (s.311). */
    public readonly ?string $ad = null,
    /** Patient last name (s.311). */
    public readonly ?string $soyad = null,
    /** Mobile number, e.g. 5xxxxxxxxx (s.311). */
    public readonly ?string $cepTel = null,
    /** Protocol number (s.311). */
    public readonly ?string $protokolNo = null,
    /** Visit date, "dd.mm.yyyy" (s.311). */
    public readonly ?string $vizitTarihi = null,
    /** Facility code; the guide spells this parameter saglikTesisiKodu (extra i) unlike saglikTesisKodu elsewhere — preserved verbatim (s.311). */
    public readonly ?int $saglikTesisiKodu = null,
    /** E = Erkek, K = Kadın (s.311). */
    public readonly ?Cinsiyet $cinsiyet = null,
    /** Six-value residence list (s.311). */
    public readonly ?IkametTuru $ikametTuru = null,
    /** Physicians; item shape Tablo 4.6.1.e (TakipFormuDoktorBilgisiDVO, this registry) (s.311). */
    public readonly array $doktorBilgileri = [],
    /** Diagnosis ICD-10 code (s.311). */
    public readonly ?string $tani = null,
    /** First date the patient received the diagnosis (s.311). */
    public readonly ?string $taniTarihi = null,
    /** Diabetes education; shape Tablo 4.6.1.f (TakipFormuDiabetEgitimiDVO, this registry) (s.311). */
    public readonly array $diabetEgitimi = [],
    /** Six-value medical-nutrition adherence list (s.311). */
    public readonly ?TbtDurumu $tibbiBeslenmeTedavisi = null,
    /** Seven-value exercise adherence list (s.311-312). */
    public readonly ?EgzersizDurumu $egzersiz = null,
    /** Diseases besides DM; item shape Tablo 4.6.1.g (TakipFormuHastalikDVO, this registry) (s.312). */
    public readonly array $hastaliklar = [],
    /** Six-value admission-reason list (s.312). */
    public readonly ?BasvuruNedeni $basvuruNedeni = null,
    /** Habits; item shape Tablo 4.6.1.h (TakipFormuAliskanlikDVO, this registry) (s.312). */
    public readonly array $aliskanliklar = [],
    /** Glucometer presence (s.312). */
    public readonly ?VarYokBilinmiyor $glukoMetre = null,
    /** Daily blood-sugar measurement count (s.312). */
    public readonly ?int $kanSekeriTakipSayisi = null,
    /** Medications; item shape Tablo 4.6.1.i (TakipFormuKullanilanIlaclarDVO, this registry) (s.312). */
    public readonly array $kullanilanIlaclar = [],
    /** Systolic blood pressure; the guide's required column is empty in the extraction (s.312). */
    public readonly ?int $sistolikKanBasinci = null,
    /** Diastolic blood pressure; required column empty in the extraction (s.312). */
    public readonly ?int $diyastolikKanBasinci = null,
    /** Height (s.312). */
    public readonly ?float $boy = null,
    /** Weight (s.312). */
    public readonly ?float $kilo = null,
    /** Body-mass index, e.g. 22.3 (s.312). */
    public readonly ?float $vki = null,
    /** Fasting blood sugar; 0 when unknown (s.313). */
    public readonly ?float $apg = null,
    /** Postprandial blood sugar; 0 when unknown (s.313). */
    public readonly ?float $tpg = null,
    /** HbA1c; 0 when unknown (s.313). */
    public readonly ?float $hbA1c = null,
    /** Creatinine; 0 when unknown (s.313). */
    public readonly ?float $kreatinin = null,
    /** Triglyceride; 0 when unknown (s.313). */
    public readonly ?float $trigliserid = null,
    /** LDL cholesterol; 0 when unknown (s.313). */
    public readonly ?float $ldlKol = null,
    /** HDL cholesterol; 0 when unknown (s.313). */
    public readonly ?float $hdlKol = null,
    /** ALT; 0 when unknown (s.313). */
    public readonly ?float $alt = null,
    /** P/N/B result (s.313). */
    public readonly ?AntiGad $antiGAD = null,
    /** Three-value ECG state (s.313). */
    public readonly ?EkgDurumu $ekg = null,
    /** V/Y/B (s.313). */
    public readonly ?VarYokBilinmiyor $mikroalbuminuri = null,
    /** Seven-value eye-examination state (s.313). */
    public readonly ?GozMuayenesi $gozMuayenesi = null,
    /** V/Y/B (s.313). */
    public readonly ?VarYokBilinmiyor $periferikSensoryalNoropati = null,
    /** V/Y/B; the guide's required column is empty in the extraction (s.314). */
    public readonly ?VarYokBilinmiyor $koronerArterH = null,
    /** V/Y/B (s.314). */
    public readonly ?VarYokBilinmiyor $serebrovaskulerH = null,
    /** V = diabetik ülser var, Y = yok, B = bilinmiyor (s.314). */
    public readonly ?VarYokBilinmiyor $ayakMuayenesi = null,
    /** Four-value complication list (s.314). */
    public readonly ?AkutKomplikasyon $akutKomplikasyon = null,
    /** Hospitalization day count of the visit (s.314). */
    public readonly ?int $yatisGun = null,
    /** Pump presence; the guide's parameter name carries the Turkish capital İ (İnsulinPompasi) — preserved verbatim (s.314). */
    public readonly ?VarYokBilinmiyor $insulinPompasi = null,
    /** Pump start date, "dd.mm.yyyy"; filled when a pump exists (s.314). */
    public readonly ?string $insulinPompasiVerTarihi = null,
    /** Pump change date; filled when a pump exists (s.314). */
    public readonly ?string $insulinPompasiDegTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcKimlikNo"]) && is_scalar($data["tcKimlikNo"]) ? (string) $data["tcKimlikNo"] : null,
        isset($data["ad"]) && is_scalar($data["ad"]) ? (string) $data["ad"] : null,
        isset($data["soyad"]) && is_scalar($data["soyad"]) ? (string) $data["soyad"] : null,
        isset($data["cepTel"]) && is_scalar($data["cepTel"]) ? (string) $data["cepTel"] : null,
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["vizitTarihi"]) && is_scalar($data["vizitTarihi"]) ? (string) $data["vizitTarihi"] : null,
        isset($data["saglikTesisiKodu"]) && is_numeric($data["saglikTesisiKodu"]) ? (int) $data["saglikTesisiKodu"] : null,
        isset($data["cinsiyet"]) ? Cinsiyet::tryFrom((string) $data["cinsiyet"]) : null,
        isset($data["ikametTuru"]) ? IkametTuru::tryFrom((string) $data["ikametTuru"]) : null,
        isset($data["doktorBilgileri"]) && is_array($data["doktorBilgileri"]) ? $data["doktorBilgileri"] : [],
        isset($data["tani"]) && is_scalar($data["tani"]) ? (string) $data["tani"] : null,
        isset($data["taniTarihi"]) && is_scalar($data["taniTarihi"]) ? (string) $data["taniTarihi"] : null,
        isset($data["diabetEgitimi"]) && is_array($data["diabetEgitimi"]) ? $data["diabetEgitimi"] : [],
        isset($data["tibbiBeslenmeTedavisi"]) ? TbtDurumu::tryFrom((string) $data["tibbiBeslenmeTedavisi"]) : null,
        isset($data["egzersiz"]) ? EgzersizDurumu::tryFrom((string) $data["egzersiz"]) : null,
        isset($data["hastaliklar"]) && is_array($data["hastaliklar"]) ? $data["hastaliklar"] : [],
        isset($data["basvuruNedeni"]) ? BasvuruNedeni::tryFrom((string) $data["basvuruNedeni"]) : null,
        isset($data["aliskanliklar"]) && is_array($data["aliskanliklar"]) ? $data["aliskanliklar"] : [],
        isset($data["glukoMetre"]) ? VarYokBilinmiyor::tryFrom((string) $data["glukoMetre"]) : null,
        isset($data["kanSekeriTakipSayisi"]) && is_numeric($data["kanSekeriTakipSayisi"]) ? (int) $data["kanSekeriTakipSayisi"] : null,
        isset($data["kullanilanIlaclar"]) && is_array($data["kullanilanIlaclar"]) ? $data["kullanilanIlaclar"] : [],
        isset($data["sistolikKanBasinci"]) && is_numeric($data["sistolikKanBasinci"]) ? (int) $data["sistolikKanBasinci"] : null,
        isset($data["diyastolikKanBasinci"]) && is_numeric($data["diyastolikKanBasinci"]) ? (int) $data["diyastolikKanBasinci"] : null,
        isset($data["boy"]) && is_numeric($data["boy"]) ? (float) $data["boy"] : null,
        isset($data["kilo"]) && is_numeric($data["kilo"]) ? (float) $data["kilo"] : null,
        isset($data["vki"]) && is_numeric($data["vki"]) ? (float) $data["vki"] : null,
        isset($data["apg"]) && is_numeric($data["apg"]) ? (float) $data["apg"] : null,
        isset($data["tpg"]) && is_numeric($data["tpg"]) ? (float) $data["tpg"] : null,
        isset($data["hbA1c"]) && is_numeric($data["hbA1c"]) ? (float) $data["hbA1c"] : null,
        isset($data["kreatinin"]) && is_numeric($data["kreatinin"]) ? (float) $data["kreatinin"] : null,
        isset($data["trigliserid"]) && is_numeric($data["trigliserid"]) ? (float) $data["trigliserid"] : null,
        isset($data["ldlKol"]) && is_numeric($data["ldlKol"]) ? (float) $data["ldlKol"] : null,
        isset($data["hdlKol"]) && is_numeric($data["hdlKol"]) ? (float) $data["hdlKol"] : null,
        isset($data["alt"]) && is_numeric($data["alt"]) ? (float) $data["alt"] : null,
        isset($data["antiGAD"]) ? AntiGad::tryFrom((string) $data["antiGAD"]) : null,
        isset($data["ekg"]) ? EkgDurumu::tryFrom((string) $data["ekg"]) : null,
        isset($data["mikroalbuminuri"]) ? VarYokBilinmiyor::tryFrom((string) $data["mikroalbuminuri"]) : null,
        isset($data["gozMuayenesi"]) ? GozMuayenesi::tryFrom((string) $data["gozMuayenesi"]) : null,
        isset($data["periferikSensoryalNoropati"]) ? VarYokBilinmiyor::tryFrom((string) $data["periferikSensoryalNoropati"]) : null,
        isset($data["koronerArterH"]) ? VarYokBilinmiyor::tryFrom((string) $data["koronerArterH"]) : null,
        isset($data["serebrovaskulerH"]) ? VarYokBilinmiyor::tryFrom((string) $data["serebrovaskulerH"]) : null,
        isset($data["ayakMuayenesi"]) ? VarYokBilinmiyor::tryFrom((string) $data["ayakMuayenesi"]) : null,
        isset($data["akutKomplikasyon"]) ? AkutKomplikasyon::tryFrom((string) $data["akutKomplikasyon"]) : null,
        isset($data["yatisGun"]) && is_numeric($data["yatisGun"]) ? (int) $data["yatisGun"] : null,
        isset($data["insulinPompasi"]) ? VarYokBilinmiyor::tryFrom((string) $data["insulinPompasi"]) : null,
        isset($data["insulinPompasiVerTarihi"]) && is_scalar($data["insulinPompasiVerTarihi"]) ? (string) $data["insulinPompasiVerTarihi"] : null,
        isset($data["insulinPompasiDegTarihi"]) && is_scalar($data["insulinPompasiDegTarihi"]) ? (string) $data["insulinPompasiDegTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "tcKimlikNo" => $tcKimlikNo,
        "ad" => $ad,
        "soyad" => $soyad,
        "cepTel" => $cepTel,
        "protokolNo" => $protokolNo,
        "vizitTarihi" => $vizitTarihi,
        "saglikTesisiKodu" => $saglikTesisiKodu,
        "cinsiyet" => $cinsiyet !== null ? $cinsiyet->value : null,
        "ikametTuru" => $ikametTuru !== null ? $ikametTuru->value : null,
        "doktorBilgileri" => $doktorBilgileri,
        "tani" => $tani,
        "taniTarihi" => $taniTarihi,
        "diabetEgitimi" => $diabetEgitimi,
        "tibbiBeslenmeTedavisi" => $tibbiBeslenmeTedavisi !== null ? $tibbiBeslenmeTedavisi->value : null,
        "egzersiz" => $egzersiz !== null ? $egzersiz->value : null,
        "hastaliklar" => $hastaliklar,
        "basvuruNedeni" => $basvuruNedeni !== null ? $basvuruNedeni->value : null,
        "aliskanliklar" => $aliskanliklar,
        "glukoMetre" => $glukoMetre !== null ? $glukoMetre->value : null,
        "kanSekeriTakipSayisi" => $kanSekeriTakipSayisi,
        "kullanilanIlaclar" => $kullanilanIlaclar,
        "sistolikKanBasinci" => $sistolikKanBasinci,
        "diyastolikKanBasinci" => $diyastolikKanBasinci,
        "boy" => $boy,
        "kilo" => $kilo,
        "vki" => $vki,
        "apg" => $apg,
        "tpg" => $tpg,
        "hbA1c" => $hbA1c,
        "kreatinin" => $kreatinin,
        "trigliserid" => $trigliserid,
        "ldlKol" => $ldlKol,
        "hdlKol" => $hdlKol,
        "alt" => $alt,
        "antiGAD" => $antiGAD !== null ? $antiGAD->value : null,
        "ekg" => $ekg !== null ? $ekg->value : null,
        "mikroalbuminuri" => $mikroalbuminuri !== null ? $mikroalbuminuri->value : null,
        "gozMuayenesi" => $gozMuayenesi !== null ? $gozMuayenesi->value : null,
        "periferikSensoryalNoropati" => $periferikSensoryalNoropati !== null ? $periferikSensoryalNoropati->value : null,
        "koronerArterH" => $koronerArterH !== null ? $koronerArterH->value : null,
        "serebrovaskulerH" => $serebrovaskulerH !== null ? $serebrovaskulerH->value : null,
        "ayakMuayenesi" => $ayakMuayenesi !== null ? $ayakMuayenesi->value : null,
        "akutKomplikasyon" => $akutKomplikasyon !== null ? $akutKomplikasyon->value : null,
        "yatisGun" => $yatisGun,
        "insulinPompasi" => $insulinPompasi !== null ? $insulinPompasi->value : null,
        "insulinPompasiVerTarihi" => $insulinPompasiVerTarihi,
        "insulinPompasiDegTarihi" => $insulinPompasiDegTarihi,
        ];
    }
}
