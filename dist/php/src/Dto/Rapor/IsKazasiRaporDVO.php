<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\TaburcuKodu;
use ClaimBridge\Medula\Enum\YatisDevamIsKazasi;

/**
 * IsKazasiRaporDVO — guideVersion 3.1.1, page 256 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IsKazasiRaporDVO
{
    public function __construct(
    /** Start date, "dd.mm.yyyy"; mandatory when yatisDevam = H-style rest given (s.256). */
    public readonly ?string $baslangicTarihi = null,
    /** End date, "dd.mm.yyyy"; mandatory when hospitalization is over (s.256). */
    public readonly ?string $bitisTarihi = null,
    /** 1 = Çalışır, 2 = Kontrol; mandatory when there was hospitalization (s.256). */
    public readonly ?string $raporDurumu = null,
    /** Return-to-work or control date, "dd.mm.yyyy"; mandatory when hospitalization is absent (s.256). */
    public readonly ?string $isKontTarihi = null,
    /** Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.256). */
    public readonly ?string $hastaneYatisTarihi = null,
    /** Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.256). */
    public readonly ?string $hastaneCikisTarihi = null,
    /** Relapse status: 1 = Nüks Var, 2 = Nüks Yok (s.257). */
    public readonly ?string $nuks = null,
    /** Hospitalization state; three-value work-accident variant (s.257). */
    public readonly ?YatisDevamIsKazasi $yatisDevam = null,
    /** Wound type; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.257). */
    public readonly ?string $yaraninTuru = null,
    /** Wound site; the guide states "TABLOLAR TARAFIMIZCA SONRA YAYINLANACAKTIR" — no code list published (s.257). */
    public readonly ?string $yaraninYeri = null,
    /** Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.257). */
    public readonly ?string $taburcuTarihi = null,
    /** Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.257). */
    public readonly ?TaburcuKodu $taburcuKodu = null,
    /** Work-accident date, "dd.mm.yyyy"; filled when the relapse flag is set (s.257). */
    public readonly ?string $isKazasiTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["raporDurumu"]) && is_scalar($data["raporDurumu"]) ? (string) $data["raporDurumu"] : null,
        isset($data["isKontTarihi"]) && is_scalar($data["isKontTarihi"]) ? (string) $data["isKontTarihi"] : null,
        isset($data["hastaneYatisTarihi"]) && is_scalar($data["hastaneYatisTarihi"]) ? (string) $data["hastaneYatisTarihi"] : null,
        isset($data["hastaneCikisTarihi"]) && is_scalar($data["hastaneCikisTarihi"]) ? (string) $data["hastaneCikisTarihi"] : null,
        isset($data["nuks"]) && is_scalar($data["nuks"]) ? (string) $data["nuks"] : null,
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
        $baslangicTarihi,
        $bitisTarihi,
        $raporDurumu,
        $isKontTarihi,
        $hastaneYatisTarihi,
        $hastaneCikisTarihi,
        $nuks,
        $yatisDevam !== null ? $yatisDevam->value : null,
        $yaraninTuru,
        $yaraninYeri,
        $taburcuTarihi,
        $taburcuKodu !== null ? $taburcuKodu->value : null,
        $isKazasiTarihi,
        ];
    }
}
