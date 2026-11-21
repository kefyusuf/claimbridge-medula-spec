<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Ortodonti;


/**
 * OrtodontiFormuIptalCevapDVO — guideVersion 3.1.1, page 328 (4.5 Ortodonti Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrtodontiFormuIptalCevapDVO
{
    public function __construct(
    /** Orthodontic form number (s.328). */
    public readonly ?string $formNo = null,
    /** Result code; "0000" means success (s.328). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.328). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["formNo"]) && is_scalar($data["formNo"]) ? (string) $data["formNo"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "formNo" => $formNo,
        "sonucKodu" => $sonucKodu,
        "sonucMesaji" => $sonucMesaji,
        ];
    }
}
