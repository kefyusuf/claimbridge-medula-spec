<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\GrupTuru;

/**
 * TakipBilgisiGirisDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipBilgisiGirisDVO
{
    public function __construct(
    /** Document reference number (s.295). */
    public readonly ?int $evrakRefNo = null,
    /** Code of the calling facility (s.295). */
    public readonly ?int $saglikTesisKodu = null,
    /** A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.295). */
    public readonly ?GrupTuru $grupTuru = null,
    /** Group code; values come from the evrakTakipGrupKodlariSorgu method (s.295). */
    public readonly ?int $grupKodu = null,
    /** Software vendor KTS code (s.295). */
    public readonly ?string $ktsHbysKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["evrakRefNo"]) && is_numeric($data["evrakRefNo"]) ? (int) $data["evrakRefNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["grupTuru"]) ? GrupTuru::tryFrom((string) $data["grupTuru"]) : null,
        isset($data["grupKodu"]) && is_numeric($data["grupKodu"]) ? (int) $data["grupKodu"] : null,
        isset($data["ktsHbysKodu"]) && is_scalar($data["ktsHbysKodu"]) ? (string) $data["ktsHbysKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "evrakRefNo" => $evrakRefNo,
        "saglikTesisKodu" => $saglikTesisKodu,
        "grupTuru" => $grupTuru !== null ? $grupTuru->value : null,
        "grupKodu" => $grupKodu,
        "ktsHbysKodu" => $ktsHbysKodu,
        ];
    }
}
