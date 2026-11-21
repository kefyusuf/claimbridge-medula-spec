<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * YurtDisiYardimHakkiGetirCevapDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class YurtDisiYardimHakkiGetirCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.296). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.296). */
    public readonly ?string $sonucMesaji = null,
    /** Entitlement verification list; item shape Tablo 4.5.10.c (YurtDisiYardimHakkiGetirCevapDetayDVO, this registry) (s.296). */
    public readonly array $yurtDisiDetay = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["yurtDisiDetay"]) && is_array($data["yurtDisiDetay"]) ? $data["yurtDisiDetay"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "yurtDisiDetay" => $this->yurtDisiDetay,
        ];
    }
}
