<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\ImzaliRapor;

/**
 * Laravel validation rules for OnayDVO — guideVersion 3.1.1, page 336.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OnayDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "tesisKodu" => ['required', 'integer'],
        "doktorTcKimlikNo" => ['required', 'string', 'max:11'],
        "onayVerenTuru" => ['required', 'string', 'in:1,2'],
        "onayIslemTuru" => ['required', 'string', 'in:1,2,3,4'],
        "onayIslemReferans" => ['required', 'string'],
        ];
    }
}
