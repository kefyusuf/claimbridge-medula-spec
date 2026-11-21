<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Rules\YardimciIslemler;

/**
 * Laravel validation rules for EvrakKesintiGirisDVO — guideVersion 3.1.1, page 290.
 *
 * Conditional exceptions from the guide are annotated inline; a field
 * marked required with a linked-takip-style exception stays 'required' —
 * apply the exception in your own request layer (Laravel sometimes/required_without).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EvrakKesintiGirisDVORules
{
    /** @return array<string, array<int, string>> */
    public static function rules(): array
    {
        return [
        "evrakReferansNo" => ['required', 'integer'],
        "tesisKodu" => ['required', 'integer'],
        "grupTuru" => ['required', 'string', 'in:A,Y,G,D'],
        "grupKodu" => ['nullable', 'integer'],
        ];
    }
}
