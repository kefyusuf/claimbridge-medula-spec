<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BasvuruYatisBilgileriDVO — guideVersion 3.1.1, page 171 (Tablo 4.1.6.c - BasvuruYatisBilgileriDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BasvuruYatisBilgileriDVO
{
    public function __construct(
    /** Hospitalization start date (s.171) */
    public readonly ?string $baslangicTarihi = null,
    /** Discharge date (s.171) */
    public readonly ?string $bitisTarihi = null,
    /** 0 Faturalanmamis / 1 Faturalanmis (s.171) */
    public readonly ?string $durum = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        isset($data["durum"]) && is_scalar($data["durum"]) ? (string) $data["durum"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "baslangicTarihi" => $this->baslangicTarihi,
        "bitisTarihi" => $this->bitisTarihi,
        "durum" => $this->durum,
        ];
    }
}
