<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\MalzemeTuru;

/**
 * MalzemeBilgisiRaporDVO — guideVersion 3.1.1, page 266 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MalzemeBilgisiRaporDVO
{
    public function __construct(
    /** Material code; mandatory when malzemeTuru is 1 or 2 (s.266). Coded per SUT — externally-coded codeSystem annotation per the G42 sweep norm. */
    public readonly ?string $malzemeKodu = null,
    /** Material name; mandatory when malzemeTuru is 3 (s.266). */
    public readonly ?string $malzemeAdi = null,
    /** SUT-coded / retirement-fund-protocol / uncoded material (s.266). */
    public readonly ?MalzemeTuru $malzemeTuru = null,
    /** Material count (s.266). */
    public readonly ?int $adet = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["malzemeKodu"]) && is_scalar($data["malzemeKodu"]) ? (string) $data["malzemeKodu"] : null,
        isset($data["malzemeAdi"]) && is_scalar($data["malzemeAdi"]) ? (string) $data["malzemeAdi"] : null,
        isset($data["malzemeTuru"]) ? MalzemeTuru::tryFrom((string) $data["malzemeTuru"]) : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (int) $data["adet"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "malzemeKodu" => $malzemeKodu,
        "malzemeAdi" => $malzemeAdi,
        "malzemeTuru" => $malzemeTuru !== null ? $malzemeTuru->value : null,
        "adet" => $adet,
        ];
    }
}
