<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * EKDSBelgeGerekenTakipCevapDVO — guideVersion 3.1.1, page 187 (Tablo 4.1.22.b - EKDSBelgeGerekenTakipCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EKDSBelgeGerekenTakipCevapDVO
{
    public function __construct(
    /** Bone-marrow admissions requiring documents (EKDSBelgeGerekenTakipDVO[], Tablo 4.1.22.c); nested composite, expansion is v0.3 scope (s.187) */
    public readonly array $ekdsBelgeGerekenTakipDVO = [],
    /** Result code; 0000 means success (s.187) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.187) */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["ekdsBelgeGerekenTakipDVO"]) && is_array($data["ekdsBelgeGerekenTakipDVO"]) ? $data["ekdsBelgeGerekenTakipDVO"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "ekdsBelgeGerekenTakipDVO" => $this->ekdsBelgeGerekenTakipDVO,
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        ];
    }
}
