<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * GuncelSutSorguGirisDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class GuncelSutSorguGirisDVO
{
    public function __construct(
    /** Code of the calling facility (s.297). */
    public readonly ?int $saglikTesisKodu = null,
    /** "dd.MM.yyyy"; empty returns the whole current list, filled returns changes after the queried date (s.297). */
    public readonly ?string $tarih = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["tarih"]) && is_scalar($data["tarih"]) ? (string) $data["tarih"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $saglikTesisKodu,
        "tarih" => $tarih,
        ];
    }
}
