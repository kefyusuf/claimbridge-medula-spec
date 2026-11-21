<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutKisiOkuDVO — guideVersion 3.1.1, page 324 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutKisiOkuDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.324). */
    public readonly ?int $saglikTesisKodu = null,
    /** Citizen ID of the person whose commitments are read; the guide types it long (s.325). */
    public readonly ?int $tcKimlikNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["tcKimlikNo"]) && is_numeric($data["tcKimlikNo"]) ? (int) $data["tcKimlikNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $saglikTesisKodu,
        "tcKimlikNo" => $tcKimlikNo,
        ];
    }
}
