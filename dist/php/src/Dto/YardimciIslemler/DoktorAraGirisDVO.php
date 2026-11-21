<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * DoktorAraGirisDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DoktorAraGirisDVO
{
    public function __construct(
    /** Searched physician first name (s.284). */
    public readonly ?string $drAdi = null,
    /** Searched physician last name (s.285). */
    public readonly ?string $drSoyadi = null,
    /** Searched physician branch code (s.285). */
    public readonly ?string $drBransKodu = null,
    /** Searched physician diploma number (s.285). */
    public readonly ?string $drDiplomaNo = null,
    /** Searched physician diploma registration number (s.285). */
    public readonly ?string $drTescilNo = null,
    /** GSS-assigned code of the calling facility (s.285). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drAdi"]) && is_scalar($data["drAdi"]) ? (string) $data["drAdi"] : null,
        isset($data["drSoyadi"]) && is_scalar($data["drSoyadi"]) ? (string) $data["drSoyadi"] : null,
        isset($data["drBransKodu"]) && is_scalar($data["drBransKodu"]) ? (string) $data["drBransKodu"] : null,
        isset($data["drDiplomaNo"]) && is_scalar($data["drDiplomaNo"]) ? (string) $data["drDiplomaNo"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "drAdi" => $drAdi,
        "drSoyadi" => $drSoyadi,
        "drBransKodu" => $drBransKodu,
        "drDiplomaNo" => $drDiplomaNo,
        "drTescilNo" => $drTescilNo,
        "saglikTesisKodu" => $saglikTesisKodu,
        ];
    }
}
