<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Taahhut;


/**
 * TaahhutCevapDVO — guideVersion 3.1.1, page 322 (4.4 Taahhut Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TaahhutCevapDVO
{
    public function __construct(
    /** Result code; "0000" means the save succeeded (s.322). */
    public readonly ?string $sonucKodu = null,
    /** Failure description (s.322). */
    public readonly ?string $sonucMesaji = null,
    /** System-generated commitment number (s.322). */
    public readonly ?int $taahhutNo = null,
    /** Commitment output as a PDF byte array; the guide states no other output is valid (s.322). */
    public readonly array $taahhutCikti = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["taahhutNo"]) && is_numeric($data["taahhutNo"]) ? (int) $data["taahhutNo"] : null,
        isset($data["taahhutCikti"]) && is_array($data["taahhutCikti"]) ? $data["taahhutCikti"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $taahhutNo,
        $taahhutCikti,
        ];
    }
}
