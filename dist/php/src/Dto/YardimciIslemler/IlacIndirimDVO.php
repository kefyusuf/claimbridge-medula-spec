<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * IlacIndirimDVO — guideVersion 3.1.1, page 283 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacIndirimDVO
{
    public function __construct(
    /** Public discount lower rate (s.289). */
    public readonly ?float $kamuIndOranAlt = null,
    /** Public discount upper rate (s.289). */
    public readonly ?float $kamuIndOranUst = null,
    /** Validity date (s.289). */
    public readonly ?string $gecerlilikTarihi = null,
    /** Drug unique id (s.290). */
    public readonly ?int $ilac_id = null,
    /** Discount rate 1 (s.290). */
    public readonly ?float $indirimOrani1 = null,
    /** Discount rate 2 (s.290). */
    public readonly ?float $indirimOrani2 = null,
    /** Discount rate 3 (s.290). */
    public readonly ?float $indirimOrani3 = null,
    /** Discount rate 4; the guide's description column erroneously repeats "İndirim Oranı 3" (s.290). */
    public readonly ?float $indirimOrani4 = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kamuIndOranAlt"]) && is_numeric($data["kamuIndOranAlt"]) ? (float) $data["kamuIndOranAlt"] : null,
        isset($data["kamuIndOranUst"]) && is_numeric($data["kamuIndOranUst"]) ? (float) $data["kamuIndOranUst"] : null,
        isset($data["gecerlilikTarihi"]) && is_scalar($data["gecerlilikTarihi"]) ? (string) $data["gecerlilikTarihi"] : null,
        isset($data["ilac_id"]) && is_numeric($data["ilac_id"]) ? (int) $data["ilac_id"] : null,
        isset($data["indirimOrani1"]) && is_numeric($data["indirimOrani1"]) ? (float) $data["indirimOrani1"] : null,
        isset($data["indirimOrani2"]) && is_numeric($data["indirimOrani2"]) ? (float) $data["indirimOrani2"] : null,
        isset($data["indirimOrani3"]) && is_numeric($data["indirimOrani3"]) ? (float) $data["indirimOrani3"] : null,
        isset($data["indirimOrani4"]) && is_numeric($data["indirimOrani4"]) ? (float) $data["indirimOrani4"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "kamuIndOranAlt" => $this->kamuIndOranAlt,
        "kamuIndOranUst" => $this->kamuIndOranUst,
        "gecerlilikTarihi" => $this->gecerlilikTarihi,
        "ilac_id" => $this->ilac_id,
        "indirimOrani1" => $this->indirimOrani1,
        "indirimOrani2" => $this->indirimOrani2,
        "indirimOrani3" => $this->indirimOrani3,
        "indirimOrani4" => $this->indirimOrani4,
        ];
    }
}
