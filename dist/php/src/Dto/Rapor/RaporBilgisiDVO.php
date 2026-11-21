<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\AdliVakaDurumu;

/**
 * RaporBilgisiDVO — guideVersion 3.1.1, page 268 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporBilgisiDVO
{
    public function __construct(
    /** Code of the facility that issued the report. Ignored when TakipNoileRaporBilgisiKaydet is used — the facility is resolved from the tracking number (s.268). */
    public readonly ?int $raporTesisKodu = null,
    /** Report issue date, "dd.mm.yyyy"; guide note: rapor veriliş tarihi girilmelidir. Parameter name row-wrapped ("tarih") in the guide — aligned with the RaporOkuDVO naming (4.4.3.c). */
    public readonly ?string $raporTarih = null,
    /** Report number. Parameter name row-wrapped ("no") in the guide — aligned with the RaporOkuDVO naming (4.4.3.c). */
    public readonly ?string $raporNo = null,
    /** Report tracking number (s.268). */
    public readonly ?string $raporTakipNo = null,
    /** Report sequence number; Integer here unlike RaporOkuDVO's String raporSiraNo — intra-guide divergence preserved (s.268 vs s.280). */
    public readonly ?int $raporSiraNo = null,
    /** Legal-case / traffic-accident flag for illness, occupational-disease and work-accident cases (s.268). */
    public readonly ?AdliVakaDurumu $aVakaTKaza = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTesisKodu"]) && is_numeric($data["raporTesisKodu"]) ? (int) $data["raporTesisKodu"] : null,
        isset($data["raporTarih"]) && is_scalar($data["raporTarih"]) ? (string) $data["raporTarih"] : null,
        isset($data["raporNo"]) && is_scalar($data["raporNo"]) ? (string) $data["raporNo"] : null,
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["raporSiraNo"]) && is_numeric($data["raporSiraNo"]) ? (int) $data["raporSiraNo"] : null,
        isset($data["aVakaTKaza"]) ? AdliVakaDurumu::tryFrom((string) $data["aVakaTKaza"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporTesisKodu" => $this->raporTesisKodu,
        "raporTarih" => $this->raporTarih,
        "raporNo" => $this->raporNo,
        "raporTakipNo" => $this->raporTakipNo,
        "raporSiraNo" => $this->raporSiraNo,
        "aVakaTKaza" => $this->aVakaTKaza !== null ? $this->aVakaTKaza->value : null,
        ];
    }
}
