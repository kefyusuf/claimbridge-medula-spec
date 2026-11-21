<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for RaporGirisDVO — guideVersion 3.1.1, page 252.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        // conditional: exactly one report branch is populated
        "ilacRapor" => ['nullable', 'array'],
        // conditional: exactly one report branch is populated
        "maluliyetRapor" => ['nullable', 'array'],
        // conditional: exactly one report branch is populated
        "tedaviRapor" => ['nullable', 'array'],
        // conditional: exactly one report branch is populated
        "isgoremezlikRapor" => ['nullable', 'array'],
        "kullaniciTesisKodu" => ['required', 'integer'],
        ];
    }
}
