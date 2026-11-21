<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * RaporCevapTCKimlikNodanDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.8.b (s.283)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporCevapTCKimlikNodanDVO
{
    public function __construct(
    /** Reports found for the citizen; items are RaporCevapDVO (this registry). */
    public readonly array $raporlar = [],
    /** Result description; the failure reason is stated here (s.283). */
    public readonly ?string $sonucAciklamasi = null,
    /** Result code; 0 (zero) means success, any other value is an error (s.283). */
    public readonly ?int $sonucKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporlar"]) && is_array($data["raporlar"]) ? $data["raporlar"] : [],
        isset($data["sonucAciklamasi"]) && is_scalar($data["sonucAciklamasi"]) ? (string) $data["sonucAciklamasi"] : null,
        isset($data["sonucKodu"]) && is_numeric($data["sonucKodu"]) ? (int) $data["sonucKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporlar" => $raporlar,
        "sonucAciklamasi" => $sonucAciklamasi,
        "sonucKodu" => $sonucKodu,
        ];
    }
}
