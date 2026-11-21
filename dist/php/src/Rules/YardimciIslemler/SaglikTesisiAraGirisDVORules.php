<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\YardimciIslemler;

/**
 * Laravel validation rules for SaglikTesisiAraGirisDVO — guideVersion 3.1.1, page 283.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SaglikTesisiAraGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        "saglikTesisAdi" => ['nullable', 'string', 'max:100'],
        "tesisIlKodu" => ['nullable', 'string', 'max:2'],
        "tesisKodu" => ['nullable', 'integer'],
        "tesisTuru" => ['nullable', 'string', 'max:2'],
        ];
    }
}
