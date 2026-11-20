<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HizmetIptalGirisDVO — guideVersion 3.1.1, page 239 (Tablo 4.2.3.a - HizmetIptalGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetIptalGirisDVO
{
    public function __construct(
    /** Operation sequence numbers to cancel only the specified operations; empty cancels all registered operations (s.239). */
    public readonly array $islemSiraNumaralari = [],
    /** Healthcare facility code (s.239). */
    public readonly ?int $saglikTesisKodu = null,
    /** Tracking number whose operations are cancelled (s.239). */
    public readonly ?string $takipNo = null,
    /** Software vendor KTS code (s.239). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNumaralari"]) && is_array($data["islemSiraNumaralari"]) ? $data["islemSiraNumaralari"] : [],
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemSiraNumaralari,
        $saglikTesisKodu,
        $takipNo,
        $ktsHbysKodu,
        ];
    }
}
