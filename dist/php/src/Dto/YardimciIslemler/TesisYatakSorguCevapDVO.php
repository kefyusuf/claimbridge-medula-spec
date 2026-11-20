<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TesisYatakSorguCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TesisYatakSorguCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.300). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.300). */
    public readonly ?string $sonucMesaji = null,
    /** Bed list; item shape Tablo 4.5.13.c (TesisYatakBilgiDVO, this registry) (s.300). */
    public readonly array $yataklar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["yataklar"]) && is_array($data["yataklar"]) ? $data["yataklar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $yataklar,
        ];
    }
}
