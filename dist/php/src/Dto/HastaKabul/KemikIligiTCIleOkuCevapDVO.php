<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiTCIleOkuCevapDVO — guideVersion 3.1.1, page 184 (Tablo 4.1.20.b - KemikIligiTCIleOkuCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiTCIleOkuCevapDVO
{
    public function __construct(
    /** Bone-marrow admission records (KemikIligiOkuCevapDVO[], Tablo 4.1.19.b), expanded as a registry entity (s.184) */
    public readonly array $kemikIligiCevapDVO = [],
    /** Result code; 0000 means success (s.184) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.184) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kemikIligiCevapDVO"]) && is_array($data["kemikIligiCevapDVO"]) ? $data["kemikIligiCevapDVO"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "kemikIligiCevapDVO" => $kemikIligiCevapDVO,
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        ];
    }
}
