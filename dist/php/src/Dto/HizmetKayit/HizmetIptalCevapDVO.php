<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HizmetIptalCevapDVO — guideVersion 3.1.1, page 239 (Tablo 4.2.3.b - HizmetIptalCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetIptalCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error (s.239). */
    public readonly ?string $sonucKodu = null,
    /** Result explanation; the error cause is reported here (s.239). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
