<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;

use ClaimBridge\Medula\Enum\EvetHayir;

/**
 * TakipFormuDiabetEgitimiDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuDiabetEgitimiDVO
{
    public function __construct(
    /** Individual DM education count (s.319). */
    public readonly ?int $bireyselEgitimSayisi = null,
    /** Group DM education count (s.319). */
    public readonly ?int $grupEgitimSayisi = null,
    /** E/H (s.319). */
    public readonly ?EvetHayir $dmEgitimiAlmisMi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bireyselEgitimSayisi"]) && is_numeric($data["bireyselEgitimSayisi"]) ? (int) $data["bireyselEgitimSayisi"] : null,
        isset($data["grupEgitimSayisi"]) && is_numeric($data["grupEgitimSayisi"]) ? (int) $data["grupEgitimSayisi"] : null,
        isset($data["dmEgitimiAlmisMi"]) ? EvetHayir::tryFrom((string) $data["dmEgitimiAlmisMi"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "bireyselEgitimSayisi" => $bireyselEgitimSayisi,
        "grupEgitimSayisi" => $grupEgitimSayisi,
        "dmEgitimiAlmisMi" => $dmEgitimiAlmisMi !== null ? $dmEgitimiAlmisMi->value : null,
        ];
    }
}
