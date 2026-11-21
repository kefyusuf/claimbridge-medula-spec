<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\DoktorPersonelTipi;

/**
 * ImzaliDoktorBilgisiDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliDoktorBilgisiDVO
{
    public function __construct(
    /** Physician diploma registration number (s.333). */
    public readonly ?string $drTescilNo = null,
    /** Physician first name (s.333). */
    public readonly ?string $drAdi = null,
    /** Physician last name (s.333). */
    public readonly ?string $drSoyadi = null,
    /** Physician branch code (s.333). */
    public readonly ?string $drBransKodu = null,
    /** Physician or dentist (s.333). */
    public readonly ?DoktorPersonelTipi $tipi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["drAdi"]) && is_scalar($data["drAdi"]) ? (string) $data["drAdi"] : null,
        isset($data["drSoyadi"]) && is_scalar($data["drSoyadi"]) ? (string) $data["drSoyadi"] : null,
        isset($data["drBransKodu"]) && is_scalar($data["drBransKodu"]) ? (string) $data["drBransKodu"] : null,
        isset($data["tipi"]) ? DoktorPersonelTipi::tryFrom((string) $data["tipi"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "drTescilNo" => $drTescilNo,
        "drAdi" => $drAdi,
        "drSoyadi" => $drSoyadi,
        "drBransKodu" => $drBransKodu,
        "tipi" => $tipi !== null ? $tipi->value : null,
        ];
    }
}
