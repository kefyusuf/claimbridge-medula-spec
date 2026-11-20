<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiGenSorguCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiGenSorguCevapDVO
{
    public function __construct(
    /** "dd.MM.yyyy" referral date; the guide labels the field islemTarihi while the clear name says Sevk Tarihi (s.309). */
    public readonly ?string $islemTarihi = null,
    /** Facility code (s.309). */
    public readonly ?int $tesisKodu = null,
    /** Result code; "0000" means success (s.309). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.310). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemTarihi,
        $tesisKodu,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
