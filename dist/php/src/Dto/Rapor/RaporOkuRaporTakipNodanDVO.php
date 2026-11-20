<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * RaporOkuRaporTakipNodanDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.7.a (s.281-282)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporOkuRaporTakipNodanDVO
{
    public function __construct(
    /** Report tracking number (s.281). */
    public readonly ?string $raporTakipNo = null,
    /** Health facility code of the caller (s.282). */
    public readonly ?int $kullaniciTesisKodu = null,
    /** Report sequence number (s.282). */
    public readonly ?string $raporSiraNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["kullaniciTesisKodu"]) && is_numeric($data["kullaniciTesisKodu"]) ? (int) $data["kullaniciTesisKodu"] : null,
        isset($data["raporSiraNo"]) && is_scalar($data["raporSiraNo"]) ? (string) $data["raporSiraNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporTakipNo,
        $kullaniciTesisKodu,
        $raporSiraNo,
        ];
    }
}
