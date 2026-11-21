<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;

use ClaimBridge\Medula\Enum\GrupTuru;

/**
 * OrneklenmisGirisDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrneklenmisGirisDVO
{
    public function __construct(
    /** Document reference number (s.290). */
    public readonly ?int $evrakRefNo = null,
    /** Code of the searching facility (s.290). */
    public readonly ?int $saglikTesisKodu = null,
    /** A = Ayaktan, Y = Yatarak, G = Günübirlik, D = Diğer (s.290). */
    public readonly ?GrupTuru $grupTuru = null,
    /** Group code; values come from the evrakTakipGrupKodlariSorgu method (s.290). */
    public readonly ?int $grupKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["evrakRefNo"]) && is_numeric($data["evrakRefNo"]) ? (int) $data["evrakRefNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["grupTuru"]) ? GrupTuru::tryFrom((string) $data["grupTuru"]) : null,
        isset($data["grupKodu"]) && is_numeric($data["grupKodu"]) ? (int) $data["grupKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "evrakRefNo" => $this->evrakRefNo,
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "grupTuru" => $this->grupTuru !== null ? $this->grupTuru->value : null,
        "grupKodu" => $this->grupKodu,
        ];
    }
}
