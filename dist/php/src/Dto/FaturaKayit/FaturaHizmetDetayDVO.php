<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaHizmetDetayDVO — guideVersion 3.1.1, page ? (guide table).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaHizmetDetayDVO
{
    public function __construct(
    /** Sequence number of the registered operation line being invoiced. */
    public readonly ?int $islemSiraNo = null,
    /** Procedure code (SUT movement code) of the invoiced service line. */
    public readonly ?string $islemKodu = null,
    /** Quantity of the invoiced service line. */
    public readonly ?int $adet = null,
    /** Unit price of the invoiced service line. */
    public readonly ?float $birimFiyat = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_numeric($data["islemSiraNo"]) ? (int) $data["islemSiraNo"] : null,
        isset($data["islemKodu"]) && is_scalar($data["islemKodu"]) ? (string) $data["islemKodu"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (int) $data["adet"] : null,
        isset($data["birimFiyat"]) && is_numeric($data["birimFiyat"]) ? (float) $data["birimFiyat"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemSiraNo,
        $islemKodu,
        $adet,
        $birimFiyat,
        ];
    }
}
