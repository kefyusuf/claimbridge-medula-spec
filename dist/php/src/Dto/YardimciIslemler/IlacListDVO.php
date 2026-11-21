<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\AktifPasif;
use ClaimBridge\Medula\Enum\OdenmeDurumu;

/**
 * IlacListDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacListDVO
{
    public function __construct(
    /** Price history; item shape Tablo 4.5.4.d (FiyatListDVO, this registry) (s.287). */
    public readonly array $ilacFiyatlari = [],
    /** Total unit quantity per package (s.287; renamed from kullanimBirimi per the 3.1.1 changelog s.7). */
    public readonly ?float $ambalajToplamBirimMiktari = null,
    /** Drug barcode (s.287). */
    public readonly ?string $barkod = null,
    /** Drug name (s.288). */
    public readonly ?string $ilacAdi = null,
    /** Pharmacy activity state (s.288). */
    public readonly ?AktifPasif $eczAktifPasif = null,
    /** Hospital activity state (s.288). */
    public readonly ?AktifPasif $hasAktifPasif = null,
    /** Outpatient reimbursement state (s.288). */
    public readonly ?OdenmeDurumu $ayaktanOdenme = null,
    /** Inpatient reimbursement state (s.288). */
    public readonly ?OdenmeDurumu $yatanOdenme = null,
    /** Current public discounted rate (s.288). */
    public readonly ?float $guncelKamuIndirimliFiyati = null,
    /** Discount rates; item shape Tablo 4.5.4.e (IlacIndirimDVO, this registry) (s.288). */
    public readonly array $ilacIndirimDVO = [],
    /** Maximum usage period for inpatient takips (s.288). */
    public readonly ?int $yatanMaksimumKullanimPeriyot = null,
    /** Maximum usage period unit for inpatient takips (s.288). */
    public readonly ?int $yatanMaksimumKullanimPeriyotBirim = null,
    /** Maximum usage doze-1 multiplier for inpatient takips (s.288). */
    public readonly ?int $yatanMaksimumKullanimDoz1 = null,
    /** Maximum usage doze-2 multiplier for inpatient takips (s.288). */
    public readonly ?float $yatanMaksimumKullanimDoz2 = null,
    /** Maximum usage period for outpatient takips (s.288). */
    public readonly ?int $ayaktanMaksimumKullanimPeriyot = null,
    /** Maximum usage period unit for outpatient takips (s.288). */
    public readonly ?int $ayaktanMaksimumKullanimPeriyotBirim = null,
    /** Maximum usage doze-1 multiplier for outpatient takips (s.289). */
    public readonly ?int $ayaktanMaksimumKullanimDoz1 = null,
    /** Maximum usage doze-2 multiplier for outpatient takips (s.289). */
    public readonly ?float $ayaktanMaksimumKullanimDoz2 = null,
    /** Price computed over the equivalent group (s.289). */
    public readonly ?float $esdegerGrupFiyati = null,
    /** Usage unit computed over the equivalent group (s.289). */
    public readonly ?float $esdegerKullanimBirimi = null,
    /** Barcode of the equivalent-group drug (s.289). */
    public readonly ?string $esdegerBarkod = null,
    /** Pharmaceutical form name (s.289). */
    public readonly ?string $farmasotikFormAdi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["ilacFiyatlari"]) && is_array($data["ilacFiyatlari"]) ? $data["ilacFiyatlari"] : [],
        isset($data["ambalajToplamBirimMiktari"]) && is_numeric($data["ambalajToplamBirimMiktari"]) ? (float) $data["ambalajToplamBirimMiktari"] : null,
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["ilacAdi"]) && is_scalar($data["ilacAdi"]) ? (string) $data["ilacAdi"] : null,
        isset($data["eczAktifPasif"]) ? AktifPasif::tryFrom((string) $data["eczAktifPasif"]) : null,
        isset($data["hasAktifPasif"]) ? AktifPasif::tryFrom((string) $data["hasAktifPasif"]) : null,
        isset($data["ayaktanOdenme"]) ? OdenmeDurumu::tryFrom((string) $data["ayaktanOdenme"]) : null,
        isset($data["yatanOdenme"]) ? OdenmeDurumu::tryFrom((string) $data["yatanOdenme"]) : null,
        isset($data["guncelKamuIndirimliFiyati"]) && is_numeric($data["guncelKamuIndirimliFiyati"]) ? (float) $data["guncelKamuIndirimliFiyati"] : null,
        isset($data["ilacIndirimDVO"]) && is_array($data["ilacIndirimDVO"]) ? $data["ilacIndirimDVO"] : [],
        isset($data["yatanMaksimumKullanimPeriyot"]) && is_numeric($data["yatanMaksimumKullanimPeriyot"]) ? (int) $data["yatanMaksimumKullanimPeriyot"] : null,
        isset($data["yatanMaksimumKullanimPeriyotBirim"]) && is_numeric($data["yatanMaksimumKullanimPeriyotBirim"]) ? (int) $data["yatanMaksimumKullanimPeriyotBirim"] : null,
        isset($data["yatanMaksimumKullanimDoz1"]) && is_numeric($data["yatanMaksimumKullanimDoz1"]) ? (int) $data["yatanMaksimumKullanimDoz1"] : null,
        isset($data["yatanMaksimumKullanimDoz2"]) && is_numeric($data["yatanMaksimumKullanimDoz2"]) ? (float) $data["yatanMaksimumKullanimDoz2"] : null,
        isset($data["ayaktanMaksimumKullanimPeriyot"]) && is_numeric($data["ayaktanMaksimumKullanimPeriyot"]) ? (int) $data["ayaktanMaksimumKullanimPeriyot"] : null,
        isset($data["ayaktanMaksimumKullanimPeriyotBirim"]) && is_numeric($data["ayaktanMaksimumKullanimPeriyotBirim"]) ? (int) $data["ayaktanMaksimumKullanimPeriyotBirim"] : null,
        isset($data["ayaktanMaksimumKullanimDoz1"]) && is_numeric($data["ayaktanMaksimumKullanimDoz1"]) ? (int) $data["ayaktanMaksimumKullanimDoz1"] : null,
        isset($data["ayaktanMaksimumKullanimDoz2"]) && is_numeric($data["ayaktanMaksimumKullanimDoz2"]) ? (float) $data["ayaktanMaksimumKullanimDoz2"] : null,
        isset($data["esdegerGrupFiyati"]) && is_numeric($data["esdegerGrupFiyati"]) ? (float) $data["esdegerGrupFiyati"] : null,
        isset($data["esdegerKullanimBirimi"]) && is_numeric($data["esdegerKullanimBirimi"]) ? (float) $data["esdegerKullanimBirimi"] : null,
        isset($data["esdegerBarkod"]) && is_scalar($data["esdegerBarkod"]) ? (string) $data["esdegerBarkod"] : null,
        isset($data["farmasotikFormAdi"]) && is_scalar($data["farmasotikFormAdi"]) ? (string) $data["farmasotikFormAdi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "ilacFiyatlari" => $ilacFiyatlari,
        "ambalajToplamBirimMiktari" => $ambalajToplamBirimMiktari,
        "barkod" => $barkod,
        "ilacAdi" => $ilacAdi,
        "eczAktifPasif" => $eczAktifPasif !== null ? $eczAktifPasif->value : null,
        "hasAktifPasif" => $hasAktifPasif !== null ? $hasAktifPasif->value : null,
        "ayaktanOdenme" => $ayaktanOdenme !== null ? $ayaktanOdenme->value : null,
        "yatanOdenme" => $yatanOdenme !== null ? $yatanOdenme->value : null,
        "guncelKamuIndirimliFiyati" => $guncelKamuIndirimliFiyati,
        "ilacIndirimDVO" => $ilacIndirimDVO,
        "yatanMaksimumKullanimPeriyot" => $yatanMaksimumKullanimPeriyot,
        "yatanMaksimumKullanimPeriyotBirim" => $yatanMaksimumKullanimPeriyotBirim,
        "yatanMaksimumKullanimDoz1" => $yatanMaksimumKullanimDoz1,
        "yatanMaksimumKullanimDoz2" => $yatanMaksimumKullanimDoz2,
        "ayaktanMaksimumKullanimPeriyot" => $ayaktanMaksimumKullanimPeriyot,
        "ayaktanMaksimumKullanimPeriyotBirim" => $ayaktanMaksimumKullanimPeriyotBirim,
        "ayaktanMaksimumKullanimDoz1" => $ayaktanMaksimumKullanimDoz1,
        "ayaktanMaksimumKullanimDoz2" => $ayaktanMaksimumKullanimDoz2,
        "esdegerGrupFiyati" => $esdegerGrupFiyati,
        "esdegerKullanimBirimi" => $esdegerKullanimBirimi,
        "esdegerBarkod" => $esdegerBarkod,
        "farmasotikFormAdi" => $farmasotikFormAdi,
        ];
    }
}
