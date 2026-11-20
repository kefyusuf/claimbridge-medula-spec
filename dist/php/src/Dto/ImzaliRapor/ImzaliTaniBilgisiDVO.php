<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * ImzaliTaniBilgisiDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliTaniBilgisiDVO
{
    public function __construct(
    /** ICD-10 code. Id disambiguated as ImzaliTaniBilgisiDVO — the guide names it TaniBilgisiDVO, colliding with the hizmet-kayit group's Tablo 4.2.1.k shape (s.335). */
    public readonly ?string $taniKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["taniKodu"]) && is_scalar($data["taniKodu"]) ? (string) $data["taniKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $taniKodu,
        ];
    }
}
