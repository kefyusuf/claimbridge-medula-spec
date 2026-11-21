<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;

use ClaimBridge\Medula\Enum\AyniFarkliKesi;
use ClaimBridge\Medula\Enum\Euroscore;

/**
 * AmeliyatveGirisimBilgisiDVO — guideVersion 3.1.1, page 190 (Tablo 4.2.1.c - AmeliyatveGirisimBilgisiDVO (continues on s.191-192)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class AmeliyatveGirisimBilgisiDVO
{
    public function __construct(
    /** Description of the performed operation (s.190). */
    public readonly ?string $aciklama = null,
    /** Quantity of the operation (s.191). */
    public readonly ?int $adet = null,
    /** Same-session/same-incision relation code (s.191); codes 1-5. */
    public readonly ?AyniFarkliKesi $ayniFarkliKesi = null,
    /** Branch code of the operation (s.191). */
    public readonly ?string $bransKodu = null,
    /** Diploma registration number of the performing doctor (s.191). */
    public readonly ?string $drTescilNo = null,
    /** Institution-assigned reference used to pair the record with the Medula-generated islemSiraNo (s.191). */
    public readonly ?string $hizmetSunucuRefNo = null,
    /** Sequence number of the registered service; send null while registering, Medula fills and returns it (s.191). Null-on-input pattern. */
    public readonly ?string $islemSiraNo = null,
    /** Operation date in dd.mm.yyyy format (s.191). */
    public readonly ?string $islemTarihi = null,
    /** Side code 1/2/3 (Sag, Sol, Sag-Sol ayrimi yok); null saves as 3 (s.191). The DigerIslem table uses R/L instead - divergence noted. */
    public readonly ?string $sagSol = null,
    /** SUT-defined operation code (s.191). */
    public readonly ?string $sutKodu = null,
    /** Euroscore risk code (s.191); codes 0-3 in the euroscore registry enum. */
    public readonly ?Euroscore $euroscore = null,
    /** Special condition code; see guide Tablo 5.1 OzelDurumVO (s.192). */
    public readonly ?string $ozelDurum = null,
    /** Multiple special-condition codes (s.192). */
    public readonly array $cokluOzelDurum = [],
    /** Report tracking number (s.192). */
    public readonly ?string $raporTakipNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["aciklama"]) && is_scalar($data["aciklama"]) ? (string) $data["aciklama"] : null,
        isset($data["adet"]) && is_numeric($data["adet"]) ? (int) $data["adet"] : null,
        isset($data["ayniFarkliKesi"]) ? AyniFarkliKesi::tryFrom((string) $data["ayniFarkliKesi"]) : null,
        isset($data["bransKodu"]) && is_scalar($data["bransKodu"]) ? (string) $data["bransKodu"] : null,
        isset($data["drTescilNo"]) && is_scalar($data["drTescilNo"]) ? (string) $data["drTescilNo"] : null,
        isset($data["hizmetSunucuRefNo"]) && is_scalar($data["hizmetSunucuRefNo"]) ? (string) $data["hizmetSunucuRefNo"] : null,
        isset($data["islemSiraNo"]) && is_scalar($data["islemSiraNo"]) ? (string) $data["islemSiraNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["sagSol"]) && is_scalar($data["sagSol"]) ? (string) $data["sagSol"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["euroscore"]) ? Euroscore::tryFrom((string) $data["euroscore"]) : null,
        isset($data["ozelDurum"]) && is_scalar($data["ozelDurum"]) ? (string) $data["ozelDurum"] : null,
        isset($data["cokluOzelDurum"]) && is_array($data["cokluOzelDurum"]) ? $data["cokluOzelDurum"] : [],
        isset($data["raporTakipNo"]) && is_scalar($data["raporTakipNo"]) ? (string) $data["raporTakipNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "aciklama" => $this->aciklama,
        "adet" => $this->adet,
        "ayniFarkliKesi" => $this->ayniFarkliKesi !== null ? $this->ayniFarkliKesi->value : null,
        "bransKodu" => $this->bransKodu,
        "drTescilNo" => $this->drTescilNo,
        "hizmetSunucuRefNo" => $this->hizmetSunucuRefNo,
        "islemSiraNo" => $this->islemSiraNo,
        "islemTarihi" => $this->islemTarihi,
        "sagSol" => $this->sagSol,
        "sutKodu" => $this->sutKodu,
        "euroscore" => $this->euroscore !== null ? $this->euroscore->value : null,
        "ozelDurum" => $this->ozelDurum,
        "cokluOzelDurum" => $this->cokluOzelDurum,
        "raporTakipNo" => $this->raporTakipNo,
        ];
    }
}
