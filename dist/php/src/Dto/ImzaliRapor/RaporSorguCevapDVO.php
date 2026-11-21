<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * RaporSorguCevapDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporSorguCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.340). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.340). */
    public readonly ?string $sonucMesaji = null,
    /** Warning message (s.340). */
    public readonly ?string $uyariMesaji = null,
    /** Signed reports; item shape ImzaliRaporDVO (this registry) (s.340). */
    public readonly array $raporBilgileri = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["uyariMesaji"]) && is_scalar($data["uyariMesaji"]) ? (string) $data["uyariMesaji"] : null,
        isset($data["raporBilgileri"]) && is_array($data["raporBilgileri"]) ? $data["raporBilgileri"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "uyariMesaji" => $this->uyariMesaji,
        "raporBilgileri" => $this->raporBilgileri,
        ];
    }
}
