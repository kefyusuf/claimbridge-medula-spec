<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * TedaviTuruDegistirGirisDVO — guideVersion 3.1.1, page 177 (Tablo 4.1.13.a - TedaviTuruDegistirGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviTuruDegistirGirisDVO
{
    public function __construct(
    /** Tracking number whose tedavi turu changes (s.177) */
    public readonly ?string $takipNo = null,
    /** GSS-assigned institution code (s.177) */
    public readonly ?int $tesisKodu = null,
    /** New tedavi turu (tedavi-turu codes A/Y/G) (s.177) */
    public readonly ?string $yeniTedaviTuru = null,
    /** Inpatient discharge date for a closed yatis (s.177) */
    public readonly ?string $yatisBitisTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["yeniTedaviTuru"]) && is_scalar($data["yeniTedaviTuru"]) ? (string) $data["yeniTedaviTuru"] : null,
        isset($data["yatisBitisTarihi"]) && is_scalar($data["yatisBitisTarihi"]) ? (string) $data["yatisBitisTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $this->takipNo,
        "tesisKodu" => $this->tesisKodu,
        "yeniTedaviTuru" => $this->yeniTedaviTuru,
        "yatisBitisTarihi" => $this->yatisBitisTarihi,
        ];
    }
}
