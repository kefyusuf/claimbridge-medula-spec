<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for AmeliyatveGirisimBilgisiDVO — guideVersion 3.1.1, page 190.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class AmeliyatveGirisimBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "aciklama" => ['nullable', 'string', 'max:1000'],
        "adet" => ['required', 'integer'],
        "ayniFarkliKesi" => ['nullable', 'string', 'in:1,2,3,4,5'],
        "bransKodu" => ['required', 'string', 'max:4'],
        "drTescilNo" => ['required', 'string', 'max:16'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "islemSiraNo" => ['nullable', 'string', 'max:20'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        "sagSol" => ['nullable', 'string', 'max:1'],
        "sutKodu" => ['required', 'string', 'max:7'],
        "euroscore" => ['required', 'string', 'in:0,1,2,3'],
        "ozelDurum" => ['nullable', 'string', 'max:1'],
        "cokluOzelDurum" => ['nullable', 'array'],
        "raporTakipNo" => ['nullable', 'string'],
        ];
    }
}
