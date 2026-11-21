<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;

use ClaimBridge\Medula\Enum\EvetHayir;

/**
 * TakipFormuDoktorBilgisiDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuDoktorBilgisiDVO
{
    public function __construct(
    /** Physician registration number (s.318). */
    public readonly ?string $drTescilNo = null,
    /** Physician branch code (s.318). */
    public readonly ?string $drBransKodu = null,
    /** E/H (s.318). */
    public readonly ?EvetHayir $dmEgitimiAlmisMi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["drBransKodu"]) && is_scalar($data["drBransKodu"]) ? (string) $data["drBransKodu"] : null,
        isset($data["dmEgitimiAlmisMi"]) ? EvetHayir::tryFrom((string) $data["dmEgitimiAlmisMi"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "drTescilNo" => $this->drTescilNo,
        "drBransKodu" => $this->drBransKodu,
        "dmEgitimiAlmisMi" => $this->dmEgitimiAlmisMi !== null ? $this->dmEgitimiAlmisMi->value : null,
        ];
    }
}
