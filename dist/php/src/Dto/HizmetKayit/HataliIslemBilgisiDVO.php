<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HataliIslemBilgisiDVO — guideVersion 3.1.1, page 235 (Tablo 4.2.1.n - HataliIslemBilgisiDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HataliIslemBilgisiDVO
{
    public function __construct(
    /** Error code (s.235). */
    public readonly ?string $hataKodu = null,
    /** Error explanation (s.236). */
    public readonly ?string $hataMesaji = null,
    /** Institution reference of the failed operation (s.236). */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Prior-operation composite, expanded as the OncekiIslemBilgisiDVO registry entity (Tablo 4.2.1.p, s.236). */
    public readonly array $oncekiIslemBilgisi = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hataKodu"]) && is_scalar($data["hataKodu"]) ? (string) $data["hataKodu"] : null,
        isset($data["hataMesaji"]) && is_scalar($data["hataMesaji"]) ? (string) $data["hataMesaji"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["oncekiIslemBilgisi"]) && is_array($data["oncekiIslemBilgisi"]) ? $data["oncekiIslemBilgisi"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hataKodu" => $this->hataKodu,
        "hataMesaji" => $this->hataMesaji,
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        "oncekiIslemBilgisi" => $this->oncekiIslemBilgisi,
        ];
    }
}
