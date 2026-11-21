<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * HizmetOkuGirisDVO — guideVersion 3.1.1, page 236 (Tablo 4.2.2.a - HizmetOkuGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HizmetOkuGirisDVO
{
    public function __construct(
    /** Operation sequence numbers to read only the specified operations; empty reads all registered operations (s.236). */
    public readonly array $islemSiraNumaralari = [],
    /** Service-provider reference numbers to filter the read (s.237); empty reads all registered operations. */
    public readonly array $hizmetSunucuRefNolari = [],
    /** Healthcare facility code (s.237). */
    public readonly ?int $saglikTesisKodu = null,
    /** Tracking number whose registered operations are read (s.237). */
    public readonly ?string $takipNo = null,
    /** Software vendor KTS code (s.237). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["islemSiraNumaralari"]) && is_array($data["islemSiraNumaralari"]) ? $data["islemSiraNumaralari"] : [],
        isset($data["hizmetSunucuRefNolari"]) && is_array($data["hizmetSunucuRefNolari"]) ? $data["hizmetSunucuRefNolari"] : [],
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "islemSiraNumaralari" => $this->islemSiraNumaralari,
        "hizmetSunucuRefNolari" => $this->hizmetSunucuRefNolari,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "takipNo" => $this->takipNo,
        "ktsHbysKodu" => $this->ktsHbysKodu,
        ];
    }
}
