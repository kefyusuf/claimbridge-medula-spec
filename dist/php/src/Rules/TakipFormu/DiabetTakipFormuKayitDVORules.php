<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\TakipFormu;

/**
 * Laravel validation rules for DiabetTakipFormuKayitDVO — guideVersion 3.1.1, page 310.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DiabetTakipFormuKayitDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "tcKimlikNo" => ['required', 'string', 'max:11'],
        "ad" => ['required', 'string'],
        "soyad" => ['required', 'string'],
        "cepTel" => ['required', 'string', 'max:10'],
        "protokolNo" => ['required', 'string'],
        "vizitTarihi" => ['required', 'string', 'max:10'],
        "saglikTesisiKodu" => ['required', 'integer'],
        "cinsiyet" => ['required', 'string', 'in:K,E'],
        "ikametTuru" => ['required', 'string', 'in:1,2,3,4,5,6'],
        "doktorBilgileri" => ['required', 'array'],
        "tani" => ['required', 'string'],
        "taniTarihi" => ['required', 'string', 'max:10'],
        "diabetEgitimi" => ['required', 'array'],
        "tibbiBeslenmeTedavisi" => ['required', 'string', 'in:1,2,3,4,5,6'],
        "egzersiz" => ['required', 'string', 'in:1,2,3,4,5,6,7'],
        "hastaliklar" => ['required', 'array'],
        "basvuruNedeni" => ['required', 'string', 'in:1,2,3,4,5,6'],
        "aliskanliklar" => ['required', 'array'],
        "glukoMetre" => ['required', 'string', 'in:V,Y,B'],
        "kanSekeriTakipSayisi" => ['required', 'integer'],
        "kullanilanIlaclar" => ['required', 'array'],
        "sistolikKanBasinci" => ['nullable', 'integer'],
        "diyastolikKanBasinci" => ['nullable', 'integer'],
        "boy" => ['required', 'numeric'],
        "kilo" => ['required', 'numeric'],
        "vki" => ['required', 'numeric'],
        "apg" => ['required', 'numeric'],
        "tpg" => ['required', 'numeric'],
        "hbA1c" => ['required', 'numeric'],
        "kreatinin" => ['required', 'numeric'],
        "trigliserid" => ['required', 'numeric'],
        "ldlKol" => ['required', 'numeric'],
        "hdlKol" => ['required', 'numeric'],
        "alt" => ['required', 'numeric'],
        "antiGAD" => ['required', 'string', 'in:P,N,B'],
        "ekg" => ['required', 'string', 'in:1,2,3'],
        "mikroalbuminuri" => ['required', 'string', 'in:V,Y,B'],
        "gozMuayenesi" => ['required', 'string', 'in:1,2,3,4,5,6,7'],
        "periferikSensoryalNoropati" => ['required', 'string', 'in:V,Y,B'],
        "koronerArterH" => ['required', 'string', 'in:V,Y,B'],
        "serebrovaskulerH" => ['required', 'string', 'in:V,Y,B'],
        "ayakMuayenesi" => ['required', 'string', 'in:V,Y,B'],
        "akutKomplikasyon" => ['required', 'string', 'in:1,2,3,4'],
        "yatisGun" => ['required', 'integer'],
        "insulinPompasi" => ['required', 'string', 'in:V,Y,B'],
        // conditional: insulinPompasi = V
        "insulinPompasiVerTarihi" => ['nullable', 'string', 'max:10'],
        // conditional: insulinPompasi = V
        "insulinPompasiDegTarihi" => ['nullable', 'string', 'max:10'],
        ];
    }
}
