<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KatilimPayiCevapDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KatilimPayiCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.293). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.294). */
    public readonly ?string $sonucMesaji = null,
    /** Document reference number of the deducted document (s.294). */
    public readonly ?int $evrakRefNo = null,
    /** Co-payment records; the guide uses the TYPE name as the PARAMETER name here — preserved verbatim; item shape Tablo 4.5.7.c (KatilimPayiDVO, this registry) (s.294). */
    public readonly array $KatilimPayiDVO = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["evrakRefNo"]) && is_numeric($data["evrakRefNo"]) ? (int) $data["evrakRefNo"] : null,
        isset($data["KatilimPayiDVO"]) && is_array($data["KatilimPayiDVO"]) ? $data["KatilimPayiDVO"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "evrakRefNo" => $this->evrakRefNo,
        "KatilimPayiDVO" => $this->KatilimPayiDVO,
        ];
    }
}
