<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaOkuCevapDVO — guideVersion 3.1.1, page 245 (Tablo 4.3.3.b - FaturaOkuCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaOkuCevapDVO
{
    public function __construct(
    /** Reference number of the read invoice (s.245). */
    public readonly ?string $faturaRefNo = null,
    /** Invoice date in dd.mm.yyyy format (s.245). */
    public readonly ?string $faturaTarihi = null,
    /** Delivery numbers returned for the read invoices, as an array (s.245). */
    public readonly array $faturaTeslimNo = [],
    /** Invoice amount calculated by GSS (s.245). */
    public readonly ?float $faturaTutari = null,
    /** Result code; 0000 means success (s.245). */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.245). */
    public readonly ?string $sonucMesaji = null,
    /** Invoice detail records, expanded as the FaturaCevapDetayDVO registry entity (Tablo 4.3.3.c, s.245-246). */
    public readonly array $faturaDetaylari = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["faturaRefNo"]) && is_scalar($data["faturaRefNo"]) ? (string) $data["faturaRefNo"] : null,
        isset($data["faturaTarihi"]) && is_scalar($data["faturaTarihi"]) ? (string) $data["faturaTarihi"] : null,
        isset($data["faturaTeslimNo"]) && is_array($data["faturaTeslimNo"]) ? $data["faturaTeslimNo"] : [],
        isset($data["faturaTutari"]) && is_numeric($data["faturaTutari"]) ? (float) $data["faturaTutari"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["faturaDetaylari"]) && is_array($data["faturaDetaylari"]) ? $data["faturaDetaylari"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "faturaRefNo" => $this->faturaRefNo,
        "faturaTarihi" => $this->faturaTarihi,
        "faturaTeslimNo" => $this->faturaTeslimNo,
        "faturaTutari" => $this->faturaTutari,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "faturaDetaylari" => $this->faturaDetaylari,
        ];
    }
}
