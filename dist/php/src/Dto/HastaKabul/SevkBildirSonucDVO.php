<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * SevkBildirSonucDVO — guideVersion 3.1.1, page 173 (Tablo 4.1.8.b - SevkBildirSonucDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SevkBildirSonucDVO
{
    public function __construct(
    /** Tracking number (s.173) */
    public readonly ?string $takipNo = null,
    /** Referral date, dd.mm.yyyy (s.173) */
    public readonly ?string $sevkEdilisTarihi = null,
    /** Result code; 0000 means success (s.173) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.173) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["sevkEdilisTarihi"]) && is_scalar($data["sevkEdilisTarihi"]) ? (string) $data["sevkEdilisTarihi"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $takipNo,
        "sevkEdilisTarihi" => $sevkEdilisTarihi,
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        ];
    }
}
