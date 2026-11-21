<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for DoktorBilgisiDVO — guideVersion 3.1.1, page 272.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DoktorBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "drTescilNo" => ['required', 'string', 'max:16'],
        "drAdi" => ['nullable', 'string', 'max:50'],
        "drSoyadi" => ['nullable', 'string', 'max:50'],
        "drBransKodu" => ['required', 'string', 'max:4'],
        "tipi" => ['required', 'string', 'in:1,2'],
        ];
    }
}
