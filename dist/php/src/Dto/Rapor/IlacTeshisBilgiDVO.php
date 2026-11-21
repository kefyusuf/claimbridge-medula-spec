<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * IlacTeshisBilgiDVO — guideVersion 3.1.1, page 278 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacTeshisBilgiDVO
{
    public function __construct(
    /** Report start date, "dd.mm.yyyy" (s.278). */
    public readonly ?string $baslangicTarihi = null,
    /** Report end date, "dd.mm.yyyy" (s.278). */
    public readonly ?string $bitisTarihi = null,
    /** Report diagnosis code (s.278). */
    public readonly ?int $teshisKodu = null,
    /** Diagnosis codes; the guide types this row as TaniBilgisiDVO[] while naming the parameter ICD10Kodu — both facts preserved (s.278); item shape Tablo 4.2.1.k (TaniBilgisiDVO, hizmet-kayit group). */
    public readonly array $ICD10Kodu = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["teshisKodu"]) && is_numeric($data["teshisKodu"]) ? (int) $data["teshisKodu"] : null,
        isset($data["ICD10Kodu"]) && is_array($data["ICD10Kodu"]) ? $data["ICD10Kodu"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "baslangicTarihi" => $baslangicTarihi,
        "bitisTarihi" => $bitisTarihi,
        "teshisKodu" => $teshisKodu,
        "ICD10Kodu" => $ICD10Kodu,
        ];
    }
}
