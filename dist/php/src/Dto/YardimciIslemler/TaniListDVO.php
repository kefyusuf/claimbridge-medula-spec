<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TaniListDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaniListDVO
{
    public function __construct(
    /** ICD-10 code (s.304). */
    public readonly ?string $icd10Kodu = null,
    /** Diagnosis name (s.304). */
    public readonly ?string $taniAdi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["icd10Kodu"]) && is_scalar($data["icd10Kodu"]) ? (string) $data["icd10Kodu"] : null,
        isset($data["taniAdi"]) && is_scalar($data["taniAdi"]) ? (string) $data["taniAdi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $icd10Kodu,
        $taniAdi,
        ];
    }
}
