<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiGecmisIslemlerGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiGecmisIslemlerGirisDVO
{
    public function __construct(
    /** Code of the calling facility (s.303). */
    public readonly ?int $saglikTesisKodu = null,
    /** Citizen ID of the queried person; the guide types it long (s.303). */
    public readonly ?int $hastaTCKimlikNo = null,
    /** SUT code to query (s.303). */
    public readonly ?string $sutKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["hastaTCKimlikNo"]) && is_numeric($data["hastaTCKimlikNo"]) ? (int) $data["hastaTCKimlikNo"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $saglikTesisKodu,
        "hastaTCKimlikNo" => $hastaTCKimlikNo,
        "sutKodu" => $sutKodu,
        ];
    }
}
