<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Taahhut;

/**
 * Laravel validation rules for TaahhutDVO — guideVersion 3.1.1, page 323.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "hastaTCKimlikNo" => ['required', 'string', 'max:11'],
        "adressIlPlaka" => ['required', 'integer'],
        "adressIlce" => ['required', 'string'],
        "adressPostaKodu" => ['required', 'string', 'max:6'],
        "adressCaddeSokak" => ['required', 'string', 'max:50'],
        "adressDisKapiNo" => ['required', 'string', 'max:15'],
        "adressIcKapiNo" => ['required', 'string', 'max:15'],
        "adressTelefon" => ['required', 'string', 'max:10'],
        "adressEposta" => ['nullable', 'string', 'max:50'],
        "taahhutAlanAd" => ['required', 'string', 'max:30'],
        "taahhutAlanSoyad" => ['required', 'string', 'max:30'],
        ];
    }
}
