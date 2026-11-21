<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * TahlilSonucDVO — guideVersion 3.1.1, page 228 (Tablo 4.2.1.j.1 - TahlilSonucDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TahlilSonucDVO
{
    public function __construct(
    /** Sequence number; null-on-input pattern while registering (s.228) */
    public readonly ?string $islemSiraNo = null,
    /** Lab result value; must be +, - or a numeric value (s.228) */
    public readonly ?string $sonuc = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["sonuc"]) && is_scalar($data["sonuc"]) ? (string) $data["sonuc"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "islemSiraNo" => $islemSiraNo,
        "sonuc" => $sonuc,
        ];
    }
}
