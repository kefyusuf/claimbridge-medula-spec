<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * SaglikTesisiAraCevapDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class SaglikTesisiAraCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.283) — this group uses the String 0000 pattern. */
    public readonly ?string $sonucKodu = null,
    /** Result description; the failure reason is stated here (s.284). */
    public readonly ?string $sonucMesaji = null,
    /** Facilities; item shape Tablo 4.5.1.c (SaglikTesisiListDVO, this registry) (s.284). */
    public readonly array $tesisler = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["tesisler"]) && is_array($data["tesisler"]) ? $data["tesisler"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "tesisler" => $this->tesisler,
        ];
    }
}
