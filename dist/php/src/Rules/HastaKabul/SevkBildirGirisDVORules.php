<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HastaKabul;

/**
 * Laravel validation rules for SevkBildirGirisDVO — guideVersion 3.1.1, page 173.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SevkBildirGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "takipNo" => ['required', 'string'],
        "tesisKodu" => ['required', 'integer'],
        "sevkEdilisTarihi" => ['required', 'date', 'max:10'],
        "yesilKartSevkEdilenBransKodu" => ['nullable', 'string'],
        "yesilKartSevkEdilenTedaviTipi" => ['required', 'integer'],
        "yesilKartSevkEdilenTakipTipi" => ['nullable', 'string'],
        ];
    }
}
