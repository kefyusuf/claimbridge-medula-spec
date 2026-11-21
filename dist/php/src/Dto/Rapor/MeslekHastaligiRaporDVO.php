<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\CalismaDurumu;
use ClaimBridge\Medula\Enum\NuksDurumu;
use ClaimBridge\Medula\Enum\TaburcuKodu;
use ClaimBridge\Medula\Enum\YatisDevamIsKazasi;

/**
 * MeslekHastaligiRaporDVO — guideVersion 3.1.1, page 258 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MeslekHastaligiRaporDVO
{
    public function __construct(
    /** Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.258). */
    public readonly ?string $baslangicTarihi = null,
    /** End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.258). */
    public readonly ?string $bitisTarihi = null,
    /** Fit-to-work or control state; mandatory when there was hospitalization (s.258). */
    public readonly ?CalismaDurumu $raporDurumu = null,
    /** Return-to-work or control date, "dd.mm.yyyy" (s.258). */
    public readonly ?string $isKontTarihi = null,
    /** Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.258). */
    public readonly ?string $hastaneYatisTarihi = null,
    /** Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.258). */
    public readonly ?string $hastaneCikisTarihi = null,
    /** Relapse status (s.258). */
    public readonly ?NuksDurumu $nuks = null,
    /** Hospitalization state; three-value list shared with the work-accident branch (s.258). */
    public readonly ?YatisDevamIsKazasi $yatisDevam = null,
    /** Wound type; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.258). */
    public readonly ?string $yaraninTuru = null,
    /** Wound site; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.258). */
    public readonly ?string $yaraninYeri = null,
    /** Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.258). */
    public readonly ?string $taburcuTarihi = null,
    /** Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.258). */
    public readonly ?TaburcuKodu $taburcuKodu = null,
    /** Work-accident date; present here too, mirroring IsKazasiRaporDVO (s.258-259 table continuation). */
    public readonly ?string $isKazasiTarihi = null,
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
        isset($data["yaraninTuru"]) && is_scalar($data["yaraninTuru"]) ? (string) $data["yaraninTuru"] : null,
        isset($data["yaraninYeri"]) && is_scalar($data["yaraninYeri"]) ? (string) $data["yaraninYeri"] : null,
        isset($data["taburcuTarihi"]) && is_scalar($data["taburcuTarihi"]) ? (string) $data["taburcuTarihi"] : null,
        isset($data["taburcuKodu"]) ? TaburcuKodu::tryFrom((string) $data["taburcuKodu"]) : null,
        isset($data["isKazasiTarihi"]) && is_scalar($data["isKazasiTarihi"]) ? (string) $data["isKazasiTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "baslangicTarihi" => $this->baslangicTarihi,
        "bitisTarihi" => $this->bitisTarihi,
        "raporDurumu" => $this->raporDurumu !== null ? $this->raporDurumu->value : null,
        "isKontTarihi" => $this->isKontTarihi,
        "hastaneYatisTarihi" => $this->hastaneYatisTarihi,
        "hastaneCikisTarihi" => $this->hastaneCikisTarihi,
        "nuks" => $this->nuks !== null ? $this->nuks->value : null,
        "yatisDevam" => $this->yatisDevam !== null ? $this->yatisDevam->value : null,
        "yaraninTuru" => $this->yaraninTuru,
        "yaraninYeri" => $this->yaraninYeri,
        "taburcuTarihi" => $this->taburcuTarihi,
        "taburcuKodu" => $this->taburcuKodu !== null ? $this->taburcuKodu->value : null,
        "isKazasiTarihi" => $this->isKazasiTarihi,
        ];
    }
}
