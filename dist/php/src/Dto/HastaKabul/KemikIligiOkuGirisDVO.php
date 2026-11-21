<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiOkuGirisDVO — guideVersion 3.1.1, page 182 (Tablo 4.1.18.a - KemikIligiOkuGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiOkuGirisDVO
{
    public function __construct(
    /** Patient T.C. identity number (s.182) */
    public readonly ?string $hastaTcNo = null,
    /** Planned operation date (s.182) */
    public readonly ?string $islemTarihi = null,
    /** SUT operation code of the planned bone-marrow procedure (s.182) */
    public readonly ?string $islemKodu = null,
    /** GSS-assigned institution code (s.182) */
    public readonly ?int $saglikTesisKodu = null,
    /** Notification number of the registered bone-marrow admission (s.182) */
    public readonly ?int $bildirimNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["islemKodu"]) && is_scalar($data["islemKodu"]) ? (string) $data["islemKodu"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["bildirimNo"]) && is_numeric($data["bildirimNo"]) ? (int) $data["bildirimNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTcNo" => $this->hastaTcNo,
        "islemTarihi" => $this->islemTarihi,
        "islemKodu" => $this->islemKodu,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "bildirimNo" => $this->bildirimNo,
        ];
    }
}
