<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for EmzirmeRaporDVO — guideVersion 3.1.1, page 261.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EmzirmeRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "bebekDogumTarihi" => ['required', 'string', 'max:10'],
        "dogumOncBasTarihi" => ['required', 'string', 'max:10'],
        "canliCocukSayisi" => ['nullable', 'integer'],
        "anneTcKimlikNo" => ['nullable', 'string', 'max:11'],
        "doganCocukSayisi" => ['nullable', 'integer'],
        ];
    }
}
