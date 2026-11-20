<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * YurtDisiYardimHakkiGetirGirisDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class YurtDisiYardimHakkiGetirGirisDVO
{
    public function __construct(
    /** Abroad person number (s.296). */
    public readonly ?string $kisiNo = null,
    /** Operation date (s.296; no format given). */
    public readonly ?string $provizyonTarihi = null,
    /** Code of the calling facility (s.296). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kisiNo"]) && is_scalar($data["kisiNo"]) ? (string) $data["kisiNo"] : null,
        isset($data["provizyonTarihi"]) && is_scalar($data["provizyonTarihi"]) ? (string) $data["provizyonTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $kisiNo,
        $provizyonTarihi,
        $saglikTesisKodu,
        ];
    }
}
