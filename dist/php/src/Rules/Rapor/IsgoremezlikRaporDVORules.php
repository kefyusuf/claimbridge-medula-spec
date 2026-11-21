<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for IsgoremezlikRaporDVO — guideVersion 3.1.1, page 254.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IsgoremezlikRaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporBilgisi" => ['required', 'array'],
        "isGoremezlikRaporTuru" => ['required', 'string', 'in:1,2,3,4,5'],
        "bransKodu" => ['required', 'string', 'max:4'],
        "protokolNo" => ['nullable', 'string', 'max:20'],
        "protokolTarihi" => ['nullable', 'string', 'max:10'],
        "duzenlemeTuru" => ['required', 'string', 'in:1,2'],
        "teshis" => ['required', 'string'],
        "aciklama" => ['nullable', 'string', 'max:255'],
        "saglikKuruluRaporTarihi" => ['nullable', 'string', 'max:20'],
        "olum" => ['required', 'string', 'in:1,2'],
        "ilkRaporTakipNo" => ['nullable', 'integer'],
        // conditional: isGoremezlikRaporTuru = 1
        "isKazasiRaporu" => ['nullable', 'array'],
        // conditional: isGoremezlikRaporTuru = 2
        "meslekHastaligiRaporu" => ['nullable', 'array'],
        // conditional: isGoremezlikRaporTuru = 4
        "analikRaporu" => ['nullable', 'array'],
        // conditional: isGoremezlikRaporTuru = 5
        "emzirmeRaporu" => ['nullable', 'array'],
        // conditional: isGoremezlikRaporTuru = 3
        "hastalikRaporu" => ['nullable', 'array'],
        "klinikBulgular" => ['nullable', 'string', 'max:20'],
        "ronLabBilgileri" => ['nullable', 'string'],
        "karar" => ['nullable', 'string', 'max:20'],
        "doktorlar" => ['required', 'array'],
        "bashekimOnayDurumu" => ['nullable', 'integer'],
        "bashekimTCNo" => ['nullable', 'string', 'max:20'],
        "hakSahibi" => ['required', 'array'],
        "devammi" => ['required', 'string', 'in:-1,1,2'],
        "yatisDevam" => ['required', 'string', 'in:1,2,3,4'],
        ];
    }
}
