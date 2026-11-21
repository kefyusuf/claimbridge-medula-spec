<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * HastaCikisIptalDVO — guideVersion 3.1.1, page 169 (Tablo 4.1.5.a - HastaCikisIptalDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaCikisIptalDVO
{
    public function __construct(
    /** Application number the discharge cancellation is recorded against (s.169) */
    public readonly ?string $hastaBasvuruNo = null,
    /** Original discharge date being cancelled (s.170) */
    public readonly ?string $hastaCikisTarihi = null,
    /** New discharge date replacing the cancelled one (s.170) */
    public readonly ?string $yeniHastaCikisTarihi = null,
    /** GSS-assigned institution code (s.170) */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["hastaCikisTarihi"]) && is_scalar($data["hastaCikisTarihi"]) ? (string) $data["hastaCikisTarihi"] : null,
        isset($data["yeniHastaCikisTarihi"]) && is_scalar($data["yeniHastaCikisTarihi"]) ? (string) $data["yeniHastaCikisTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaBasvuruNo" => $hastaBasvuruNo,
        "hastaCikisTarihi" => $hastaCikisTarihi,
        "yeniHastaCikisTarihi" => $yeniHastaCikisTarihi,
        "saglikTesisKodu" => $saglikTesisKodu,
        ];
    }
}
