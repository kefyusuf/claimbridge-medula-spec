<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\TupBebekTuru;

/**
 * TupBebekRaporBilgisiDVO — guideVersion 3.1.1, page 276 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TupBebekRaporBilgisiDVO
{
    public function __construct(
    /** Disease-treatment vs other IVF procedures (s.276). */
    public readonly ?TupBebekTuru $tupBebekRaporTuru = null,
    /** SUT procedure code (s.276). */
    public readonly ?string $butKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tupBebekRaporTuru"]) ? TupBebekTuru::tryFrom((string) $data["tupBebekRaporTuru"]) : null,
        isset($data["butKodu"]) && is_scalar($data["butKodu"]) ? (string) $data["butKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tupBebekRaporTuru !== null ? $tupBebekRaporTuru->value : null,
        $butKodu,
        ];
    }
}
