<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * SevkBildirGirisDVO — guideVersion 3.1.1, page 173 (Tablo 4.1.8.a - SevkBildirGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SevkBildirGirisDVO
{
    public function __construct(
    /** Tracking number being referred (s.173) */
    public readonly ?string $takipNo = null,
    /** GSS-assigned institution code (s.173) */
    public readonly ?int $tesisKodu = null,
    /** Referral date, dd.mm.yyyy (s.173) */
    public readonly ?string $sevkEdilisTarihi = null,
    /** Branch code of the green-card referral target (s.173) */
    public readonly ?string $yesilKartSevkEdilenBransKodu = null,
    /** Treatment type of the green-card referral target (s.173) */
    public readonly ?int $yesilKartSevkEdilenTedaviTipi = null,
    /** Takip type of the green-card referral target (s.173) */
    public readonly ?string $yesilKartSevkEdilenTakipTipi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["sevkEdilisTarihi"]) && is_scalar($data["sevkEdilisTarihi"]) ? (string) $data["sevkEdilisTarihi"] : null,
        isset($data["yesilKartSevkEdilenBransKodu"]) && is_scalar($data["yesilKartSevkEdilenBransKodu"]) ? (string) $data["yesilKartSevkEdilenBransKodu"] : null,
        isset($data["yesilKartSevkEdilenTedaviTipi"]) && is_numeric($data["yesilKartSevkEdilenTedaviTipi"]) ? (int) $data["yesilKartSevkEdilenTedaviTipi"] : null,
        isset($data["yesilKartSevkEdilenTakipTipi"]) && is_scalar($data["yesilKartSevkEdilenTakipTipi"]) ? (string) $data["yesilKartSevkEdilenTakipTipi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $takipNo,
        "tesisKodu" => $tesisKodu,
        "sevkEdilisTarihi" => $sevkEdilisTarihi,
        "yesilKartSevkEdilenBransKodu" => $yesilKartSevkEdilenBransKodu,
        "yesilKartSevkEdilenTedaviTipi" => $yesilKartSevkEdilenTedaviTipi,
        "yesilKartSevkEdilenTakipTipi" => $yesilKartSevkEdilenTakipTipi,
        ];
    }
}
