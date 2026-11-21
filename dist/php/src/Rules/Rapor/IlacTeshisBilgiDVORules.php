<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for IlacTeshisBilgiDVO — guideVersion 3.1.1, page 278.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacTeshisBilgiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "baslangicTarihi" => ['required', 'string', 'max:10'],
        "bitisTarihi" => ['required', 'string', 'max:10'],
        "teshisKodu" => ['required', 'integer'],
        "ICD10Kodu" => ['required', 'array'],
        ];
    }
}
