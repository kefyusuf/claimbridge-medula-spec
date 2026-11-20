<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\BasvuruSekli;
use ClaimBridge\Medula\Enum\MaluliyetRaporTuru;
use ClaimBridge\Medula\Enum\SevkNedeni;

/**
 * MaluliyetRaporDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MaluliyetRaporDVO
{
    public function __construct(
    /** System-generated tracking number (s.330). */
    public readonly ?string $raporTakipNo = null,
    /** Patient citizen ID (s.331). */
    public readonly ?string $tckimlikNo = null,
    /** Patient ID photograph as a byte array (s.331). */
    public readonly array $fotograf = [],
    /** Facility code (s.331). */
    public readonly ?int $tesisKodu = null,
    /** Tracking number (s.331). */
    public readonly ?string $takipNo = null,
    /** "dd.MM.yyyy" report date (s.331). */
    public readonly ?string $raporTarihi = null,
    /** Maluliyet / occupational disease / work accident (s.331). */
    public readonly ?MaluliyetRaporTuru $maluliyetRaporTuru = null,
    /** Report number (s.331). */
    public readonly ?string $raporNo = null,
    /** "dd.MM.yyyy" referral date (s.331). */
    public readonly ?string $sevkTarihi = null,
    /** Three-value referral reason (s.331). */
    public readonly ?SevkNedeni $sevkNedeni = null,
    /** Institution or personal application (s.331). */
    public readonly ?BasvuruSekli $basvuruSekli = null,
    /** Report approval state; no code list given (s.331). */
    public readonly ?int $durum = null,
    /** Board-head physician registration number (s.331). */
    public readonly ?string $kurulBaskaniDrTescilNo = null,
    /** Description (s.331). */
    public readonly ?string $aciklama = null,
    /** Decision (s.331). */
    public readonly ?string $karar = null,
    /** Department opinions; item shape Tablo 4.9.1.d (MaluliyetBransGorusBilgisiDVO, this registry) (s.331). */
    public readonly array $bransGorusler = [],
    /** Board members; item shape Tablo 4.9.1.f (ImzaliDoktorBilgisiDVO, this registry) (s.331). */
    public readonly array $uyeler = [],
    /** Physicians pending approval; item shape ImzaliDoktorBilgisiDVO (s.331). */
    public readonly array $onayBekleyenDoktorlar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["tckimlikNo"]) && is_scalar($data["tckimlikNo"]) ? (string) $data["tckimlikNo"] : null,
        isset($data["fotograf"]) && is_array($data["fotograf"]) ? $data["fotograf"] : [],
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["raporTarihi"]) && is_scalar($data["raporTarihi"]) ? (string) $data["raporTarihi"] : null,
        isset($data["maluliyetRaporTuru"]) ? MaluliyetRaporTuru::tryFrom((string) $data["maluliyetRaporTuru"]) : null,
        isset($data["raporNo"]) && is_scalar($data["raporNo"]) ? (string) $data["raporNo"] : null,
        isset($data["sevkTarihi"]) && is_scalar($data["sevkTarihi"]) ? (string) $data["sevkTarihi"] : null,
        isset($data["sevkNedeni"]) ? SevkNedeni::tryFrom((string) $data["sevkNedeni"]) : null,
        isset($data["basvuruSekli"]) ? BasvuruSekli::tryFrom((string) $data["basvuruSekli"]) : null,
        isset($data["durum"]) && is_numeric($data["durum"]) ? (int) $data["durum"] : null,
        isset($data["kurulBaskaniDrTescilNo"]) && is_scalar($data["kurulBaskaniDrTescilNo"]) ? (string) $data["kurulBaskaniDrTescilNo"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["karar"]) && is_scalar($data["karar"]) ? (string) $data["karar"] : null,
        isset($data["bransGorusler"]) && is_array($data["bransGorusler"]) ? $data["bransGorusler"] : [],
        isset($data["uyeler"]) && is_array($data["uyeler"]) ? $data["uyeler"] : [],
        isset($data["onayBekleyenDoktorlar"]) && is_array($data["onayBekleyenDoktorlar"]) ? $data["onayBekleyenDoktorlar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporTakipNo,
        $tckimlikNo,
        $fotograf,
        $tesisKodu,
        $takipNo,
        $raporTarihi,
        $maluliyetRaporTuru !== null ? $maluliyetRaporTuru->value : null,
        $raporNo,
        $sevkTarihi,
        $sevkNedeni !== null ? $sevkNedeni->value : null,
        $basvuruSekli !== null ? $basvuruSekli->value : null,
        $durum,
        $kurulBaskaniDrTescilNo,
        $aciklama,
        $karar,
        $bransGorusler,
        $uyeler,
        $onayBekleyenDoktorlar,
        ];
    }
}
