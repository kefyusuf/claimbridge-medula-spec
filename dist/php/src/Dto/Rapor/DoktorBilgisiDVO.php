<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\DoktorTipi;

/**
 * DoktorBilgisiDVO — guideVersion 3.1.1, page 272 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DoktorBilgisiDVO
{
    public function __construct(
    /** Physician registration number; note the IlacRaporDuzeltDVO variant uses length 20 (s.281) while this table states 16 (s.272) — intra-guide divergence preserved. */
    public readonly ?string $drTescilNo = null,
    /** Physician first name (s.272). */
    public readonly ?string $drAdi = null,
    /** Physician last name (s.272). */
    public readonly ?string $drSoyadi = null,
    /** Physician branch code per the Health Ministry list (s.272). */
    public readonly ?string $drBransKodu = null,
    /** Physician role in the report (s.272). */
    public readonly ?DoktorTipi $tipi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["drAdi"]) && is_scalar($data["drAdi"]) ? (string) $data["drAdi"] : null,
        isset($data["drSoyadi"]) && is_scalar($data["drSoyadi"]) ? (string) $data["drSoyadi"] : null,
        isset($data["drBransKodu"]) && is_scalar($data["drBransKodu"]) ? (string) $data["drBransKodu"] : null,
        isset($data["tipi"]) ? DoktorTipi::tryFrom((string) $data["tipi"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $drTescilNo,
        $drAdi,
        $drSoyadi,
        $drBransKodu,
        $tipi !== null ? $tipi->value : null,
        ];
    }
}
