<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiTCIleOkuGirisDVO — guideVersion 3.1.1, page 184 (Tablo 4.1.20.a - KemikIligiTCIleOkuGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiTCIleOkuGirisDVO
{
    public function __construct(
    /** Patient T.C. identity number (s.184) */
    public readonly ?string $tcNo = null,
    /** GSS-assigned institution code (s.184) */
    public readonly ?int $tesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcNo"]) && is_scalar($data["tcNo"]) ? (string) $data["tcNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tcNo,
        $tesisKodu,
        ];
    }
}
