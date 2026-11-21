<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * OrneklenmisCevapDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrneklenmisCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.291). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.291). */
    public readonly ?string $sonucMesaji = null,
    /** Code of the facility that searched the sampled takips (s.291). */
    public readonly ?int $saglikTesisKodu = null,
    /** Sampled tracking records; item shape Tablo 4.5.6.c (EvrakTakipDVO, this registry) (s.291). */
    public readonly array $takipler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["takipler"]) && is_array($data["takipler"]) ? $data["takipler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        "saglikTesisKodu" => $saglikTesisKodu,
        "takipler" => $takipler,
        ];
    }
}
