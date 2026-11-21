<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BasvuruTakipOkuCevapDVO — guideVersion 3.1.1, page 172 (Tablo 4.1.7.b - BasvuruTakipOkuCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BasvuruTakipOkuCevapDVO
{
    public function __construct(
    /** Takip list (BasvuruTakipDVO[], Tablo 4.1.7.c), expanded as a registry entity (s.172) */
    public readonly array $basvuruTakip = [],
    /** Application number (s.172) */
    public readonly ?string $hastaBasvuruNo = null,
    /** Result code; 0000 means success (s.172) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.172) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["basvuruTakip"]) && is_array($data["basvuruTakip"]) ? $data["basvuruTakip"] : [],
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "basvuruTakip" => $basvuruTakip,
        "hastaBasvuruNo" => $hastaBasvuruNo,
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        ];
    }
}
