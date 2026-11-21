<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KatilimPayiGirisDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KatilimPayiGirisDVO
{
    public function __construct(
    /** Document reference number (s.293). */
    public readonly ?int $evrakRefNo = null,
    /** Code of the calling facility (s.293). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["evrakRefNo"]) && is_numeric($data["evrakRefNo"]) ? (int) $data["evrakRefNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "evrakRefNo" => $this->evrakRefNo,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        ];
    }
}
