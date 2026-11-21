<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * HOTRaporBilgisiDVO — guideVersion 3.1.1, page 275 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HOTRaporBilgisiDVO
{
    public function __construct(
    /** Session day count (s.275). */
    public readonly ?int $seansGun = null,
    /** Session count (s.275). */
    public readonly ?int $seansSayi = null,
    /** Report treatment duration (s.275). */
    public readonly ?int $tedaviSuresi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["seansGun"]) && is_numeric($data["seansGun"]) ? (int) $data["seansGun"] : null,
        isset($data["seansSayi"]) && is_numeric($data["seansSayi"]) ? (int) $data["seansSayi"] : null,
        isset($data["tedaviSuresi"]) && is_numeric($data["tedaviSuresi"]) ? (int) $data["tedaviSuresi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "seansGun" => $this->seansGun,
        "seansSayi" => $this->seansSayi,
        "tedaviSuresi" => $this->tedaviSuresi,
        ];
    }
}
