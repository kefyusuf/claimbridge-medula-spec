<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * YesilKartliSevkliHastaGirisDVO — guideVersion 3.1.1, page 176 (Tablo 4.1.12.a - YesilKartliSevkliHastaGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class YesilKartliSevkliHastaGirisDVO
{
    public function __construct(
    /** Patient TCK number (s.176) */
    public readonly ?string $hastaTCKNo = null,
    /** GSS-assigned institution code (s.176) */
    public readonly ?int $tesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTCKNo"]) && is_scalar($data["hastaTCKNo"]) ? (string) $data["hastaTCKNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTCKNo" => $this->hastaTCKNo,
        "tesisKodu" => $this->tesisKodu,
        ];
    }
}
