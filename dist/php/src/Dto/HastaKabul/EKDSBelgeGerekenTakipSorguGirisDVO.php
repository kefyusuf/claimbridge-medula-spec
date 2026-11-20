<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * EKDSBelgeGerekenTakipSorguGirisDVO — guideVersion 3.1.1, page 186 (Tablo 4.1.22.a - EKDSBelgeGerekenTakipSorguGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EKDSBelgeGerekenTakipSorguGirisDVO
{
    public function __construct(
    /** GSS-assigned institution code (s.186) */
    public readonly ?int $tesisKodu = null,
    /** Period document reference number to query (s.186) */
    public readonly ?int $evrakID = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["evrakID"]) && is_numeric($data["evrakID"]) ? (int) $data["evrakID"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tesisKodu,
        $evrakID,
        ];
    }
}
