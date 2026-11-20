<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * OncekiIslemBilgisiDVO — guideVersion 3.1.1, page 236 (Tablo 4.2.1.p - OncekiIslemBilgisiDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OncekiIslemBilgisiDVO
{
    public function __construct(
    /** Count of the prior operations (s.236). */
    public readonly ?int $islemAdedi = null,
    /** Date the prior operations were performed, dd.mm.yyyy per the guide (s.236). */
    public readonly ?string $islemTarihi = null,
    /** GSS-assigned code of the institution that performed the prior operations (s.236). */
    public readonly ?int $saglikTesisKodu = null,
    /** Name of the institution that performed the prior operations (s.236). */
    public readonly ?string $tesisAdi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemAdedi"]) && is_numeric($data["islemAdedi"]) ? (int) $data["islemAdedi"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["tesisAdi"]) && is_scalar($data["tesisAdi"]) ? (string) $data["tesisAdi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemAdedi,
        $islemTarihi,
        $saglikTesisKodu,
        $tesisAdi,
        ];
    }
}
