<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for RaporDVO — guideVersion 3.1.1, page 263.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "raporBilgisi" => ['required', 'array'],
        "turu" => ['required', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11'],
        // conditional: the report is not a prosthesis or fit-to-work-before-birth report
        "baslangicTarihi" => ['nullable', 'string', 'max:10'],
        // conditional: the report is not a prosthesis or fit-to-work-before-birth report
        "bitisTarihi" => ['nullable', 'string', 'max:10'],
        "duzenlemeTuru" => ['required', 'string', 'in:1,2'],
        // TakipNoileRaporBilgisiKaydet is used
        "hakSahibi" => ['required', 'array'],
        "protokolNo" => ['nullable', 'string', 'max:20'],
        "protokolTarihi" => ['nullable', 'string', 'max:10'],
        "durum" => ['nullable', 'string', 'max:1'],
        "aciklama" => ['nullable', 'string', 'max:5000'],
        "doktorlar" => ['required', 'array'],
        "tanilar" => ['nullable', 'array'],
        "teshisler" => ['nullable', 'array'],
        // conditional: the report is a drug report
        "ilacTeshisler" => ['nullable', 'array'],
        "takipNo" => ['nullable', 'string'],
        "klinikTani" => ['nullable', 'string', 'max:255'],
        "ozelDurum" => ['nullable', 'integer'],
        ];
    }
}
