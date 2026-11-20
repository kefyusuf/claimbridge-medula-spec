<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KatilimPayiDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KatilimPayiDVO
{
    public function __construct(
    /** Tracking number (s.294). */
    public readonly ?string $takipNo = null,
    /** Examination co-payment of the takip (s.294). */
    public readonly ?float $muayeneKatilimTutari = null,
    /** Material co-payment of the takip (s.294). */
    public readonly ?float $malzemeKatilimTutari = null,
    /** IVF co-payment of the takip (s.294). */
    public readonly ?float $tupBebekKatilimTutari = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["muayeneKatilimTutari"]) && is_numeric($data["muayeneKatilimTutari"]) ? (float) $data["muayeneKatilimTutari"] : null,
        isset($data["malzemeKatilimTutari"]) && is_numeric($data["malzemeKatilimTutari"]) ? (float) $data["malzemeKatilimTutari"] : null,
        isset($data["tupBebekKatilimTutari"]) && is_numeric($data["tupBebekKatilimTutari"]) ? (float) $data["tupBebekKatilimTutari"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $takipNo,
        $muayeneKatilimTutari,
        $malzemeKatilimTutari,
        $tupBebekKatilimTutari,
        ];
    }
}
