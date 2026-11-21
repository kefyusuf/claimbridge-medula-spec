<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * BarkodSutEslesmeSorguGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class BarkodSutEslesmeSorguGirisDVO
{
    public function __construct(
    /** Code of the calling facility (s.301). */
    public readonly ?int $saglikTesisKodu = null,
    /** Empty returns the whole mapping list; filled returns mappings valid on that date (s.301). */
    public readonly ?string $tarih = null,
    /** Sent when querying by barcode + company identifier (s.301). */
    public readonly ?string $barkod = null,
    /** Sent when querying by barcode + company identifier (s.301). */
    public readonly ?string $firmaTanimlayiciNo = null,
    /** Sent when querying by SUT code (s.301). */
    public readonly ?string $sutKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["tarih"]) && is_scalar($data["tarih"]) ? (string) $data["tarih"] : null,
        isset($data["barkod"]) && is_scalar($data["barkod"]) ? (string) $data["barkod"] : null,
        isset($data["firmaTanimlayiciNo"]) && is_scalar($data["firmaTanimlayiciNo"]) ? (string) $data["firmaTanimlayiciNo"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $saglikTesisKodu,
        "tarih" => $tarih,
        "barkod" => $barkod,
        "firmaTanimlayiciNo" => $firmaTanimlayiciNo,
        "sutKodu" => $sutKodu,
        ];
    }
}
