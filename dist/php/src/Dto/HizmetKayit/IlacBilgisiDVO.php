<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\IlacTuru;

/**
 * IlacBilgisiDVO — guideVersion 3.1.1, page 198 (Tablo 4.2.1.f - IlacBilgisiDVO (table continues through s.224) (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacBilgisiDVO
{
    public function __construct(
    /** Drug description; majistral drugs carry the content here (s.198) */
    public readonly ?string $aciklama = null,
    /** Drug quantity; the usage unit comes from the Yardimci Servisleri ilac-ara method (s.198) */
    public readonly ?float $adet = null,
    /** Drug barcode registered in GSS; mandatory except for majistral drugs (s.198) */
    public readonly ?string $barkod = null,
    /** Institution reference paired with islemSiraNo (s.198) */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Drug type - 1 Barkodlu, 2 Majistral, 3 Radyofarmasotik Ajan (s.198) */
    public readonly ?IlacTuru $ilacTuru = null,
    /** Sequence number; null-on-input pattern (s.198) */
    public readonly ?string $islemSiraNo = null,
    /** Drug usage date, dd.mm.yyyy (s.198) */
    public readonly ?string $islemTarihi = null,
    /** Amount for majistral drugs and radiopharmaceutical agents (s.198) */
    public readonly ?float $tutar = null,
    /** 0 when included in the package, 1 when excluded (s.198) */
    public readonly ?string $paketHaric = null,
    /** Special condition code, Tablo 5.1 OzelDurumVO (s.198) */
    public readonly ?string $ozelDurum = null,
    /** Multiple special-condition codes (s.198) */
    public readonly array $cokluOzelDurum = [],
    /** Drug serial number (s.199) */
    public readonly ?string $seriNo = null,
    /** Drug expiry date (s.199) */
    public readonly ?string $sonKullanimTarihi = null,
    /** Drug batch number (s.199) */
    public readonly ?string $batchNo = null,
    /** Unit consumption ID received from the ITS system (s.199) */
    public readonly ?string $itsBirimSarfId = null,
    /** Majistral drug composite, expanded as the MajistralIlacDVO registry entity (Tablo 4.2.1.f.1, s.199-200) (s.199) */
    public readonly array $majistralIlac = [],
    /** SUT code of the concurrently performed operation (s.199) */
    public readonly ?string $birlikteYapilanIslemSUTKodu = null,
    /** Institution reference of the concurrently performed operation (s.199) */
    public readonly ?string $birlikteYapilanIslemHizmetSunucuRefNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (float) $data["adet"] : null,
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["ilacTuru"]) ? IlacTuru::tryFrom((string) $data["ilacTuru"]) : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["tutar"]) && is_numeric($data["tutar"]) ? (float) $data["tutar"] : null,
        isset($data["paketHaric"]) && is_scalar($data["paketHaric"]) ? (string) $data["paketHaric"] : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        isset($data["seriNo"]) && is_scalar($data["seriNo"]) ? (string) $data["seriNo"] : null,
        isset($data["sonKullanimTarihi"]) && is_scalar($data["sonKullanimTarihi"]) ? (string) $data["sonKullanimTarihi"] : null,
        isset($data["batchNo"]) && is_scalar($data["batchNo"]) ? (string) $data["batchNo"] : null,
        isset($data["itsBirimSarfId"]) && is_scalar($data["itsBirimSarfId"]) ? (string) $data["itsBirimSarfId"] : null,
        isset($data["majistralIlac"]) && is_array($data["majistralIlac"]) ? $data["majistralIlac"] : [],
        isset($data["birlikteYapilanIslemSUTKodu"]) && is_scalar($data["birlikteYapilanIslemSUTKodu"]) ? (string) $data["birlikteYapilanIslemSUTKodu"] : null,
        isset($data["birlikteYapilanIslemHizmetSunucuRefNo"]) && is_scalar($data["birlikteYapilanIslemHizmetSunucuRefNo"]) ? (string) $data["birlikteYapilanIslemHizmetSunucuRefNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "aciklama" => $this->aciklama,
        "adet" => $this->adet,
        "barkod" => $this->barkod,
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        "ilacTuru" => $this->ilacTuru !== null ? $this->ilacTuru->value : null,
        "islemSiraNo" => $this->islemSiraNo,
        "islemTarihi" => $this->islemTarihi,
        "tutar" => $this->tutar,
        "paketHaric" => $this->paketHaric,
        "ozelDurum" => $this->ozelDurum,
        "cokluOzelDurum" => $this->cokluOzelDurum,
        "seriNo" => $this->seriNo,
        "sonKullanimTarihi" => $this->sonKullanimTarihi,
        "batchNo" => $this->batchNo,
        "itsBirimSarfId" => $this->itsBirimSarfId,
        "majistralIlac" => $this->majistralIlac,
        "birlikteYapilanIslemSUTKodu" => $this->birlikteYapilanIslemSUTKodu,
        "birlikteYapilanIslemHizmetSunucuRefNo" => $this->birlikteYapilanIslemHizmetSunucuRefNo,
        ];
    }
}
