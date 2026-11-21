<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * BransGorusBilgisiDVO — guideVersion 3.1.1, page 267 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BransGorusBilgisiDVO
{
    public function __construct(
    /** Health-Ministry branch code of the opining department (s.267). */
    public readonly ?string $bransKodu = null,
    /** Department opinion (s.267). */
    public readonly ?string $aciklama = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "bransKodu" => $bransKodu,
        "aciklama" => $aciklama,
        ];
    }
}
