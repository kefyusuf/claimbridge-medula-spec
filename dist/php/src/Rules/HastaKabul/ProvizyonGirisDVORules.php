<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HastaKabul;

/**
 * Laravel validation rules for ProvizyonGirisDVO — guideVersion 3.1.1, page 154.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ProvizyonGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "saglikTesisKodu" => ['required', 'integer'],
        // takipNo is filled (linked-takip request)
        "hastaTCKimlikNo" => ['required', 'string', 'max:11'],
        // takipNo is filled (linked-takip request)
        "sigortaliTuru" => ['required', 'string', 'in:1,2,3,4'],
        "bransKodu" => ['required', 'string', 'max:4'],
        // takipNo is filled (linked-takip request)
        "devredilenKurum" => ['required', 'string', 'in:1,2,3,4,5,6,7,10,12,14,15,17,18,19,20,21,22,23,25,26,27,28,31,32,97,98,99,100,147,148,149'],
        "provizyonTarihi" => ['required', 'date', 'max:10'],
        "provizyonTipi" => ['required', 'string', 'in:N,I,A,T,V,M,K,C,H,R,L,G,U,D,E,S'],
        "tedaviTuru" => ['required', 'string', 'in:A,Y,G'],
        "tedaviTipi" => ['required', 'string', 'in:0,1,2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22'],
        "takipTipi" => ['required', 'string', 'in:N,E,U,K,T,Y,P,S,C,F,B'],
        "takipNo" => ['nullable', 'string'],
        "istisnaiHal" => ['nullable', 'string'],
        // conditional: first takip request
        "hastaTelefon" => ['nullable', 'string', 'max:10'],
        // conditional: first takip request
        "hastaAdres" => ['nullable', 'string', 'max:100'],
        "ktsHbysKodu" => ['required', 'string'],
        "ekdsYontemGerekce" => ['nullable', 'string', 'in:10,11,12,13,20,21,30,31,32,33,34,35,99'],
        "doktorTescilNo" => ['nullable', 'string'],
        ];
    }
}
