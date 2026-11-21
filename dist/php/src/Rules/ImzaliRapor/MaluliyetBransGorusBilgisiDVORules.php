<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for MaluliyetBransGorusBilgisiDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MaluliyetBransGorusBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "bransKodu" => ['required', 'string'],
        "drTescilNo" => ['required', 'string'],
        "doktorTipi" => ['required', 'string', 'in:1,2'],
        "basvuruNedeni" => ['required', 'string', 'max:3000'],
        "anamnez" => ['required', 'string', 'max:4000'],
        "ozgecmis" => ['required', 'string', 'max:3000'],
        "soygecmis" => ['required', 'string', 'max:3000'],
        "muayeneBulgulari" => ['required', 'string', 'max:4000'],
        "tetkikVeLabaratuarBulgulari" => ['required', 'string', 'max:4000'],
        "tanilar" => ['required', 'array'],
        ];
    }
}
