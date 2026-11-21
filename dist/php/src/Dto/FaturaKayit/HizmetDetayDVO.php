<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;

use ClaimBridge\Medula\Enum\TaburcuKodu;

/**
 * HizmetDetayDVO — guideVersion 3.1.1, page 241 (Tablo 4.3.1.c - HizmetDetayDVO (continues on s.242)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetDetayDVO
{
    public function __construct(
    /** Description of the service provided by the institution (s.241). */
    public readonly ?string $aciklama = null,
    /** Protocol number assigned by the institution (s.241). */
    public readonly ?string $protokolNo = null,
    /** Discharge code (s.241-242); codes 1-13 in the taburcu-kodu registry enum. */
    public readonly ?TaburcuKodu $taburcuKodu = null,
    /** Tracking number (s.242). */
    public readonly ?string $takipNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["taburcuKodu"]) ? TaburcuKodu::tryFrom((string) $data["taburcuKodu"]) : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "aciklama" => $aciklama,
        "protokolNo" => $protokolNo,
        "taburcuKodu" => $taburcuKodu !== null ? $taburcuKodu->value : null,
        "takipNo" => $takipNo,
        ];
    }
}
