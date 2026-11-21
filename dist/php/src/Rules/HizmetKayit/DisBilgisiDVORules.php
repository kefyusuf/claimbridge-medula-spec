<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\HizmetKayit;

/**
 * Laravel validation rules for DisBilgisiDVO — guideVersion 3.1.1, page 193.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class DisBilgisiDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "drTescilNo" => ['required', 'string', 'max:16'],
        "anomali" => ['required', 'string', 'max:1'],
        "adet" => ['required', 'integer'],
        "bransKodu" => ['required', 'string', 'max:4'],
        "hizmetSunucuRefNo" => ['required', 'string', 'max:20'],
        "islemSiraNo" => ['nullable', 'string', 'max:15'],
        "islemTarihi" => ['required', 'date', 'max:10'],
        "sagAltCene" => ['required', 'string', 'max:8'],
        "sagSutAltCene" => ['required', 'string', 'max:5'],
        "sagSutUstCene" => ['required', 'string', 'max:5'],
        "sagUstCene" => ['required', 'string', 'max:8'],
        "solAltCene" => ['required', 'string', 'max:8'],
        "solSutAltCene" => ['required', 'string', 'max:5'],
        "solSutUstCene" => ['required', 'string', 'max:5'],
        "solUstCene" => ['required', 'string', 'max:8'],
        "sagAltCeneAnomaliDis" => ['required', 'string', 'max:1'],
        "sagUstCeneAnomaliDis" => ['required', 'string', 'max:1'],
        "solAltCeneAnomaliDis" => ['required', 'string', 'max:1'],
        "solUstCeneAnomaliDis" => ['required', 'string', 'max:1'],
        "sutKodu" => ['required', 'string', 'max:7'],
        "ayniFarkliKesi" => ['nullable', 'string', 'max:1'],
        ];
    }
}
