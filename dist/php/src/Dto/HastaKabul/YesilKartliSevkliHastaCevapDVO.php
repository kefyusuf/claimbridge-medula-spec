<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * YesilKartliSevkliHastaCevapDVO — guideVersion 3.1.1, page 176 (Tablo 4.1.12.b - YesilKartliSevkliHastaCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class YesilKartliSevkliHastaCevapDVO
{
    public function __construct(
    /** Green-card patient referral rows as YesilKartliHastaSevkBilgileriDVO (Tablo 4.1.12.c, s.176) */
    public readonly array $yesilKartliHastaSevkBilgileriDVO = [],
    /** Patient information (HastaBilgileriDVO, Tablo 4.1.1.c, s.176) */
    public readonly array $hastaBilgileriDVO = [],
    /** Result code; 0000 means success, any other value is an error (s.176) */
    public readonly ?string $sonucKodu = null,
    /** Human-readable result message accompanying the result code (s.176) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["yesilKartliHastaSevkBilgileriDVO"]) && is_array($data["yesilKartliHastaSevkBilgileriDVO"]) ? $data["yesilKartliHastaSevkBilgileriDVO"] : [],
        isset($data["hastaBilgileriDVO"]) && is_array($data["hastaBilgileriDVO"]) ? $data["hastaBilgileriDVO"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "yesilKartliHastaSevkBilgileriDVO" => $this->yesilKartliHastaSevkBilgileriDVO,
        "hastaBilgileriDVO" => $this->hastaBilgileriDVO,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
