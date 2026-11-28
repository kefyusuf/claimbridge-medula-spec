<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * YesilKartliHastaSevkBilgileriDVO — guideVersion 3.1.1, page 176 (Tablo 4.1.12.c - YesilKartliHastaSevkBilgileriDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class YesilKartliHastaSevkBilgileriDVO
{
    public function __construct(
    /** Referred branch code (s.176) */
    public readonly ?string $sevkEdilenBransKodu = null,
    /** Referring facility code (s.177) */
    public readonly ?int $sevkEdenTesisKodu = null,
    /** Referral date (s.177) */
    public readonly ?string $sevkEdilmeTarihi = null,
    /** Tracking number (s.177) */
    public readonly ?string $takipNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sevkEdilenBransKodu"]) && is_scalar($data["sevkEdilenBransKodu"]) ? (string) $data["sevkEdilenBransKodu"] : null,
        isset($data["sevkEdenTesisKodu"]) && is_numeric($data["sevkEdenTesisKodu"]) ? (int) $data["sevkEdenTesisKodu"] : null,
        isset($data["sevkEdilmeTarihi"]) && is_scalar($data["sevkEdilmeTarihi"]) ? (string) $data["sevkEdilmeTarihi"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sevkEdilenBransKodu" => $this->sevkEdilenBransKodu,
        "sevkEdenTesisKodu" => $this->sevkEdenTesisKodu,
        "sevkEdilmeTarihi" => $this->sevkEdilmeTarihi,
        "takipNo" => $this->takipNo,
        ];
    }
}
