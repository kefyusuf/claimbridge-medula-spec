<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for DiyalizRaporBilgisiDVO — guideVersion 3.1.1, page 273.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DiyalizRaporBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "refakatVarMi" => ['required', 'string', 'in:E,H'],
        "seansGun" => ['required', 'integer'],
        "seansSayi" => ['required', 'integer'],
        "butKodu" => ['required', 'string'],
        ];
    }
}
