<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for HizmetOkuGirisDVO — guideVersion 3.1.1, page 236.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetOkuGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        // conditional: hizmetSunucuRefNolari is also filled
        "islemSiraNumaralari" => ['nullable', 'array'],
        // conditional: islemSiraNumaralari is also filled
        "hizmetSunucuRefNolari" => ['nullable', 'array'],
        "saglikTesisKodu" => ['required', 'integer'],
        "takipNo" => ['required', 'string'],
        "ktsHbysKodu" => ['required', 'string'],
        ];
    }
}
