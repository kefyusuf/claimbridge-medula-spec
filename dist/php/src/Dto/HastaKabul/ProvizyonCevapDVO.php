<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * ProvizyonCevapDVO — guideVersion 3.1.1, page ? (guide table).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ProvizyonCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error. */
    public readonly ?string $sonucKodu = null,
    /** Human-readable result message accompanying the result code. */
    public readonly ?string $sonucMesaji = null,
    /** Patient application number generated on successful admission; null on failure. */
    public readonly ?string $hastaBasvuruNo = null,
    /** Primary tracking number generated on successful admission; null on failure. */
    public readonly ?string $takipNo = null,
    /** List of TakipDVO records; a bagli-takip request can return more than one tracking record. */
    public readonly array $takipler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["takipler"]) && is_array($data["takipler"]) ? $data["takipler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        "hastaBasvuruNo" => $hastaBasvuruNo,
        "takipNo" => $takipNo,
        "takipler" => $takipler,
        ];
    }
}
