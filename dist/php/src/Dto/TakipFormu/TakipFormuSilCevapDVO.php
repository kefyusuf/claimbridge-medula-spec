<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuSilCevapDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuSilCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.321). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.321). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        ];
    }
}
