<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\MalzemeTuru;

/**
 * MalzemeBilgisiDVO — guideVersion 3.1.1, page 224 (Tablo 4.2.1.h - MalzemeBilgisiDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MalzemeBilgisiDVO
{
    public function __construct(
    /** Name of the uncoded material; required when malzemeTuru is 3 (s.224) */
    public readonly ?string $kodsuzMalzemeAdi = null,
    /** Quantity of the used material (s.224) */
    public readonly ?float $adet = null,
    /** UBB material barcode; required since 01.02.2008 (s.225) */
    public readonly ?string $barkod = null,
    /** Institution reference paired with islemSiraNo (s.225) */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number; null-on-input pattern (s.225) */
    public readonly ?string $islemSiraNo = null,
    /** Date the material was used, dd.mm.yyyy (s.225) */
    public readonly ?string $islemTarihi = null,
    /** Price of the uncoded material; sent for coded materials too (s.225) */
    public readonly ?float $kodsuzMalzemeFiyati = null,
    /** Material code; required for SUT and protocol materials (s.225) */
    public readonly ?string $malzemeKodu = null,
    /** Material type - 1 SUT kodlu, 2 Emekli Sandigi protokol kodlu, 3 kodsuz (s.225) */
    public readonly ?MalzemeTuru $malzemeTuru = null,
    /** 0 when included in the package, 1 when excluded (s.225) */
    public readonly ?string $paketHaric = null,
    /** E when a patient contribution exists, H when not (s.225) */
    public readonly ?string $katkiPayi = null,
    /** VAT amount of the material (s.225) */
    public readonly ?int $kdv = null,
    /** Special condition code, Tablo 5.1 OzelDurumVO (s.225) */
    public readonly ?string $ozelDurum = null,
    /** Multiple special-condition codes (s.226) */
    public readonly array $cokluOzelDurum = [],
    /** Date the material was purchased (s.226) */
    public readonly ?string $malzemeSatinAlisTarihi = null,
    /** Mandatory for allograft shipments (s.226) */
    public readonly ?string $donorId = null,
    /** Mandatory for public institutions for uncoded materials used on or after 01.10.2014 (s.226) */
    public readonly ?string $ihaleKesinlesmeTarihi = null,
    /** Mandatory for public institutions for uncoded materials used on or after 01.10.2014 (s.226) */
    public readonly ?string $ikNoAlimNo = null,
    /** Vendor identifier of the material supplier (mandatory since 02.07.2018) (s.226) */
    public readonly ?string $bayiNo = null,
    /** Report tracking number (s.226) */
    public readonly ?string $raporTakipNo = null,
    /** R (Sag) / L (Sol) side code (s.226) */
    public readonly ?string $sagSol = null,
    /** SUT code of the concurrently performed operation (s.226) */
    public readonly ?string $birlikteYapilanIslemSUTKodu = null,
    /** Institution reference of the concurrently performed operation (s.226) */
    public readonly ?string $birlikteYapilanIslemHizmetSunucuRefNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kodsuzMalzemeAdi"]) && is_scalar($data["kodsuzMalzemeAdi"]) ? (string) $data["kodsuzMalzemeAdi"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (float) $data["adet"] : null,
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["kodsuzMalzemeFiyati"]) && is_numeric($data["kodsuzMalzemeFiyati"]) ? (float) $data["kodsuzMalzemeFiyati"] : null,
        isset($data["malzemeKodu"]) && is_scalar($data["malzemeKodu"]) ? (string) $data["malzemeKodu"] : null,
        isset($data["malzemeTuru"]) ? MalzemeTuru::tryFrom((string) $data["malzemeTuru"]) : null,
        isset($data["paketHaric"]) && is_scalar($data["paketHaric"]) ? (string) $data["paketHaric"] : null,
        isset($data["katkiPayi"]) && is_scalar($data["katkiPayi"]) ? (string) $data["katkiPayi"] : null,
        isset($data["kdv"]) && is_numeric($data["kdv"]) ? (int) $data["kdv"] : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        isset($data["malzemeSatinAlisTarihi"]) && is_scalar($data["malzemeSatinAlisTarihi"]) ? (string) $data["malzemeSatinAlisTarihi"] : null,
        isset($data["donorId"]) && is_scalar($data["donorId"]) ? (string) $data["donorId"] : null,
        isset($data["ihaleKesinlesmeTarihi"]) && is_scalar($data["ihaleKesinlesmeTarihi"]) ? (string) $data["ihaleKesinlesmeTarihi"] : null,
        isset($data["ikNoAlimNo"]) && is_scalar($data["ikNoAlimNo"]) ? (string) $data["ikNoAlimNo"] : null,
        isset($data["bayiNo"]) && is_scalar($data["bayiNo"]) ? (string) $data["bayiNo"] : null,
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["sagSol"]) && is_scalar($data["sagSol"]) ? (string) $data["sagSol"] : null,
        isset($data["birlikteYapilanIslemSUTKodu"]) && is_scalar($data["birlikteYapilanIslemSUTKodu"]) ? (string) $data["birlikteYapilanIslemSUTKodu"] : null,
        isset($data["birlikteYapilanIslemHizmetSunucuRefNo"]) && is_scalar($data["birlikteYapilanIslemHizmetSunucuRefNo"]) ? (string) $data["birlikteYapilanIslemHizmetSunucuRefNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "kodsuzMalzemeAdi" => $kodsuzMalzemeAdi,
        "adet" => $adet,
        "barkod" => $barkod,
        "hizmetSunucuRefNo" => $hizmetSunucuRefNo,
        "islemSiraNo" => $islemSiraNo,
        "islemTarihi" => $islemTarihi,
        "kodsuzMalzemeFiyati" => $kodsuzMalzemeFiyati,
        "malzemeKodu" => $malzemeKodu,
        "malzemeTuru" => $malzemeTuru !== null ? $malzemeTuru->value : null,
        "paketHaric" => $paketHaric,
        "katkiPayi" => $katkiPayi,
        "kdv" => $kdv,
        "ozelDurum" => $ozelDurum,
        "cokluOzelDurum" => $cokluOzelDurum,
        "malzemeSatinAlisTarihi" => $malzemeSatinAlisTarihi,
        "donorId" => $donorId,
        "ihaleKesinlesmeTarihi" => $ihaleKesinlesmeTarihi,
        "ikNoAlimNo" => $ikNoAlimNo,
        "bayiNo" => $bayiNo,
        "raporTakipNo" => $raporTakipNo,
        "sagSol" => $sagSol,
        "birlikteYapilanIslemSUTKodu" => $birlikteYapilanIslemSUTKodu,
        "birlikteYapilanIslemHizmetSunucuRefNo" => $birlikteYapilanIslemHizmetSunucuRefNo,
        ];
    }
}
