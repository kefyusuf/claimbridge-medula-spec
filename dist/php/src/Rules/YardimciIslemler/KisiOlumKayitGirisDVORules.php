<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\YardimciIslemler;

/**
 * Laravel validation rules for KisiOlumKayitGirisDVO — guideVersion 3.1.1, page 299.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiOlumKayitGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "tcKimlikNo" => ['required', 'integer'],
        "olumTarihi" => ['required', 'string'],
        "saglikTesisKodu" => ['required', 'string'],
        "olumSaati" => ['required', 'string'],
        "olumBelgesiAdi" => ['required', 'string', 'max:50'],
        "olumBelgesiIcerik" => ['required', 'array'],
        ];
    }
}
