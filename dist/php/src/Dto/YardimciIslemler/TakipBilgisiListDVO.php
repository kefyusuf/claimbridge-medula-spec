<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TakipBilgisiListDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipBilgisiListDVO
{
    public function __construct(
    /** Tracking number (s.295). */
    public readonly ?string $takipNo = null,
    /** Ödeme grup türü ADI — the guide returns the group-type NAME here, not the code (s.295). */
    public readonly ?string $grupTuru = null,
    /** Ödeme group name (s.295). */
    public readonly ?string $grupAdi = null,
    /** Total amount of the takip (s.295). */
    public readonly ?float $toplamTutar = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["grupTuru"]) && is_scalar($data["grupTuru"]) ? (string) $data["grupTuru"] : null,
        isset($data["grupAdi"]) && is_scalar($data["grupAdi"]) ? (string) $data["grupAdi"] : null,
        isset($data["toplamTutar"]) && is_numeric($data["toplamTutar"]) ? (float) $data["toplamTutar"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $this->takipNo,
        "grupTuru" => $this->grupTuru,
        "grupAdi" => $this->grupAdi,
        "toplamTutar" => $this->toplamTutar,
        ];
    }
}
