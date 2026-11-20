<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TakipAraCevapDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipAraCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.286). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.286). */
    public readonly ?string $sonucMesaji = null,
    /** Tracking records; item shape Tablo 4.1.2.b (TakipDVO, hasta-kabul group) (s.286). */
    public readonly array $takipler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["takipler"]) && is_array($data["takipler"]) ? $data["takipler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $takipler,
        ];
    }
}
