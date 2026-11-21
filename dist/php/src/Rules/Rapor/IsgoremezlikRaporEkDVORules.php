<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for IsgoremezlikRaporEkDVO — guideVersion 3.1.1, page 276.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IsgoremezlikRaporEkDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "aciklama" => ['required', 'string'],
        "bitisTarihi" => ['required', 'string'],
        "durum" => ['required', 'string', 'in:1,2'],
        "duzenlemeTuru" => ['required', 'string', 'in:1,2'],
        "hastaYatisVarMi" => ['required', 'string', 'in:E,H'],
        "kontrolMu" => ['required', 'string', 'in:E,H'],
        "kontrolTarihi" => ['required', 'string'],
        "protokolNo" => ['nullable', 'string'],
        "protokolTarihi" => ['nullable', 'string'],
        // hastaYatisVarMi = E
        "yatislar" => ['required', 'array'],
        "raporBilgisiDVO" => ['required', 'array'],
        "doktorlar" => ['required', 'array'],
        "tanilar" => ['required', 'array'],
        "kullaniciTesisKodu" => ['required', 'integer'],
        ];
    }
}
