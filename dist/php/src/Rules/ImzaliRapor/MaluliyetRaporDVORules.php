<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for MaluliyetRaporDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MaluliyetRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporTakipNo" => ['nullable', 'string'],
        "tckimlikNo" => ['required', 'string', 'max:11'],
        "fotograf" => ['required', 'array'],
        "tesisKodu" => ['required', 'integer', 'max:8'],
        "takipNo" => ['nullable', 'string'],
        "raporTarihi" => ['required', 'string', 'max:10'],
        "maluliyetRaporTuru" => ['required', 'string', 'in:1,2,3'],
        "raporNo" => ['required', 'string'],
        "sevkTarihi" => ['required', 'string'],
        "sevkNedeni" => ['required', 'string', 'in:1,2,3'],
        "basvuruSekli" => ['required', 'string', 'in:1,2'],
        "durum" => ['nullable', 'integer'],
        "kurulBaskaniDrTescilNo" => ['required', 'string', 'max:11'],
        "aciklama" => ['required', 'string', 'max:4000'],
        "karar" => ['required', 'string', 'max:4000'],
        "bransGorusler" => ['required', 'array'],
        "uyeler" => ['required', 'array'],
        "onayBekleyenDoktorlar" => ['nullable', 'array'],
        ];
    }
}
