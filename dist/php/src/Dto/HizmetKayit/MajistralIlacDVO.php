<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\AmbalajBoyutu;
use ClaimBridge\Medula\Enum\AmbalajTuru;
use ClaimBridge\Medula\Enum\PreparatTuru;

/**
 * MajistralIlacDVO — guideVersion 3.1.1, page 199 (Tablo 4.2.1.f.1 - MajistralIlacDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class MajistralIlacDVO
{
    public function __construct(
    /** Sequence number; null-on-input pattern (s.199) */
    public readonly ?string $islemSiraNo = null,
    /** Preparation type - codes 1-8 in the preparat-turu registry enum (s.199) */
    public readonly ?PreparatTuru $preparatTuru = null,
    /** Powder-division type; required when preparatTuru is 3 (s.199) */
    public readonly ?string $bolunmusTozTuru = null,
    /** Packaging type - codes 1-3 in the ambalaj-turu registry enum (s.200) */
    public readonly ?AmbalajTuru $ambalajTuru = null,
    /** Packaging size code; the guide lists ~30 codes (1-19, 21-31) - enum candidate for v0.3 (s.200) */
    public readonly ?AmbalajBoyutu $ambalajBoyutu = null,
    /** Packaging quantity (s.200) */
    public readonly ?string $ambalajAdet = null,
    /** Raw-material records, expanded as the MajistralHamMaddeDVO registry entity (Tablo 4.2.1.f.1.1, s.201) */
    public readonly array $hamMaddeler = [],
    /** Added-drug records, expanded as the MajistralEklenenIlacDVO registry entity (Tablo 4.2.1.f.1.2, s.223-224) */
    public readonly array $eklenenIlaclar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["preparatTuru"]) ? PreparatTuru::tryFrom((string) $data["preparatTuru"]) : null,
        isset($data["bolunmusTozTuru"]) && is_scalar($data["bolunmusTozTuru"]) ? (string) $data["bolunmusTozTuru"] : null,
        isset($data["ambalajTuru"]) ? AmbalajTuru::tryFrom((string) $data["ambalajTuru"]) : null,
        isset($data["ambalajBoyutu"]) ? AmbalajBoyutu::tryFrom((string) $data["ambalajBoyutu"]) : null,
        isset($data["ambalajAdet"]) && is_scalar($data["ambalajAdet"]) ? (string) $data["ambalajAdet"] : null,
        isset($data["hamMaddeler"]) && is_array($data["hamMaddeler"]) ? $data["hamMaddeler"] : [],
        isset($data["eklenenIlaclar"]) && is_array($data["eklenenIlaclar"]) ? $data["eklenenIlaclar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $islemSiraNo,
        $preparatTuru !== null ? $preparatTuru->value : null,
        $bolunmusTozTuru,
        $ambalajTuru !== null ? $ambalajTuru->value : null,
        $ambalajBoyutu !== null ? $ambalajBoyutu->value : null,
        $ambalajAdet,
        $hamMaddeler,
        $eklenenIlaclar,
        ];
    }
}
