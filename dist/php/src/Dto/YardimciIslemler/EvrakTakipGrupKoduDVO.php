<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * EvrakTakipGrupKoduDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EvrakTakipGrupKoduDVO
{
    public function __construct(
    /** Group code (s.299). */
    public readonly ?int $kodu = null,
    /** Group name (s.299). */
    public readonly ?string $adi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["kodu"]) && is_numeric($data["kodu"]) ? (int) $data["kodu"] : null,
        isset($data["adi"]) && is_scalar($data["adi"]) ? (string) $data["adi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "kodu" => $kodu,
        "adi" => $adi,
        ];
    }
}
