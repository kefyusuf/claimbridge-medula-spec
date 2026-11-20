<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuKaydetGirisDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuKaydetGirisDVO
{
    public function __construct(
    /** Diabetes follow-up form; shape Tablo 4.6.1.c (DiabetTakipFormuKayitDVO, this registry) (s.310). */
    public readonly array $diabetTakipFormu = [],
    /** Facility code (s.310). */
    public readonly ?int $kullaniciTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["diabetTakipFormu"]) && is_array($data["diabetTakipFormu"]) ? $data["diabetTakipFormu"] : [],
        isset($data["kullaniciTesisKodu"]) && is_numeric($data["kullaniciTesisKodu"]) ? (int) $data["kullaniciTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $diabetTakipFormu,
        $kullaniciTesisKodu,
        ];
    }
}
