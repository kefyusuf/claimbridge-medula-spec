<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;

use ClaimBridge\Medula\Enum\BobrekTarafi;

/**
 * ESWLRaporBilgisiDVO — guideVersion 3.1.1, page 273 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class ESWLRaporBilgisiDVO
{
    public function __construct(
    /** SUT procedure code (s.273). */
    public readonly ?string $butKodu = null,
    /** Stone count of the report (s.273). */
    public readonly ?int $eswlRaporuTasSayisi = null,
    /** Session count of the report (s.273). */
    public readonly ?int $eswlRaporuSeansSayisi = null,
    /** Kidney side (s.273). */
    public readonly ?BobrekTarafi $bobrekBilgisi = null,
    /** Stone details; item shape Tablo 4.4.1.cc (ESWLTasBilgisiDVO, this registry) (s.274). */
    public readonly array $eswlRaporuTasBilgileri = [],
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["butKodu"]) && is_scalar($data["butKodu"]) ? (string) $data["butKodu"] : null,
        isset($data["eswlRaporuTasSayisi"]) && is_numeric($data["eswlRaporuTasSayisi"]) ? (int) $data["eswlRaporuTasSayisi"] : null,
        isset($data["eswlRaporuSeansSayisi"]) && is_numeric($data["eswlRaporuSeansSayisi"]) ? (int) $data["eswlRaporuSeansSayisi"] : null,
        isset($data["bobrekBilgisi"]) ? BobrekTarafi::tryFrom((string) $data["bobrekBilgisi"]) : null,
        isset($data["eswlRaporuTasBilgileri"]) && is_array($data["eswlRaporuTasBilgileri"]) ? $data["eswlRaporuTasBilgileri"] : [],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "butKodu" => $butKodu,
        "eswlRaporuTasSayisi" => $eswlRaporuTasSayisi,
        "eswlRaporuSeansSayisi" => $eswlRaporuSeansSayisi,
        "bobrekBilgisi" => $bobrekBilgisi !== null ? $bobrekBilgisi->value : null,
        "eswlRaporuTasBilgileri" => $eswlRaporuTasBilgileri,
        ];
    }
}
