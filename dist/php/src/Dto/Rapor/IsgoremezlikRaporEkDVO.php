<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\EkDurumu;
use ClaimBridge\Medula\Enum\EvetHayir;
use ClaimBridge\Medula\Enum\RaporDuzenlemeTuru;

/**
 * IsgoremezlikRaporEkDVO — guideVersion 3.1.1, page 276 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IsgoremezlikRaporEkDVO
{
    public function __construct(
    /** Attachment description (s.276). */
    public readonly ?string $aciklama = null,
    /** Attachment end date, "dd.mm.yyyy" (s.276). */
    public readonly ?string $bitisTarihi = null,
    /** Initial or attachment report (s.276). */
    public readonly ?EkDurumu $durum = null,
    /** Issuing style (s.276). */
    public readonly ?RaporDuzenlemeTuru $duzenlemeTuru = null,
    /** E when hospitalized (H when not) — the yatislar array must then carry at least one stay (s.276). */
    public readonly ?EvetHayir $hastaYatisVarMi = null,
    /** Control examination flag: E = Evet, H = Hayir (s.276). */
    public readonly ?EvetHayir $kontrolMu = null,
    /** Control date, "dd.mm.yyyy" (s.276). */
    public readonly ?string $kontrolTarihi = null,
    /** Protocol number (s.277). */
    public readonly ?string $protokolNo = null,
    /** Protocol date, "dd.mm.yyyy" (s.277). */
    public readonly ?string $protokolTarihi = null,
    /** Hospital stays; item shape Tablo 4.4.1.l (HastaYatisBilgisiRaporDVO, this registry); mandatory when hastaYatisVarMi = E (s.277). */
    public readonly array $yatislar = [],
    /** Report key; shape Tablo 4.4.1.r (RaporBilgisiDVO, this registry); the guide's parameter name carries a DVO suffix here. */
    public readonly array $raporBilgisiDVO = [],
    /** Physicians; item shape Tablo 4.4.1.t (DoktorBilgisiDVO, this registry) (s.277). */
    public readonly array $doktorlar = [],
    /** Diagnoses; item shape Tablo 4.4.1.u (TaniBilgisiDVO, hizmet-kayit group); parameter name capitalized (Tanilar) in the guide (s.277). */
    public readonly array $tanilar = [],
    /** Health facility code of the caller (s.277). */
    public readonly ?int $kullaniciTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["durum"]) ? EkDurumu::tryFrom((string) $data["durum"]) : null,
        isset($data["duzenlemeTuru"]) ? RaporDuzenlemeTuru::tryFrom((string) $data["duzenlemeTuru"]) : null,
        isset($data["hastaYatisVarMi"]) ? EvetHayir::tryFrom((string) $data["hastaYatisVarMi"]) : null,
        isset($data["kontrolMu"]) ? EvetHayir::tryFrom((string) $data["kontrolMu"]) : null,
        isset($data["kontrolTarihi"]) && is_scalar($data["kontrolTarihi"]) ? (string) $data["kontrolTarihi"] : null,
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["protokolTarihi"]) && is_scalar($data["protokolTarihi"]) ? (string) $data["protokolTarihi"] : null,
        isset($data["yatislar"]) && is_array($data["yatislar"]) ? $data["yatislar"] : [],
        isset($data["raporBilgisiDVO"]) && is_array($data["raporBilgisiDVO"]) ? $data["raporBilgisiDVO"] : [],
        isset($data["doktorlar"]) && is_array($data["doktorlar"]) ? $data["doktorlar"] : [],
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["kullaniciTesisKodu"]) && is_numeric($data["kullaniciTesisKodu"]) ? (int) $data["kullaniciTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $aciklama,
        $bitisTarihi,
        $durum !== null ? $durum->value : null,
        $duzenlemeTuru !== null ? $duzenlemeTuru->value : null,
        $hastaYatisVarMi !== null ? $hastaYatisVarMi->value : null,
        $kontrolMu !== null ? $kontrolMu->value : null,
        $kontrolTarihi,
        $protokolNo,
        $protokolTarihi,
        $yatislar,
        $raporBilgisiDVO,
        $doktorlar,
        $tanilar,
        $kullaniciTesisKodu,
        ];
    }
}
