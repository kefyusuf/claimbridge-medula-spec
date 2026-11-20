<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * DisBilgisiDVO — guideVersion 3.1.1, page 193 (Tablo 4.2.1.e - DisBilgisiDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DisBilgisiDVO
{
    public function __construct(
    /** Registration number of the performing doctor (s.193) */
    public readonly ?string $drTescilNo = null,
    /** Anomaly flag taking E (Evet) or H (Hayir) (s.193) */
    public readonly ?string $anomali = null,
    /** Quantity of the dental operation (s.193) */
    public readonly ?int $adet = null,
    /** Branch code of the operation (s.193) */
    public readonly ?string $bransKodu = null,
    /** Institution reference paired with islemSiraNo (s.193) */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number; null-on-input pattern (s.193) */
    public readonly ?string $islemSiraNo = null,
    /** Operation date, dd.mm.yyyy (s.193) */
    public readonly ?string $islemTarihi = null,
    /** Teeth of the right lower jaw (s.193) */
    public readonly ?string $sagAltCene = null,
    /** Milk teeth of the right lower jaw (children) (s.193) */
    public readonly ?string $sagSutAltCene = null,
    /** Milk teeth of the right upper jaw (children) (s.194) */
    public readonly ?string $sagSutUstCene = null,
    /** Teeth of the right upper jaw (s.194) */
    public readonly ?string $sagUstCene = null,
    /** Teeth of the left lower jaw (s.194) */
    public readonly ?string $solAltCene = null,
    /** Milk teeth of the left lower jaw (children) (s.194) */
    public readonly ?string $solSutAltCene = null,
    /** Milk teeth of the left upper jaw (children) (s.194) */
    public readonly ?string $solSutUstCene = null,
    /** Teeth of the left upper jaw (s.194) */
    public readonly ?string $solUstCene = null,
    /** E when an operation was performed on an anomalous tooth (s.194) */
    public readonly ?string $sagAltCeneAnomaliDis = null,
    /** E when an operation was performed on an anomalous tooth (s.194) */
    public readonly ?string $sagUstCeneAnomaliDis = null,
    /** E when an operation was performed on an anomalous tooth (s.194) */
    public readonly ?string $solAltCeneAnomaliDis = null,
    /** E when an operation was performed on an anomalous tooth (s.194) */
    public readonly ?string $solUstCeneAnomaliDis = null,
    /** SUT-defined operation code (s.194) */
    public readonly ?string $sutKodu = null,
    /** Incision/session relation; values diverge from the ameliyat table (cut in extraction, s.194) (s.194) */
    public readonly ?string $ayniFarkliKesi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["anomali"]) && is_scalar($data["anomali"]) ? (string) $data["anomali"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (int) $data["adet"] : null,
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["sagAltCene"]) && is_scalar($data["sagAltCene"]) ? (string) $data["sagAltCene"] : null,
        isset($data["sagSutAltCene"]) && is_scalar($data["sagSutAltCene"]) ? (string) $data["sagSutAltCene"] : null,
        isset($data["sagSutUstCene"]) && is_scalar($data["sagSutUstCene"]) ? (string) $data["sagSutUstCene"] : null,
        isset($data["sagUstCene"]) && is_scalar($data["sagUstCene"]) ? (string) $data["sagUstCene"] : null,
        isset($data["solAltCene"]) && is_scalar($data["solAltCene"]) ? (string) $data["solAltCene"] : null,
        isset($data["solSutAltCene"]) && is_scalar($data["solSutAltCene"]) ? (string) $data["solSutAltCene"] : null,
        isset($data["solSutUstCene"]) && is_scalar($data["solSutUstCene"]) ? (string) $data["solSutUstCene"] : null,
        isset($data["solUstCene"]) && is_scalar($data["solUstCene"]) ? (string) $data["solUstCene"] : null,
        isset($data["sagAltCeneAnomaliDis"]) && is_scalar($data["sagAltCeneAnomaliDis"]) ? (string) $data["sagAltCeneAnomaliDis"] : null,
        isset($data["sagUstCeneAnomaliDis"]) && is_scalar($data["sagUstCeneAnomaliDis"]) ? (string) $data["sagUstCeneAnomaliDis"] : null,
        isset($data["solAltCeneAnomaliDis"]) && is_scalar($data["solAltCeneAnomaliDis"]) ? (string) $data["solAltCeneAnomaliDis"] : null,
        isset($data["solUstCeneAnomaliDis"]) && is_scalar($data["solUstCeneAnomaliDis"]) ? (string) $data["solUstCeneAnomaliDis"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["ayniFarkliKesi"]) && is_scalar($data["ayniFarkliKesi"]) ? (string) $data["ayniFarkliKesi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $drTescilNo,
        $anomali,
        $adet,
        $bransKodu,
        $hizmetSunucuRefNo,
        $islemSiraNo,
        $islemTarihi,
        $sagAltCene,
        $sagSutAltCene,
        $sagSutUstCene,
        $sagUstCene,
        $solAltCene,
        $solSutAltCene,
        $solSutUstCene,
        $solUstCene,
        $sagAltCeneAnomaliDis,
        $sagUstCeneAnomaliDis,
        $solAltCeneAnomaliDis,
        $solUstCeneAnomaliDis,
        $sutKodu,
        $ayniFarkliKesi,
        ];
    }
}
