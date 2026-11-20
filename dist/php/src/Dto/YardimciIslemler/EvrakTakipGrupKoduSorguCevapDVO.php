<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * EvrakTakipGrupKoduSorguCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EvrakTakipGrupKoduSorguCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.299). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.299). */
    public readonly ?string $sonucMesaji = null,
    /** Group codes; item shape Tablo 4.5.12.c (EvrakTakipGrupKoduDVO, this registry) (s.299). */
    public readonly array $grupKodlari = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["grupKodlari"]) && is_array($data["grupKodlari"]) ? $data["grupKodlari"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $grupKodlari,
        ];
    }
}
