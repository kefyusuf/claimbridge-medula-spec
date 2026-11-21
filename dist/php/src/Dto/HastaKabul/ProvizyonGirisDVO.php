<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;

use ClaimBridge\Medula\Enum\DevredilenKurum;
use ClaimBridge\Medula\Enum\EkdsYontemGerekce;
use ClaimBridge\Medula\Enum\ProvizyonTipi;
use ClaimBridge\Medula\Enum\SigortaliTuru;
use ClaimBridge\Medula\Enum\TakipTipi;
use ClaimBridge\Medula\Enum\TedaviTipi;
use ClaimBridge\Medula\Enum\TedaviTuru;

/**
 * ProvizyonGirisDVO — guideVersion 3.1.1, page 154 (Tablo 4.1.1.a - ProvizyonGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ProvizyonGirisDVO
{
    public function __construct(
    /** Healthcare facility code assigned by GSS (s.154). */
    public readonly ?int $saglikTesisKodu = null,
    /** Patient identity number (s.154). Examples must use synthetic placeholders only. */
    public readonly ?string $hastaTCKimlikNo = null,
    /** Insured person type (s.154). Codes 1-4 in the sigortali-turu registry enum. */
    public readonly ?SigortaliTuru $sigortaliTuru = null,
    /** Medical branch (specialty) code (s.154). Verification correction - the guide defines String(4), not integer. */
    public readonly ?string $bransKodu = null,
    /** Institution the person was transferred from before the SGK merger (s.154-158); 34 codes in the devredilen-kurum registry enum. */
    public readonly ?DevredilenKurum $devredilenKurum = null,
    /** Date the provision was requested, dd.mm.yyyy format in the guide (s.156). */
    public readonly ?string $provizyonTarihi = null,
    /** Provision type controlling how SGK covers the admission (s.156-157). */
    public readonly ?ProvizyonTipi $provizyonTipi = null,
    /** Treatment type of the admission - A/Y/G letter codes (s.158). */
    public readonly ?TedaviTuru $tedaviTuru = null,
    /** Detailed treatment profile (s.158-159); codes 0-22 (no 3) in the tedavi-tipi registry enum. */
    public readonly ?TedaviTipi $tedaviTipi = null,
    /** Tracking record type (s.157). Linked takips are requested through takipNo, not through this field. */
    public readonly ?TakipTipi $takipTipi = null,
    /** Existing tracking number used when requesting a linked takip; empty for first takips (s.157). */
    public readonly ?string $takipNo = null,
    /** Exceptional-case code (s.157). Codes 1-9 (1 Acil hal, 2 Is kazasi ile meslek hastaligi, ...). Enum candidate for v0.2. */
    public readonly ?string $istisnaiHal = null,
    /** Patient contact phone in 3121234567 format; mandatory on first takips (s.159). Synthetic placeholders only. */
    public readonly ?string $hastaTelefon = null,
    /** Patient contact address; mandatory on first takips (s.159). Synthetic placeholders only. */
    public readonly ?string $hastaAdres = null,
    /** Software vendor KTS code (s.159). Verification correction - the guide marks this required. */
    public readonly ?string $ktsHbysKodu = null,
    /** EKDS verification method justification codes; Integer[] in the guide, modeled as an array of ekds-yontem-gerekce codes (s.167, changelog s.13). */
    public readonly ?EkdsYontemGerekce $ekdsYontemGerekce = null,
    /** Registration number of the admitting doctor. Verification finding - this field does not appear in Tablo 4.1.1.a; kept for PRD 13.4 compatibility and slated for removal in 0.2.0. @deprecated. */
    public readonly ?string $doktorTescilNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["hastaTCKimlikNo"]) && is_scalar($data["hastaTCKimlikNo"]) ? (string) $data["hastaTCKimlikNo"] : null,
        isset($data["sigortaliTuru"]) ? SigortaliTuru::tryFrom((string) $data["sigortaliTuru"]) : null,
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["devredilenKurum"]) ? DevredilenKurum::tryFrom((string) $data["devredilenKurum"]) : null,
        isset($data["provizyonTarihi"]) && is_scalar($data["provizyonTarihi"]) ? (string) $data["provizyonTarihi"] : null,
        isset($data["provizyonTipi"]) ? ProvizyonTipi::tryFrom((string) $data["provizyonTipi"]) : null,
        isset($data["tedaviTuru"]) ? TedaviTuru::tryFrom((string) $data["tedaviTuru"]) : null,
        isset($data["tedaviTipi"]) ? TedaviTipi::tryFrom((string) $data["tedaviTipi"]) : null,
        isset($data["takipTipi"]) ? TakipTipi::tryFrom((string) $data["takipTipi"]) : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["istisnaiHal"]) && is_scalar($data["istisnaiHal"]) ? (string) $data["istisnaiHal"] : null,
        isset($data["hastaTelefon"]) && is_scalar($data["hastaTelefon"]) ? (string) $data["hastaTelefon"] : null,
        isset($data["hastaAdres"]) && is_scalar($data["hastaAdres"]) ? (string) $data["hastaAdres"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        isset($data["ekdsYontemGerekce"]) ? EkdsYontemGerekce::tryFrom((string) $data["ekdsYontemGerekce"]) : null,
        isset($data["doktorTescilNo"]) && is_scalar($data["doktorTescilNo"]) ? (string) $data["doktorTescilNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $saglikTesisKodu,
        "hastaTCKimlikNo" => $hastaTCKimlikNo,
        "sigortaliTuru" => $sigortaliTuru !== null ? $sigortaliTuru->value : null,
        "bransKodu" => $bransKodu,
        "devredilenKurum" => $devredilenKurum !== null ? $devredilenKurum->value : null,
        "provizyonTarihi" => $provizyonTarihi,
        "provizyonTipi" => $provizyonTipi !== null ? $provizyonTipi->value : null,
        "tedaviTuru" => $tedaviTuru !== null ? $tedaviTuru->value : null,
        "tedaviTipi" => $tedaviTipi !== null ? $tedaviTipi->value : null,
        "takipTipi" => $takipTipi !== null ? $takipTipi->value : null,
        "takipNo" => $takipNo,
        "istisnaiHal" => $istisnaiHal,
        "hastaTelefon" => $hastaTelefon,
        "hastaAdres" => $hastaAdres,
        "ktsHbysKodu" => $ktsHbysKodu,
        "ekdsYontemGerekce" => $ekdsYontemGerekce !== null ? $ekdsYontemGerekce->value : null,
        "doktorTescilNo" => $doktorTescilNo,
        ];
    }
}
