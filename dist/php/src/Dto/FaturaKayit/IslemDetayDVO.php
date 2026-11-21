<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * IslemDetayDVO — guideVersion 3.1.1, page 243 (Tablo 4.3.1.f - IslemDetayDVO (s.242 son satir + s.243 basi)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IslemDetayDVO
{
    public function __construct(
    /** Medula sequence number of the operation (s.243) */
    public readonly ?string $islemSiraNo = null,
    /** Operation-specific amount within the takip (s.243) */
    public readonly ?float $islemTutari = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTutari"]) && is_numeric($data["islemTutari"]) ? (float) $data["islemTutari"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "islemSiraNo" => $islemSiraNo,
        "islemTutari" => $islemTutari,
        ];
    }
}
