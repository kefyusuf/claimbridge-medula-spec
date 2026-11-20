<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\TedaviRaporTuru;

/**
 * TedaviRaporDVO — guideVersion 3.1.1, page 261 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviRaporDVO
{
    public function __construct(
    /** Report core; shape Tablo 4.4.1.k (RaporDVO, this registry). */
    public readonly array $raporDVO = [],
    /** Treatment procedures; only the object matching tedaviRaporTuru is populated, the rest NULL; item shape Tablo 4.4.1.o (TedaviIslemBilgisiDVO, this registry) (s.262). */
    public readonly array $islemler = [],
    /** Nine-value treatment type list (s.262). */
    public readonly ?TedaviRaporTuru $tedaviRaporTuru = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporDVO"]) && is_array($data["raporDVO"]) ? $data["raporDVO"] : [],
        isset($data["islemler"]) && is_array($data["islemler"]) ? $data["islemler"] : [],
        isset($data["tedaviRaporTuru"]) ? TedaviRaporTuru::tryFrom((string) $data["tedaviRaporTuru"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporDVO,
        $islemler,
        $tedaviRaporTuru !== null ? $tedaviRaporTuru->value : null,
        ];
    }
}
