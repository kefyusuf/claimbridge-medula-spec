<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * HastaYatisOkuDVO — guideVersion 3.1.1, page 170 (Tablo 4.1.6.a - HastaYatisOkuDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaYatisOkuDVO
{
    public function __construct(
    /** Application number whose hospitalizations are read (s.170) */
    public readonly ?string $hastaBasvuruNo = null,
    /** GSS-assigned institution code (s.170) */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaBasvuruNo" => $this->hastaBasvuruNo,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        ];
    }
}
