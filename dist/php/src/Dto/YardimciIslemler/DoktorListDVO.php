<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * DoktorListDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DoktorListDVO
{
    public function __construct(
    /** Physician first name (s.285). */
    public readonly ?string $drAdi = null,
    /** Physician last name (s.285). */
    public readonly ?string $drSoyadi = null,
    /** Physician diploma number (s.285). */
    public readonly ?string $drDiplomaNo = null,
    /** Physician diploma registration number (s.285). */
    public readonly ?string $drTescilNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["drAdi"]) && is_scalar($data["drAdi"]) ? (string) $data["drAdi"] : null,
        isset($data["drSoyadi"]) && is_scalar($data["drSoyadi"]) ? (string) $data["drSoyadi"] : null,
        isset($data["drDiplomaNo"]) && is_scalar($data["drDiplomaNo"]) ? (string) $data["drDiplomaNo"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "drAdi" => $this->drAdi,
        "drSoyadi" => $this->drSoyadi,
        "drDiplomaNo" => $this->drDiplomaNo,
        "drTescilNo" => $this->drTescilNo,
        ];
    }
}
