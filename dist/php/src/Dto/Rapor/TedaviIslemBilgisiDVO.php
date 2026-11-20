<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * TedaviIslemBilgisiDVO — guideVersion 3.1.1, page 267 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TedaviIslemBilgisiDVO
{
    public function __construct(
    /** Populated when the treatment type is dialysis; shape Tablo 4.4.1.w (DiyalizRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $diyalizRaporBilgisi = [],
    /** Populated for ESWL; shape Tablo 4.4.1.x (ESWLRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $eswlRaporBilgisi = [],
    /** Populated for ESWT; shape Tablo 4.4.1.y (ESWTRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $eswtRaporBilgisi = [],
    /** Populated for physical therapy; shape Tablo 4.4.1.z (FTRRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $ftrRaporBilgisi = [],
    /** Populated for hyperbaric oxygen; shape Tablo 4.4.1.aa (HOTRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $hotRaporBilgisi = [],
    /** Populated for IVF; shape Tablo 4.4.1.bb (TupBebekRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $tupBebekRaporBilgisi = [],
    /** Populated for home haemodialysis; shape Tablo 4.4.1.hh (EvHemodiyaliziRaporBilgisiDVO) — deferred to G43d. The guide's reference column says 4.4.1.bb, a cross-reference typo (4.4.1.hh is the home-haemodialysis table, s.278). */
    public readonly array $evHemodiyaliziRaporBilgisi = [],
    /** Populated for pulmonary rehabilitation; shape Tablo 4.4.1.ii (PulmonerRaporBilgisiDVO) — deferred to G43d. */
    public readonly array $pulmonerRaporBilgisi = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["diyalizRaporBilgisi"]) && is_array($data["diyalizRaporBilgisi"]) ? $data["diyalizRaporBilgisi"] : [],
        isset($data["eswlRaporBilgisi"]) && is_array($data["eswlRaporBilgisi"]) ? $data["eswlRaporBilgisi"] : [],
        isset($data["eswtRaporBilgisi"]) && is_array($data["eswtRaporBilgisi"]) ? $data["eswtRaporBilgisi"] : [],
        isset($data["ftrRaporBilgisi"]) && is_array($data["ftrRaporBilgisi"]) ? $data["ftrRaporBilgisi"] : [],
        isset($data["hotRaporBilgisi"]) && is_array($data["hotRaporBilgisi"]) ? $data["hotRaporBilgisi"] : [],
        isset($data["tupBebekRaporBilgisi"]) && is_array($data["tupBebekRaporBilgisi"]) ? $data["tupBebekRaporBilgisi"] : [],
        isset($data["evHemodiyaliziRaporBilgisi"]) && is_array($data["evHemodiyaliziRaporBilgisi"]) ? $data["evHemodiyaliziRaporBilgisi"] : [],
        isset($data["pulmonerRaporBilgisi"]) && is_array($data["pulmonerRaporBilgisi"]) ? $data["pulmonerRaporBilgisi"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $diyalizRaporBilgisi,
        $eswlRaporBilgisi,
        $eswtRaporBilgisi,
        $ftrRaporBilgisi,
        $hotRaporBilgisi,
        $tupBebekRaporBilgisi,
        $evHemodiyaliziRaporBilgisi,
        $pulmonerRaporBilgisi,
        ];
    }
}
