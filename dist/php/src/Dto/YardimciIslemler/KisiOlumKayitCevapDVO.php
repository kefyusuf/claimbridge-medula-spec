<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiOlumKayitCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiOlumKayitCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.306). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.306). */
    public readonly ?string $sonucMesaji = null,
    /** Death-registration details; item shape Tablo 4.5.18.c (KisiOlumKayitDetayDVO, this registry) (s.307). */
    public readonly array $kisiOlumKayitDetay = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["kisiOlumKayitDetay"]) && is_array($data["kisiOlumKayitDetay"]) ? $data["kisiOlumKayitDetay"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        "kisiOlumKayitDetay" => $kisiOlumKayitDetay,
        ];
    }
}
