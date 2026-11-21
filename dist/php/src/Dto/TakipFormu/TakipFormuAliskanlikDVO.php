<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\TakipFormu;

use ClaimBridge\Medula\Enum\Aliskanlik;

/**
 * TakipFormuAliskanlikDVO — guideVersion 3.1.1, page 310 (4.3 Takip Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipFormuAliskanlikDVO
{
    public function __construct(
    /** Four-value habit list (s.319). */
    public readonly ?Aliskanlik $aliskanlik = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["aliskanlik"]) ? Aliskanlik::tryFrom((string) $data["aliskanlik"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "aliskanlik" => $this->aliskanlik !== null ? $this->aliskanlik->value : null,
        ];
    }
}
