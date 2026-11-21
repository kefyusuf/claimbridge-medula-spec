<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\RaporTuru;

/**
 * RaporCevapDVO — guideVersion 3.1.1, page 279 (Tablo 4.4.1.b (s.253-254)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class RaporCevapDVO
{
    public function __construct(
    /** System-generated unique number of the saved report (s.253). */
    public readonly ?int $raporTakipNo = null,
    /** Populated when the saved report is a maternity incapacity report; shape Tablo 4.4.1.f (AnalikIsgoremezlikRaporDVO) — deferred to G43b. */
    public readonly array $analikRapor = [],
    /** Populated when the saved report is a fit-to-work-before-birth report; shape Tablo 4.4.1.d (DogumOncesiCalisabilirRaporDVO) — deferred to G43b. */
    public readonly array $dogumOncesiCalisabilirRapor = [],
    /** Populated when the saved report is a birth report; shape Tablo 4.4.1.e (DogumRaporDVO) — deferred to G43b. */
    public readonly array $dogumRapor = [],
    /** Populated when the saved report is a drug report (use or exemption); shape Tablo 4.4.1.h (IlacRaporDVO) — deferred to G43b. */
    public readonly array $ilacRapor = [],
    /** Populated when the saved report is a disability report; shape Tablo 4.4.1.j (MaluliyetRaporDVO) — deferred to G43b. */
    public readonly array $maluliyetRapor = [],
    /** Populated when the saved report is a prosthesis report; shape Tablo 4.4.1.g (ProtezRaporDVO) — deferred to G43b. */
    public readonly array $protezRapor = [],
    /** Populated when the saved report is a treatment report; shape Tablo 4.4.1.i (TedaviRaporDVO) — deferred to G43b. */
    public readonly array $tedaviRapor = [],
    /** Populated when the saved report is an incapacity report (work accident, occupational disease or illness); shape Tablo 4.4.1.c (IsgoremezlikRaporDVO) — deferred to G43b. */
    public readonly array $isgoremezlikRapor = [],
    /** Incapacity report attachments; item shape Tablo 4.4.1.ee (IsgoremezlikRaporEkDVO) — deferred to G43b. */
    public readonly array $isgoremezlikRaporEkleri = [],
    /** Result description; the failure reason is stated here (s.253). */
    public readonly ?string $sonucAciklamasi = null,
    /** Result code; 0 (zero) means success, any other value is an error. Intra-guide divergence: this group is Integer 0-based, unlike the hasta-kabul group's String "0000". */
    public readonly ?int $sonucKodu = null,
    /** Type of the saved report; Raporun türü (s.280): 1 Tedavi, 2 İş Kazası, 3 Meslek Hastalığı, 4 Hastalık, 5 Doğum Öncesi Çalışabilir, 6 Analık, 7 Doğum, 8 Protez, 9 Maluliyet, 10 İlaç Kullanım, 11 İlaç Muafiyet. */
    public readonly ?RaporTuru $raporTuru = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporTakipNo"]) && is_numeric($data["raporTakipNo"]) ? (int) $data["raporTakipNo"] : null,
        isset($data["analikRapor"]) && is_array($data["analikRapor"]) ? $data["analikRapor"] : [],
        isset($data["dogumOncesiCalisabilirRapor"]) && is_array($data["dogumOncesiCalisabilirRapor"]) ? $data["dogumOncesiCalisabilirRapor"] : [],
        isset($data["dogumRapor"]) && is_array($data["dogumRapor"]) ? $data["dogumRapor"] : [],
        isset($data["ilacRapor"]) && is_array($data["ilacRapor"]) ? $data["ilacRapor"] : [],
        isset($data["maluliyetRapor"]) && is_array($data["maluliyetRapor"]) ? $data["maluliyetRapor"] : [],
        isset($data["protezRapor"]) && is_array($data["protezRapor"]) ? $data["protezRapor"] : [],
        isset($data["tedaviRapor"]) && is_array($data["tedaviRapor"]) ? $data["tedaviRapor"] : [],
        isset($data["isgoremezlikRapor"]) && is_array($data["isgoremezlikRapor"]) ? $data["isgoremezlikRapor"] : [],
        isset($data["isgoremezlikRaporEkleri"]) && is_array($data["isgoremezlikRaporEkleri"]) ? $data["isgoremezlikRaporEkleri"] : [],
        isset($data["sonucAciklamasi"]) && is_scalar($data["sonucAciklamasi"]) ? (string) $data["sonucAciklamasi"] : null,
        isset($data["sonucKodu"]) && is_numeric($data["sonucKodu"]) ? (int) $data["sonucKodu"] : null,
        isset($data["raporTuru"]) ? RaporTuru::tryFrom((string) $data["raporTuru"]) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "raporTakipNo" => $raporTakipNo,
        "analikRapor" => $analikRapor,
        "dogumOncesiCalisabilirRapor" => $dogumOncesiCalisabilirRapor,
        "dogumRapor" => $dogumRapor,
        "ilacRapor" => $ilacRapor,
        "maluliyetRapor" => $maluliyetRapor,
        "protezRapor" => $protezRapor,
        "tedaviRapor" => $tedaviRapor,
        "isgoremezlikRapor" => $isgoremezlikRapor,
        "isgoremezlikRaporEkleri" => $isgoremezlikRaporEkleri,
        "sonucAciklamasi" => $sonucAciklamasi,
        "sonucKodu" => $sonucKodu,
        "raporTuru" => $raporTuru !== null ? $raporTuru->value : null,
        ];
    }
}
