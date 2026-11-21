<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * KemikIligiIptalGirisDVO — guideVersion 3.1.1, page 181 (Tablo 4.1.17.a - KemikIligiIptalGirisDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KemikIligiIptalGirisDVO
{
    public function __construct(
    /** Patient T.C. identity number (s.181) */
    public readonly ?string $hastaTcNo = null,
    /** GSS-assigned institution code (s.181) */
    public readonly ?int $saglikTesisKodu = null,
    /** Notification number of the registered bone-marrow admission (s.181) */
    public readonly ?int $bildirimNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["hastaTcNo"]) && is_scalar($data["hastaTcNo"]) ? (string) $data["hastaTcNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["bildirimNo"]) && is_numeric($data["bildirimNo"]) ? (int) $data["bildirimNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "hastaTcNo" => $this->hastaTcNo,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "bildirimNo" => $this->bildirimNo,
        ];
    }
}
