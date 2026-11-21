<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * RaporGirisDVO — guideVersion 3.1.1, page 252 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporGirisDVO
{
    public function __construct(
    /** Drug report branch (use or exemption); shape Tablo 4.4.1.h (IlacRaporDVO) — deferred to G43c. All other branches must be NULL when this is filled. */
    public readonly array $ilacRapor = [],
    /** Disability report branch; shape Tablo 4.4.1.j (MaluliyetRaporDVO) — deferred to G43c with the remaining report branches. */
    public readonly array $maluliyetRapor = [],
    /** Treatment report branch; shape Tablo 4.4.1.i (TedaviRaporDVO) — deferred to G43c with the remaining report branches. */
    public readonly array $tedaviRapor = [],
    /** Incapacity report branch (work accident, occupational disease or illness); shape Tablo 4.4.1.c (IsgoremezlikRaporDVO, this registry). */
    public readonly array $isgoremezlikRapor = [],
    /** Health facility code of the caller (s.253). */
    public readonly ?int $kullaniciTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["ilacRapor"]) && is_array($data["ilacRapor"]) ? $data["ilacRapor"] : [],
        isset($data["maluliyetRapor"]) && is_array($data["maluliyetRapor"]) ? $data["maluliyetRapor"] : [],
        isset($data["tedaviRapor"]) && is_array($data["tedaviRapor"]) ? $data["tedaviRapor"] : [],
        isset($data["isgoremezlikRapor"]) && is_array($data["isgoremezlikRapor"]) ? $data["isgoremezlikRapor"] : [],
        isset($data["kullaniciTesisKodu"]) && is_numeric($data["kullaniciTesisKodu"]) ? (int) $data["kullaniciTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "ilacRapor" => $this->ilacRapor,
        "maluliyetRapor" => $this->maluliyetRapor,
        "tedaviRapor" => $this->tedaviRapor,
        "isgoremezlikRapor" => $this->isgoremezlikRapor,
        "kullaniciTesisKodu" => $this->kullaniciTesisKodu,
        ];
    }
}
