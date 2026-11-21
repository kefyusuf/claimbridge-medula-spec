<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * KayitliIslemBilgisiDVO — guideVersion 3.1.1, page 235 (Tablo 4.2.1.m - KayitliIslemBilgisiDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KayitliIslemBilgisiDVO
{
    public function __construct(
    /** Institution-assigned reference of the registered operation (s.235). */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Medula-assigned sequence number of the registered operation (s.235). */
    public readonly ?string $islemSiraNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hizmetSunucuRefNo" => $hizmetSunucuRefNo,
        "islemSiraNo" => $islemSiraNo,
        ];
    }
}
