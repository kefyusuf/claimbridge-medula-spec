<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * MustehaklikCevapDVO — guideVersion 3.1.1, page 179 (Tablo 4.1.15.b - MustehaklikCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MustehaklikCevapDVO
{
    public function __construct(
    /** Entitlement coverage type. The guide documents no code list for this Integer (s.179); the sandbox echoes 1 and consumers treat the value opaquely until a list is published. */
    public readonly ?int $kapsamTuru = null,
    /** Result code; 0000 means success, any other value is an error (s.179) */
    public readonly ?string $sonucKodu = null,
    /** Human-readable result message accompanying the result code (s.180) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kapsamTuru"]) && is_numeric($data["kapsamTuru"]) ? (int) $data["kapsamTuru"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "kapsamTuru" => $this->kapsamTuru,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
