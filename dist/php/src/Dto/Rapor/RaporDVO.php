<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\RaporDuzenlemeTuru;
use ClaimBridge\Medula\Enum\RaporTuru;

/**
 * RaporDVO — guideVersion 3.1.1, page 263 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporDVO
{
    public function __construct(
    /** Report key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry). */
    public readonly array $raporBilgisi = [],
    /** Report type (s.263-264). */
    public readonly ?RaporTuru $turu = null,
    /** Report start date, "dd.mm.yyyy"; guide: Evet for all reports except prosthesis and fit-to-work-before-birth (s.264). */
    public readonly ?string $baslangicTarihi = null,
    /** Report end date, "dd.mm.yyyy"; same exception rule (s.264). */
    public readonly ?string $bitisTarihi = null,
    /** Issuing style (s.264). */
    public readonly ?RaporDuzenlemeTuru $duzenlemeTuru = null,
    /** Beneficiary; shape Tablo 4.4.1.s (HakSahibiBilgisiDVO, this registry); NULL when TakipNoileRaporBilgisiKaydet is used — resolved from the tracking number (s.264). */
    public readonly array $hakSahibi = [],
    /** Report protocol number (s.264). */
    public readonly ?string $protokolNo = null,
    /** Report protocol date, "dd.mm.yyyy" (s.264). */
    public readonly ?string $protokolTarihi = null,
    /** Sent empty; value list contains 1 = Taslak (draft) (s.264). */
    public readonly ?string $durum = null,
    /** Report description (s.264). */
    public readonly ?string $aciklama = null,
    /** Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry); sent as an array (s.264). */
    public readonly array $doktorlar = [],
    /** Diagnoses; item shape Tablo 4.4.1.u (TaniBilgisiDVO, hizmet-kayit group); NOT sent for drug reports (s.264). */
    public readonly array $tanilar = [],
    /** Diagnosis details; item shape Tablo 4.4.1.v (TeshisBilgisiDVO) — deferred to G43d; NOT sent for drug reports (s.264). */
    public readonly array $teshisler = [],
    /** Drug diagnoses; item shape Tablo 4.4.1.gg (IlacTeshisBilgiDVO, this registry); MANDATORY for drug reports (s.264). */
    public readonly array $ilacTeshisler = [],
    /** GSS-generated tracking number from the admission; filled when TakipNoileRaporBilgisiKaydet is used (s.265). */
    public readonly ?string $takipNo = null,
    /** Clinical diagnosis (s.265; parameter name row-wrapped in the guide). */
    public readonly ?string $klinikTani = null,
    /** Special-case code; 0 when none. 1 = surgery/botulinum for mobility, 2-3 = 3713-law disability categories (s.265). Full catalogue in Tablo 5.1 OzelDurumVO per the changelog. */
    public readonly ?int $ozelDurum = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporBilgisi"]) && is_array($data["raporBilgisi"]) ? $data["raporBilgisi"] : [],
        isset($data["turu"]) ? RaporTuru::tryFrom((string) $data["turu"]) : null,
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["duzenlemeTuru"]) ? RaporDuzenlemeTuru::tryFrom((string) $data["duzenlemeTuru"]) : null,
        isset($data["hakSahibi"]) && is_array($data["hakSahibi"]) ? $data["hakSahibi"] : [],
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["protokolTarihi"]) && is_scalar($data["protokolTarihi"]) ? (string) $data["protokolTarihi"] : null,
        isset($data["durum"]) && is_scalar($data["durum"]) ? (string) $data["durum"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["doktorlar"]) && is_array($data["doktorlar"]) ? $data["doktorlar"] : [],
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["teshisler"]) && is_array($data["teshisler"]) ? $data["teshisler"] : [],
        isset($data["ilacTeshisler"]) && is_array($data["ilacTeshisler"]) ? $data["ilacTeshisler"] : [],
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["klinikTani"]) && is_scalar($data["klinikTani"]) ? (string) $data["klinikTani"] : null,
        isset($data["ozelDurum"]) && is_numeric($data["ozelDurum"]) ? (int) $data["ozelDurum"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporBilgisi,
        $turu !== null ? $turu->value : null,
        $baslangicTarihi,
        $bitisTarihi,
        $duzenlemeTuru !== null ? $duzenlemeTuru->value : null,
        $hakSahibi,
        $protokolNo,
        $protokolTarihi,
        $durum,
        $aciklama,
        $doktorlar,
        $tanilar,
        $teshisler,
        $ilacTeshisler,
        $takipNo,
        $klinikTani,
        $ozelDurum,
        ];
    }
}
