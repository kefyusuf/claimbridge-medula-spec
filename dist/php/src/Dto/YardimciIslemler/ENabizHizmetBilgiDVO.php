<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * ENabizHizmetBilgiDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ENabizHizmetBilgiDVO
{
    public function __construct(
    /** Service-provider reference (s.305). */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Barcode or SUT code (s.306). */
    public readonly ?string $islemKodu = null,
    /** "dd.MM.yyyy" procedure date (s.306). */
    public readonly ?string $islemTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemKodu"]) && is_scalar($data["islemKodu"]) ? (string) $data["islemKodu"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        "islemKodu" => $this->islemKodu,
        "islemTarihi" => $this->islemTarihi,
        ];
    }
}
