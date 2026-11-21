<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for MajistralEklenenIlacDVO — guideVersion 3.1.1, page 223.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MajistralEklenenIlacDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "barkod" => ['required', 'string', 'max:14'],
        "adet" => ['required', 'numeric', 'max:4'],
        ];
    }
}
