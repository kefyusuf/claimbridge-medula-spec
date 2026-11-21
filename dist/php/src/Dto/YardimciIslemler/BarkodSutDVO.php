<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * BarkodSutDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BarkodSutDVO
{
    public function __construct(
    /** Barcode (s.302). */
    public readonly ?string $barkod = null,
    /** Company identifier (s.302). */
    public readonly ?string $firmaTanimlayiciNo = null,
    /** SUT code (s.302). */
    public readonly ?string $sutKodu = null,
    /** Validity start (s.302). */
    public readonly ?string $baslangicTarihi = null,
    /** Validity end (s.302). */
    public readonly ?string $bitisTarihi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["firmaTanimlayiciNo"]) && is_scalar($data["firmaTanimlayiciNo"]) ? (string) $data["firmaTanimlayiciNo"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["baslangicTarihi"]) && is_scalar($data["baslangicTarihi"]) ? (string) $data["baslangicTarihi"] : null,
        isset($data["bitisTarihi"]) && is_scalar($data["bitisTarihi"]) ? (string) $data["bitisTarihi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "barkod" => $this->barkod,
        "firmaTanimlayiciNo" => $this->firmaTanimlayiciNo,
        "sutKodu" => $this->sutKodu,
        "baslangicTarihi" => $this->baslangicTarihi,
        "bitisTarihi" => $this->bitisTarihi,
        ];
    }
}
