<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;

use ClaimBridge\Medula\Enum\TaburcuKodu;

/**
 * FaturaCevapDetayDVO — guideVersion 3.1.1, page 245 (Tablo 4.3.3.c - FaturaCevapDetayDVO (continues on s.246)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaCevapDetayDVO
{
    public function __construct(
    /** Invoice detail description (s.245). */
    public readonly ?string $aciklama = null,
    /** Protocol number of the invoice (s.245). */
    public readonly ?string $protokolNo = null,
    /** Discharge code (s.245-246); codes 1-13 in the taburcu-kodu registry enum. */
    public readonly ?TaburcuKodu $taburcuKodu = null,
    /** Tracking number of the invoiced episode (s.246). */
    public readonly ?string $takipNo = null,
    /** Total amount calculated by GSS for the takip (s.246). */
    public readonly ?float $takipToplamTutar = null,
    /** Operation detail records, expanded as the IslemDetayDVO registry entity (Tablo 4.3.1.f, s.242-243). */
    public readonly array $islemDetaylari = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["protokolNo"]) && is_scalar($data["protokolNo"]) ? (string) $data["protokolNo"] : null,
        isset($data["taburcuKodu"]) ? TaburcuKodu::tryFrom((string) $data["taburcuKodu"]) : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["takipToplamTutar"]) && is_numeric($data["takipToplamTutar"]) ? (float) $data["takipToplamTutar"] : null,
        isset($data["islemDetaylari"]) && is_array($data["islemDetaylari"]) ? $data["islemDetaylari"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "aciklama" => $this->aciklama,
        "protokolNo" => $this->protokolNo,
        "taburcuKodu" => $this->taburcuKodu !== null ? $this->taburcuKodu->value : null,
        "takipNo" => $this->takipNo,
        "takipToplamTutar" => $this->takipToplamTutar,
        "islemDetaylari" => $this->islemDetaylari,
        ];
    }
}
