<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\OdemeSorguDurum;

/**
 * HizmetDVO — guideVersion 3.1.1, page 237 (Tablo 4.2.2.c - HizmetDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetDVO
{
    public function __construct(
    /** Surgery/intervention records (AmeliyatveGirisimBilgisiDVO[], Tablo 4.2.1.c, s.190). */
    public readonly array $ameliyatveGirisimBilgileri = [],
    /** Other operation records (DigerIslemBilgisiDVO[], Tablo 4.2.1.d, s.190). */
    public readonly array $digerIslemBilgileri = [],
    /** Dental records (DisBilgisiDVO[], Tablo 4.2.1.e, s.190). */
    public readonly array $disBilgileri = [],
    /** Medication records (IlacBilgisiDVO[], Tablo 4.2.1.f, s.190). */
    public readonly array $ilacBilgileri = [],
    /** Consultation records (KonsultasyonBilgisiDVO[], Tablo 4.2.1.g, s.190). */
    public readonly array $konsultasyonBilgileri = [],
    /** Material records (MalzemeBilgisiDVO[], Tablo 4.2.1.h, s.190). */
    public readonly array $malzemeBilgileri = [],
    /** Examination record (MuayeneBilgisiDVO, Tablo 4.2.1.i, s.190). */
    public readonly array $muayeneBilgisi = [],
    /** Lab test records (TahlilBilgisiDVO[], Tablo 4.2.1.j, s.190). */
    public readonly array $tahlilBilgileri = [],
    /** Diagnosis records (TaniBilgisiDVO[], Tablo 4.2.1.k, s.232). */
    public readonly array $tanilar = [],
    /** Imaging records (TetkikveRadyolojiBilgisiDVO[], Tablo 4.2.1.l, s.232). */
    public readonly array $tetkikveRadyolojiBilgileri = [],
    /** Hospitalization records (HastaYatisBilgisiDVO[], Tablo 4.2.1.o, s.190). */
    public readonly array $hastaYatisBilgileri = [],
    /** Blood product records (KanBilgisiDVO[], Tablo 4.2.1.s, s.190). */
    public readonly array $kanBilgileri = [],
    /** Tracking number of the read services (s.238). */
    public readonly ?string $takipNo = null,
    /** Payment-inquiry state of the registered services (s.238); codes 0-6 and X. */
    public readonly ?OdemeSorguDurum $odemeSorguDurum = null,
    /** Triage declaration taking S/K/Y values (s.238). */
    public readonly ?string $triajBeyani = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["ameliyatveGirisimBilgileri"]) && is_array($data["ameliyatveGirisimBilgileri"]) ? $data["ameliyatveGirisimBilgileri"] : [],
        isset($data["digerIslemBilgileri"]) && is_array($data["digerIslemBilgileri"]) ? $data["digerIslemBilgileri"] : [],
        isset($data["disBilgileri"]) && is_array($data["disBilgileri"]) ? $data["disBilgileri"] : [],
        isset($data["ilacBilgileri"]) && is_array($data["ilacBilgileri"]) ? $data["ilacBilgileri"] : [],
        isset($data["konsultasyonBilgileri"]) && is_array($data["konsultasyonBilgileri"]) ? $data["konsultasyonBilgileri"] : [],
        isset($data["malzemeBilgileri"]) && is_array($data["malzemeBilgileri"]) ? $data["malzemeBilgileri"] : [],
        isset($data["muayeneBilgisi"]) && is_array($data["muayeneBilgisi"]) ? $data["muayeneBilgisi"] : [],
        isset($data["tahlilBilgileri"]) && is_array($data["tahlilBilgileri"]) ? $data["tahlilBilgileri"] : [],
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["tetkikveRadyolojiBilgileri"]) && is_array($data["tetkikveRadyolojiBilgileri"]) ? $data["tetkikveRadyolojiBilgileri"] : [],
        isset($data["hastaYatisBilgileri"]) && is_array($data["hastaYatisBilgileri"]) ? $data["hastaYatisBilgileri"] : [],
        isset($data["kanBilgileri"]) && is_array($data["kanBilgileri"]) ? $data["kanBilgileri"] : [],
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["odemeSorguDurum"]) ? OdemeSorguDurum::tryFrom((string) $data["odemeSorguDurum"]) : null,
        isset($data["triajBeyani"]) && is_scalar($data["triajBeyani"]) ? (string) $data["triajBeyani"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "ameliyatveGirisimBilgileri" => $this->ameliyatveGirisimBilgileri,
        "digerIslemBilgileri" => $this->digerIslemBilgileri,
        "disBilgileri" => $this->disBilgileri,
        "ilacBilgileri" => $this->ilacBilgileri,
        "konsultasyonBilgileri" => $this->konsultasyonBilgileri,
        "malzemeBilgileri" => $this->malzemeBilgileri,
        "muayeneBilgisi" => $this->muayeneBilgisi,
        "tahlilBilgileri" => $this->tahlilBilgileri,
        "tanilar" => $this->tanilar,
        "tetkikveRadyolojiBilgileri" => $this->tetkikveRadyolojiBilgileri,
        "hastaYatisBilgileri" => $this->hastaYatisBilgileri,
        "kanBilgileri" => $this->kanBilgileri,
        "takipNo" => $this->takipNo,
        "odemeSorguDurum" => $this->odemeSorguDurum !== null ? $this->odemeSorguDurum->value : null,
        "triajBeyani" => $this->triajBeyani,
        ];
    }
}
