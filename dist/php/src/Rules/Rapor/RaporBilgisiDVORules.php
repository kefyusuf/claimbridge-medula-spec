<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for RaporBilgisiDVO — guideVersion 3.1.1, page 268.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporTesisKodu" => ['required', 'integer'],
        "raporTarih" => ['required', 'string', 'max:10'],
        "raporNo" => ['required', 'string', 'max:20'],
        "raporTakipNo" => ['required', 'string', 'max:20'],
        "raporSiraNo" => ['required', 'integer'],
        "aVakaTKaza" => ['required', 'string', 'in:1,2,3'],
        ];
    }
}
