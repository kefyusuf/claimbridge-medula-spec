<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\IstekNedeni;

/**
 * TibbiGereklilikRaporDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TibbiGereklilikRaporDVO
{
    public function __construct(
    /** System-generated tracking number (s.336). */
    public readonly ?string $raporTakipNo = null,
    /** Patient citizen ID (s.336). */
    public readonly ?string $tckimlikNo = null,
    /** Facility code (s.336). */
    public readonly ?int $tesisKodu = null,
    /** Tracking number (s.336). */
    public readonly ?string $takipNo = null,
    /** "dd.MM.yyyy" report date (s.336). */
    public readonly ?string $raporTarihi = null,
    /** Report number (s.336). */
    public readonly ?string $raporNo = null,
    /** Three-value request reason (s.336). */
    public readonly ?IstekNedeni $istekNedeni = null,
    /** Diagnoses; item shape Tablo 4.9.1.h (ImzaliTaniBilgisiDVO, this registry) (s.336). */
    public readonly array $tanilar = [],
    /** Protocol number (s.336). */
    public readonly ?string $protokolNo = null,
    /** Decision (s.336). */
    public readonly ?string $karar = null,
    /** SUT procedures; the guide references SutIslemBilgisiDVO without publishing its table in this section — shape deferred (s.336). */
    public readonly array $islemler = [],
    /** Physicians — at least 3 can sign; item shape ImzaliDoktorBilgisiDVO (s.336). */
    public readonly array $doktorlar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["tckimlikNo"]) && is_scalar($data["tckimlikNo"]) ? (string) $data["tckimlikNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["raporTarihi"]) && is_scalar($data["raporTarihi"]) ? (string) $data["raporTarihi"] : null,
        isset($data["raporNo"]) && is_scalar($data["raporNo"]) ? (string) $data["raporNo"] : null,
        isset($data["istekNedeni"]) ? IstekNedeni::tryFrom((string) $data["istekNedeni"]) : null,
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["karar"]) && is_scalar($data["karar"]) ? (string) $data["karar"] : null,
        isset($data["islemler"]) && is_array($data["islemler"]) ? $data["islemler"] : [],
        isset($data["doktorlar"]) && is_array($data["doktorlar"]) ? $data["doktorlar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporTakipNo,
        $tckimlikNo,
        $tesisKodu,
        $takipNo,
        $raporTarihi,
        $raporNo,
        $istekNedeni !== null ? $istekNedeni->value : null,
        $tanilar,
        $protokolNo,
        $karar,
        $islemler,
        $doktorlar,
        ];
    }
}
