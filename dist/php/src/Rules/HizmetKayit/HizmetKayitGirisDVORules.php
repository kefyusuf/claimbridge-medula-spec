<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for HizmetKayitGirisDVO — guideVersion 3.1.1, page 189.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetKayitGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        "takipNo" => ['required', 'string'],
        "hastaBasvuruNo" => ['nullable', 'string'],
        // conditional: per tracking record
        "tanilar" => ['nullable', 'array'],
        "ameliyatveGirisimBilgileri" => ['nullable', 'array'],
        "digerIslemBilgileri" => ['nullable', 'array'],
        "disBilgileri" => ['nullable', 'array'],
        "ilacBilgileri" => ['nullable', 'array'],
        "konsultasyonBilgileri" => ['nullable', 'array'],
        "malzemeBilgileri" => ['nullable', 'array'],
        "muayeneBilgisi" => ['nullable', 'array'],
        "tahlilBilgileri" => ['nullable', 'array'],
        "tetkikveRadyolojiBilgileri" => ['nullable', 'array'],
        // conditional: the takip is an inpatient (yatarak) episode
        "hastaYatisBilgileri" => ['nullable', 'array'],
        "kanBilgileri" => ['nullable', 'array'],
        // conditional: the takip is an emergency (acil) episode
        "triajBeyani" => ['nullable', 'string', 'max:1'],
        "ktsHbysKodu" => ['required', 'string'],
        ];
    }
}
