<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HastaKabul;

/**
 * Laravel validation rules for HastaCikisIptalDVO — guideVersion 3.1.1, page 169.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaCikisIptalDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "hastaBasvuruNo" => ['required', 'string'],
        "hastaCikisTarihi" => ['required', 'date', 'max:10'],
        "yeniHastaCikisTarihi" => ['nullable', 'date', 'max:10'],
        "saglikTesisKodu" => ['required', 'integer'],
        ];
    }
}
