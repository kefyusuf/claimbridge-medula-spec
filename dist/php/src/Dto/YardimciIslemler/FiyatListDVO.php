<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * FiyatListDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FiyatListDVO
{
    public function __construct(
    /** Drug price; KDV-inclusive per the Health Ministry publication — discounts and KDV are subtracted from this figure during payment queries (s.289). */
    public readonly ?float $fiyat = null,
    /** Price validity date (s.289). */
    public readonly ?string $gecerlilikTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["fiyat"]) && is_numeric($data["fiyat"]) ? (float) $data["fiyat"] : null,
        isset($data["gecerlilikTarihi"]) && is_scalar($data["gecerlilikTarihi"]) ? (string) $data["gecerlilikTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "fiyat" => $this->fiyat,
        "gecerlilikTarihi" => $this->gecerlilikTarihi,
        ];
    }
}
