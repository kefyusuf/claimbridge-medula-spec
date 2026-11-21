<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * ENabizBildirimSorguGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ENabizBildirimSorguGirisDVO
{
    public function __construct(
    /** Code of the calling facility (s.305). */
    public readonly ?int $saglikTesisKodu = null,
    /** Tracking number (s.305). */
    public readonly ?string $takipNo = null,
    /** Query by service-provider reference numbers (s.305). */
    public readonly array $hizmetSunucuRefNo = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["takipNo"]) && is_scalar($data["takipNo"]) ? (string) $data["takipNo"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_array($data["hizmetSunucuRefNo"]) ? $data["hizmetSunucuRefNo"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "takipNo" => $this->takipNo,
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        ];
    }
}
