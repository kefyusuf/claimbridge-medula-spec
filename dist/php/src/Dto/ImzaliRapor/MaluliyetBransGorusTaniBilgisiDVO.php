<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\TaniNeden;

/**
 * MaluliyetBransGorusTaniBilgisiDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MaluliyetBransGorusTaniBilgisiDVO
{
    public function __construct(
    /** ICD-10 code (s.332). */
    public readonly ?string $icd10Kodu = null,
    /** Description (s.332). */
    public readonly ?string $aciklama = null,
    /** Relation reason; codes 1-2 apply to occupational-disease reports, 3-4 to work-accident reports (s.332-333). */
    public readonly ?TaniNeden $taniNeden = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["icd10Kodu"]) && is_scalar($data["icd10Kodu"]) ? (string) $data["icd10Kodu"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["taniNeden"]) ? TaniNeden::tryFrom((string) $data["taniNeden"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "icd10Kodu" => $this->icd10Kodu,
        "aciklama" => $this->aciklama,
        "taniNeden" => $this->taniNeden !== null ? $this->taniNeden->value : null,
        ];
    }
}
