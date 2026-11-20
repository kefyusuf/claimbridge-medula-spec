<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * ENabizBildirimSorguCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ENabizBildirimSorguCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.305). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.305). */
    public readonly ?string $sonucMesaji = null,
    /** e-Nabız service notifications; item shape Tablo 4.5.16.c (ENabizHizmetBilgiDVO, this registry); the guide numbers this table under the PREVIOUS section (4.5.16.c) although it belongs to eNabizBildirimSorgu — numbering anomaly preserved (s.305). */
    public readonly array $hizmetler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["hizmetler"]) && is_array($data["hizmetler"]) ? $data["hizmetler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $hizmetler,
        ];
    }
}
