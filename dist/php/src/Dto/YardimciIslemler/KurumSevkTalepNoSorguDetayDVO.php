<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\AraKarar;

/**
 * KurumSevkTalepNoSorguDetayDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KurumSevkTalepNoSorguDetayDVO
{
    public function __construct(
    /** The "e-Talep MALULİYET SEVK FORMU" number issued by the province directorate / social-security center (s.308). */
    public readonly ?string $kurumSevkTalepNo = null,
    /** Patient citizen ID (s.308). */
    public readonly ?string $tcKimlikNo = null,
    /** "dd.MM.yyyy" referral date (s.308). */
    public readonly ?string $sevkTarihi = null,
    /** Facility code (s.308). */
    public readonly ?int $saglikTesisKodu = null,
    /** Populated when a takip was taken with this referral number (s.308). */
    public readonly ?string $hastaBasvuruNo = null,
    /** Populated when a report was registered with this referral number (s.308). */
    public readonly ?string $raporTakipNo = null,
    /** Report remark (s.308). */
    public readonly ?string $aciklama = null,
    /** Citizen ID of the applicant's insured person (s.308). */
    public readonly ?string $sigortaliTcNo = null,
    /** Whether treatment costs are covered by the "Kurum" or the "Sigortalı" (s.308). */
    public readonly ?string $ucret = null,
    /** Referral decision type (s.309). */
    public readonly ?AraKarar $araKarar = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kurumSevkTalepNo"]) && is_scalar($data["kurumSevkTalepNo"]) ? (string) $data["kurumSevkTalepNo"] : null,
        isset($data["tcKimlikNo"]) && is_scalar($data["tcKimlikNo"]) ? (string) $data["tcKimlikNo"] : null,
        isset($data["sevkTarihi"]) && is_scalar($data["sevkTarihi"]) ? (string) $data["sevkTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["sigortaliTcNo"]) && is_scalar($data["sigortaliTcNo"]) ? (string) $data["sigortaliTcNo"] : null,
        isset($data["ucret"]) && is_scalar($data["ucret"]) ? (string) $data["ucret"] : null,
        isset($data["araKarar"]) ? AraKarar::tryFrom((string) $data["araKarar"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $kurumSevkTalepNo,
        $tcKimlikNo,
        $sevkTarihi,
        $saglikTesisKodu,
        $hastaBasvuruNo,
        $raporTakipNo,
        $aciklama,
        $sigortaliTcNo,
        $ucret,
        $araKarar !== null ? $araKarar->value : null,
        ];
    }
}
