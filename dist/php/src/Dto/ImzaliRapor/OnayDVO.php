<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\OnayIslemTuru;
use ClaimBridge\Medula\Enum\OnayVerenTuru;

/**
 * OnayDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OnayDVO
{
    public function __construct(
    /** Code of the performing facility (s.348). */
    public readonly ?int $tesisKodu = null,
    /** Citizen ID of the approving physician (s.348). */
    public readonly ?string $doktorTcKimlikNo = null,
    /** Physician or chief physician (s.348). */
    public readonly ?OnayVerenTuru $onayVerenTuru = null,
    /** Report / off-standard report / referral notification / referral registration (s.348). */
    public readonly ?OnayIslemTuru $onayIslemTuru = null,
    /** Document ID matching onayIslemTuru (s.348). */
    public readonly ?string $onayIslemReferans = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["doktorTcKimlikNo"]) && is_scalar($data["doktorTcKimlikNo"]) ? (string) $data["doktorTcKimlikNo"] : null,
        isset($data["onayVerenTuru"]) ? OnayVerenTuru::tryFrom((string) $data["onayVerenTuru"]) : null,
        isset($data["onayIslemTuru"]) ? OnayIslemTuru::tryFrom((string) $data["onayIslemTuru"]) : null,
        isset($data["onayIslemReferans"]) && is_scalar($data["onayIslemReferans"]) ? (string) $data["onayIslemReferans"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tesisKodu,
        $doktorTcKimlikNo,
        $onayVerenTuru !== null ? $onayVerenTuru->value : null,
        $onayIslemTuru !== null ? $onayIslemTuru->value : null,
        $onayIslemReferans,
        ];
    }
}
