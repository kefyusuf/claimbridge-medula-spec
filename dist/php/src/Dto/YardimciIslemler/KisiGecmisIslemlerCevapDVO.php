<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiGecmisIslemlerCevapDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiGecmisIslemlerCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.303). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.303). */
    public readonly ?string $sonucMesaji = null,
    /** Past procedures; item shape Tablo 4.5.15.c (KisiIslemDVO, this registry) (s.303). */
    public readonly array $oncekiIslemler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["oncekiIslemler"]) && is_array($data["oncekiIslemler"]) ? $data["oncekiIslemler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $oncekiIslemler,
        ];
    }
}
