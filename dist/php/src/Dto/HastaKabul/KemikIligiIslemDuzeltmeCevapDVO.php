<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiIslemDuzeltmeCevapDVO — guideVersion 3.1.1, page 183 (Tablo 4.1.19.b - KemikIligiIslemDuzeltmeCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiIslemDuzeltmeCevapDVO
{
    public function __construct(
    /** Patient T.C. identity number of the corrected admission (s.183) */
    public readonly ?string $hastaTcNo = null,
    /** Date of the corrected admission (continues on s.184 with the result fields) (s.183) */
    public readonly ?string $islemTarihi = null,
    /** Result code; 0000 means success (standard result pattern) (s.183) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (standard result pattern) (s.183) */
    public readonly ?string $sonucMesaji = null,
    /** New (corrected) SUT operation code (s.184) */
    public readonly ?string $yeniIslemKodu = null,
    /** Notification number of the registered admission (s.184) */
    public readonly ?int $bildirimNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["yeniIslemKodu"]) && is_scalar($data["yeniIslemKodu"]) ? (string) $data["yeniIslemKodu"] : null,
        isset($data["bildirimNo"]) && is_numeric($data["bildirimNo"]) ? (int) $data["bildirimNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $hastaTcNo,
        $islemTarihi,
        $sonucKodu,
        $sonucMesaji,
        $yeniIslemKodu,
        $bildirimNo,
        ];
    }
}
