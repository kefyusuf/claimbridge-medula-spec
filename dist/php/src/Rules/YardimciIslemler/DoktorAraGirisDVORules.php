<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\YardimciIslemler;

/**
 * Laravel validation rules for DoktorAraGirisDVO — guideVersion 3.1.1, page 283.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DoktorAraGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "drAdi" => ['nullable', 'string', 'max:30'],
        "drSoyadi" => ['nullable', 'string', 'max:30'],
        "drBransKodu" => ['nullable', 'string', 'max:4'],
        "drDiplomaNo" => ['nullable', 'string', 'max:20'],
        "drTescilNo" => ['nullable', 'string', 'max:16'],
        "saglikTesisKodu" => ['required', 'integer'],
        ];
    }
}
