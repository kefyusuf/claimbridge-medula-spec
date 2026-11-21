<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\ImzaliRapor;


/**
 * ImzaliRaporGirisDVO — guideVersion 3.1.1, page 330 (4.6.1 raporKaydet Metodu).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ImzaliRaporGirisDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.330). */
    public readonly ?int $saglikTesisKodu = null,
    /** Citizen ID of the registering physician (s.330). */
    public readonly ?string $doktorTcKimlikNo = null,
    /** Digitally signed report blob — the E-İmzalı flow sends opaque byte arrays; the structured Maluliyet/Engellilik/TibbiGereklilik DVOs below describe the SIGNED CONTENT (s.330). */
    public readonly array $raporBilgisi = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["doktorTcKimlikNo"]) && is_scalar($data["doktorTcKimlikNo"]) ? (string) $data["doktorTcKimlikNo"] : null,
        isset($data["raporBilgisi"]) && is_array($data["raporBilgisi"]) ? $data["raporBilgisi"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "doktorTcKimlikNo" => $this->doktorTcKimlikNo,
        "raporBilgisi" => $this->raporBilgisi,
        ];
    }
}
