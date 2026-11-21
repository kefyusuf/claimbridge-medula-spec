<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for MuayeneBilgisiDVO — guideVersion 3.1.1, page 226.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MuayeneBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "bransKodu" => ['required', 'string', 'max:4'],
        "drTescilNo" => ['required', 'string', 'max:16'],
        "sutKodu" => ['required', 'string', 'max:7'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "muayeneTarihi" => ['required', 'date', 'max:10'],
        "ozelDurum" => ['nullable', 'string', 'max:1'],
        "cokluOzelDurum" => ['nullable', 'array'],
        ];
    }
}
