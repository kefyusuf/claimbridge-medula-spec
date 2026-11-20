<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * RaporOnayBekleyenSorguDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporOnayBekleyenSorguDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.346). */
    public readonly ?int $saglikTesisKodu = null,
    /** Board-head physician's citizen ID (s.346). */
    public readonly ?string $doktorTcKimlikNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["doktorTcKimlikNo"]) && is_scalar($data["doktorTcKimlikNo"]) ? (string) $data["doktorTcKimlikNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $doktorTcKimlikNo,
        ];
    }
}
