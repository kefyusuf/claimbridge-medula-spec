<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * ProvizyonDegistirCevapDVO — guideVersion 3.1.1, page 174 (Tablo 4.1.10.b - ProvizyonDegistirCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ProvizyonDegistirCevapDVO
{
    public function __construct(
    /** Tracking number (s.174) */
    public readonly ?string $takipNo = null,
    /** New provision type applied (s.174) */
    public readonly ?string $yeniProvizyonTipi = null,
    /** Application number (length per the guide is 4) (s.174) */
    public readonly ?string $hastaBasvuruNo = null,
    /** Result code; 0000 means success (guide lists N/A length here) (s.174) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.174) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["yeniProvizyonTipi"]) && is_scalar($data["yeniProvizyonTipi"]) ? (string) $data["yeniProvizyonTipi"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $takipNo,
        $yeniProvizyonTipi,
        $hastaBasvuruNo,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
