<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * MajistralEklenenIlacDVO — guideVersion 3.1.1, page 223 (Tablo 4.2.1.f.1.2 - MajistralEklenenIlacDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MajistralEklenenIlacDVO
{
    public function __construct(
    /** Sequence number; null-on-input pattern (s.223) */
    public readonly ?string $islemSiraNo = null,
    /** Barcode of the added drug registered in GSS (s.224) */
    public readonly ?string $barkod = null,
    /** Quantity of the added drug (s.224) */
    public readonly ?float $adet = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (float) $data["adet"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "islemSiraNo" => $islemSiraNo,
        "barkod" => $barkod,
        "adet" => $adet,
        ];
    }
}
