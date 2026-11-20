<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * RaporOnayDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporOnayDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.337). */
    public readonly ?int $saglikTesisKodu = null,
    /** Citizen ID of the approving physician (s.337). */
    public readonly ?string $doktorTcKimlikNo = null,
    /** Signed report blob; Digitally signed report blob — the E-İmzalı flow sends opaque byte arrays, not structured fields. */
    public readonly array $raporBilgisi = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["doktorTcKimlikNo"]) && is_scalar($data["doktorTcKimlikNo"]) ? (string) $data["doktorTcKimlikNo"] : null,
        isset($data["raporBilgisi"]) && is_array($data["raporBilgisi"]) ? $data["raporBilgisi"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $doktorTcKimlikNo,
        $raporBilgisi,
        ];
    }
}
