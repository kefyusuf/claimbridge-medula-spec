<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for CocukBilgisiDVO — guideVersion 3.1.1, page 266.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class CocukBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "cinsiyet" => ['required', 'string', 'in:K,E'],
        "kilo" => ['required', 'string', 'max:5'],
        "dogumSaati" => ['required', 'string', 'max:5'],
        ];
    }
}
