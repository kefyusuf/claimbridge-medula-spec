<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * YurtDisiYardimHakkiGetirCevapDetayDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class YurtDisiYardimHakkiGetirCevapDetayDVO
{
    public function __construct(
    /** Entitlement id to be used at patient admission (s.297). */
    public readonly ?int $id = null,
    /** Person's YUPASS number (s.297). */
    public readonly ?string $kisiNo = null,
    /** First name (s.297). */
    public readonly ?string $adi = null,
    /** Last name (s.297). */
    public readonly ?string $soyadi = null,
    /** Formula name (s.297). */
    public readonly ?string $formulAdi = null,
    /** Payment type (s.297). */
    public readonly ?string $odemeTuru = null,
    /** Treatment coverage (s.297). */
    public readonly ?string $tedaviKapsami = null,
    /** Date of the query (s.297). */
    public readonly ?string $sorguTarihi = null,
    /** Remark; the guide's description column carries only the label (s.297). */
    public readonly ?string $aciklama = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["id"]) && is_numeric($data["id"]) ? (int) $data["id"] : null,
        isset($data["kisiNo"]) && is_scalar($data["kisiNo"]) ? (string) $data["kisiNo"] : null,
        isset($data["adi"]) && is_scalar($data["adi"]) ? (string) $data["adi"] : null,
        isset($data["soyadi"]) && is_scalar($data["soyadi"]) ? (string) $data["soyadi"] : null,
        isset($data["formulAdi"]) && is_scalar($data["formulAdi"]) ? (string) $data["formulAdi"] : null,
        isset($data["odemeTuru"]) && is_scalar($data["odemeTuru"]) ? (string) $data["odemeTuru"] : null,
        isset($data["tedaviKapsami"]) && is_scalar($data["tedaviKapsami"]) ? (string) $data["tedaviKapsami"] : null,
        isset($data["sorguTarihi"]) && is_scalar($data["sorguTarihi"]) ? (string) $data["sorguTarihi"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $id,
        $kisiNo,
        $adi,
        $soyadi,
        $formulAdi,
        $odemeTuru,
        $tedaviKapsami,
        $sorguTarihi,
        $aciklama,
        ];
    }
}
