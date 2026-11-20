<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\AktarmaRapor;
use ClaimBridge\Medula\Enum\AnalikRaporTipi;
use ClaimBridge\Medula\Enum\CalismaDurumu;
use ClaimBridge\Medula\Enum\GebelikTipi;
use ClaimBridge\Medula\Enum\NorSezFor;
use ClaimBridge\Medula\Enum\TaburcuKodu;
use ClaimBridge\Medula\Enum\YatisDevamIsKazasi;

/**
 * AnalikRaporDVO — guideVersion 3.1.1, page 260 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class AnalikRaporDVO
{
    public function __construct(
    /** Start date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.260). */
    public readonly ?string $baslangicTarihi = null,
    /** End date, "dd.mm.yyyy"; mandatory when the report is without hospitalization (s.260). */
    public readonly ?string $bitisTarihi = null,
    /** Fit-to-work or control state; mandatory when there was hospitalization (s.260). */
    public readonly ?CalismaDurumu $raporDurumu = null,
    /** Return-to-work or control date, "dd.mm.yyyy" (s.260). */
    public readonly ?string $isKontTarihi = null,
    /** Hospital admission date, "dd.mm.yyyy"; mandatory when yatisDevam = 2 (s.260). */
    public readonly ?string $hastaneYatisTarihi = null,
    /** Hospital discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.260). */
    public readonly ?string $hastaneCikisTarihi = null,
    /** Birth date of the child, "dd.mm.yyyy" (s.259). */
    public readonly ?string $bebekDogumTarihi = null,
    /** Start of the transferred report period, "dd.mm.yyyy" (s.259). */
    public readonly ?string $dogumOncBasTarihi = null,
    /** Children alive after the birth (s.259). */
    public readonly ?int $canliCocukSayisi = null,
    /** Children delivered (s.259). */
    public readonly ?int $doganCocukSayisi = null,
    /** Birth type: Normal / Sezeryan / Forsebs (s.259). */
    public readonly ?NorSezFor $norSezFor = null,
    /** Hospitalization state; three-value list shared with the work-accident branch (s.260). */
    public readonly ?YatisDevamIsKazasi $yatisDevam = null,
    /** Transfer-report flag (s.260). */
    public readonly ?AktarmaRapor $aktarmaRaporVarmi = null,
    /** Date of the week-32 doctor control, "dd.mm.yyyy" (s.260). */
    public readonly ?string $aktarmaRaporTarihi = null,
    /** Pregnancy week at the time of the report (s.260). */
    public readonly ?int $gebelikHaftasi = null,
    /** Discharge date, "dd.mm.yyyy"; mandatory when yatisDevam = 3 (s.260). */
    public readonly ?string $taburcuTarihi = null,
    /** Thirteen-value discharge code list, identical to the hasta-kabul group's taburcu-kodu enum (s.260). */
    public readonly ?TaburcuKodu $taburcuKodu = null,
    /** Pre-birth or post-birth maternity report (s.260). */
    public readonly ?AnalikRaporTipi $analikRaporTipi = null,
    /** Single or multiple pregnancy (s.260). */
    public readonly ?GebelikTipi $gebelikTipi = null,
    /** Week at the pre-birth report visit, typically 32 (s.260). */
    public readonly ?int $gebelikHaftasi1 = null,
    /** Week until which work may continue when the pre-birth report is issued as fit, typically 37 (s.260). */
    public readonly ?int $gebelikHaftasi2 = null,
    /** Week of the birth, typically 40 (s.261). */
    public readonly ?int $bebekDogumHaftasi = null,
    /** Weeks transferred from the pre-birth leave to the post-birth period; system-calculated (s.261). */
    public readonly ?int $aktarmaHaftasi = null,
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
        isset($data["bebekDogumTarihi"]) && is_scalar($data["bebekDogumTarihi"]) ? (string) $data["bebekDogumTarihi"] : null,
        isset($data["dogumOncBasTarihi"]) && is_scalar($data["dogumOncBasTarihi"]) ? (string) $data["dogumOncBasTarihi"] : null,
        isset($data["canliCocukSayisi"]) && is_numeric($data["canliCocukSayisi"]) ? (int) $data["canliCocukSayisi"] : null,
        isset($data["doganCocukSayisi"]) && is_numeric($data["doganCocukSayisi"]) ? (int) $data["doganCocukSayisi"] : null,
        isset($data["norSezFor"]) ? NorSezFor::tryFrom((string) $data["norSezFor"]) : null,
        isset($data["yatisDevam"]) ? YatisDevamIsKazasi::tryFrom((string) $data["yatisDevam"]) : null,
        isset($data["aktarmaRaporVarmi"]) ? AktarmaRapor::tryFrom((string) $data["aktarmaRaporVarmi"]) : null,
        isset($data["aktarmaRaporTarihi"]) && is_scalar($data["aktarmaRaporTarihi"]) ? (string) $data["aktarmaRaporTarihi"] : null,
        isset($data["gebelikHaftasi"]) && is_numeric($data["gebelikHaftasi"]) ? (int) $data["gebelikHaftasi"] : null,
        isset($data["taburcuTarihi"]) && is_scalar($data["taburcuTarihi"]) ? (string) $data["taburcuTarihi"] : null,
        isset($data["taburcuKodu"]) ? TaburcuKodu::tryFrom((string) $data["taburcuKodu"]) : null,
        isset($data["analikRaporTipi"]) ? AnalikRaporTipi::tryFrom((string) $data["analikRaporTipi"]) : null,
        isset($data["gebelikTipi"]) ? GebelikTipi::tryFrom((string) $data["gebelikTipi"]) : null,
        isset($data["gebelikHaftasi1"]) && is_numeric($data["gebelikHaftasi1"]) ? (int) $data["gebelikHaftasi1"] : null,
        isset($data["gebelikHaftasi2"]) && is_numeric($data["gebelikHaftasi2"]) ? (int) $data["gebelikHaftasi2"] : null,
        isset($data["bebekDogumHaftasi"]) && is_numeric($data["bebekDogumHaftasi"]) ? (int) $data["bebekDogumHaftasi"] : null,
        isset($data["aktarmaHaftasi"]) && is_numeric($data["aktarmaHaftasi"]) ? (int) $data["aktarmaHaftasi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $baslangicTarihi,
        $bitisTarihi,
        $raporDurumu !== null ? $raporDurumu->value : null,
        $isKontTarihi,
        $hastaneYatisTarihi,
        $hastaneCikisTarihi,
        $bebekDogumTarihi,
        $dogumOncBasTarihi,
        $canliCocukSayisi,
        $doganCocukSayisi,
        $norSezFor !== null ? $norSezFor->value : null,
        $yatisDevam !== null ? $yatisDevam->value : null,
        $aktarmaRaporVarmi !== null ? $aktarmaRaporVarmi->value : null,
        $aktarmaRaporTarihi,
        $gebelikHaftasi,
        $taburcuTarihi,
        $taburcuKodu !== null ? $taburcuKodu->value : null,
        $analikRaporTipi !== null ? $analikRaporTipi->value : null,
        $gebelikTipi !== null ? $gebelikTipi->value : null,
        $gebelikHaftasi1,
        $gebelikHaftasi2,
        $bebekDogumHaftasi,
        $aktarmaHaftasi,
        ];
    }
}
