<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\FaturaKayit;

/**
 * Laravel validation rules for HizmetDetayDVO — guideVersion 3.1.1, page 241.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetDetayDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "aciklama" => ['nullable', 'string', 'max:2000'],
        "protokolNo" => ['nullable', 'string'],
        "taburcuKodu" => ['nullable', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11,12,13'],
        "takipNo" => ['nullable', 'string'],
        ];
    }
}
