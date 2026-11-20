<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\TaniTipi;

/**
 * TaniBilgisiDVO — guideVersion 3.1.1, page 232 (Tablo 4.2.1.k - TaniBilgisiDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaniBilgisiDVO
{
    public function __construct(
    /** Sequence number of the registered service; send null while registering, Medula fills and returns it (s.232). */
    public readonly ?string $islemSiraNo = null,
    /** Primary diagnosis flag taking E (Evet) or H (Hayir) (s.232). */
    public readonly ?string $birincilTani = null,
    /** Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.232). Synthetic placeholders in examples. */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** ICD-10 diagnosis code; belongs to the ICD-10-WHO code system (s.232). */
    public readonly ?string $taniKodu = null,
    /** Diagnosis type - 1 On tani, 2 Kesin tani, 3 Ayirici tani (s.232). */
    public readonly ?TaniTipi $taniTipi = null,
    /** Special condition code; see guide Tablo 5.1 OzelDurumVO (s.232). */
    public readonly ?string $ozelDurum = null,
    /** Multiple special-condition codes, valid alongside ozelDurum (s.232). */
    public readonly array $cokluOzelDurum = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["birincilTani"]) && is_scalar($data["birincilTani"]) ? (string) $data["birincilTani"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["taniKodu"]) && is_scalar($data["taniKodu"]) ? (string) $data["taniKodu"] : null,
        isset($data["taniTipi"]) ? TaniTipi::tryFrom((string) $data["taniTipi"]) : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemSiraNo,
        $birincilTani,
        $hizmetSunucuRefNo,
        $taniKodu,
        $taniTipi !== null ? $taniTipi->value : null,
        $ozelDurum,
        $cokluOzelDurum,
        ];
    }
}
