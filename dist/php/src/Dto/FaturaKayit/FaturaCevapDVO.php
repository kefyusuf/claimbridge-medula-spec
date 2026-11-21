<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaCevapDVO — guideVersion 3.1.1, page ? (guide table).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error. */
    public readonly ?string $sonucKodu = null,
    /** Human-readable result message accompanying the result code. */
    public readonly ?string $sonucMesaji = null,
    /** Invoice delivery number generated on successful submission; null on failure. */
    public readonly ?string $faturaTeslimNo = null,
    /** Total invoice amount reported on successful submission. */
    public readonly ?float $faturaTutari = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["faturaTeslimNo"]) && is_scalar($data["faturaTeslimNo"]) ? (string) $data["faturaTeslimNo"] : null,
        isset($data["faturaTutari"]) && is_numeric($data["faturaTutari"]) ? (float) $data["faturaTutari"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        "faturaTeslimNo" => $faturaTeslimNo,
        "faturaTutari" => $faturaTutari,
        ];
    }
}
