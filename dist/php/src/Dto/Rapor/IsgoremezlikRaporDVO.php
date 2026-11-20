<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\DevamDurumu;
use ClaimBridge\Medula\Enum\IsgoremezlikRaporTuru;
use ClaimBridge\Medula\Enum\OlumDurumu;
use ClaimBridge\Medula\Enum\RaporDuzenlemeTuru;
use ClaimBridge\Medula\Enum\YatisDevamDurumu;

/**
 * IsgoremezlikRaporDVO — guideVersion 3.1.1, page 254 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IsgoremezlikRaporDVO
{
    public function __construct(
    /** Report registry key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry). */
    public readonly array $raporBilgisi = [],
    /** Incapacity report branch selector (s.254). */
    public readonly ?IsgoremezlikRaporTuru $isGoremezlikRaporTuru = null,
    /** Branch code (s.254). */
    public readonly ?string $bransKodu = null,
    /** Report protocol number (s.254). */
    public readonly ?string $protokolNo = null,
    /** Report protocol date, "dd.mm.yyyy" (s.254). */
    public readonly ?string $protokolTarihi = null,
    /** Issuing style (s.255). */
    public readonly ?RaporDuzenlemeTuru $duzenlemeTuru = null,
    /** Diagnosis; an ICD-10 code must be used (s.255). */
    public readonly ?string $teshis = null,
    /** Branch opinion (s.255). */
    public readonly ?string $aciklama = null,
    /** Health-board report date (s.255; parameter name row-wrapped in the guide). */
    public readonly ?string $saglikKuruluRaporTarihi = null,
    /** Alive/deceased selector (s.255). */
    public readonly ?OlumDurumu $olum = null,
    /** MEDULA tracking number of the initial report when this report is a continuation (s.255). */
    public readonly ?int $ilkRaporTakipNo = null,
    /** Work-accident detail; shape Tablo 4.4.1.d (IsKazasiRaporDVO, this registry). */
    public readonly array $isKazasiRaporu = [],
    /** Occupational-disease detail; shape Tablo 4.4.1.e (MeslekHastaligiRaporDVO) — deferred to G43c with the remaining report branches. */
    public readonly array $meslekHastaligiRaporu = [],
    /** Maternity detail; shape Tablo 4.4.1.f (AnalikRaporDVO) — deferred to G43c with the remaining report branches. */
    public readonly array $analikRaporu = [],
    /** Nursing detail; shape Tablo 4.4.1.g (EmzirmeRaporDVO) — deferred to G43c with the remaining report branches. */
    public readonly array $emzirmeRaporu = [],
    /** Illness detail; shape Tablo 4.4.1.j (HastalikRaporDVO) — deferred to G43c with the remaining report branches. */
    public readonly array $hastalikRaporu = [],
    /** Clinical findings (s.255). */
    public readonly ?string $klinikBulgular = null,
    /** Radiology/laboratory findings (s.255; no length given). */
    public readonly ?string $ronLabBilgileri = null,
    /** Board decision (s.255). */
    public readonly ?string $karar = null,
    /** Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry); sent as an array (s.255). */
    public readonly array $doktorlar = [],
    /** Chief-physician approval state (s.255; no code list given). */
    public readonly ?int $bashekimOnayDurumu = null,
    /** Chief-physician citizen ID (s.255). */
    public readonly ?string $bashekimTCNo = null,
    /** Beneficiary; shape Tablo 4.4.1.s (HakSahibiBilgisiDVO, this registry). */
    public readonly array $hakSahibi = [],
    /** Continuation selector from the pre-selection answer (s.256). */
    public readonly ?DevamDurumu $devammi = null,
    /** Hospitalization state (s.256). */
    public readonly ?YatisDevamDurumu $yatisDevam = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporBilgisi"]) && is_array($data["raporBilgisi"]) ? $data["raporBilgisi"] : [],
        isset($data["isGoremezlikRaporTuru"]) ? IsgoremezlikRaporTuru::tryFrom((string) $data["isGoremezlikRaporTuru"]) : null,
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["protokolTarihi"]) && is_scalar($data["protokolTarihi"]) ? (string) $data["protokolTarihi"] : null,
        isset($data["duzenlemeTuru"]) ? RaporDuzenlemeTuru::tryFrom((string) $data["duzenlemeTuru"]) : null,
        isset($data["teshis"]) && is_scalar($data["teshis"]) ? (string) $data["teshis"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["saglikKuruluRaporTarihi"]) && is_scalar($data["saglikKuruluRaporTarihi"]) ? (string) $data["saglikKuruluRaporTarihi"] : null,
        isset($data["olum"]) ? OlumDurumu::tryFrom((string) $data["olum"]) : null,
        isset($data["ilkRaporTakipNo"]) && is_numeric($data["ilkRaporTakipNo"]) ? (int) $data["ilkRaporTakipNo"] : null,
        isset($data["isKazasiRaporu"]) && is_array($data["isKazasiRaporu"]) ? $data["isKazasiRaporu"] : [],
        isset($data["meslekHastaligiRaporu"]) && is_array($data["meslekHastaligiRaporu"]) ? $data["meslekHastaligiRaporu"] : [],
        isset($data["analikRaporu"]) && is_array($data["analikRaporu"]) ? $data["analikRaporu"] : [],
        isset($data["emzirmeRaporu"]) && is_array($data["emzirmeRaporu"]) ? $data["emzirmeRaporu"] : [],
        isset($data["hastalikRaporu"]) && is_array($data["hastalikRaporu"]) ? $data["hastalikRaporu"] : [],
        isset($data["klinikBulgular"]) && is_scalar($data["klinikBulgular"]) ? (string) $data["klinikBulgular"] : null,
        isset($data["ronLabBilgileri"]) && is_scalar($data["ronLabBilgileri"]) ? (string) $data["ronLabBilgileri"] : null,
        isset($data["karar"]) && is_scalar($data["karar"]) ? (string) $data["karar"] : null,
        isset($data["doktorlar"]) && is_array($data["doktorlar"]) ? $data["doktorlar"] : [],
        isset($data["bashekimOnayDurumu"]) && is_numeric($data["bashekimOnayDurumu"]) ? (int) $data["bashekimOnayDurumu"] : null,
        isset($data["bashekimTCNo"]) && is_scalar($data["bashekimTCNo"]) ? (string) $data["bashekimTCNo"] : null,
        isset($data["hakSahibi"]) && is_array($data["hakSahibi"]) ? $data["hakSahibi"] : [],
        isset($data["devammi"]) ? DevamDurumu::tryFrom((string) $data["devammi"]) : null,
        isset($data["yatisDevam"]) ? YatisDevamDurumu::tryFrom((string) $data["yatisDevam"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporBilgisi,
        $isGoremezlikRaporTuru !== null ? $isGoremezlikRaporTuru->value : null,
        $bransKodu,
        $protokolNo,
        $protokolTarihi,
        $duzenlemeTuru !== null ? $duzenlemeTuru->value : null,
        $teshis,
        $aciklama,
        $saglikKuruluRaporTarihi,
        $olum !== null ? $olum->value : null,
        $ilkRaporTakipNo,
        $isKazasiRaporu,
        $meslekHastaligiRaporu,
        $analikRaporu,
        $emzirmeRaporu,
        $hastalikRaporu,
        $klinikBulgular,
        $ronLabBilgileri,
        $karar,
        $doktorlar,
        $bashekimOnayDurumu,
        $bashekimTCNo,
        $hakSahibi,
        $devammi !== null ? $devammi->value : null,
        $yatisDevam !== null ? $yatisDevam->value : null,
        ];
    }
}
