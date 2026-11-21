<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for EngellilikBransGorusBilgisiDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EngellilikBransGorusBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "bransKodu" => ['required', 'string'],
        "drTescilNo" => ['required', 'string'],
        "doktorTipi" => ['required', 'string', 'in:1,2'],
        "tetkikTeshisBulguAciklama" => ['required', 'string', 'max:1000'],
        "engelOrani" => ['required', 'integer'],
        ];
    }
}
