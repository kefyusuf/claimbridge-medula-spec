<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutOkuDVO — guideVersion 3.1.1, page 324 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutOkuDVO
{
    public function __construct(
    /** GSS-assigned facility code — typed String here unlike the Integer in TaahhutKayitDVO (s.324). */
    public readonly ?string $saglikTesisKodu = null,
    /** System-generated commitment number (s.324). */
    public readonly ?int $taahhutNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_scalar($data["saglikTesisKodu"]) ? (string) $data["saglikTesisKodu"] : null,
        isset($data["taahhutNo"]) && is_numeric($data["taahhutNo"]) ? (int) $data["taahhutNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $taahhutNo,
        ];
    }
}
