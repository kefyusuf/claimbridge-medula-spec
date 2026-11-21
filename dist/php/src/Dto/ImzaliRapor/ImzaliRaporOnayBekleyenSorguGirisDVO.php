<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * ImzaliRaporOnayBekleyenSorguGirisDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliRaporOnayBekleyenSorguGirisDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.343). */
    public readonly ?int $saglikTesisKodu = null,
    /** Board-head physician's citizen ID (s.343). */
    public readonly ?string $doktorTcKimlikNo = null,
    /** Signed pending-approval query blob; Digitally signed report blob — the E-İmzalı flow sends opaque byte arrays, not structured fields. */
    public readonly array $onayBekleyenSorguBilgisi = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["doktorTcKimlikNo"]) && is_scalar($data["doktorTcKimlikNo"]) ? (string) $data["doktorTcKimlikNo"] : null,
        isset($data["onayBekleyenSorguBilgisi"]) && is_array($data["onayBekleyenSorguBilgisi"]) ? $data["onayBekleyenSorguBilgisi"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "doktorTcKimlikNo" => $this->doktorTcKimlikNo,
        "onayBekleyenSorguBilgisi" => $this->onayBekleyenSorguBilgisi,
        ];
    }
}
