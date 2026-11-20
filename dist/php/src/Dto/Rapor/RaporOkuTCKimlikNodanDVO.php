<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\RaporTuru;

/**
 * RaporOkuTCKimlikNodanDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.8.a (s.282)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporOkuTCKimlikNodanDVO
{
    public function __construct(
    /** Citizen ID of the report owner. The guide's description column erroneously repeats 'Rapor Takip Numarası'; the parameter name tckimlikNo is authoritative. */
    public readonly ?string $tckimlikNo = null,
    /** Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet. */
    public readonly ?RaporTuru $raporTuru = null,
    /** Health facility code of the caller (s.282). */
    public readonly ?int $kullaniciTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tckimlikNo"]) && is_scalar($data["tckimlikNo"]) ? (string) $data["tckimlikNo"] : null,
        isset($data["raporTuru"]) ? RaporTuru::tryFrom((string) $data["raporTuru"]) : null,
        isset($data["kullaniciTesisKodu"]) && is_numeric($data["kullaniciTesisKodu"]) ? (int) $data["kullaniciTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tckimlikNo,
        $raporTuru !== null ? $raporTuru->value : null,
        $kullaniciTesisKodu,
        ];
    }
}
