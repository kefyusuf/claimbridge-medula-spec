<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\FaturaKayit;


/**
 * FaturaGirisDVO — guideVersion 3.1.1, page 240 (Tablo 4.3.1.a - FaturaGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class FaturaGirisDVO
{
    public function __construct(
    /** Healthcare facility code of the invoicing institution. */
    public readonly ?int $saglikTesisKodu = null,
    /** Invoice date. */
    public readonly ?string $faturaTarihi = null,
    /** Patient application number whose registered services are being invoiced. */
    public readonly ?string $hastaBasvuruNo = null,
    /** Institution-side invoice reference number (s.240). */
    public readonly ?string $faturaRefNo = null,
    /** Service lines being invoiced (FaturaHizmetDetayDVO records). */
    public readonly array $hizmetDetaylari = [],
    /** Traffic-accident payment percentage; the guide marks it required - traffic invoices pay back by this percentage (s.240). */
    public readonly ?int $trafikKazasiOdemeYuzdesi = null,
    /** Additional difference fee collected from the patient; the guide marks it required (s.240). */
    public readonly ?float $ilaveUcret = null,
    /** Hospital information system (HBYS) code used by the KTS integration. */
    public readonly ?string $ktsHbysKodu = null,
    /** Patient contact phone. Examples must use synthetic placeholders only. */
    public readonly ?string $hastaTelefon = null,
    /** Patient contact address. Examples must use synthetic placeholders only. */
    public readonly ?string $hastaAdres = null,
    /** Patient consent flag sent as E (Evet) or H (Hayir) by uncontracted institutions (s.240 and changelog s.12, edition 3.1.1). Verification correction - the v0.1 draft modeled a boolean. */
    public readonly ?string $muvafakatVar = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["faturaTarihi"]) && is_scalar($data["faturaTarihi"]) ? (string) $data["faturaTarihi"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["faturaRefNo"]) && is_scalar($data["faturaRefNo"]) ? (string) $data["faturaRefNo"] : null,
        isset($data["hizmetDetaylari"]) && is_array($data["hizmetDetaylari"]) ? $data["hizmetDetaylari"] : [],
        isset($data["trafikKazasiOdemeYuzdesi"]) && is_numeric($data["trafikKazasiOdemeYuzdesi"]) ? (int) $data["trafikKazasiOdemeYuzdesi"] : null,
        isset($data["ilaveUcret"]) && is_numeric($data["ilaveUcret"]) ? (float) $data["ilaveUcret"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        isset($data["hastaTelefon"]) && is_scalar($data["hastaTelefon"]) ? (string) $data["hastaTelefon"] : null,
        isset($data["hastaAdres"]) && is_scalar($data["hastaAdres"]) ? (string) $data["hastaAdres"] : null,
        isset($data["muvafakatVar"]) && is_scalar($data["muvafakatVar"]) ? (string) $data["muvafakatVar"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "faturaTarihi" => $this->faturaTarihi,
        "hastaBasvuruNo" => $this->hastaBasvuruNo,
        "faturaRefNo" => $this->faturaRefNo,
        "hizmetDetaylari" => $this->hizmetDetaylari,
        "trafikKazasiOdemeYuzdesi" => $this->trafikKazasiOdemeYuzdesi,
        "ilaveUcret" => $this->ilaveUcret,
        "ktsHbysKodu" => $this->ktsHbysKodu,
        "hastaTelefon" => $this->hastaTelefon,
        "hastaAdres" => $this->hastaAdres,
        "muvafakatVar" => $this->muvafakatVar,
        ];
    }
}
