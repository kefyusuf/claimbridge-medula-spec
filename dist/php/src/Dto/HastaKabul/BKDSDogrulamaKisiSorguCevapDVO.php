<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BKDSDogrulamaKisiSorguCevapDVO — guideVersion 3.1.1, page 185 (Tablo 4.1.21.b - BKDSDogrulamaKisiSorguCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BKDSDogrulamaKisiSorguCevapDVO
{
    public function __construct(
    /** Verification records (BKDSDogrulamaDetayDVO[], Tablo 4.1.21.c), expanded as a registry entity (s.186) */
    public readonly array $bkdsDogrulamaDetayDVO = [],
    /** Result code; 0000 means success (s.186) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.186) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bkdsDogrulamaDetayDVO"]) && is_array($data["bkdsDogrulamaDetayDVO"]) ? $data["bkdsDogrulamaDetayDVO"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $bkdsDogrulamaDetayDVO,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
