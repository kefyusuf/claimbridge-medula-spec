<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for TedaviRaporDVO — guideVersion 3.1.1, page 261.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporDVO" => ['required', 'array'],
        "islemler" => ['required', 'array'],
        "tedaviRaporTuru" => ['required', 'string', 'in:1,2,3,4,5,6,7,8,9'],
        ];
    }
}
