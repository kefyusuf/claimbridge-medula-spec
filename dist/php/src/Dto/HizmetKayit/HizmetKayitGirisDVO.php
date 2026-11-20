<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HizmetKayitGirisDVO — guideVersion 3.1.1, page 189 (Tablo 4.2.1.a - HizmetKayitGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetKayitGirisDVO
{
    public function __construct(
    /** Code of the institution performing the service registration (s.189). */
    public readonly ?int $saglikTesisKodu = null,
    /** Tracking number the services are registered against (s.189). */
    public readonly ?string $takipNo = null,
    /** Patient application number; the guide marks it optional here (s.189). */
    public readonly ?string $hastaBasvuruNo = null,
    /** Diagnosis entries as an array of TaniBilgisiDVO (Tablo 4.2.1.k, s.232). Verification correction - the guide names this field tanilar. */
    public readonly array $tanilar = [],
    /** Surgery and intervention entries as an array (AmeliyatveGirisimBilgisiDVO, s.189). */
    public readonly array $ameliyatveGirisimBilgileri = [],
    /** Other operation entries (DigerIslemBilgisiDVO, s.189). */
    public readonly array $digerIslemBilgileri = [],
    /** Dental entries (DisBilgisiDVO, s.189). */
    public readonly array $disBilgileri = [],
    /** Medication entries (IlacBilgisiDVO, s.189). */
    public readonly array $ilacBilgileri = [],
    /** Consultation entries (KonsultasyonBilgisiDVO, s.189). */
    public readonly array $konsultasyonBilgileri = [],
    /** Material entries (MalzemeBilgisiDVO, s.189). */
    public readonly array $malzemeBilgileri = [],
    /** Examination entry (MuayeneBilgisiDVO, s.189). */
    public readonly array $muayeneBilgisi = [],
    /** Lab test entries (TahlilBilgisiDVO, s.189). */
    public readonly array $tahlilBilgileri = [],
    /** Imaging and work-up entries (TetkikveRadyolojiBilgisiDVO, s.189). */
    public readonly array $tetkikveRadyolojiBilgileri = [],
    /** Hospitalization entries (HastaYatisBilgisiDVO, s.190); mandatory for inpatient takips per the guide note. */
    public readonly array $hastaYatisBilgileri = [],
    /** Blood transfusion entries (KanBilgisiDVO, s.190). */
    public readonly array $kanBilgileri = [],
    /** Triage declaration taking S/K/Y values; mandatory for emergency takips (s.190). */
    public readonly ?string $triajBeyani = null,
    /** Software vendor KTS code (s.190). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["ameliyatveGirisimBilgileri"]) && is_array($data["ameliyatveGirisimBilgileri"]) ? $data["ameliyatveGirisimBilgileri"] : [],
        isset($data["digerIslemBilgileri"]) && is_array($data["digerIslemBilgileri"]) ? $data["digerIslemBilgileri"] : [],
        isset($data["disBilgileri"]) && is_array($data["disBilgileri"]) ? $data["disBilgileri"] : [],
        isset($data["ilacBilgileri"]) && is_array($data["ilacBilgileri"]) ? $data["ilacBilgileri"] : [],
        isset($data["konsultasyonBilgileri"]) && is_array($data["konsultasyonBilgileri"]) ? $data["konsultasyonBilgileri"] : [],
        isset($data["malzemeBilgileri"]) && is_array($data["malzemeBilgileri"]) ? $data["malzemeBilgileri"] : [],
        isset($data["muayeneBilgisi"]) && is_array($data["muayeneBilgisi"]) ? $data["muayeneBilgisi"] : [],
        isset($data["tahlilBilgileri"]) && is_array($data["tahlilBilgileri"]) ? $data["tahlilBilgileri"] : [],
        isset($data["tetkikveRadyolojiBilgileri"]) && is_array($data["tetkikveRadyolojiBilgileri"]) ? $data["tetkikveRadyolojiBilgileri"] : [],
        isset($data["hastaYatisBilgileri"]) && is_array($data["hastaYatisBilgileri"]) ? $data["hastaYatisBilgileri"] : [],
        isset($data["kanBilgileri"]) && is_array($data["kanBilgileri"]) ? $data["kanBilgileri"] : [],
        isset($data["triajBeyani"]) && is_scalar($data["triajBeyani"]) ? (string) $data["triajBeyani"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $takipNo,
        $hastaBasvuruNo,
        $tanilar,
        $ameliyatveGirisimBilgileri,
        $digerIslemBilgileri,
        $disBilgileri,
        $ilacBilgileri,
        $konsultasyonBilgileri,
        $malzemeBilgileri,
        $muayeneBilgisi,
        $tahlilBilgileri,
        $tetkikveRadyolojiBilgileri,
        $hastaYatisBilgileri,
        $kanBilgileri,
        $triajBeyani,
        $ktsHbysKodu,
        ];
    }
}
