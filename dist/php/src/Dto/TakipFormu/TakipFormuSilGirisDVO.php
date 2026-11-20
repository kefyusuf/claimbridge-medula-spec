<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;


/**
 * TakipFormuSilGirisDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuSilGirisDVO
{
    public function __construct(
    /** Follow-up form number (s.321). */
    public readonly ?string $takipFormuNo = null,
    /** Facility code (s.321). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipFormuNo"]) && is_scalar($data["takipFormuNo"]) ? (string) $data["takipFormuNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $takipFormuNo,
        $saglikTesisKodu,
        ];
    }
}
