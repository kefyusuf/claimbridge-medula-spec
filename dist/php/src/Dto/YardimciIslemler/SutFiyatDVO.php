<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\SutHizmetTuru;

/**
 * SutFiyatDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SutFiyatDVO
{
    public function __construct(
    /** SUT procedure code (s.298). */
    public readonly ?string $sutKodu = null,
    /** SUT code name (s.298). */
    public readonly ?string $adi = null,
    /** Price at the queried date — the guide types this String despite being a price (s.298). */
    public readonly ?string $fiyat = null,
    /** Ten-value service-type list (s.298). */
    public readonly ?SutHizmetTuru $turu = null,
    /** Validity date (s.298). */
    public readonly ?string $gecerlilikTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["adi"]) && is_scalar($data["adi"]) ? (string) $data["adi"] : null,
        isset($data["fiyat"]) && is_scalar($data["fiyat"]) ? (string) $data["fiyat"] : null,
        isset($data["turu"]) ? SutHizmetTuru::tryFrom((string) $data["turu"]) : null,
        isset($data["gecerlilikTarihi"]) && is_scalar($data["gecerlilikTarihi"]) ? (string) $data["gecerlilikTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sutKodu,
        $adi,
        $fiyat,
        $turu !== null ? $turu->value : null,
        $gecerlilikTarihi,
        ];
    }
}
