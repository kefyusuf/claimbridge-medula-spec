<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiIslemDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiIslemDVO
{
    public function __construct(
    /** Facility code (s.303). */
    public readonly ?int $tesisKodu = null,
    /** Name of the facility where the procedure was performed (s.303). */
    public readonly ?string $tesisAdi = null,
    /** Procedure date (s.303). */
    public readonly ?string $islemTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["tesisAdi"]) && is_scalar($data["tesisAdi"]) ? (string) $data["tesisAdi"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "tesisKodu" => $tesisKodu,
        "tesisAdi" => $tesisAdi,
        "islemTarihi" => $islemTarihi,
        ];
    }
}
