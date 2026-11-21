<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BasvuruTakipOkuDVO — guideVersion 3.1.1, page 171 (Tablo 4.1.7.a - BasvuruTakipOkuDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BasvuruTakipOkuDVO
{
    public function __construct(
    /** Application number whose takips are read (s.172) */
    public readonly ?string $hastaBasvuruNo = null,
    /** GSS-assigned institution code (s.172) */
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
