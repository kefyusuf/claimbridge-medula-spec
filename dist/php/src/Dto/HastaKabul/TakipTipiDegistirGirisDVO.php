<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * TakipTipiDegistirGirisDVO — guideVersion 3.1.1, page 178 (Tablo 4.1.14.a - TakipTipiDegistirGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipTipiDegistirGirisDVO
{
    public function __construct(
    /** Tracking number whose takip tipi changes (s.178) */
    public readonly ?string $takipNo = null,
    /** GSS-assigned institution code (s.178) */
    public readonly ?int $tesisKodu = null,
    /** New takip tipi (takip-tipi codes N/E/U/K/T/Y/P/S/C/F/B) (s.178) */
    public readonly ?string $yeniTakipTipi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["yeniTakipTipi"]) && is_scalar($data["yeniTakipTipi"]) ? (string) $data["yeniTakipTipi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $this->takipNo,
        "tesisKodu" => $this->tesisKodu,
        "yeniTakipTipi" => $this->yeniTakipTipi,
        ];
    }
}
