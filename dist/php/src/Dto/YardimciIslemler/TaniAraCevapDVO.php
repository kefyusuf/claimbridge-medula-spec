<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TaniAraCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaniAraCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.304). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.304). */
    public readonly ?string $sonucMesaji = null,
    /** Diagnosis list; item shape Tablo 4.5.16.c (TaniListDVO, this registry) (s.304). */
    public readonly array $tanilar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "tanilar" => $this->tanilar,
        ];
    }
}
