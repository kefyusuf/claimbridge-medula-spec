<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\YardimciIslemler;

/**
 * Laravel validation rules for TakipAraGirisDVO — guideVersion 3.1.1, page 283.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipAraGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "hastaTCK" => ['required', 'string', 'max:11'],
        "baslangicTarihi" => ['required', 'string', 'max:10'],
        "bitisTarihi" => ['required', 'string', 'max:10'],
        "sevkDurumu" => ['required', 'string', 'in:E,H'],
        "saglikTesisKodu" => ['required', 'integer'],
        "ktsHbysKodu" => ['required', 'string'],
        ];
    }
}
