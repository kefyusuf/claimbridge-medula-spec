<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * HastaCikisDVO — guideVersion 3.1.1, page 168 (Tablo 4.1.4.a - HastaCikisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaCikisDVO
{
    public function __construct(
    /** Application number the discharge is recorded against (s.168) */
    public readonly ?string $hastaBasvuruNo = null,
    /** Discharge date of the hospitalized patient, dd.mm.yyyy (s.168) */
    public readonly ?string $hastaCikisTarihi = null,
    /** GSS-assigned code of the institution (s.168) */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["hastaCikisTarihi"]) && is_scalar($data["hastaCikisTarihi"]) ? (string) $data["hastaCikisTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $hastaBasvuruNo,
        $hastaCikisTarihi,
        $saglikTesisKodu,
        ];
    }
}
