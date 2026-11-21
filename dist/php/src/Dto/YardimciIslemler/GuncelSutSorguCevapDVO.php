<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * GuncelSutSorguCevapDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class GuncelSutSorguCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.298). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.298). */
    public readonly ?string $sonucMesaji = null,
    /** SUT code list; item shape Tablo 4.5.11.c (SutFiyatDVO, this registry) (s.298). */
    public readonly array $sutKodlari = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["sutKodlari"]) && is_array($data["sutKodlari"]) ? $data["sutKodlari"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "sutKodlari" => $this->sutKodlari,
        ];
    }
}
