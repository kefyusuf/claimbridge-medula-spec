<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * IlacAraGirisDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacAraGirisDVO
{
    public function __construct(
    /** Drug barcode (s.287). */
    public readonly ?string $barkod = null,
    /** Drug name (s.287). */
    public readonly ?string $ilacAdi = null,
    /** Code of the searching facility (s.287). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["ilacAdi"]) && is_scalar($data["ilacAdi"]) ? (string) $data["ilacAdi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $barkod,
        $ilacAdi,
        $saglikTesisKodu,
        ];
    }
}
