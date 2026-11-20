<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\DoktorPersonelTipi;

/**
 * MaluliyetBransGorusBilgisiDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MaluliyetBransGorusBilgisiDVO
{
    public function __construct(
    /** Branch code (s.332). */
    public readonly ?string $bransKodu = null,
    /** Physician diploma registration number (s.332). */
    public readonly ?string $drTescilNo = null,
    /** Physician or dentist (s.332). */
    public readonly ?DoktorPersonelTipi $doktorTipi = null,
    /** Admission reason (s.332). */
    public readonly ?string $basvuruNedeni = null,
    /** Anamnesis (s.332). */
    public readonly ?string $anamnez = null,
    /** Medical history (s.332). */
    public readonly ?string $ozgecmis = null,
    /** Family history (s.332). */
    public readonly ?string $soygecmis = null,
    /** Examination findings (s.332). */
    public readonly ?string $muayeneBulgulari = null,
    /** Imaging and laboratory findings (s.332). */
    public readonly ?string $tetkikVeLabaratuarBulgulari = null,
    /** Diagnoses; item shape Tablo 4.9.1.e (MaluliyetBransGorusTaniBilgisiDVO, this registry) (s.332). */
    public readonly array $tanilar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["doktorTipi"]) ? DoktorPersonelTipi::tryFrom((string) $data["doktorTipi"]) : null,
        isset($data["basvuruNedeni"]) && is_scalar($data["basvuruNedeni"]) ? (string) $data["basvuruNedeni"] : null,
        isset($data["anamnez"]) && is_scalar($data["anamnez"]) ? (string) $data["anamnez"] : null,
        isset($data["ozgecmis"]) && is_scalar($data["ozgecmis"]) ? (string) $data["ozgecmis"] : null,
        isset($data["soygecmis"]) && is_scalar($data["soygecmis"]) ? (string) $data["soygecmis"] : null,
        isset($data["muayeneBulgulari"]) && is_scalar($data["muayeneBulgulari"]) ? (string) $data["muayeneBulgulari"] : null,
        isset($data["tetkikVeLabaratuarBulgulari"]) && is_scalar($data["tetkikVeLabaratuarBulgulari"]) ? (string) $data["tetkikVeLabaratuarBulgulari"] : null,
        isset($data["tanilar"]) && is_array($data["tanilar"]) ? $data["tanilar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $bransKodu,
        $drTescilNo,
        $doktorTipi !== null ? $doktorTipi->value : null,
        $basvuruNedeni,
        $anamnez,
        $ozgecmis,
        $soygecmis,
        $muayeneBulgulari,
        $tetkikVeLabaratuarBulgulari,
        $tanilar,
        ];
    }
}
