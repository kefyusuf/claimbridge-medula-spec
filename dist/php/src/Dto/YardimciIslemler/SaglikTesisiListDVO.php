<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * SaglikTesisiListDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SaglikTesisiListDVO
{
    public function __construct(
    /** Facility province code (s.284). */
    public readonly ?string $tesisIl = null,
    /** Facility name (s.284). */
    public readonly ?string $tesisAdi = null,
    /** Facility code (s.284). */
    public readonly ?int $tesisKodu = null,
    /** Facility class code (s.284). */
    public readonly ?string $tesisSinifKodu = null,
    /** Facility type code (s.284). */
    public readonly ?string $tesisTuru = null,
    /** Facility province name — the guide states length 2 for a NAME column, likely an extraction or guide-table artifact (s.284). */
    public readonly ?string $tesisIlAdi = null,
    /** Facility district code (s.284). */
    public readonly ?string $tesisIlceKodu = null,
    /** Facility district name (s.284). */
    public readonly ?string $tesisIlceAdi = null,
    /** Facility type name (s.284). */
    public readonly ?string $tesisTuruAdi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tesisIl"]) && is_scalar($data["tesisIl"]) ? (string) $data["tesisIl"] : null,
        isset($data["tesisAdi"]) && is_scalar($data["tesisAdi"]) ? (string) $data["tesisAdi"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["tesisSinifKodu"]) && is_scalar($data["tesisSinifKodu"]) ? (string) $data["tesisSinifKodu"] : null,
        isset($data["tesisTuru"]) && is_scalar($data["tesisTuru"]) ? (string) $data["tesisTuru"] : null,
        isset($data["tesisIlAdi"]) && is_scalar($data["tesisIlAdi"]) ? (string) $data["tesisIlAdi"] : null,
        isset($data["tesisIlceKodu"]) && is_scalar($data["tesisIlceKodu"]) ? (string) $data["tesisIlceKodu"] : null,
        isset($data["tesisIlceAdi"]) && is_scalar($data["tesisIlceAdi"]) ? (string) $data["tesisIlceAdi"] : null,
        isset($data["tesisTuruAdi"]) && is_scalar($data["tesisTuruAdi"]) ? (string) $data["tesisTuruAdi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tesisIl,
        $tesisAdi,
        $tesisKodu,
        $tesisSinifKodu,
        $tesisTuru,
        $tesisIlAdi,
        $tesisIlceKodu,
        $tesisIlceAdi,
        $tesisTuruAdi,
        ];
    }
}
