<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\FaturaKayit;

/**
 * Laravel validation rules for FaturaOkuGirisDVO — guideVersion 3.1.1, page 244.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaOkuGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        // faturaRefNo is empty
        "faturaTeslimNo" => ['required', 'array'],
        // faturaTeslimNo is empty
        "faturaRefNo" => ['required', 'string', 'max:20'],
        "faturaTarihi" => ['required', 'date', 'max:10'],
        "ktsHbysKodu" => ['required', 'string'],
        ];
    }
}
