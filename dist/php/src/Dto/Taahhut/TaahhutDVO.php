<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutDVO — guideVersion 3.1.1, page 323 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutDVO
{
    public function __construct(
    /** Patient citizen ID (s.323). */
    public readonly ?string $hastaTCKimlikNo = null,
    /** Address province plate code (s.323). */
    public readonly ?int $adressIlPlaka = null,
    /** Address district name; must match a district of the plate-coded province or the record fails (s.323). */
    public readonly ?string $adressIlce = null,
    /** Postal code (s.323). */
    public readonly ?string $adressPostaKodu = null,
    /** Street name (s.323). */
    public readonly ?string $adressCaddeSokak = null,
    /** Outer door number (s.323). */
    public readonly ?string $adressDisKapiNo = null,
    /** Inner door number (s.323). */
    public readonly ?string $adressIcKapiNo = null,
    /** Phone number (s.323). */
    public readonly ?string $adressTelefon = null,
    /** E-mail address (s.323). */
    public readonly ?string $adressEposta = null,
    /** Committed person's first name (s.323). */
    public readonly ?string $taahhutAlanAd = null,
    /** Committed person's last name (s.323). */
    public readonly ?string $taahhutAlanSoyad = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTCKimlikNo"]) && is_scalar($data["hastaTCKimlikNo"]) ? (string) $data["hastaTCKimlikNo"] : null,
        isset($data["adressIlPlaka"]) && is_numeric($data["adressIlPlaka"]) ? (int) $data["adressIlPlaka"] : null,
        isset($data["adressIlce"]) && is_scalar($data["adressIlce"]) ? (string) $data["adressIlce"] : null,
        isset($data["adressPostaKodu"]) && is_scalar($data["adressPostaKodu"]) ? (string) $data["adressPostaKodu"] : null,
        isset($data["adressCaddeSokak"]) && is_scalar($data["adressCaddeSokak"]) ? (string) $data["adressCaddeSokak"] : null,
        isset($data["adressDisKapiNo"]) && is_scalar($data["adressDisKapiNo"]) ? (string) $data["adressDisKapiNo"] : null,
        isset($data["adressIcKapiNo"]) && is_scalar($data["adressIcKapiNo"]) ? (string) $data["adressIcKapiNo"] : null,
        isset($data["adressTelefon"]) && is_scalar($data["adressTelefon"]) ? (string) $data["adressTelefon"] : null,
        isset($data["adressEposta"]) && is_scalar($data["adressEposta"]) ? (string) $data["adressEposta"] : null,
        isset($data["taahhutAlanAd"]) && is_scalar($data["taahhutAlanAd"]) ? (string) $data["taahhutAlanAd"] : null,
        isset($data["taahhutAlanSoyad"]) && is_scalar($data["taahhutAlanSoyad"]) ? (string) $data["taahhutAlanSoyad"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $hastaTCKimlikNo,
        $adressIlPlaka,
        $adressIlce,
        $adressPostaKodu,
        $adressCaddeSokak,
        $adressDisKapiNo,
        $adressIcKapiNo,
        $adressTelefon,
        $adressEposta,
        $taahhutAlanAd,
        $taahhutAlanSoyad,
        ];
    }
}
