<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * TakipSilGirisDVO — guideVersion 3.1.1, page 168 (Tablo 4.1.3.a - TakipSilGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipSilGirisDVO
{
    public function __construct(
    /** Healthcare facility code of the cancelling institution (s.168). Only the institution's own takips can be cancelled. */
    public readonly ?int $saglikTesisKodu = null,
    /** Tracking number to be cancelled (s.168). */
    public readonly ?string $takipNo = null,
    /** Software vendor KTS code (s.168). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $takipNo,
        $ktsHbysKodu,
        ];
    }
}
