<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for MajistralIlacDVO — guideVersion 3.1.1, page 199.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MajistralIlacDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "preparatTuru" => ['required', 'string', 'in:1,2,3,4,5,6,7,8'],
        // preparatTuru is 3 (Bolunmus tozlar)
        "bolunmusTozTuru" => ['required', 'string', 'max:1'],
        "ambalajTuru" => ['required', 'string', 'in:1,2,3'],
        "ambalajBoyutu" => ['required', 'string', 'in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,21,22,23,24,25,26,27,28,29,30,31'],
        "ambalajAdet" => ['required', 'string', 'max:4'],
        "hamMaddeler" => ['nullable', 'array'],
        "eklenenIlaclar" => ['nullable', 'array'],
        ];
    }
}
