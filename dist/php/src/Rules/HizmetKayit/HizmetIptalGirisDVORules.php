<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for HizmetIptalGirisDVO — guideVersion 3.1.1, page 239.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetIptalGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "islemSiraNumaralari" => ['nullable', 'array'],
        "saglikTesisKodu" => ['required', 'integer'],
        "takipNo" => ['required', 'string'],
        "ktsHbysKodu" => ['required', 'string'],
        ];
    }
}
