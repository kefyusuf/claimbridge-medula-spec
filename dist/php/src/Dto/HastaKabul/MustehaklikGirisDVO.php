<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * MustehaklikGirisDVO — guideVersion 3.1.1, page 179 (Tablo 4.1.15.a - MustehaklikGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MustehaklikGirisDVO
{
    public function __construct(
    /** Patient TCK number (s.179) */
    public readonly ?string $tcKimlikNo = null,
    /** Entitlement query date (s.179) */
    public readonly ?string $tarih = null,
    /** GSS-assigned institution code (s.179) */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcKimlikNo"]) && is_scalar($data["tcKimlikNo"]) ? (string) $data["tcKimlikNo"] : null,
        isset($data["tarih"]) && is_scalar($data["tarih"]) ? (string) $data["tarih"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "tcKimlikNo" => $this->tcKimlikNo,
        "tarih" => $this->tarih,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        ];
    }
}
