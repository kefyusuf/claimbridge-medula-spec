<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for AnalikRaporDVO — guideVersion 3.1.1, page 260.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class AnalikRaporDVORules
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
        "bebekDogumTarihi" => ['required', 'string', 'max:10'],
        "dogumOncBasTarihi" => ['required', 'string', 'max:10'],
        "canliCocukSayisi" => ['nullable', 'integer'],
        "doganCocukSayisi" => ['nullable', 'integer'],
        "norSezFor" => ['required', 'string', 'in:1,2,3'],
        "yatisDevam" => ['required', 'string', 'in:1,2,3'],
        "aktarmaRaporVarmi" => ['required', 'string', 'in:1,2'],
        "aktarmaRaporTarihi" => ['required', 'string', 'max:10'],
        "gebelikHaftasi" => ['nullable', 'integer'],
        "taburcuTarihi" => ['nullable', 'string', 'max:10'],
        "taburcuKodu" => ['nullable', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11,12,13'],
        "analikRaporTipi" => ['nullable', 'string', 'in:1,2'],
        "gebelikTipi" => ['nullable', 'string', 'in:1,2'],
        "gebelikHaftasi1" => ['nullable', 'integer'],
        "gebelikHaftasi2" => ['nullable', 'integer'],
        "bebekDogumHaftasi" => ['nullable', 'integer'],
        "aktarmaHaftasi" => ['nullable', 'integer'],
        ];
    }
}
