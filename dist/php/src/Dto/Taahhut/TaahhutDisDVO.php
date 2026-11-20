<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutDisDVO — guideVersion 3.1.1, page 323 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutDisDVO
{
    public function __construct(
    /** SUT code of the committed procedure. Restricted to the SUT annex-7 prosthesis codes (404010…404420 per the guide, s.326) — dental commitments are only accepted for those (s.326). */
    public readonly ?string $sutKodu = null,
    /** Tooth/region number per the mouth schema Tablo 4.7.4 (adult 11-48 quadrant numbering, deciduous 51-65/71-85, regions 1-7, anomaly regions) (s.323-326). */
    public readonly ?int $disNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["disNo"]) && is_numeric($data["disNo"]) ? (int) $data["disNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sutKodu,
        $disNo,
        ];
    }
}
