<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\GrupTuru;

/**
 * EvrakTakipDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EvrakTakipDVO
{
    public function __construct(
    /** Tracking number (s.292). */
    public readonly ?string $takipNo = null,
    /** Total amount of the takip (s.292). */
    public readonly ?float $toplamTutar = null,
    /** Deductions; item shape Tablo 4.5.6.d (TakipIslemKesintiDVO, this registry) (s.292). */
    public readonly array $kesintiler = [],
    /** A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.292). */
    public readonly ?GrupTuru $grupTuru = null,
    /** Group code; values come from the evrakTakipGrupKodlariSorgu method (s.292). */
    public readonly ?int $grupKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["toplamTutar"]) && is_numeric($data["toplamTutar"]) ? (float) $data["toplamTutar"] : null,
        isset($data["kesintiler"]) && is_array($data["kesintiler"]) ? $data["kesintiler"] : [],
        isset($data["grupTuru"]) ? GrupTuru::tryFrom((string) $data["grupTuru"]) : null,
        isset($data["grupKodu"]) && is_numeric($data["grupKodu"]) ? (int) $data["grupKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $takipNo,
        "toplamTutar" => $toplamTutar,
        "kesintiler" => $kesintiler,
        "grupTuru" => $grupTuru !== null ? $grupTuru->value : null,
        "grupKodu" => $grupKodu,
        ];
    }
}
