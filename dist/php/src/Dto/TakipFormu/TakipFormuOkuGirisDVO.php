<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuOkuGirisDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuOkuGirisDVO
{
    public function __construct(
    /** Patient citizen ID (s.320). */
    public readonly ?string $tcKimlikNo = null,
    /** Facility code (s.320). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcKimlikNo"]) && is_scalar($data["tcKimlikNo"]) ? (string) $data["tcKimlikNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "tcKimlikNo" => $this->tcKimlikNo,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        ];
    }
}
