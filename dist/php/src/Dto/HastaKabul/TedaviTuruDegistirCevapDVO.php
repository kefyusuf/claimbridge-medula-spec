<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * TedaviTuruDegistirCevapDVO — guideVersion 3.1.1, page 177 (Tablo 4.1.13.b - TedaviTuruDegistirCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviTuruDegistirCevapDVO
{
    public function __construct(
    /** Tracking number (s.178) */
    public readonly ?string $takipNo = null,
    /** New tedavi turu (s.178) */
    public readonly ?string $yeniTedaviTuru = null,
    /** Patient application number. Guide prints the length as String 4 (s.178) — a guide anomaly: hastaBasvuruNo is not bounded to 4 characters anywhere else in the guide; treated as unbounded here pending a guide-side correction. */
    public readonly ?string $hastaBasvuruNo = null,
    /** Result code; 0000 means success, any other value is an error (s.178) */
    public readonly ?string $sonucKodu = null,
    /** Human-readable result message accompanying the result code (s.178) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["yeniTedaviTuru"]) && is_scalar($data["yeniTedaviTuru"]) ? (string) $data["yeniTedaviTuru"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $this->takipNo,
        "yeniTedaviTuru" => $this->yeniTedaviTuru,
        "hastaBasvuruNo" => $this->hastaBasvuruNo,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
