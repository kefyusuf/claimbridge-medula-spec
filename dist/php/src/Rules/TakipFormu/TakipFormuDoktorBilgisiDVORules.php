<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\TakipFormu;

/**
 * Laravel validation rules for TakipFormuDoktorBilgisiDVO — guideVersion 3.1.1, page 310.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuDoktorBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "drTescilNo" => ['required', 'string'],
        "drBransKodu" => ['required', 'string', 'max:4'],
        "dmEgitimiAlmisMi" => ['required', 'string', 'in:E,H'],
        ];
    }
}
