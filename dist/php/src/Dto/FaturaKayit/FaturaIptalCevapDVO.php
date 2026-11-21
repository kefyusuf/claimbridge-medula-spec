<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaIptalCevapDVO — guideVersion 3.1.1, page 243 (Tablo 4.3.2.b - FaturaIptalCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaIptalCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error (s.243). */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.243). */
    public readonly ?string $sonucMesaji = null,
    /** Error code for invoices that could not be cancelled (s.244). */
    public readonly ?string $hataKodu = null,
    /** Error explanation for invoices that could not be cancelled (s.244). */
    public readonly ?string $hataMesaji = null,
    /** Delivery number of the invoice that could not be cancelled due to the error (s.244). */
    public readonly ?string $faturaTeslimNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["hataKodu"]) && is_scalar($data["hataKodu"]) ? (string) $data["hataKodu"] : null,
        isset($data["hataMesaji"]) && is_scalar($data["hataMesaji"]) ? (string) $data["hataMesaji"] : null,
        isset($data["faturaTeslimNo"]) && is_scalar($data["faturaTeslimNo"]) ? (string) $data["faturaTeslimNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "hataKodu" => $this->hataKodu,
        "hataMesaji" => $this->hataMesaji,
        "faturaTeslimNo" => $this->faturaTeslimNo,
        ];
    }
}
