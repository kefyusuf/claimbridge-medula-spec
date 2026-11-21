<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * OnayBekleyenCevapDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OnayBekleyenCevapDVO
{
    public function __construct(
    /** Physicians pending approval on the report; the guide types it DoktorBilgiDVO (singular, shape not shown) — preserved verbatim (s.349). */
    public readonly array $onayiBeklenenDoktorlar = [],
    /** Result code; "0000" means success (s.349). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.349). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["onayiBeklenenDoktorlar"]) && is_array($data["onayiBeklenenDoktorlar"]) ? $data["onayiBeklenenDoktorlar"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "onayiBeklenenDoktorlar" => $this->onayiBeklenenDoktorlar,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
