<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\AyniFarkliKesi;
use ClaimBridge\Medula\Enum\TahlilTipi;

/**
 * TahlilBilgisiDVO — guideVersion 3.1.1, page 227 (Tablo 4.2.1.j - TahlilBilgisiDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TahlilBilgisiDVO
{
    public function __construct(
    /** Branch code of the lab test (s.227) */
    public readonly ?string $bransKodu = null,
    /** Registration number of the performing doctor (s.227) */
    public readonly ?string $drTescilNo = null,
    /** Registration number of the requesting doctor (s.227) */
    public readonly ?string $istemYapanDrTescilNo = null,
    /** SUT-defined operation code (s.227) */
    public readonly ?string $sutKodu = null,
    /** Institution reference paired with islemSiraNo (s.227) */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number; null-on-input pattern (s.227) */
    public readonly ?string $islemSiraNo = null,
    /** Lab test date, dd.mm.yyyy (s.228) */
    public readonly ?string $islemTarihi = null,
    /** Special condition code, Tablo 5.1 OzelDurumVO (s.228) */
    public readonly ?string $ozelDurum = null,
    /** Multiple special-condition codes (s.228) */
    public readonly array $cokluOzelDurum = [],
    /** Report tracking number (s.228) */
    public readonly ?string $raporTakipNo = null,
    /** Branch code of the requesting doctor (s.228) */
    public readonly ?string $istemYapanDrBrans = null,
    /** Gene details, expanded as the GenBilgisiDVO registry entity (Tablo 4.2.1.j.2, s.231) (s.228) */
    public readonly array $genBilgisi = [],
    /** Lab-type code - codes 0, HEM102-121, IDR102-128, KGAZ01-17, OGTT01-08 in the tahlil-tipi registry enum */
    public readonly ?TahlilTipi $tahlilTipi = null,
    /** Result unit (s.231) */
    public readonly ?string $birim = null,
    /** R (Sag) / L (Sol) side code (s.231) */
    public readonly ?string $sagSol = null,
    /** Incision/session relation; codes 1-5 match the ayni-farkli-kesi enum (s.231) */
    public readonly ?AyniFarkliKesi $ayniFarkliKesi = null,
    /** Lab description (s.231) */
    public readonly ?string $aciklama = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["istemYapanDrTescilNo"]) && is_scalar($data["istemYapanDrTescilNo"]) ? (string) $data["istemYapanDrTescilNo"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["istemYapanDrBrans"]) && is_scalar($data["istemYapanDrBrans"]) ? (string) $data["istemYapanDrBrans"] : null,
        isset($data["genBilgisi"]) && is_array($data["genBilgisi"]) ? $data["genBilgisi"] : [],
        isset($data["tahlilTipi"]) ? TahlilTipi::tryFrom((string) $data["tahlilTipi"]) : null,
        isset($data["birim"]) && is_scalar($data["birim"]) ? (string) $data["birim"] : null,
        isset($data["sagSol"]) && is_scalar($data["sagSol"]) ? (string) $data["sagSol"] : null,
        isset($data["ayniFarkliKesi"]) ? AyniFarkliKesi::tryFrom((string) $data["ayniFarkliKesi"]) : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "bransKodu" => $bransKodu,
        "drTescilNo" => $drTescilNo,
        "istemYapanDrTescilNo" => $istemYapanDrTescilNo,
        "sutKodu" => $sutKodu,
        "hizmetSunucuRefNo" => $hizmetSunucuRefNo,
        "islemSiraNo" => $islemSiraNo,
        "islemTarihi" => $islemTarihi,
        "ozelDurum" => $ozelDurum,
        "cokluOzelDurum" => $cokluOzelDurum,
        "raporTakipNo" => $raporTakipNo,
        "istemYapanDrBrans" => $istemYapanDrBrans,
        "genBilgisi" => $genBilgisi,
        "tahlilTipi" => $tahlilTipi !== null ? $tahlilTipi->value : null,
        "birim" => $birim,
        "sagSol" => $sagSol,
        "ayniFarkliKesi" => $ayniFarkliKesi !== null ? $ayniFarkliKesi->value : null,
        "aciklama" => $aciklama,
        ];
    }
}
