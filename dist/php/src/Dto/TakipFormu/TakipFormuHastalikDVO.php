<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;

use ClaimBridge\Medula\Enum\DiabetHastalik;

/**
 * TakipFormuHastalikDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuHastalikDVO
{
    public function __construct(
    /** Fifteen-value disease list including 0 = Diğer (s.319). */
    public readonly ?DiabetHastalik $hastalikKodu = null,
    /** Diagnosis code of a disease outside the list; filled when hastalikKodu = 0 (s.319). */
    public readonly ?string $digerHastalikTaniKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastalikKodu"]) ? DiabetHastalik::tryFrom((string) $data["hastalikKodu"]) : null,
        isset($data["digerHastalikTaniKodu"]) && is_scalar($data["digerHastalikTaniKodu"]) ? (string) $data["digerHastalikTaniKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastalikKodu" => $this->hastalikKodu !== null ? $this->hastalikKodu->value : null,
        "digerHastalikTaniKodu" => $this->digerHastalikTaniKodu,
        ];
    }
}
