<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for HastalikRaporDVO — guideVersion 3.1.1, page 263.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastalikRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "baslangicTarihi" => ['nullable', 'string', 'max:10'],
        "bitisTarihi" => ['nullable', 'string', 'max:10'],
        "raporDurumu" => ['nullable', 'string', 'in:1,2'],
        "isKontTarihi" => ['required', 'string', 'max:10'],
        "hastaneYatisTarihi" => ['nullable', 'string', 'max:10'],
        "hastaneCikisTarihi" => ['nullable', 'string', 'max:10'],
        "nuks" => ['nullable', 'string', 'in:1,2'],
        "yatisDevam" => ['required', 'string', 'in:1,2,3'],
        "taburcuTarihi" => ['nullable', 'string', 'max:10'],
        "taburcuKodu" => ['nullable', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11,12,13'],
        ];
    }
}
