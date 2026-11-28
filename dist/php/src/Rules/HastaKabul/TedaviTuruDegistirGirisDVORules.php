<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HastaKabul;

/**
 * Laravel validation rules for TedaviTuruDegistirGirisDVO — guideVersion 3.1.1, page 177.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviTuruDegistirGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "takipNo" => ['required', 'string'],
        "tesisKodu" => ['required', 'integer'],
        "yeniTedaviTuru" => ['required', 'string'],
        "yatisBitisTarihi" => ['nullable', 'string'],
        ];
    }
}
