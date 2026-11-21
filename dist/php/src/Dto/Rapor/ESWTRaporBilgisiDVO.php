<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\EswtVucutBolgesi;

/**
 * ESWTRaporBilgisiDVO — guideVersion 3.1.1, page 274 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ESWTRaporBilgisiDVO
{
    public function __construct(
    /** Twelve-value body-region list (s.274). */
    public readonly ?EswtVucutBolgesi $eswtVucutBolgesiKodu = null,
    /** Session day count (s.274). */
    public readonly ?int $seansGun = null,
    /** Session count (s.274). */
    public readonly ?int $seansSayi = null,
    /** SUT procedure code (s.274). */
    public readonly ?string $butKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["eswtVucutBolgesiKodu"]) ? EswtVucutBolgesi::tryFrom((string) $data["eswtVucutBolgesiKodu"]) : null,
        isset($data["seansGun"]) && is_numeric($data["seansGun"]) ? (int) $data["seansGun"] : null,
        isset($data["seansSayi"]) && is_numeric($data["seansSayi"]) ? (int) $data["seansSayi"] : null,
        isset($data["butKodu"]) && is_scalar($data["butKodu"]) ? (string) $data["butKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "eswtVucutBolgesiKodu" => $eswtVucutBolgesiKodu !== null ? $eswtVucutBolgesiKodu->value : null,
        "seansGun" => $seansGun,
        "seansSayi" => $seansSayi,
        "butKodu" => $butKodu,
        ];
    }
}
