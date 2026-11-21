<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * EmzirmeRaporDVO — guideVersion 3.1.1, page 261 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class EmzirmeRaporDVO
{
    public function __construct(
    /** Birth date of the child, "dd.mm.yyyy" (s.261). */
    public readonly ?string $bebekDogumTarihi = null,
    /** Start of the transferred report period, "dd.mm.yyyy" (s.261). */
    public readonly ?string $dogumOncBasTarihi = null,
    /** Children alive after the birth (s.261). */
    public readonly ?int $canliCocukSayisi = null,
    /** Mother's citizen ID when the nursing report is issued on behalf of the father (s.261). */
    public readonly ?string $anneTcKimlikNo = null,
    /** Children delivered (s.261). */
    public readonly ?int $doganCocukSayisi = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["bebekDogumTarihi"]) && is_scalar($data["bebekDogumTarihi"]) ? (string) $data["bebekDogumTarihi"] : null,
        isset($data["dogumOncBasTarihi"]) && is_scalar($data["dogumOncBasTarihi"]) ? (string) $data["dogumOncBasTarihi"] : null,
        isset($data["canliCocukSayisi"]) && is_numeric($data["canliCocukSayisi"]) ? (int) $data["canliCocukSayisi"] : null,
        isset($data["anneTcKimlikNo"]) && is_scalar($data["anneTcKimlikNo"]) ? (string) $data["anneTcKimlikNo"] : null,
        isset($data["doganCocukSayisi"]) && is_numeric($data["doganCocukSayisi"]) ? (int) $data["doganCocukSayisi"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "bebekDogumTarihi" => $this->bebekDogumTarihi,
        "dogumOncBasTarihi" => $this->dogumOncBasTarihi,
        "canliCocukSayisi" => $this->canliCocukSayisi,
        "anneTcKimlikNo" => $this->anneTcKimlikNo,
        "doganCocukSayisi" => $this->doganCocukSayisi,
        ];
    }
}
