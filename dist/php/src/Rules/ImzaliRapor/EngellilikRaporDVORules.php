<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for EngellilikRaporDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EngellilikRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporTakipNo" => ['required', 'string'],
        "tckimlikNo" => ['required', 'string', 'max:11'],
        "fotograf" => ['required', 'array'],
        "tesisKodu" => ['required', 'integer', 'max:8'],
        "takipNo" => ['nullable', 'string'],
        "raporNo" => ['required', 'string'],
        "muracaatTuru" => ['required', 'string', 'in:1,2'],
        "muracaatNedeni" => ['required', 'string', 'in:1,2,3'],
        "basvuruNedeni" => ['required', 'string', 'max:100'],
        "durum" => ['nullable', 'integer'],
        "kurulBaskaniDrTescilNo" => ['required', 'string'],
        "aciklama" => ['required', 'string', 'max:1000'],
        "engelOrani" => ['required', 'integer'],
        "bagimlilikDegerlendirilmesi" => ['required', 'string', 'in:1,2,3'],
        "calistirilamayacagiIslerinNiteligi" => ['required', 'string', 'max:250'],
        "ortopedikEngelVar" => ['required', 'string', 'in:E,H'],
        "zihinselEngelVar" => ['required', 'string', 'in:E,H'],
        "gormeEngeliVar" => ['required', 'string', 'in:E,H'],
        "ruhsalVeDengeselEngelVar" => ['required', 'string', 'in:E,H'],
        "isitmeEngeliVar" => ['required', 'string', 'in:E,H'],
        "kronikEngeliVar" => ['required', 'string', 'in:E,H'],
        "dilVeKonusmaEngeliVar" => ['required', 'string', 'in:E,H'],
        "siniflanamayanEngeliVar" => ['required', 'string', 'in:E,H'],
        "tanilar" => ['required', 'array'],
        "bransGorusler" => ['required', 'array'],
        "uyeler" => ['required', 'array'],
        "onayBekleyenDoktorlar" => ['nullable', 'array'],
        ];
    }
}
