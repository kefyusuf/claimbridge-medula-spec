<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HizmetOkuCevapDVO — guideVersion 3.1.1, page 237 (Tablo 4.2.2.b - HizmetOkuCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetOkuCevapDVO
{
    public function __construct(
    /** Composite service read result, expanded as the HizmetDVO registry entity (Tablo 4.2.2.c, s.237-238) carrying all categorized service arrays. */
    public readonly array $hizmetler = [],
    /** Patient application number (s.237). */
    public readonly ?string $hastaBasvuruNo = null,
    /** Result code; 0000 means success (s.237). */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.237). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hizmetler"]) && is_array($data["hizmetler"]) ? $data["hizmetler"] : [],
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $hizmetler,
        $hastaBasvuruNo,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
