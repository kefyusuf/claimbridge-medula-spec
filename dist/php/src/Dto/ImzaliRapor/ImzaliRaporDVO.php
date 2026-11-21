<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;

use ClaimBridge\Medula\Enum\ImzaliRaporTuru;

/**
 * ImzaliRaporDVO — guideVersion 3.1.1, page 336 (4.6 E-İmzalı Rapor Islemleri Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliRaporDVO
{
    public function __construct(
    /** Six-value report type list (s.340). */
    public readonly ?ImzaliRaporTuru $turu = null,
    /** Populated per report type; shape Tablo 4.9.1.c (MaluliyetRaporDVO) — §4.9 composite, deferred to G45c-b. */
    public readonly array $maluliyetRaporu = [],
    /** Populated per report type; shape Tablo 4.9.1.g (EngellilikRaporDVO) — §4.9 composite, deferred to G45c-b. */
    public readonly array $engellilikRaporu = [],
    /** Populated per report type; shape Tablo 4.9.1.j (TibbiGereklilikRaporDVO) — §4.9 composite, deferred to G45c-b. */
    public readonly array $tibbiGereklilikRaporu = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["turu"]) ? ImzaliRaporTuru::tryFrom((string) $data["turu"]) : null,
        isset($data["maluliyetRaporu"]) && is_array($data["maluliyetRaporu"]) ? $data["maluliyetRaporu"] : [],
        isset($data["engellilikRaporu"]) && is_array($data["engellilikRaporu"]) ? $data["engellilikRaporu"] : [],
        isset($data["tibbiGereklilikRaporu"]) && is_array($data["tibbiGereklilikRaporu"]) ? $data["tibbiGereklilikRaporu"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "turu" => $this->turu !== null ? $this->turu->value : null,
        "maluliyetRaporu" => $this->maluliyetRaporu,
        "engellilikRaporu" => $this->engellilikRaporu,
        "tibbiGereklilikRaporu" => $this->tibbiGereklilikRaporu,
        ];
    }
}
