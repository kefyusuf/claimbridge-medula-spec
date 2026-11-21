<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiKabulDVO — guideVersion 3.1.1, page 180 (Tablo 4.1.16.a - KemikIligiKabulDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiKabulDVO
{
    public function __construct(
    /** Patient T.C. identity number (s.180) */
    public readonly ?string $hastaTcNo = null,
    /** Planned operation date, dd.mm.yyyy (s.180) */
    public readonly ?string $islemTarihi = null,
    /** SUT operation code of the planned bone-marrow procedure (s.180) */
    public readonly ?string $islemKodu = null,
    /** GSS-assigned institution code (s.180) */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["islemKodu"]) && is_scalar($data["islemKodu"]) ? (string) $data["islemKodu"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTcNo" => $hastaTcNo,
        "islemTarihi" => $islemTarihi,
        "islemKodu" => $islemKodu,
        "saglikTesisKodu" => $saglikTesisKodu,
        ];
    }
}
