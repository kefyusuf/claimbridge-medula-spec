<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\DevredilenKurumRapor;
use ClaimBridge\Medula\Enum\ProvizyonTipi;
use ClaimBridge\Medula\Enum\SigortaliTuru;

/**
 * HakSahibiBilgisiDVO — guideVersion 3.1.1, page 268 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HakSahibiBilgisiDVO
{
    public function __construct(
    /** Beneficiary citizen ID; mandatory when neither karneNo nor sosyalGuvenlikNo is provided (s.268). */
    public readonly ?string $tckimlikNo = null,
    /** Beneficiary card number; mandatory when tckimlikNo is not provided (s.268). */
    public readonly ?string $karneNo = null,
    /** Beneficiary social-security number; mandatory when tckimlikNo is not provided (s.269). */
    public readonly ?string $sosyalGuvenlikNo = null,
    /** Four-digit kinship code for Bag-Kur patients; empty for other institutions (s.269). */
    public readonly ?string $yakinlikKodu = null,
    /** Insured type: 1 = Çalışan, 2 = Emekli, 3 = Diğer (s.269). This three-value list is the rapor-group variant of the hasta-kabul sigortali-turu enum. */
    public readonly ?SigortaliTuru $sigortaliTuru = null,
    /** Pre-merger institution of the insured; the rapor-group variant code list (s.269-270) is longer than the hasta-kabul one and conflicts with the changelog — see the devredilen-kurum-rapor enum notes. */
    public readonly ?DevredilenKurumRapor $devredilenKurum = null,
    /** Beneficiary address — first occurrence (s.271; lowercase guide row without a length). */
    public readonly ?string $adres = null,
    /** Beneficiary phone — first occurrence (s.271; lowercase guide row without a length). */
    public readonly ?string $telefon = null,
    /** Beneficiary unit — first occurrence (s.271; lowercase guide row without a length). */
    public readonly ?string $baglibulunanbirim = null,
    /** Admission type for the report examination: N = Normal, I = İş kazası, A = Acil (s.271). */
    public readonly ?ProvizyonTipi $provizyonTipi = null,
    /** Entitlement examination date — NOT the report date; "dd.mm.yyyy" (s.272). */
    public readonly ?string $provizyonTarihi = null,
    /** Beneficiary first name; the guide states "bu alan boş bırakılacaktır" (s.272). */
    public readonly ?string $adi = null,
    /** Beneficiary last name; the guide states "bu alan boş bırakılacaktır" (s.272). */
    public readonly ?string $soyadi = null,
    /** Beneficiary address — second occurrence with length 100 (s.272); the guide documents both a lowercase and a camelCase address row. */
    public readonly ?string $adresDetay = null,
    /** Beneficiary phone — second occurrence with length 50 (s.272). */
    public readonly ?string $telefonDetay = null,
    /** Beneficiary unit — second occurrence with length 50 (s.272). */
    public readonly ?string $bagliBulunanBirim = null,
    /** Beneficiary retirement info (s.272). */
    public readonly ?string $emeklimi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tckimlikNo"]) && is_scalar($data["tckimlikNo"]) ? (string) $data["tckimlikNo"] : null,
        isset($data["karneNo"]) && is_scalar($data["karneNo"]) ? (string) $data["karneNo"] : null,
        isset($data["sosyalGuvenlikNo"]) && is_scalar($data["sosyalGuvenlikNo"]) ? (string) $data["sosyalGuvenlikNo"] : null,
        isset($data["yakinlikKodu"]) && is_scalar($data["yakinlikKodu"]) ? (string) $data["yakinlikKodu"] : null,
        isset($data["sigortaliTuru"]) ? SigortaliTuru::tryFrom((string) $data["sigortaliTuru"]) : null,
        isset($data["devredilenKurum"]) ? DevredilenKurumRapor::tryFrom((string) $data["devredilenKurum"]) : null,
        isset($data["adres"]) && is_scalar($data["adres"]) ? (string) $data["adres"] : null,
        isset($data["telefon"]) && is_scalar($data["telefon"]) ? (string) $data["telefon"] : null,
        isset($data["baglibulunanbirim"]) && is_scalar($data["baglibulunanbirim"]) ? (string) $data["baglibulunanbirim"] : null,
        isset($data["provizyonTipi"]) ? ProvizyonTipi::tryFrom((string) $data["provizyonTipi"]) : null,
        isset($data["provizyonTarihi"]) && is_scalar($data["provizyonTarihi"]) ? (string) $data["provizyonTarihi"] : null,
        isset($data["adi"]) && is_scalar($data["adi"]) ? (string) $data["adi"] : null,
        isset($data["soyadi"]) && is_scalar($data["soyadi"]) ? (string) $data["soyadi"] : null,
        isset($data["adresDetay"]) && is_scalar($data["adresDetay"]) ? (string) $data["adresDetay"] : null,
        isset($data["telefonDetay"]) && is_scalar($data["telefonDetay"]) ? (string) $data["telefonDetay"] : null,
        isset($data["bagliBulunanBirim"]) && is_scalar($data["bagliBulunanBirim"]) ? (string) $data["bagliBulunanBirim"] : null,
        isset($data["emeklimi"]) && is_scalar($data["emeklimi"]) ? (string) $data["emeklimi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tckimlikNo,
        $karneNo,
        $sosyalGuvenlikNo,
        $yakinlikKodu,
        $sigortaliTuru !== null ? $sigortaliTuru->value : null,
        $devredilenKurum !== null ? $devredilenKurum->value : null,
        $adres,
        $telefon,
        $baglibulunanbirim,
        $provizyonTipi !== null ? $provizyonTipi->value : null,
        $provizyonTarihi,
        $adi,
        $soyadi,
        $adresDetay,
        $telefonDetay,
        $bagliBulunanBirim,
        $emeklimi,
        ];
    }
}
