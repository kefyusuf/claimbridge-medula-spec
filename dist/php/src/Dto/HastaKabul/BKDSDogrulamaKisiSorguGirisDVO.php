<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BKDSDogrulamaKisiSorguGirisDVO — guideVersion 3.1.1, page 185 (Tablo 4.1.21.a - BKDSDogrulamaKisiSorguGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BKDSDogrulamaKisiSorguGirisDVO
{
    public function __construct(
    /** Patient T.C. identity number (s.185) */
    public readonly ?string $tckNo = null,
    /** Verification date (s.185) */
    public readonly ?string $islemTarihi = null,
    /** GSS-assigned institution code (s.185) */
    public readonly ?int $tesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tckNo"]) && is_scalar($data["tckNo"]) ? (string) $data["tckNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "tckNo" => $tckNo,
        "islemTarihi" => $islemTarihi,
        "tesisKodu" => $tesisKodu,
        ];
    }
}
