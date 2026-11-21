<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaIptalGirisDVO — guideVersion 3.1.1, page 243 (Tablo 4.3.2.a - FaturaIptalGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaIptalGirisDVO
{
    public function __construct(
    /** Healthcare facility code (s.243). */
    public readonly ?int $saglikTesisKodu = null,
    /** Delivery numbers of the invoices to cancel, as an array (s.243). */
    public readonly array $faturaTeslimNo = [],
    /** Software vendor KTS code (s.243). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["faturaTeslimNo"]) && is_array($data["faturaTeslimNo"]) ? $data["faturaTeslimNo"] : [],
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "faturaTeslimNo" => $this->faturaTeslimNo,
        "ktsHbysKodu" => $this->ktsHbysKodu,
        ];
    }
}
