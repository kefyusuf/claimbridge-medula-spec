<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * EvrakKesintiCevapDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EvrakKesintiCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.292). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.292). */
    public readonly ?string $sonucMesaji = null,
    /** Document reference number of the deducted document (s.292). */
    public readonly ?int $evrakReferansNo = null,
    /** Tracking records; item shape Tablo 4.5.6.c (EvrakTakipDVO, this registry) (s.292). */
    public readonly array $takipler = [],
    /** Examination co-payment of the document (s.292). */
    public readonly ?float $muayeneKatilimTutari = null,
    /** Material co-payment of the document (s.292). */
    public readonly ?float $malzemeKatilimTutari = null,
    /** IVF co-payment of the document (s.292). */
    public readonly ?float $tupBebekKatilimTutari = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["evrakReferansNo"]) && is_numeric($data["evrakReferansNo"]) ? (int) $data["evrakReferansNo"] : null,
        isset($data["takipler"]) && is_array($data["takipler"]) ? $data["takipler"] : [],
        isset($data["muayeneKatilimTutari"]) && is_numeric($data["muayeneKatilimTutari"]) ? (float) $data["muayeneKatilimTutari"] : null,
        isset($data["malzemeKatilimTutari"]) && is_numeric($data["malzemeKatilimTutari"]) ? (float) $data["malzemeKatilimTutari"] : null,
        isset($data["tupBebekKatilimTutari"]) && is_numeric($data["tupBebekKatilimTutari"]) ? (float) $data["tupBebekKatilimTutari"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $evrakReferansNo,
        $takipler,
        $muayeneKatilimTutari,
        $malzemeKatilimTutari,
        $tupBebekKatilimTutari,
        ];
    }
}
