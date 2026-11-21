<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\RaporTuru;

/**
 * IlacRaporDuzeltDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.6.a (s.281)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacRaporDuzeltDVO
{
    public function __construct(
    /** Doctor diploma registration number. The guide's description column erroneously repeats the RaporCevapDVO result-code text here; the parameter name and clear name (Dr diploma tescil numarası) are authoritative. */
    public readonly ?string $drTescilNo = null,
    /** Additional annotation appended to the drug report (s.281). */
    public readonly ?string $duzeltmeBilgisi = null,
    /** Correction date, "dd.mm.yyyy" format (s.281). */
    public readonly ?string $duzeltmeTarihi = null,
    /** Report number (s.281). */
    public readonly ?string $raporNo = null,
    /** Report date, "dd.mm.yyyy" format (s.281). */
    public readonly ?string $raporTarihi = null,
    /** Report type; this method only applies to drug reports: 10 = İlaç Kullanım (s.281). */
    public readonly ?RaporTuru $raporTuru = null,
    /** Code of the facility that issued the report (s.281). */
    public readonly ?int $tesisKodu = null,
    /** Active ingredients; item shape in Tablo 4.4.1.ff (RaporEtkinMaddeDVO) — deferred to G43b with the RaporBilgisiKaydet composite set. */
    public readonly array $raporEtkinMaddeler = [],
    /** ICD-10 diagnoses; item shape in Tablo 4.2.1.k (TaniBilgisiDVO) — already used by the hizmet-kayit group. */
    public readonly array $tanilar = [],
    /** Drug report diagnoses; item shape in Tablo 4.4.1.gg (IlacTeshisBilgiDVO). The guide marks this field mandatory for drug reports (s.281) despite listing it as optional in the required column. */
    public readonly array $ilacTeshisler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["duzeltmeBilgisi"]) && is_scalar($data["duzeltmeBilgisi"]) ? (string) $data["duzeltmeBilgisi"] : null,
        isset($data["duzeltmeTarihi"]) && is_scalar($data["duzeltmeTarihi"]) ? (string) $data["duzeltmeTarihi"] : null,
        isset($data["raporNo"]) && is_scalar($data["raporNo"]) ? (string) $data["raporNo"] : null,
        isset($data["raporTarihi"]) && is_scalar($data["raporTarihi"]) ? (string) $data["raporTarihi"] : null,
        isset($data["raporTuru"]) ? RaporTuru::tryFrom((string) $data["raporTuru"]) : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["raporEtkinMaddeler"]) && is_array($data["raporEtkinMaddeler"]) ? $data["raporEtkinMaddeler"] : [],
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["ilacTeshisler"]) && is_array($data["ilacTeshisler"]) ? $data["ilacTeshisler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "drTescilNo" => $this->drTescilNo,
        "duzeltmeBilgisi" => $this->duzeltmeBilgisi,
        "duzeltmeTarihi" => $this->duzeltmeTarihi,
        "raporNo" => $this->raporNo,
        "raporTarihi" => $this->raporTarihi,
        "raporTuru" => $this->raporTuru !== null ? $this->raporTuru->value : null,
        "tesisKodu" => $this->tesisKodu,
        "raporEtkinMaddeler" => $this->raporEtkinMaddeler,
        "tanilar" => $this->tanilar,
        "ilacTeshisler" => $this->ilacTeshisler,
        ];
    }
}
