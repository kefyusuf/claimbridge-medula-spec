<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\FtrVucutBolgesi;
use ClaimBridge\Medula\Enum\TedaviTuru;

/**
 * FTRRaporBilgisiDVO — guideVersion 3.1.1, page 274 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FTRRaporBilgisiDVO
{
    public function __construct(
    /** Seventeen-value body-region list; guide order preserved (11 listed last on s.275) (s.274-275). */
    public readonly ?FtrVucutBolgesi $ftrVucutBolgesiKodu = null,
    /** Session day count (s.275). */
    public readonly ?int $seansGun = null,
    /** Session count (s.275). */
    public readonly ?int $seansSayi = null,
    /** SUT procedure code (s.275). */
    public readonly ?string $butKodu = null,
    /** A = Ayaktan, Y = Yatarak (s.275); binds the hasta-kabul group's tedavi-turu enum. */
    public readonly ?TedaviTuru $tedaviTuru = null,
    /** Guide row carries NO length, value list or description — registered verbatim as an empty-description required string (s.275). */
    public readonly ?string $robotikRehabilitasyon = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["ftrVucutBolgesiKodu"]) ? FtrVucutBolgesi::tryFrom((string) $data["ftrVucutBolgesiKodu"]) : null,
        isset($data["seansGun"]) && is_numeric($data["seansGun"]) ? (int) $data["seansGun"] : null,
        isset($data["seansSayi"]) && is_numeric($data["seansSayi"]) ? (int) $data["seansSayi"] : null,
        isset($data["butKodu"]) && is_scalar($data["butKodu"]) ? (string) $data["butKodu"] : null,
        isset($data["tedaviTuru"]) ? TedaviTuru::tryFrom((string) $data["tedaviTuru"]) : null,
        isset($data["robotikRehabilitasyon"]) && is_scalar($data["robotikRehabilitasyon"]) ? (string) $data["robotikRehabilitasyon"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "ftrVucutBolgesiKodu" => $ftrVucutBolgesiKodu !== null ? $ftrVucutBolgesiKodu->value : null,
        "seansGun" => $seansGun,
        "seansSayi" => $seansSayi,
        "butKodu" => $butKodu,
        "tedaviTuru" => $tedaviTuru !== null ? $tedaviTuru->value : null,
        "robotikRehabilitasyon" => $robotikRehabilitasyon,
        ];
    }
}
