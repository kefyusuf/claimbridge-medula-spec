<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for MaluliyetBransGorusTaniBilgisiDVO — guideVersion 3.1.1, page 330.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MaluliyetBransGorusTaniBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "icd10Kodu" => ['required', 'string'],
        "aciklama" => ['required', 'string', 'max:500'],
        // conditional: rapor türü Meslek Hastalığı veya İş Kazası
        "taniNeden" => ['nullable', 'string', 'in:1,2,3,4'],
        ];
    }
}
