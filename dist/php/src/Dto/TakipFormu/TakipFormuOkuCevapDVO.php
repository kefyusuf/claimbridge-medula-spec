<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuOkuCevapDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuOkuCevapDVO
{
    public function __construct(
    /** Saved forms; item shape Tablo 4.6.1.d (DiabetTakipFormuDVO, this registry) (s.320). */
    public readonly array $diabetTakipFormu = [],
    /** Result code; "0000" means success (s.320). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.320). */
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
        "diabetTakipFormu" => $this->diabetTakipFormu,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
