<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TesisYatakSorguGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TesisYatakSorguGirisDVO
{
    public function __construct(
    /** Code of the calling facility (s.300). */
    public readonly ?int $saglikTesisKodu = null,
    /** Empty returns the whole bed list; filled returns the beds valid on that date (s.300). */
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
        $saglikTesisKodu,
        $tarih,
        ];
    }
}
