<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * TakipSilCevapDVO — guideVersion 3.1.1, page 168 (Tablo 4.1.3.b - TakipSilCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipSilCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error (s.168). */
    public readonly ?string $sonucKodu = null,
    /** Result explanation; the error cause is reported here (s.168). */
    public readonly ?string $sonucMesaji = null,
    /** Cancelled tracking number returned for control (s.168). */
    public readonly ?string $takipNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $takipNo,
        ];
    }
}
