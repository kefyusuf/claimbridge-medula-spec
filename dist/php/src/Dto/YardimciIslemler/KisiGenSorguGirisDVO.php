<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiGenSorguGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiGenSorguGirisDVO
{
    public function __construct(
    /** Citizen ID of the queried person; the guide types it long (s.309). */
    public readonly ?int $hastaTCKimlikNo = null,
    /** Facility code (s.309). */
    public readonly ?int $saglikTesisKodu = null,
    /** SUT code; sutKodu or genKodu is mandatory (s.309). */
    public readonly ?string $sutKodu = null,
    /** Gen code to query; sutKodu or genKodu is mandatory (s.309). */
    public readonly ?string $genKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTCKimlikNo"]) && is_numeric($data["hastaTCKimlikNo"]) ? (int) $data["hastaTCKimlikNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["genKodu"]) && is_scalar($data["genKodu"]) ? (string) $data["genKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTCKimlikNo" => $hastaTCKimlikNo,
        "saglikTesisKodu" => $saglikTesisKodu,
        "sutKodu" => $sutKodu,
        "genKodu" => $genKodu,
        ];
    }
}
