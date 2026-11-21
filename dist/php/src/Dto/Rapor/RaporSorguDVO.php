<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * RaporSorguDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.3.a (s.279)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporSorguDVO
{
    public function __construct(
    /** Report lookup key object; shape in Tablo 4.4.3.c (RaporOkuDVO, this registry). */
    public readonly array $raporBilgisi = [],
    /** Health facility code of the caller (s.279). */
    public readonly ?int $kullaniciTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporBilgisi"]) && is_array($data["raporBilgisi"]) ? $data["raporBilgisi"] : [],
        isset($data["kullaniciTesisKodu"]) && is_numeric($data["kullaniciTesisKodu"]) ? (int) $data["kullaniciTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporBilgisi" => $this->raporBilgisi,
        "kullaniciTesisKodu" => $this->kullaniciTesisKodu,
        ];
    }
}
