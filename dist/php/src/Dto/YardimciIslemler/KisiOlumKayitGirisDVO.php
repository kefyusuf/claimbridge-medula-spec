<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KisiOlumKayitGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KisiOlumKayitGirisDVO
{
    public function __construct(
    /** Citizen ID of the person to register; the guide types it long (s.306). */
    public readonly ?int $tcKimlikNo = null,
    /** "dd.MM.yyyy" death date (s.306). */
    public readonly ?string $olumTarihi = null,
    /** Facility code — typed String here unlike the Integer elsewhere in the group (s.306). */
    public readonly ?string $saglikTesisKodu = null,
    /** "HH:MM" death time (s.306). */
    public readonly ?string $olumSaati = null,
    /** Death-certificate name (s.306). */
    public readonly ?string $olumBelgesiAdi = null,
    /** Certificate content as a byte array — full file name with extension per the guide (s.306). */
    public readonly array $olumBelgesiIcerik = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcKimlikNo"]) && is_numeric($data["tcKimlikNo"]) ? (int) $data["tcKimlikNo"] : null,
        isset($data["olumTarihi"]) && is_scalar($data["olumTarihi"]) ? (string) $data["olumTarihi"] : null,
        isset($data["saglikTesisKodu"]) && is_scalar($data["saglikTesisKodu"]) ? (string) $data["saglikTesisKodu"] : null,
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
        $olumTarihi,
        $saglikTesisKodu,
        $olumSaati,
        $olumBelgesiAdi,
        $olumBelgesiIcerik,
        ];
    }
}
