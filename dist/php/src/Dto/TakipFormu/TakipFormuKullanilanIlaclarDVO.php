<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuKullanilanIlaclarDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuKullanilanIlaclarDVO
{
    public function __construct(
    /** Drug barcode (s.320). */
    public readonly ?string $barkod = null,
    /** Daily dose; units written for insulin (s.320). */
    public readonly ?string $gunlukDoz = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["gunlukDoz"]) && is_scalar($data["gunlukDoz"]) ? (string) $data["gunlukDoz"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "barkod" => $this->barkod,
        "gunlukDoz" => $this->gunlukDoz,
        ];
    }
}
