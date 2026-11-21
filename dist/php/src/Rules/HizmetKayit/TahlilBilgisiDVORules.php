<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for TahlilBilgisiDVO — guideVersion 3.1.1, page 227.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TahlilBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "bransKodu" => ['required', 'string', 'max:4'],
        "drTescilNo" => ['required', 'string', 'max:16'],
        "istemYapanDrTescilNo" => ['required', 'string', 'max:16'],
        "sutKodu" => ['required', 'string', 'max:7'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        "ozelDurum" => ['nullable', 'string', 'max:1'],
        "cokluOzelDurum" => ['nullable', 'array'],
        "raporTakipNo" => ['nullable', 'string'],
        "istemYapanDrBrans" => ['nullable', 'string', 'max:4'],
        "genBilgisi" => ['nullable', 'array'],
        "tahlilTipi" => ['required', 'string', 'in:0,HEM102,HEM103,HEM104,HEM105,HEM106,HEM107,HEM108,HEM109,HEM110,HEM111,HEM112,HEM113,HEM114,HEM115,HEM116,HEM117,HEM118,HEM119,HEM120,HEM121,IDR102,IDR103,IDR104,IDR105,IDR106,IDR107,IDR108,IDR109,IDR110,IDR111,IDR112,IDR113,IDR115,IDR116,IDR117,IDR118,IDR119,IDR120,IDR121,IDR122,IDR123,IDR125,IDR126,IDR127,IDR128,IDR114,KGAZ01,KGAZ02,KGAZ03,KGAZ04,KGAZ05,KGAZ06,KGAZ07,KGAZ08,KGAZ09,KGAZ10,KGAZ11,KGAZ12,KGAZ13,KGAZ14,KGAZ15,KGAZ16,KGAZ17,OGTT01,OGTT02,OGTT03,OGTT04,OGTT05,OGTT06,OGTT07,OGTT08'],
        "birim" => ['required', 'string', 'max:15'],
        "sagSol" => ['nullable', 'string', 'max:1'],
        "ayniFarkliKesi" => ['nullable', 'string', 'in:1,2,3,4,5'],
        "aciklama" => ['nullable', 'string'],
        ];
    }
}
