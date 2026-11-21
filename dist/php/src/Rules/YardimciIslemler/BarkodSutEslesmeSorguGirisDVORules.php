<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\YardimciIslemler;

/**
 * Laravel validation rules for BarkodSutEslesmeSorguGirisDVO — guideVersion 3.1.1, page 299.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BarkodSutEslesmeSorguGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        // conditional: empty vs filled has full-list vs snapshot semantics
        "tarih" => ['nullable', 'string'],
        "barkod" => ['nullable', 'string'],
        "firmaTanimlayiciNo" => ['nullable', 'string'],
        "sutKodu" => ['nullable', 'string'],
        ];
    }
}
