<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for MalzemeBilgisiRaporDVO — guideVersion 3.1.1, page 266.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MalzemeBilgisiRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        // conditional: malzemeTuru = 1 ya da 2
        "malzemeKodu" => ['nullable', 'string', 'max:20'],
        // conditional: malzemeTuru = 3
        "malzemeAdi" => ['nullable', 'string', 'max:200'],
        "malzemeTuru" => ['required', 'string', 'in:1,2,3'],
        "adet" => ['required', 'integer'],
        ];
    }
}
