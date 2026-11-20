<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * DoktorAraCevapDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DoktorAraCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.285). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.285). */
    public readonly ?string $sonucMesaji = null,
    /** Physicians; item shape Tablo 4.5.2.c (DoktorListDVO, this registry) (s.285). */
    public readonly array $doktorlar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["doktorlar"]) && is_array($data["doktorlar"]) ? $data["doktorlar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $doktorlar,
        ];
    }
}
