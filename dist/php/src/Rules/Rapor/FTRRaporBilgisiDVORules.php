<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for FTRRaporBilgisiDVO — guideVersion 3.1.1, page 274.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FTRRaporBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "ftrVucutBolgesiKodu" => ['required', 'string', 'in:1,2,3,4,12,13,14,15,16,17,18,19,20,21,22,23,11'],
        "seansGun" => ['required', 'integer'],
        "seansSayi" => ['required', 'integer'],
        "butKodu" => ['required', 'string'],
        "tedaviTuru" => ['required', 'string', 'in:A,Y,G'],
        "robotikRehabilitasyon" => ['required', 'string'],
        ];
    }
}
