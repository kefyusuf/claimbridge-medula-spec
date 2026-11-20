<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * TakipOkuGirisDVO — guideVersion 3.1.1, page 164 (Tablo 4.1.2.a - TakipOkuGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipOkuGirisDVO
{
    public function __construct(
    /** Healthcare facility code assigned by GSS (s.164). */
    public readonly ?int $saglikTesisKodu = null,
    /** Tracking number to be read (s.164-165). */
    public readonly ?string $takipNo = null,
    /** Software vendor KTS code (s.165). */
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
