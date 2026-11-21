<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\RaporTuru;

/**
 * RaporOkuDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.3.c (s.279-280)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporOkuDVO
{
    public function __construct(
    /** Code of the facility that issued the report (s.280). */
    public readonly ?int $raporTesisKodu = null,
    /** Report number (s.280). */
    public readonly ?string $raporNo = null,
    /** Report date, "dd.mm.yyyy" format (s.280). */
    public readonly ?string $raporTarih = null,
    /** Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet. */
    public readonly ?RaporTuru $raporTuru = null,
    /** Report sequence number (s.280). */
    public readonly ?string $raporSiraNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTesisKodu"]) && is_numeric($data["raporTesisKodu"]) ? (int) $data["raporTesisKodu"] : null,
        isset($data["raporNo"]) && is_scalar($data["raporNo"]) ? (string) $data["raporNo"] : null,
        isset($data["raporTarih"]) && is_scalar($data["raporTarih"]) ? (string) $data["raporTarih"] : null,
        isset($data["raporTuru"]) ? RaporTuru::tryFrom((string) $data["raporTuru"]) : null,
        isset($data["raporSiraNo"]) && is_scalar($data["raporSiraNo"]) ? (string) $data["raporSiraNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporTesisKodu" => $this->raporTesisKodu,
        "raporNo" => $this->raporNo,
        "raporTarih" => $this->raporTarih,
        "raporTuru" => $this->raporTuru !== null ? $this->raporTuru->value : null,
        "raporSiraNo" => $this->raporSiraNo,
        ];
    }
}
