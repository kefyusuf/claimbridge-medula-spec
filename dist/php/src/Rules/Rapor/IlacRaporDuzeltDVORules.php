<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for IlacRaporDuzeltDVO — guideVersion 3.1.1, page 279.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacRaporDuzeltDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "drTescilNo" => ['required', 'string', 'max:20'],
        "duzeltmeBilgisi" => ['required', 'string', 'max:2000'],
        "duzeltmeTarihi" => ['required', 'string', 'max:10'],
        "raporNo" => ['required', 'string', 'max:20'],
        "raporTarihi" => ['required', 'string', 'max:10'],
        "raporTuru" => ['required', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11'],
        "tesisKodu" => ['required', 'integer'],
        "raporEtkinMaddeler" => ['nullable', 'array'],
        "tanilar" => ['nullable', 'array'],
        // conditional: the report is a drug report (raporTuru 10)
        "ilacTeshisler" => ['nullable', 'array'],
        ];
    }
}
