<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for IlacBilgisiDVO — guideVersion 3.1.1, page 198.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "aciklama" => ['nullable', 'string', 'max:255'],
        "adet" => ['required', 'numeric', 'max:4'],
        // conditional: ilacTuru is not 2 (not majistral)
        "barkod" => ['nullable', 'string', 'max:13'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "ilacTuru" => ['required', 'string', 'in:1,2,3'],
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        "tutar" => ['nullable', 'numeric'],
        "paketHaric" => ['required', 'string', 'max:1'],
        "ozelDurum" => ['nullable', 'string', 'max:1'],
        "cokluOzelDurum" => ['nullable', 'array'],
        "seriNo" => ['nullable', 'string', 'max:20'],
        "sonKullanimTarihi" => ['nullable', 'date'],
        "batchNo" => ['nullable', 'string', 'max:20'],
        "itsBirimSarfId" => ['nullable', 'string'],
        // conditional: ilacTuru is 2 (Majistral ilac)
        "majistralIlac" => ['nullable', 'array'],
        "birlikteYapilanIslemSUTKodu" => ['nullable', 'string'],
        "birlikteYapilanIslemHizmetSunucuRefNo" => ['nullable', 'string', 'max:20'],
        ];
    }
}
