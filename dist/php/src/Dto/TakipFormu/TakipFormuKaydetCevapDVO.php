<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuKaydetCevapDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuKaydetCevapDVO
{
    public function __construct(
    /** Saved form; shape Tablo 4.6.1.d (DiabetTakipFormuDVO, this registry) (s.310). */
    public readonly array $diabetTakipFormu = [],
    /** Result code; "0000" means success (s.310). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.310). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["diabetTakipFormu"]) && is_array($data["diabetTakipFormu"]) ? $data["diabetTakipFormu"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $diabetTakipFormu,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
