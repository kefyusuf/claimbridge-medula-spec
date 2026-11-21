<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * HastaYatisBilgisiRaporDVO — guideVersion 3.1.1, page 266 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaYatisBilgisiRaporDVO
{
    public function __construct(
    /** Hospital admission date, "dd.mm.yyyy" (s.266). */
    public readonly ?string $yatisTarihi = null,
    /** Hospital discharge date, "dd.mm.yyyy" (s.266). */
    public readonly ?string $cikisTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["yatisTarihi"]) && is_scalar($data["yatisTarihi"]) ? (string) $data["yatisTarihi"] : null,
        isset($data["cikisTarihi"]) && is_scalar($data["cikisTarihi"]) ? (string) $data["cikisTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "yatisTarihi" => $this->yatisTarihi,
        "cikisTarihi" => $this->cikisTarihi,
        ];
    }
}
