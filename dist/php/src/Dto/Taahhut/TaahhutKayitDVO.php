<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutKayitDVO — guideVersion 3.1.1, page 322 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutKayitDVO
{
    public function __construct(
    /** Tracking number of the dental treatment to commit (s.322). */
    public readonly ?string $takipNo = null,
    /** GSS-assigned facility code (s.322). */
    public readonly ?int $saglikTesisKodu = null,
    /** Commitment body; shape Tablo 4.7.1.c (TaahhutDVO, this registry) (s.322). */
    public readonly array $taahhut = [],
    /** Committed dental procedures; item shape Tablo 4.7.1.d (TaahhutDisDVO, this registry) (s.322). */
    public readonly array $taahhutDiss = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["taahhut"]) && is_array($data["taahhut"]) ? $data["taahhut"] : [],
        isset($data["taahhutDiss"]) && is_array($data["taahhutDiss"]) ? $data["taahhutDiss"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "takipNo" => $this->takipNo,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "taahhut" => $this->taahhut,
        "taahhutDiss" => $this->taahhutDiss,
        ];
    }
}
