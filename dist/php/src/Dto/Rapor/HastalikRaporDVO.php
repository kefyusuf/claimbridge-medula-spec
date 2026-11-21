<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\CalismaDurumu;
use ClaimBridge\Medula\Enum\NuksDurumu;
use ClaimBridge\Medula\Enum\TaburcuKodu;
use ClaimBridge\Medula\Enum\YatisDevamIsKazasi;

/**
 * HastalikRaporDVO — guideVersion 3.1.1, page 263 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastalikRaporDVO
{
    public function __construct(
    /** Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.263). */
    public readonly ?string $baslangicTarihi = null,
    /** End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.263). */
    public readonly ?string $bitisTarihi = null,
    /** Fit-to-work or control state; mandatory when there was hospitalization (s.263). */
    public readonly ?CalismaDurumu $raporDurumu = null,
    /** Return-to-work or control date, "dd.mm.yyyy" (s.263). */
    public readonly ?string $isKontTarihi = null,
    /** Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.263). */
    public readonly ?string $hastaneYatisTarihi = null,
    /** Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.263). */
    public readonly ?string $hastaneCikisTarihi = null,
    /** Relapse status; no length given in the illness branch (s.263). */
    public readonly ?NuksDurumu $nuks = null,
    /** Hospitalization state; three-value list shared with the work-accident branch (s.263). */
    public readonly ?YatisDevamIsKazasi $yatisDevam = null,
    /** Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.263). */
    public readonly ?string $taburcuTarihi = null,
    /** Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.263). */
    public readonly ?TaburcuKodu $taburcuKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["raporDurumu"]) ? CalismaDurumu::tryFrom((string) $data["raporDurumu"]) : null,
        isset($data["isKontTarihi"]) && is_scalar($data["isKontTarihi"]) ? (string) $data["isKontTarihi"] : null,
        isset($data["hastaneYatisTarihi"]) && is_scalar($data["hastaneYatisTarihi"]) ? (string) $data["hastaneYatisTarihi"] : null,
        isset($data["hastaneCikisTarihi"]) && is_scalar($data["hastaneCikisTarihi"]) ? (string) $data["hastaneCikisTarihi"] : null,
        isset($data["nuks"]) ? NuksDurumu::tryFrom((string) $data["nuks"]) : null,
        isset($data["yatisDevam"]) ? YatisDevamIsKazasi::tryFrom((string) $data["yatisDevam"]) : null,
        isset($data["taburcuTarihi"]) && is_scalar($data["taburcuTarihi"]) ? (string) $data["taburcuTarihi"] : null,
        isset($data["taburcuKodu"]) ? TaburcuKodu::tryFrom((string) $data["taburcuKodu"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "baslangicTarihi" => $baslangicTarihi,
        "bitisTarihi" => $bitisTarihi,
        "raporDurumu" => $raporDurumu !== null ? $raporDurumu->value : null,
        "isKontTarihi" => $isKontTarihi,
        "hastaneYatisTarihi" => $hastaneYatisTarihi,
        "hastaneCikisTarihi" => $hastaneCikisTarihi,
        "nuks" => $nuks !== null ? $nuks->value : null,
        "yatisDevam" => $yatisDevam !== null ? $yatisDevam->value : null,
        "taburcuTarihi" => $taburcuTarihi,
        "taburcuKodu" => $taburcuKodu !== null ? $taburcuKodu->value : null,
        ];
    }
}
