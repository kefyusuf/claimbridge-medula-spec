<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\EvetHayir;

/**
 * DiyalizRaporBilgisiDVO — guideVersion 3.1.1, page 273 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DiyalizRaporBilgisiDVO
{
    public function __construct(
    /** Companion flag, E/H (s.273). */
    public readonly ?EvetHayir $refakatVarMi = null,
    /** Session day count of the report (s.273). */
    public readonly ?int $seansGun = null,
    /** Session count of the report (s.273). */
    public readonly ?int $seansSayi = null,
    /** SUT procedure code (s.273). */
    public readonly ?string $butKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["refakatVarMi"]) ? EvetHayir::tryFrom((string) $data["refakatVarMi"]) : null,
        isset($data["seansGun"]) && is_numeric($data["seansGun"]) ? (int) $data["seansGun"] : null,
        isset($data["seansSayi"]) && is_numeric($data["seansSayi"]) ? (int) $data["seansSayi"] : null,
        isset($data["butKodu"]) && is_scalar($data["butKodu"]) ? (string) $data["butKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "refakatVarMi" => $this->refakatVarMi !== null ? $this->refakatVarMi->value : null,
        "seansGun" => $this->seansGun,
        "seansSayi" => $this->seansSayi,
        "butKodu" => $this->butKodu,
        ];
    }
}
