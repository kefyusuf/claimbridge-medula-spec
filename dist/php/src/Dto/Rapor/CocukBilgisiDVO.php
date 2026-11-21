<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\Cinsiyet;

/**
 * CocukBilgisiDVO — guideVersion 3.1.1, page 266 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class CocukBilgisiDVO
{
    public function __construct(
    /** Gender of the newborn (s.266). */
    public readonly ?Cinsiyet $cinsiyet = null,
    /** Birth weight, e.g. 3,45 (s.266). */
    public readonly ?string $kilo = null,
    /** Birth time, hh:mm (s.266). */
    public readonly ?string $dogumSaati = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["cinsiyet"]) ? Cinsiyet::tryFrom((string) $data["cinsiyet"]) : null,
        isset($data["kilo"]) && is_scalar($data["kilo"]) ? (string) $data["kilo"] : null,
        isset($data["dogumSaati"]) && is_scalar($data["dogumSaati"]) ? (string) $data["dogumSaati"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "cinsiyet" => $this->cinsiyet !== null ? $this->cinsiyet->value : null,
        "kilo" => $this->kilo,
        "dogumSaati" => $this->dogumSaati,
        ];
    }
}
