<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for TibbiGereklilikRaporDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TibbiGereklilikRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporTakipNo" => ['nullable', 'string'],
        "tckimlikNo" => ['required', 'string', 'max:11'],
        "tesisKodu" => ['required', 'integer', 'max:8'],
        "takipNo" => ['nullable', 'string'],
        "raporTarihi" => ['required', 'string', 'max:10'],
        "raporNo" => ['required', 'string'],
        "istekNedeni" => ['required', 'string', 'in:1,2,3'],
        "tanilar" => ['required', 'array'],
        "protokolNo" => ['required', 'string'],
        "karar" => ['required', 'string', 'max:2000'],
        // shape deferred
        "islemler" => ['required', 'array'],
        "doktorlar" => ['required', 'array'],
        ];
    }
}
