<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\FaturaKayit;

/**
 * Laravel validation rules for FaturaGirisDVO — guideVersion 3.1.1, page 240.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        "faturaTarihi" => ['required', 'date'],
        "hastaBasvuruNo" => ['required', 'string'],
        "faturaRefNo" => ['required', 'string', 'max:20'],
        "hizmetDetaylari" => ['required', 'array'],
        // the invoice covers services related to a traffic accident
        "trafikKazasiOdemeYuzdesi" => ['required', 'integer'],
        "ilaveUcret" => ['required', 'numeric'],
        "ktsHbysKodu" => ['nullable', 'string'],
        "hastaTelefon" => ['nullable', 'string'],
        "hastaAdres" => ['nullable', 'string'],
        "muvafakatVar" => ['required', 'string', 'max:1'],
        ];
    }
}
