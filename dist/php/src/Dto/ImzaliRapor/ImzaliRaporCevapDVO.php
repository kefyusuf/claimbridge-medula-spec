<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * ImzaliRaporCevapDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliRaporCevapDVO
{
    public function __construct(
    /** System-generated unique report tracking number (s.330). */
    public readonly ?string $raporTakipNo = null,
    /** Result code; "0000" means success (s.330). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.330). */
    public readonly ?string $sonucMesaji = null,
    /** Warning message (s.330). */
    public readonly ?string $uyariMesaji = null,
    /** Populated when a disability report was saved; shape Tablo 4.9.1.c (MaluliyetRaporDVO, this registry) (s.330). */
    public readonly array $maluliyetRaporu = [],
    /** Populated when an impairment report was saved; shape Tablo 4.9.1.g (EngellilikRaporDVO, this registry) (s.330). */
    public readonly array $engellilikRaporu = [],
    /** Populated when a medical-necessity report was saved; shape Tablo 4.9.1.j (TibbiGereklilikRaporDVO, this registry) (s.330). */
    public readonly array $tibbiGereklilikRaporu = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["uyariMesaji"]) && is_scalar($data["uyariMesaji"]) ? (string) $data["uyariMesaji"] : null,
        isset($data["maluliyetRaporu"]) && is_array($data["maluliyetRaporu"]) ? $data["maluliyetRaporu"] : [],
        isset($data["engellilikRaporu"]) && is_array($data["engellilikRaporu"]) ? $data["engellilikRaporu"] : [],
        isset($data["tibbiGereklilikRaporu"]) && is_array($data["tibbiGereklilikRaporu"]) ? $data["tibbiGereklilikRaporu"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporTakipNo" => $this->raporTakipNo,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "uyariMesaji" => $this->uyariMesaji,
        "maluliyetRaporu" => $this->maluliyetRaporu,
        "engellilikRaporu" => $this->engellilikRaporu,
        "tibbiGereklilikRaporu" => $this->tibbiGereklilikRaporu,
        ];
    }
}
