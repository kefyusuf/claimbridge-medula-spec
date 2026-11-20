<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\DoktorPersonelTipi;

/**
 * EngellilikBransGorusBilgisiDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EngellilikBransGorusBilgisiDVO
{
    public function __construct(
    /** Branch code (s.335). */
    public readonly ?string $bransKodu = null,
    /** Physician registration number (s.335). */
    public readonly ?string $drTescilNo = null,
    /** Physician or dentist (s.335). */
    public readonly ?DoktorPersonelTipi $doktorTipi = null,
    /** Imaging, diagnosis and findings description (s.335). */
    public readonly ?string $tetkikTeshisBulguAciklama = null,
    /** Department-level impairment rate (s.335). */
    public readonly ?int $engelOrani = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["doktorTipi"]) ? DoktorPersonelTipi::tryFrom((string) $data["doktorTipi"]) : null,
        isset($data["tetkikTeshisBulguAciklama"]) && is_scalar($data["tetkikTeshisBulguAciklama"]) ? (string) $data["tetkikTeshisBulguAciklama"] : null,
        isset($data["engelOrani"]) && is_numeric($data["engelOrani"]) ? (int) $data["engelOrani"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $bransKodu,
        $drTescilNo,
        $doktorTipi !== null ? $doktorTipi->value : null,
        $tetkikTeshisBulguAciklama,
        $engelOrani,
        ];
    }
}
