<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for DigerIslemBilgisiDVO — guideVersion 3.1.1, page 192.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DigerIslemBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "adet" => ['required', 'integer'],
        "bransKodu" => ['required', 'string', 'max:4'],
        "sutKodu" => ['required', 'string'],
        // conditional: operation code is 530140 or 530150
        "drTescilNo" => ['nullable', 'string', 'max:16'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        // conditional: the operation requires a report
        "raporTakipNo" => ['nullable', 'string', 'max:8'],
        "ozelDurum" => ['nullable', 'string', 'max:1'],
        "ayniFarkliKesi" => ['nullable', 'string', 'in:1,2,3,4,5'],
        "cokluOzelDurum" => ['nullable', 'array'],
        "aciklama" => ['nullable', 'string', 'max:500'],
        "sagSol" => ['nullable', 'string', 'max:1'],
        "istemYapanDrTescilNo" => ['required', 'string', 'max:16'],
        "istemYapanDrBrans" => ['required', 'string', 'max:4'],
        ];
    }
}
