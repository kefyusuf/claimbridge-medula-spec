<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * BKDSDogrulamaDetayDVO — guideVersion 3.1.1, page 186 (Tablo 4.1.21.c - BKDSDogrulamaDetayDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BKDSDogrulamaDetayDVO
{
    public function __construct(
    /** T.C. identity number of the verified person (s.186) */
    public readonly ?string $dogrulananTckNo = null,
    /** GSS-assigned institution code (s.186) */
    public readonly ?int $tesisKodu = null,
    /** Verification date (s.186) */
    public readonly ?string $dogrulamaTarihi = null,
    /** Intermediate person T.C. identity number (s.186) */
    public readonly ?string $araciTckNo = null,
    /** EKDS verification method (s.186) */
    public readonly ?string $dogrulamaYontemi = null,
    /** EKDS verification method explanation (s.186) */
    public readonly ?string $dogrulamaYontemAciklama = null,
    /** Takip or prescription number associated with the verification (s.186) */
    public readonly ?string $takipReceteNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["dogrulananTckNo"]) && is_scalar($data["dogrulananTckNo"]) ? (string) $data["dogrulananTckNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["dogrulamaTarihi"]) && is_scalar($data["dogrulamaTarihi"]) ? (string) $data["dogrulamaTarihi"] : null,
        isset($data["araciTckNo"]) && is_scalar($data["araciTckNo"]) ? (string) $data["araciTckNo"] : null,
        isset($data["dogrulamaYontemi"]) && is_scalar($data["dogrulamaYontemi"]) ? (string) $data["dogrulamaYontemi"] : null,
        isset($data["dogrulamaYontemAciklama"]) && is_scalar($data["dogrulamaYontemAciklama"]) ? (string) $data["dogrulamaYontemAciklama"] : null,
        isset($data["takipReceteNo"]) && is_scalar($data["takipReceteNo"]) ? (string) $data["takipReceteNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "dogrulananTckNo" => $this->dogrulananTckNo,
        "tesisKodu" => $this->tesisKodu,
        "dogrulamaTarihi" => $this->dogrulamaTarihi,
        "araciTckNo" => $this->araciTckNo,
        "dogrulamaYontemi" => $this->dogrulamaYontemi,
        "dogrulamaYontemAciklama" => $this->dogrulamaYontemAciklama,
        "takipReceteNo" => $this->takipReceteNo,
        ];
    }
}
