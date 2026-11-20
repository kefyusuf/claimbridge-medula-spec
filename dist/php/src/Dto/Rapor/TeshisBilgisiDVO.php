<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * TeshisBilgisiDVO — guideVersion 3.1.1, page 273 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TeshisBilgisiDVO
{
    public function __construct(
    /** Report start date, "dd.mm.yyyy" (s.273). */
    public readonly ?string $baslangicTarihi = null,
    /** Report end date, "dd.mm.yyyy" (s.273). */
    public readonly ?string $bitisTarihi = null,
    /** Report diagnosis code (s.273). */
    public readonly ?int $teshisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["teshisKodu"]) && is_numeric($data["teshisKodu"]) ? (int) $data["teshisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $baslangicTarihi,
        $bitisTarihi,
        $teshisKodu,
        ];
    }
}
