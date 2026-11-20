<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\TasLokalizasyon;

/**
 * ESWLTasBilgisiDVO — guideVersion 3.1.1, page 276 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ESWLTasBilgisiDVO
{
    public function __construct(
    /** Stone size in millimetres, e.g. "2x5" (s.276). */
    public readonly ?string $tasBoyutu = null,
    /** Stone localization; the published list has no code 1 (s.276). */
    public readonly ?TasLokalizasyon $tasLokalizasyonKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tasBoyutu"]) && is_scalar($data["tasBoyutu"]) ? (string) $data["tasBoyutu"] : null,
        isset($data["tasLokalizasyonKodu"]) ? TasLokalizasyon::tryFrom((string) $data["tasLokalizasyonKodu"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tasBoyutu,
        $tasLokalizasyonKodu !== null ? $tasLokalizasyonKodu->value : null,
        ];
    }
}
