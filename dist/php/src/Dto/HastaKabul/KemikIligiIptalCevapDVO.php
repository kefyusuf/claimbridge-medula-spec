<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiIptalCevapDVO — guideVersion 3.1.1, page 181 (Tablo 4.1.17.b - KemikIligiIptalCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiIptalCevapDVO
{
    public function __construct(
    /** Patient T.C. identity number (s.181) */
    public readonly ?string $hastaTcNo = null,
    /** Result code; 0000 means success (s.181) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.181) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTcNo" => $this->hastaTcNo,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
