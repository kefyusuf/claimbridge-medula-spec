<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\BagimlilikDurumu;
use ClaimBridge\Medula\Enum\EvetHayir;
use ClaimBridge\Medula\Enum\MuracaatNedeni;
use ClaimBridge\Medula\Enum\MuracaatTuru;

/**
 * EngellilikRaporDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EngellilikRaporDVO
{
    public function __construct(
    /** System-generated tracking number (s.333). */
    public readonly ?string $raporTakipNo = null,
    /** Patient citizen ID (s.333). */
    public readonly ?string $tckimlikNo = null,
    /** Patient ID photograph as a byte array (s.333). */
    public readonly array $fotograf = [],
    /** Facility code (s.333). */
    public readonly ?int $tesisKodu = null,
    /** Tracking number (s.333). */
    public readonly ?string $takipNo = null,
    /** Report number (s.334). */
    public readonly ?string $raporNo = null,
    /** Institution or personal application (s.334). */
    public readonly ?MuracaatTuru $muracaatTuru = null,
    /** Three-value admission reason (s.334). */
    public readonly ?MuracaatNedeni $muracaatNedeni = null,
    /** Admission reason text (s.334). */
    public readonly ?string $basvuruNedeni = null,
    /** Approval state; no code list given (s.334). */
    public readonly ?int $durum = null,
    /** Board-head physician registration number (s.334). */
    public readonly ?string $kurulBaskaniDrTescilNo = null,
    /** Description (s.334). */
    public readonly ?string $aciklama = null,
    /** Impairment rate between 0 and 100 (s.334). */
    public readonly ?int $engelOrani = null,
    /** Independent / partially dependent / fully dependent (s.334). */
    public readonly ?BagimlilikDurumu $bagimlilikDegerlendirilmesi = null,
    /** Nature of the work the person cannot perform (s.334). */
    public readonly ?string $calistirilamayacagiIslerinNiteligi = null,
    /** E = Evet, H = Hayır (s.334). */
    public readonly ?EvetHayir $ortopedikEngelVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $zihinselEngelVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $gormeEngeliVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $ruhsalVeDengeselEngelVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $isitmeEngeliVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $kronikEngeliVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $dilVeKonusmaEngeliVar = null,
    /** E/H (s.334). */
    public readonly ?EvetHayir $siniflanamayanEngeliVar = null,
    /** Diagnoses; item shape Tablo 4.9.1.h (ImzaliTaniBilgisiDVO, this registry) (s.335). */
    public readonly array $tanilar = [],
    /** Department opinions; item shape Tablo 4.9.1.i (EngellilikBransGorusBilgisiDVO, this registry) (s.335). */
    public readonly array $bransGorusler = [],
    /** Board members; the guide types it singular DoktorBilgisiDVO unlike the array in MaluliyetRaporDVO — preserved verbatim; shape ImzaliDoktorBilgisiDVO (s.335). */
    public readonly array $uyeler = [],
    /** Physicians pending approval; item shape ImzaliDoktorBilgisiDVO (s.335). */
    public readonly array $onayBekleyenDoktorlar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["tckimlikNo"]) && is_scalar($data["tckimlikNo"]) ? (string) $data["tckimlikNo"] : null,
        isset($data["fotograf"]) && is_array($data["fotograf"]) ? $data["fotograf"] : [],
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["raporNo"]) && is_scalar($data["raporNo"]) ? (string) $data["raporNo"] : null,
        isset($data["muracaatTuru"]) ? MuracaatTuru::tryFrom((string) $data["muracaatTuru"]) : null,
        isset($data["muracaatNedeni"]) ? MuracaatNedeni::tryFrom((string) $data["muracaatNedeni"]) : null,
        isset($data["basvuruNedeni"]) && is_scalar($data["basvuruNedeni"]) ? (string) $data["basvuruNedeni"] : null,
        isset($data["durum"]) && is_numeric($data["durum"]) ? (int) $data["durum"] : null,
        isset($data["kurulBaskaniDrTescilNo"]) && is_scalar($data["kurulBaskaniDrTescilNo"]) ? (string) $data["kurulBaskaniDrTescilNo"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["engelOrani"]) && is_numeric($data["engelOrani"]) ? (int) $data["engelOrani"] : null,
        isset($data["bagimlilikDegerlendirilmesi"]) ? BagimlilikDurumu::tryFrom((string) $data["bagimlilikDegerlendirilmesi"]) : null,
        isset($data["calistirilamayacagiIslerinNiteligi"]) && is_scalar($data["calistirilamayacagiIslerinNiteligi"]) ? (string) $data["calistirilamayacagiIslerinNiteligi"] : null,
        isset($data["ortopedikEngelVar"]) ? EvetHayir::tryFrom((string) $data["ortopedikEngelVar"]) : null,
        isset($data["zihinselEngelVar"]) ? EvetHayir::tryFrom((string) $data["zihinselEngelVar"]) : null,
        isset($data["gormeEngeliVar"]) ? EvetHayir::tryFrom((string) $data["gormeEngeliVar"]) : null,
        isset($data["ruhsalVeDengeselEngelVar"]) ? EvetHayir::tryFrom((string) $data["ruhsalVeDengeselEngelVar"]) : null,
        isset($data["isitmeEngeliVar"]) ? EvetHayir::tryFrom((string) $data["isitmeEngeliVar"]) : null,
        isset($data["kronikEngeliVar"]) ? EvetHayir::tryFrom((string) $data["kronikEngeliVar"]) : null,
        isset($data["dilVeKonusmaEngeliVar"]) ? EvetHayir::tryFrom((string) $data["dilVeKonusmaEngeliVar"]) : null,
        isset($data["siniflanamayanEngeliVar"]) ? EvetHayir::tryFrom((string) $data["siniflanamayanEngeliVar"]) : null,
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["bransGorusler"]) && is_array($data["bransGorusler"]) ? $data["bransGorusler"] : [],
        isset($data["uyeler"]) && is_array($data["uyeler"]) ? $data["uyeler"] : [],
        isset($data["onayBekleyenDoktorlar"]) && is_array($data["onayBekleyenDoktorlar"]) ? $data["onayBekleyenDoktorlar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporTakipNo" => $this->raporTakipNo,
        "tckimlikNo" => $this->tckimlikNo,
        "fotograf" => $this->fotograf,
        "tesisKodu" => $this->tesisKodu,
        "takipNo" => $this->takipNo,
        "raporNo" => $this->raporNo,
        "muracaatTuru" => $this->muracaatTuru !== null ? $this->muracaatTuru->value : null,
        "muracaatNedeni" => $this->muracaatNedeni !== null ? $this->muracaatNedeni->value : null,
        "basvuruNedeni" => $this->basvuruNedeni,
        "durum" => $this->durum,
        "kurulBaskaniDrTescilNo" => $this->kurulBaskaniDrTescilNo,
        "aciklama" => $this->aciklama,
        "engelOrani" => $this->engelOrani,
        "bagimlilikDegerlendirilmesi" => $this->bagimlilikDegerlendirilmesi !== null ? $this->bagimlilikDegerlendirilmesi->value : null,
        "calistirilamayacagiIslerinNiteligi" => $this->calistirilamayacagiIslerinNiteligi,
        "ortopedikEngelVar" => $this->ortopedikEngelVar !== null ? $this->ortopedikEngelVar->value : null,
        "zihinselEngelVar" => $this->zihinselEngelVar !== null ? $this->zihinselEngelVar->value : null,
        "gormeEngeliVar" => $this->gormeEngeliVar !== null ? $this->gormeEngeliVar->value : null,
        "ruhsalVeDengeselEngelVar" => $this->ruhsalVeDengeselEngelVar !== null ? $this->ruhsalVeDengeselEngelVar->value : null,
        "isitmeEngeliVar" => $this->isitmeEngeliVar !== null ? $this->isitmeEngeliVar->value : null,
        "kronikEngeliVar" => $this->kronikEngeliVar !== null ? $this->kronikEngeliVar->value : null,
        "dilVeKonusmaEngeliVar" => $this->dilVeKonusmaEngeliVar !== null ? $this->dilVeKonusmaEngeliVar->value : null,
        "siniflanamayanEngeliVar" => $this->siniflanamayanEngeliVar !== null ? $this->siniflanamayanEngeliVar->value : null,
        "tanilar" => $this->tanilar,
        "bransGorusler" => $this->bransGorusler,
        "uyeler" => $this->uyeler,
        "onayBekleyenDoktorlar" => $this->onayBekleyenDoktorlar,
        ];
    }
}
