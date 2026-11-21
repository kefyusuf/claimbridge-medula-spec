<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * KanBilgisiDVO — guideVersion 3.1.1, page 234 (Tablo 4.2.1.s - KanBilgisiDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KanBilgisiDVO
{
    public function __construct(
    /** Branch code of the transfusion (s.234) */
    public readonly ?string $bransKodu = null,
    /** Registration number of the performing doctor (s.235) */
    public readonly ?string $drTescilNo = null,
    /** SUT-defined operation code (s.235) */
    public readonly ?string $sutKodu = null,
    /** Institution reference paired with islemSiraNo (s.235) */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number; null-on-input pattern (s.235) */
    public readonly ?string $islemSiraNo = null,
    /** Quantity of blood products (s.235) */
    public readonly ?int $adet = null,
    /** ISBT component number of the blood product (s.235) */
    public readonly ?string $isbtBilesenNo = null,
    /** ISBT unit number of the blood product (s.235) */
    public readonly ?string $isbtUniteNo = null,
    /** Transfusion date, dd.mm.yyyy (s.235) */
    public readonly ?string $islemTarihi = null,
    /** Special condition code, Tablo 5.1 OzelDurumVO (s.235) */
    public readonly ?string $ozelDurum = null,
    /** Multiple special-condition codes (s.235) */
    public readonly array $cokluOzelDurum = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (int) $data["adet"] : null,
        isset($data["isbtBilesenNo"]) && is_scalar($data["isbtBilesenNo"]) ? (string) $data["isbtBilesenNo"] : null,
        isset($data["isbtUniteNo"]) && is_scalar($data["isbtUniteNo"]) ? (string) $data["isbtUniteNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "bransKodu" => $bransKodu,
        "drTescilNo" => $drTescilNo,
        "sutKodu" => $sutKodu,
        "hizmetSunucuRefNo" => $hizmetSunucuRefNo,
        "islemSiraNo" => $islemSiraNo,
        "adet" => $adet,
        "isbtBilesenNo" => $isbtBilesenNo,
        "isbtUniteNo" => $isbtUniteNo,
        "islemTarihi" => $islemTarihi,
        "ozelDurum" => $ozelDurum,
        "cokluOzelDurum" => $cokluOzelDurum,
        ];
    }
}
