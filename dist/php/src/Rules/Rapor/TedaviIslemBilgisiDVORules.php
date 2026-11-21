<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for TedaviIslemBilgisiDVO — guideVersion 3.1.1, page 267.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviIslemBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "diyalizRaporBilgisi" => ['nullable', 'array'],
        "eswlRaporBilgisi" => ['nullable', 'array'],
        "eswtRaporBilgisi" => ['nullable', 'array'],
        "ftrRaporBilgisi" => ['nullable', 'array'],
        "hotRaporBilgisi" => ['nullable', 'array'],
        "tupBebekRaporBilgisi" => ['nullable', 'array'],
        "evHemodiyaliziRaporBilgisi" => ['nullable', 'array'],
        "pulmonerRaporBilgisi" => ['nullable', 'array'],
        ];
    }
}
