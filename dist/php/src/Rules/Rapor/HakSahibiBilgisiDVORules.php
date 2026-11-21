<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\Rapor;

/**
 * Laravel validation rules for HakSahibiBilgisiDVO — guideVersion 3.1.1, page 268.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HakSahibiBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        // conditional: karneNo ve sosyalGuvenlikNo girilmemisse
        "tckimlikNo" => ['nullable', 'string', 'max:11'],
        // conditional: tckimlikNo girilmemisse
        "karneNo" => ['nullable', 'string'],
        // conditional: tckimlikNo girilmemisse
        "sosyalGuvenlikNo" => ['nullable', 'string'],
        "yakinlikKodu" => ['nullable', 'string', 'max:4'],
        "sigortaliTuru" => ['required', 'string', 'in:1,2,3,4'],
        "devredilenKurum" => ['required', 'string', 'in:1,2,3,4,5,6,7,10,12,14,15,17,18,19,20,21,99,22,23,25,26,27,28,31,98,32,97,100,147,148,149'],
        "adres" => ['nullable', 'string'],
        "telefon" => ['nullable', 'string'],
        "baglibulunanbirim" => ['nullable', 'string'],
        "provizyonTipi" => ['required', 'string', 'in:N,I,A,T,V,M,K,C,H,R,L,G,U,D,E,S'],
        "provizyonTarihi" => ['required', 'string', 'max:10'],
        "adi" => ['nullable', 'string', 'max:50'],
        "soyadi" => ['nullable', 'string', 'max:50'],
        "adresDetay" => ['nullable', 'string', 'max:100'],
        "telefonDetay" => ['nullable', 'string', 'max:50'],
        "bagliBulunanBirim" => ['nullable', 'string', 'max:50'],
        "emeklimi" => ['nullable', 'string', 'max:50'],
        ];
    }
}
