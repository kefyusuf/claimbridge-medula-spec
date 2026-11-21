<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaOkuGirisDVO — guideVersion 3.1.1, page 244 (Tablo 4.3.3.a - FaturaOkuGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaOkuGirisDVO
{
    public function __construct(
    /** Healthcare facility code (s.244). */
    public readonly ?int $saglikTesisKodu = null,
    /** Delivery numbers of the invoices to read, as an array (s.244). */
    public readonly array $faturaTeslimNo = [],
    /** Reference number of the invoice to read (s.244). */
    public readonly ?string $faturaRefNo = null,
    /** Invoice date in dd.mm.yyyy format per the guide (s.244). */
    public readonly ?string $faturaTarihi = null,
    /** Software vendor KTS code (s.244). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["faturaTeslimNo"]) && is_array($data["faturaTeslimNo"]) ? $data["faturaTeslimNo"] : [],
        isset($data["faturaRefNo"]) && is_scalar($data["faturaRefNo"]) ? (string) $data["faturaRefNo"] : null,
        isset($data["faturaTarihi"]) && is_scalar($data["faturaTarihi"]) ? (string) $data["faturaTarihi"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "faturaTeslimNo" => $this->faturaTeslimNo,
        "faturaRefNo" => $this->faturaRefNo,
        "faturaTarihi" => $this->faturaTarihi,
        "ktsHbysKodu" => $this->ktsHbysKodu,
        ];
    }
}
