<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TaniAraGirisWSDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaniAraGirisWSDVO
{
    public function __construct(
    /** Code of the calling facility (s.304). */
    public readonly ?int $saglikTesisKodu = null,
    /** Diagnosis code to query; partial prefixes allowed, e.g. "A", "A0" (s.304). */
    public readonly ?string $icd10Kodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["icd10Kodu"]) && is_scalar($data["icd10Kodu"]) ? (string) $data["icd10Kodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "icd10Kodu" => $this->icd10Kodu,
        ];
    }
}
