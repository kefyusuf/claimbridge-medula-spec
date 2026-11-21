<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\EvetHayir;

/**
 * TakipAraGirisDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipAraGirisDVO
{
    public function __construct(
    /** Patient citizen ID (s.286). */
    public readonly ?string $hastaTCK = null,
    /** Search-window start, "dd.mm.yyyy" (s.286). */
    public readonly ?string $baslangicTarihi = null,
    /** Search-window end, "dd.mm.yyyy"; guide note: the window may not exceed one month (s.286). */
    public readonly ?string $bitisTarihi = null,
    /** E: referred notifications in the window across all facilities; H: the calling facility's own takips in the window (s.286). */
    public readonly ?EvetHayir $sevkDurumu = null,
    /** Code of the searching facility (s.286). */
    public readonly ?int $saglikTesisKodu = null,
    /** Software vendor KTS code (s.286). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTCK"]) && is_scalar($data["hastaTCK"]) ? (string) $data["hastaTCK"] : null,
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["sevkDurumu"]) ? EvetHayir::tryFrom((string) $data["sevkDurumu"]) : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTCK" => $hastaTCK,
        "baslangicTarihi" => $baslangicTarihi,
        "bitisTarihi" => $bitisTarihi,
        "sevkDurumu" => $sevkDurumu !== null ? $sevkDurumu->value : null,
        "saglikTesisKodu" => $saglikTesisKodu,
        "ktsHbysKodu" => $ktsHbysKodu,
        ];
    }
}
