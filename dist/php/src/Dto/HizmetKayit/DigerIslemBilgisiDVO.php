<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\AyniFarkliKesi;

/**
 * DigerIslemBilgisiDVO — guideVersion 3.1.1, page 192 (Tablo 4.2.1.d - DigerIslemBilgisiDVO (continues on s.193)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DigerIslemBilgisiDVO
{
    public function __construct(
    /** Quantity of the operation (s.192). */
    public readonly ?int $adet = null,
    /** Branch code of the operation (s.192). */
    public readonly ?string $bransKodu = null,
    /** SUT-defined operation code (s.192). */
    public readonly ?string $sutKodu = null,
    /** Diploma registration number of the performing doctor (s.192); optional for operations coded 530140 and 530150 per the guide note. */
    public readonly ?string $drTescilNo = null,
    /** Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.192). */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number of the registered service; send null while registering, Medula fills and returns it (s.192). Null-on-input pattern. */
    public readonly ?string $islemSiraNo = null,
    /** Operation date in dd.mm.yyyy format (s.192). */
    public readonly ?string $islemTarihi = null,
    /** Medula record number of a registered report (s.192); mandatory for report-requiring operations (Diyaliz, FTR, etc.). */
    public readonly ?string $raporTakipNo = null,
    /** Special condition code; see guide Tablo 5.1 OzelDurumVO (s.192). */
    public readonly ?string $ozelDurum = null,
    /** Same-session/same-incision relation code (s.192-193); codes 1-5. */
    public readonly ?AyniFarkliKesi $ayniFarkliKesi = null,
    /** Multiple special-condition codes (s.193). */
    public readonly array $cokluOzelDurum = [],
    /** Operation description (s.193). */
    public readonly ?string $aciklama = null,
    /** Side code using R (Sag) / L (Sol) letters in this table (s.193) - diverges from the AmeliyatveGirisim 1/2/3 codes; divergence noted. */
    public readonly ?string $sagSol = null,
    /** Registration number of the requesting doctor (s.193). */
    public readonly ?string $istemYapanDrTescilNo = null,
    /** Branch code of the requesting doctor (s.193). */
    public readonly ?string $istemYapanDrBrans = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["adet"]) && is_numeric($data["adet"]) ? (int) $data["adet"] : null,
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["ayniFarkliKesi"]) ? AyniFarkliKesi::tryFrom((string) $data["ayniFarkliKesi"]) : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["sagSol"]) && is_scalar($data["sagSol"]) ? (string) $data["sagSol"] : null,
        isset($data["istemYapanDrTescilNo"]) && is_scalar($data["istemYapanDrTescilNo"]) ? (string) $data["istemYapanDrTescilNo"] : null,
        isset($data["istemYapanDrBrans"]) && is_scalar($data["istemYapanDrBrans"]) ? (string) $data["istemYapanDrBrans"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "adet" => $this->adet,
        "bransKodu" => $this->bransKodu,
        "sutKodu" => $this->sutKodu,
        "drTescilNo" => $this->drTescilNo,
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        "islemSiraNo" => $this->islemSiraNo,
        "islemTarihi" => $this->islemTarihi,
        "raporTakipNo" => $this->raporTakipNo,
        "ozelDurum" => $this->ozelDurum,
        "ayniFarkliKesi" => $this->ayniFarkliKesi !== null ? $this->ayniFarkliKesi->value : null,
        "cokluOzelDurum" => $this->cokluOzelDurum,
        "aciklama" => $this->aciklama,
        "sagSol" => $this->sagSol,
        "istemYapanDrTescilNo" => $this->istemYapanDrTescilNo,
        "istemYapanDrBrans" => $this->istemYapanDrBrans,
        ];
    }
}
