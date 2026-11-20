<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * SaglikTesisiAraGirisDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SaglikTesisiAraGirisDVO
{
    public function __construct(
    /** Code of the facility calling the method (s.283). */
    public readonly ?int $saglikTesisKodu = null,
    /** Searched facility name; partial-letter search supported (s.283). */
    public readonly ?string $saglikTesisAdi = null,
    /** Province code of the searched facility (s.283). */
    public readonly ?string $tesisIlKodu = null,
    /** Facility code when known — the remaining fields are then fetched for it; otherwise empty (s.283). */
    public readonly ?int $tesisKodu = null,
    /** Facility type code; the type list lives in the FAQ section (s.283). */
    public readonly ?string $tesisTuru = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["saglikTesisAdi"]) && is_scalar($data["saglikTesisAdi"]) ? (string) $data["saglikTesisAdi"] : null,
        isset($data["tesisIlKodu"]) && is_scalar($data["tesisIlKodu"]) ? (string) $data["tesisIlKodu"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["tesisTuru"]) && is_scalar($data["tesisTuru"]) ? (string) $data["tesisTuru"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $saglikTesisAdi,
        $tesisIlKodu,
        $tesisKodu,
        $tesisTuru,
        ];
    }
}
