<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutKisiCevapDVO — guideVersion 3.1.1, page 325 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutKisiCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.325). */
    public readonly ?string $sonucKodu = null,
    /** Failure description (s.325). */
    public readonly ?string $sonucMesaji = null,
    /** Commitment numbers previously saved by the facility for the person (s.325). */
    public readonly array $taahhutNo = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["taahhutNo"]) && is_array($data["taahhutNo"]) ? $data["taahhutNo"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "sonucKodu" => $this->sonucKodu,
        "sonucMesaji" => $this->sonucMesaji,
        "taahhutNo" => $this->taahhutNo,
        ];
    }
}
