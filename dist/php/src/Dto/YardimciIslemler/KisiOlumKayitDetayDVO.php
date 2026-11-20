<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiOlumKayitDetayDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiOlumKayitDetayDVO
{
    public function __construct(
    /** Citizen ID — the guide's description column erroneously repeats 'Hizmet Sunucu Ref' (s.307). */
    public readonly ?string $tcKimlikNo = null,
    /** First name — the guide's description column erroneously repeats 'İşlem Kodu' (s.307). */
    public readonly ?string $adi = null,
    /** Last name — the guide's description column erroneously repeats 'İşlem Tarihi' (s.307). */
    public readonly ?string $soyadi = null,
    /** "dd.MM.yyyy" death date (s.307). */
    public readonly ?string $olumTarihi = null,
    /** Facility code (s.307). */
    public readonly ?int $saglikTesisKodu = null,
    /** "HH:MM" death time (s.307). */
    public readonly ?string $olumSaati = null,
    /** Death-certificate name (s.307). */
    public readonly ?string $olumBelgesiAdi = null,
    /** Certificate content as a byte array (s.307). */
    public readonly array $olumBelgesiIcerik = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcKimlikNo"]) && is_scalar($data["tcKimlikNo"]) ? (string) $data["tcKimlikNo"] : null,
        isset($data["adi"]) && is_scalar($data["adi"]) ? (string) $data["adi"] : null,
        isset($data["soyadi"]) && is_scalar($data["soyadi"]) ? (string) $data["soyadi"] : null,
        isset($data["olumTarihi"]) && is_scalar($data["olumTarihi"]) ? (string) $data["olumTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["olumSaati"]) && is_scalar($data["olumSaati"]) ? (string) $data["olumSaati"] : null,
        isset($data["olumBelgesiAdi"]) && is_scalar($data["olumBelgesiAdi"]) ? (string) $data["olumBelgesiAdi"] : null,
        isset($data["olumBelgesiIcerik"]) && is_array($data["olumBelgesiIcerik"]) ? $data["olumBelgesiIcerik"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tcKimlikNo,
        $adi,
        $soyadi,
        $olumTarihi,
        $saglikTesisKodu,
        $olumSaati,
        $olumBelgesiAdi,
        $olumBelgesiIcerik,
        ];
    }
}
