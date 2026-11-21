<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for MalzemeBilgisiDVO — guideVersion 3.1.1, page 224.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MalzemeBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        // conditional: malzemeTuru is 3 (kodsuz malzeme)
        "kodsuzMalzemeAdi" => ['nullable', 'string', 'max:100'],
        "adet" => ['required', 'numeric'],
        "barkod" => ['nullable', 'string', 'max:20'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        "kodsuzMalzemeFiyati" => ['required', 'numeric'],
        "malzemeKodu" => ['nullable', 'string', 'max:20'],
        "malzemeTuru" => ['required', 'string', 'in:1,2,3'],
        "paketHaric" => ['required', 'string', 'max:1'],
        "katkiPayi" => ['required', 'string', 'max:1'],
        "kdv" => ['nullable', 'integer'],
        "ozelDurum" => ['nullable', 'string', 'max:1'],
        "cokluOzelDurum" => ['nullable', 'array'],
        "malzemeSatinAlisTarihi" => ['required', 'date', 'max:10'],
        "donorId" => ['nullable', 'string', 'max:20'],
        "ihaleKesinlesmeTarihi" => ['nullable', 'date', 'max:10'],
        "ikNoAlimNo" => ['nullable', 'string', 'max:25'],
        "bayiNo" => ['required', 'string', 'max:13'],
        "raporTakipNo" => ['nullable', 'string'],
        "sagSol" => ['nullable', 'string', 'max:1'],
        "birlikteYapilanIslemSUTKodu" => ['nullable', 'string'],
        "birlikteYapilanIslemHizmetSunucuRefNo" => ['nullable', 'string', 'max:20'],
        ];
    }
}
