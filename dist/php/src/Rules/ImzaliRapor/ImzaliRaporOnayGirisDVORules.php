<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for ImzaliRaporOnayGirisDVO — guideVersion 3.1.1, page 336.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliRaporOnayGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer', 'max:8'],
        "doktorTcKimlikNo" => ['required', 'string', 'max:11'],
        "raporOnayBilgisi" => ['required', 'array'],
        ];
    }
}
