<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\TescilTuru;
use ClaimBridge\Medula\Enum\YatakSeviyesi;
use ClaimBridge\Medula\Enum\YatakTuru;

/**
 * TesisYatakBilgiDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TesisYatakBilgiDVO
{
    public function __construct(
    /** Bed code (s.300). */
    public readonly ?string $yatakKodu = null,
    /** Adult / neonatal / palliative (s.300). */
    public readonly ?YatakTuru $turu = null,
    /** Registration state (s.300). */
    public readonly ?TescilTuru $tescilTuru = null,
    /** Intensive-care level (s.301). */
    public readonly ?YatakSeviyesi $seviye = null,
    /** Validity start date (s.301). */
    public readonly ?string $gecerlilikBaslangicTarihi = null,
    /** Validity end date (s.301). */
    public readonly ?string $gecerlilikBitisTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["yatakKodu"]) && is_scalar($data["yatakKodu"]) ? (string) $data["yatakKodu"] : null,
        isset($data["turu"]) ? YatakTuru::tryFrom((string) $data["turu"]) : null,
        isset($data["tescilTuru"]) ? TescilTuru::tryFrom((string) $data["tescilTuru"]) : null,
        isset($data["seviye"]) ? YatakSeviyesi::tryFrom((string) $data["seviye"]) : null,
        isset($data["gecerlilikBaslangicTarihi"]) && is_scalar($data["gecerlilikBaslangicTarihi"]) ? (string) $data["gecerlilikBaslangicTarihi"] : null,
        isset($data["gecerlilikBitisTarihi"]) && is_scalar($data["gecerlilikBitisTarihi"]) ? (string) $data["gecerlilikBitisTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "yatakKodu" => $yatakKodu,
        "turu" => $turu !== null ? $turu->value : null,
        "tescilTuru" => $tescilTuru !== null ? $tescilTuru->value : null,
        "seviye" => $seviye !== null ? $seviye->value : null,
        "gecerlilikBaslangicTarihi" => $gecerlilikBaslangicTarihi,
        "gecerlilikBitisTarihi" => $gecerlilikBitisTarihi,
        ];
    }
}
