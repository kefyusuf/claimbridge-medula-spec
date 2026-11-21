<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for ESWLRaporBilgisiDVO — guideVersion 3.1.1, page 273.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ESWLRaporBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "butKodu" => ['required', 'string'],
        "eswlRaporuTasSayisi" => ['required', 'integer'],
        "eswlRaporuSeansSayisi" => ['required', 'integer'],
        "bobrekBilgisi" => ['required', 'string', 'in:1,2'],
        "eswlRaporuTasBilgileri" => ['required', 'array'],
        ];
    }
}
