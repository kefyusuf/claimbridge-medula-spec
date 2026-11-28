<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HastaKabul;

/**
 * Laravel validation rules for MustehaklikGirisDVO — guideVersion 3.1.1, page 179.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MustehaklikGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "tcKimlikNo" => ['required', 'string', 'max:11'],
        "tarih" => ['required', 'string', 'max:10'],
        "saglikTesisKodu" => ['required', 'integer'],
        ];
    }
}
