<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\GrupTuru;

/**
 * EvrakKesintiGirisDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EvrakKesintiGirisDVO
{
    public function __construct(
    /** Document reference number (s.291). */
    public readonly ?int $evrakReferansNo = null,
    /** Code of the calling facility (s.291). */
    public readonly ?int $tesisKodu = null,
    /** A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.291). */
    public readonly ?GrupTuru $grupTuru = null,
    /** Group code; values come from the evrakTakipGrupKodlariSorgu method (s.291). */
    public readonly ?int $grupKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["evrakReferansNo"]) && is_numeric($data["evrakReferansNo"]) ? (int) $data["evrakReferansNo"] : null,
        isset($data["tesisKodu"]) && is_numeric($data["tesisKodu"]) ? (int) $data["tesisKodu"] : null,
        isset($data["grupTuru"]) ? GrupTuru::tryFrom((string) $data["grupTuru"]) : null,
        isset($data["grupKodu"]) && is_numeric($data["grupKodu"]) ? (int) $data["grupKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "evrakReferansNo" => $evrakReferansNo,
        "tesisKodu" => $tesisKodu,
        "grupTuru" => $grupTuru !== null ? $grupTuru->value : null,
        "grupKodu" => $grupKodu,
        ];
    }
}
