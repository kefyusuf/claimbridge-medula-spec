<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * HastaCikisCevapDVO — guideVersion 3.1.1, page 169 (Tablo 4.1.4.b - HastaCikisCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaCikisCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error (s.169) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation; the error cause is reported here (s.169) */
    public readonly ?string $sonucMesaji = null,
    /** Hospitalization start date of the discharge (s.169) */
    public readonly ?string $yatisBaslangicTarihi = null,
    /** Hospitalization end date of the discharge (s.169) */
    public readonly ?string $yatisBitisTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["yatisBaslangicTarihi"]) && is_scalar($data["yatisBaslangicTarihi"]) ? (string) $data["yatisBaslangicTarihi"] : null,
        isset($data["yatisBitisTarihi"]) && is_scalar($data["yatisBitisTarihi"]) ? (string) $data["yatisBitisTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $yatisBaslangicTarihi,
        $yatisBitisTarihi,
        ];
    }
}
