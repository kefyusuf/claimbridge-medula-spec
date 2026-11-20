<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\HamMaddeBirimi;
use ClaimBridge\Medula\Enum\MajistralHamMadde;

/**
 * MajistralHamMaddeDVO — guideVersion 3.1.1, page 201 (Tablo 4.2.1.f.1.1 - MajistralHamMaddeDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MajistralHamMaddeDVO
{
    public function __construct(
    /** Sequence number; null-on-input pattern (s.201) */
    public readonly ?string $islemSiraNo = null,
    /** Raw-material code (guide declares Integer; semantically a coded value) - codes 1-620 in the majistral-ham-madde registry enum (s.201) */
    public readonly ?MajistralHamMadde $majistralHamMaddeKodu = null,
    /** Raw-material quantity (s.201) */
    public readonly ?int $miktar = null,
    /** Raw-material unit - 1 Gram / 2 Miligram (s.201) */
    public readonly ?HamMaddeBirimi $hamMaddeBirimi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["majistralHamMaddeKodu"]) ? MajistralHamMadde::tryFrom((string) $data["majistralHamMaddeKodu"]) : null,
        isset($data["miktar"]) && is_numeric($data["miktar"]) ? (int) $data["miktar"] : null,
        isset($data["hamMaddeBirimi"]) ? HamMaddeBirimi::tryFrom((string) $data["hamMaddeBirimi"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemSiraNo,
        $majistralHamMaddeKodu !== null ? $majistralHamMaddeKodu->value : null,
        $miktar,
        $hamMaddeBirimi !== null ? $hamMaddeBirimi->value : null,
        ];
    }
}
