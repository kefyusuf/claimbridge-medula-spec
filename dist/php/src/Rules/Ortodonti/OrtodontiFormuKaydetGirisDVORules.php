<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Ortodonti;

/**
 * Laravel validation rules for OrtodontiFormuKaydetGirisDVO — guideVersion 3.1.1, page 326.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrtodontiFormuKaydetGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        "provizyonNo" => ['required', 'string'],
        "sutKodu" => ['required', 'string'],
        // Evet/Hayır per the guide
        "formNo" => ['required', 'integer'],
        "islemTarihi" => ['required', 'string'],
        "tcKimlikNo" => ['required', 'integer'],
        ];
    }
}
