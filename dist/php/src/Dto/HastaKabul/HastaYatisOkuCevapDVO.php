<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HastaKabul;


/**
 * HastaYatisOkuCevapDVO — guideVersion 3.1.1, page 170 (Tablo 4.1.6.b - HastaYatisOkuCevapDVO (ilk kisim)).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class HastaYatisOkuCevapDVO
{
    public function __construct(
    /** Institution code (spelled saglikTesisiKodu in the guide) (s.170) */
    public readonly ?string $saglikTesisiKodu = null,
    /** Application number (s.170) */
    public readonly ?string $hastaBasvuruNo = null,
    /** Hospitalization records (BasvuruYatisBilgileriDVO[], Tablo 4.1.6.c, s.171), expanded as a registry entity (s.171) */
    public readonly array $basvuruYatisBilgileri = [],
    /** Result code; 0000 means success (s.171) */
    public readonly ?string $sonucKodu = null,
    /** Result explanation (s.171) */
    public readonly ?string $sonucMesaji = null,
    /** Birth date when the hospitalization is a newborn episode (s.171) */
    public readonly ?string $yeniDoganDogumTarihi = null,
    /** Child order when the hospitalization is a newborn episode (s.171) */
    public readonly ?string $yeniDoganCocukSiraNo = null,
    /** Donor identity number when the episode is a donation (s.171) */
    public readonly ?string $donorTck = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisiKodu"]) && is_scalar($data["saglikTesisiKodu"]) ? (string) $data["saglikTesisiKodu"] : null,
        isset($data["hastaBasvuruNo"]) && is_scalar($data["hastaBasvuruNo"]) ? (string) $data["hastaBasvuruNo"] : null,
        isset($data["basvuruYatisBilgileri"]) && is_array($data["basvuruYatisBilgileri"]) ? $data["basvuruYatisBilgileri"] : [],
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["yeniDoganDogumTarihi"]) && is_scalar($data["yeniDoganDogumTarihi"]) ? (string) $data["yeniDoganDogumTarihi"] : null,
        isset($data["yeniDoganCocukSiraNo"]) && is_scalar($data["yeniDoganCocukSiraNo"]) ? (string) $data["yeniDoganCocukSiraNo"] : null,
        isset($data["donorTck"]) && is_scalar($data["donorTck"]) ? (string) $data["donorTck"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisiKodu,
        $hastaBasvuruNo,
        $basvuruYatisBilgileri,
        $sonucKodu,
        $sonucMesaji,
        $yeniDoganDogumTarihi,
        $yeniDoganCocukSiraNo,
        $donorTck,
        ];
    }
}
