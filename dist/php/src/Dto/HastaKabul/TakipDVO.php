<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;

use ClaimBridge\Medula\Enum\EkdsYontemGerekce;
use ClaimBridge\Medula\Enum\TakipDurumu;
use ClaimBridge\Medula\Enum\TakipTipi;

/**
 * TakipDVO — guideVersion 3.1.1, page 165 (Tablo 4.1.2.b - TakipDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipDVO
{
    public function __construct(
    /** Tracking number identifying this treatment episode; returned for control purposes (s.165). */
    public readonly ?string $takipNo = null,
    /** Number of the first takip when this record is a linked takip produced from another one (s.165). */
    public readonly ?string $ilkTakipNo = null,
    /** Tracking record type (s.157, Tablo 4.1.1.a; mirrored in TakipDVO context s.166). */
    public readonly ?TakipTipi $takipTipi = null,
    /** Payment-inquiry state of the tracking record - 0/1 only (s.166). */
    public readonly ?TakipDurumu $takipDurumu = null,
    /** Patient application number this tracking record belongs to. */
    public readonly ?string $hastaBasvuruNo = null,
    /** Branch code of the service (s.165). Verification correction - String(4) in the guide. */
    public readonly ?string $bransKodu = null,
    /** EKDS verification method justification codes; Integer[] in the guide, modeled as an array of ekds-yontem-gerekce codes (s.167, changelog s.13). */
    public readonly ?EkdsYontemGerekce $ekdsYontemGerekce = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["ilkTakipNo"]) && is_scalar($data["ilkTakipNo"]) ? (string) $data["ilkTakipNo"] : null,
        isset($data["takipTipi"]) ? TakipTipi::tryFrom((string) $data["takipTipi"]) : null,
        isset($data["takipDurumu"]) ? TakipDurumu::tryFrom((string) $data["takipDurumu"]) : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["ekdsYontemGerekce"]) ? EkdsYontemGerekce::tryFrom((string) $data["ekdsYontemGerekce"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $takipNo,
        "ilkTakipNo" => $ilkTakipNo,
        "takipTipi" => $takipTipi !== null ? $takipTipi->value : null,
        "takipDurumu" => $takipDurumu !== null ? $takipDurumu->value : null,
        "hastaBasvuruNo" => $hastaBasvuruNo,
        "bransKodu" => $bransKodu,
        "ekdsYontemGerekce" => $ekdsYontemGerekce !== null ? $ekdsYontemGerekce->value : null,
        ];
    }
}
