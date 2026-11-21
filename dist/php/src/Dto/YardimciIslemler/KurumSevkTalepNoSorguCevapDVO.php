<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KurumSevkTalepNoSorguCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KurumSevkTalepNoSorguCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.308). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.308). */
    public readonly ?string $sonucMesaji = null,
    /** Institution-referred person details; the guide uses the TYPE name as the PARAMETER name — preserved verbatim; item shape Tablo 4.5.19.c (KurumSevkTalepNoSorguDetayDVO, this registry) (s.308). */
    public readonly array $KurumSevkTalepNoSorguDetay = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["KurumSevkTalepNoSorguDetay"]) && is_array($data["KurumSevkTalepNoSorguDetay"]) ? $data["KurumSevkTalepNoSorguDetay"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "KurumSevkTalepNoSorguDetay" => $this->KurumSevkTalepNoSorguDetay,
        ];
    }
}
