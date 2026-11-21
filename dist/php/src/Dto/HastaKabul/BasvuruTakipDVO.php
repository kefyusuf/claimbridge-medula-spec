<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BasvuruTakipDVO — guideVersion 3.1.1, page 172 (Tablo 4.1.7.c - BasvuruTakipDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BasvuruTakipDVO
{
    public function __construct(
    /** Tracking number (s.172) */
    public readonly ?string $takipNo = null,
    /** 0 Odeme sorgusu yapilmamis / 1 sorgulanmis faturalanmamis / 2 sorgulanmis faturalanmis (s.172) */
    public readonly ?string $takipFaturaDurumu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["takipFaturaDurumu"]) && is_scalar($data["takipFaturaDurumu"]) ? (string) $data["takipFaturaDurumu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $takipNo,
        "takipFaturaDurumu" => $takipFaturaDurumu,
        ];
    }
}
