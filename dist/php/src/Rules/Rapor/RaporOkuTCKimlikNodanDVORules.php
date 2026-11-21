<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for RaporOkuTCKimlikNodanDVO — guideVersion 3.1.1, page 279.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporOkuTCKimlikNodanDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "tckimlikNo" => ['required', 'string'],
        "raporTuru" => ['required', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11'],
        "kullaniciTesisKodu" => ['required', 'integer'],
        ];
    }
}
