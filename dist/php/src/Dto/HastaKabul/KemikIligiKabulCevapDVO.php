<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiKabulCevapDVO — guideVersion 3.1.1, page 180 (Tablo 4.1.16.b - KemikIligiKabulCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiKabulCevapDVO
{
    public function __construct(
    /** Patient T.C. identity number of the registered bone-marrow admission (s.180) */
    public readonly ?string $hastaTcNo = null,
    /** Date of the registered bone-marrow admission (s.180) */
    public readonly ?string $islemTarihi = null,
    /** Unique notification number of the registered bone-marrow admission (s.180) */
    public readonly ?int $bildirimNo = null,
    /** Result code; 0000 means success (s.180) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.180) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["bildirimNo"]) && is_numeric($data["bildirimNo"]) ? (int) $data["bildirimNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $hastaTcNo,
        $islemTarihi,
        $bildirimNo,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
