<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for ImzaliDoktorBilgisiDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliDoktorBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "drTescilNo" => ['required', 'string'],
        "drAdi" => ['nullable', 'string'],
        "drSoyadi" => ['nullable', 'string'],
        "drBransKodu" => ['required', 'string'],
        "tipi" => ['required', 'string', 'in:1,2'],
        ];
    }
}
