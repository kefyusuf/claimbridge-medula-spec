<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * ProvizyonDegistirGirisDVO — guideVersion 3.1.1, page 174 (Tablo 4.1.10.a - ProvizyonDegistirGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ProvizyonDegistirGirisDVO
{
    public function __construct(
    /** Tracking number whose provision type changes (s.174) */
    public readonly ?string $takipNo = null,
    /** GSS-assigned institution code (s.174) */
    public readonly ?int $tesisKodu = null,
    /** New provision type (provizyon-tipi codes) (s.174) */
    public readonly ?string $yeniProvizyonTipi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["yeniProvizyonTipi"]) && is_scalar($data["yeniProvizyonTipi"]) ? (string) $data["yeniProvizyonTipi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $this->takipNo,
        "tesisKodu" => $this->tesisKodu,
        "yeniProvizyonTipi" => $this->yeniProvizyonTipi,
        ];
    }
}
