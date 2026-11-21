<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * IlacAraCevapDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacAraCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.287). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.287). */
    public readonly ?string $sonucMesaji = null,
    /** Drugs; item shape Tablo 4.5.4.c (IlacListDVO, this registry) (s.287). */
    public readonly array $ilaclar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["ilaclar"]) && is_array($data["ilaclar"]) ? $data["ilaclar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "ilaclar" => $this->ilaclar,
        ];
    }
}
