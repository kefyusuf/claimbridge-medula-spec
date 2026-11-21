<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TakipIslemKesintiDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipIslemKesintiDVO
{
    public function __construct(
    /** Service procedure sequence number (s.292). */
    public readonly ?string $islemSiraNo = null,
    /** Service-provider reference number (s.292). */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Date the service was performed (s.292). */
    public readonly ?string $islemTarihi = null,
    /** SUT procedure code (s.293). */
    public readonly ?string $sutKodu = null,
    /** Name of the SUT code (s.293). */
    public readonly ?string $islemAdi = null,
    /** Amount of the SUT-coded procedure (s.293). */
    public readonly ?float $tutar = null,
    /** Deduction amount applied by the reviewer (s.293). */
    public readonly ?float $kesintiTutari = null,
    /** Reviewer's deduction remark (s.293). */
    public readonly ?string $aciklama = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["islemAdi"]) && is_scalar($data["islemAdi"]) ? (string) $data["islemAdi"] : null,
        isset($data["tutar"]) && is_numeric($data["tutar"]) ? (float) $data["tutar"] : null,
        isset($data["kesintiTutari"]) && is_numeric($data["kesintiTutari"]) ? (float) $data["kesintiTutari"] : null,
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "islemSiraNo" => $this->islemSiraNo,
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        "islemTarihi" => $this->islemTarihi,
        "sutKodu" => $this->sutKodu,
        "islemAdi" => $this->islemAdi,
        "tutar" => $this->tutar,
        "kesintiTutari" => $this->kesintiTutari,
        "aciklama" => $this->aciklama,
        ];
    }
}
