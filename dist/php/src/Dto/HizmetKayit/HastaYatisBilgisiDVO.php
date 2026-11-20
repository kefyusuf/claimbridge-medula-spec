<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HastaYatisBilgisiDVO — guideVersion 3.1.1, page 234 (Tablo 4.2.1.o - HastaYatisBilgisiDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaYatisBilgisiDVO
{
    public function __construct(
    /** Branch code of the hospitalization (s.234) */
    public readonly ?string $bransKodu = null,
    /** Registration number of the performing doctor (s.234) */
    public readonly ?string $drTescilNo = null,
    /** SUT-defined operation code (s.234) */
    public readonly ?string $sutKodu = null,
    /** Institution reference paired with islemSiraNo (s.234) */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number; null-on-input pattern (s.234) */
    public readonly ?string $islemSiraNo = null,
    /** Companion days; empty when no companion (s.234) */
    public readonly ?string $refakatciGunSayisi = null,
    /** Hospitalization start date, dd.mm.yyyy (s.234) */
    public readonly ?string $yatisBaslangicTarihi = null,
    /** Hospitalization end date, dd.mm.yyyy (s.234) */
    public readonly ?string $yatisBitisTarihi = null,
    /** Special condition code, Tablo 5.1 OzelDurumVO (s.234) */
    public readonly ?string $ozelDurum = null,
    /** Hospitalization description (s.234) */
    public readonly ?string $aciklama = null,
    /** Multiple special-condition codes (s.234) */
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
        isset($data["refakatciGunSayisi"]) && is_scalar($data["refakatciGunSayisi"]) ? (string) $data["refakatciGunSayisi"] : null,
        isset($data["yatisBaslangicTarihi"]) && is_scalar($data["yatisBaslangicTarihi"]) ? (string) $data["yatisBaslangicTarihi"] : null,
        isset($data["yatisBitisTarihi"]) && is_scalar($data["yatisBitisTarihi"]) ? (string) $data["yatisBitisTarihi"] : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $bransKodu,
        $drTescilNo,
        $sutKodu,
        $hizmetSunucuRefNo,
        $islemSiraNo,
        $refakatciGunSayisi,
        $yatisBaslangicTarihi,
        $yatisBitisTarihi,
        $ozelDurum,
        $aciklama,
        $cokluOzelDurum,
        ];
    }
}
