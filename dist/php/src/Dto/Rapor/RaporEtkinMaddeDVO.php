<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\DozBirimi;
use ClaimBridge\Medula\Enum\PeriyotBirimi;

/**
 * RaporEtkinMaddeDVO — guideVersion 3.1.1, page 277 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporEtkinMaddeDVO
{
    public function __construct(
    /** Active-ingredient code (s.277). */
    public readonly ?string $etkinMaddeKodu = null,
    /** Times per day, e.g. 3 (s.277). */
    public readonly ?int $kullanimDoz1 = null,
    /** Dose per intake, e.g. 1 tablet, 100 IU (s.277). */
    public readonly ?int $kullanimDoz2 = null,
    /** Dose unit code list (s.277). */
    public readonly ?DozBirimi $kullanimDozBirim = null,
    /** Usage interval value, e.g. every 7 days (s.277). */
    public readonly ?int $kullanimPeriyot = null,
    /** Usage interval unit (s.278). */
    public readonly ?PeriyotBirimi $kullanimPeriyotBirim = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["etkinMaddeKodu"]) && is_scalar($data["etkinMaddeKodu"]) ? (string) $data["etkinMaddeKodu"] : null,
        isset($data["kullanimDoz1"]) && is_numeric($data["kullanimDoz1"]) ? (int) $data["kullanimDoz1"] : null,
        isset($data["kullanimDoz2"]) && is_numeric($data["kullanimDoz2"]) ? (int) $data["kullanimDoz2"] : null,
        isset($data["kullanimDozBirim"]) ? DozBirimi::tryFrom((string) $data["kullanimDozBirim"]) : null,
        isset($data["kullanimPeriyot"]) && is_numeric($data["kullanimPeriyot"]) ? (int) $data["kullanimPeriyot"] : null,
        isset($data["kullanimPeriyotBirim"]) ? PeriyotBirimi::tryFrom((string) $data["kullanimPeriyotBirim"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "etkinMaddeKodu" => $etkinMaddeKodu,
        "kullanimDoz1" => $kullanimDoz1,
        "kullanimDoz2" => $kullanimDoz2,
        "kullanimDozBirim" => $kullanimDozBirim !== null ? $kullanimDozBirim->value : null,
        "kullanimPeriyot" => $kullanimPeriyot,
        "kullanimPeriyotBirim" => $kullanimPeriyotBirim !== null ? $kullanimPeriyotBirim->value : null,
        ];
    }
}
