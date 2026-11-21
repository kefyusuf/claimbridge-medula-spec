<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HastaKabul;

/**
 * Laravel validation rules for KemikIligiOkuGirisDVO — guideVersion 3.1.1, page 182.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiOkuGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "hastaTcNo" => ['required', 'string', 'max:11'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        "islemKodu" => ['required', 'string', 'max:10'],
        "saglikTesisKodu" => ['required', 'integer'],
        "bildirimNo" => ['required', 'integer'],
        ];
    }
}
