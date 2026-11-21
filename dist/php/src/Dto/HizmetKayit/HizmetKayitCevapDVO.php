<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HizmetKayitCevapDVO — guideVersion 3.1.1, page 190 (Tablo 4.2.1.b - HizmetKayitCevapDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetKayitCevapDVO
{
    public function __construct(
    /** Result code; 0000 means success, any other value is an error (s.190). */
    public readonly ?string $sonucKodu = null,
    /** Result explanation; the error cause is reported here (s.190). */
    public readonly ?string $sonucMesaji = null,
    /** Tracking number of the registration (s.190). */
    public readonly ?string $takipNo = null,
    /** Patient application number (s.190). */
    public readonly ?string $hastaBasvuruNo = null,
    /** Code of the registering institution (s.190). */
    public readonly ?int $saglikTesisKodu = null,
    /** Registered operation records as KayitliIslemBilgisiDVO registry entities (Tablo 4.2.1.m, s.235). */
    public readonly array $islemBilgileri = [],
    /** Failed registration records (HataliIslemBilgisiDVO, s.190). */
    public readonly array $hataliKayitlar = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["islemBilgileri"]) && is_array($data["islemBilgileri"]) ? $data["islemBilgileri"] : [],
        isset($data["hataliKayitlar"]) && is_array($data["hataliKayitlar"]) ? $data["hataliKayitlar"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        "takipNo" => $takipNo,
        "hastaBasvuruNo" => $hastaBasvuruNo,
        "saglikTesisKodu" => $saglikTesisKodu,
        "islemBilgileri" => $islemBilgileri,
        "hataliKayitlar" => $hataliKayitlar,
        ];
    }
}
