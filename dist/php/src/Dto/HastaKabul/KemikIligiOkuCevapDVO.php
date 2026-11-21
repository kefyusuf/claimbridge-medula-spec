<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiOkuCevapDVO — guideVersion 3.1.1, page 182 (Tablo 4.1.18.b - KemikIligiOkuCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiOkuCevapDVO
{
    public function __construct(
    /** Patient T.C. identity number of the registered admission (s.182) */
    public readonly ?string $hastaTcNo = null,
    /** Date of the registered admission (s.182) */
    public readonly ?string $islemTarihi = null,
    /** SUT operation code of the planned procedure (s.182) */
    public readonly ?string $islemKodu = null,
    /** Form activity state; returns Aktif or Pasif (s.182) */
    public readonly ?string $aktifPasif = null,
    /** Notification number of the registered admission (s.182) */
    public readonly ?int $bildirimNo = null,
    /** Result code; 0000 means success (s.182) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (continues on s.183) (s.182) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["islemKodu"]) && is_scalar($data["islemKodu"]) ? (string) $data["islemKodu"] : null,
        isset($data["aktifPasif"]) && is_scalar($data["aktifPasif"]) ? (string) $data["aktifPasif"] : null,
        isset($data["bildirimNo"]) && is_numeric($data["bildirimNo"]) ? (int) $data["bildirimNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTcNo" => $hastaTcNo,
        "islemTarihi" => $islemTarihi,
        "islemKodu" => $islemKodu,
        "aktifPasif" => $aktifPasif,
        "bildirimNo" => $bildirimNo,
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        ];
    }
}
