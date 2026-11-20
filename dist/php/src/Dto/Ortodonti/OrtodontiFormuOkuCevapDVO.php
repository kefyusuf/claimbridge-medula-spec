<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Ortodonti;


/**
 * OrtodontiFormuOkuCevapDVO — guideVersion 3.1.1, page 329 (4.5 Ortodonti Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrtodontiFormuOkuCevapDVO
{
    public function __construct(
    /** Orthodontic form number (s.329). */
    public readonly ?string $formNo = null,
    /** Orthodontic procedure type, e.g. Sınıf I, Sınıf II (s.329). */
    public readonly ?string $islemTuru = null,
    /** Facility code of the first procedure; underscored parameter names are guide-verbatim (s.329). */
    public readonly ?string $tesis_kodu_1 = null,
    /** Facility code of the second procedure (s.329). */
    public readonly ?string $tesis_kodu_2 = null,
    /** Facility code of the third procedure (s.329). */
    public readonly ?string $tesis_kodu_3 = null,
    /** Date of the first procedure (s.329). */
    public readonly ?string $islem_tarihi_1 = null,
    /** Date of the second procedure (s.329). */
    public readonly ?string $islem_tarihi_2 = null,
    /** Date of the third procedure (s.329). */
    public readonly ?string $islem_tarihi_3 = null,
    /** Provision number of the first procedure (s.329). */
    public readonly ?string $provizyonNo1 = null,
    /** Provision number of the second procedure (s.329). */
    public readonly ?string $provizyonNo2 = null,
    /** Provision number of the third procedure (s.329). */
    public readonly ?string $provizyonNo3 = null,
    /** Result code; "0000" means success (s.329). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.329). */
    public readonly ?string $sonucMesaji = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["formNo"]) && is_scalar($data["formNo"]) ? (string) $data["formNo"] : null,
        isset($data["islemTuru"]) && is_scalar($data["islemTuru"]) ? (string) $data["islemTuru"] : null,
        isset($data["tesis_kodu_1"]) && is_scalar($data["tesis_kodu_1"]) ? (string) $data["tesis_kodu_1"] : null,
        isset($data["tesis_kodu_2"]) && is_scalar($data["tesis_kodu_2"]) ? (string) $data["tesis_kodu_2"] : null,
        isset($data["tesis_kodu_3"]) && is_scalar($data["tesis_kodu_3"]) ? (string) $data["tesis_kodu_3"] : null,
        isset($data["islem_tarihi_1"]) && is_scalar($data["islem_tarihi_1"]) ? (string) $data["islem_tarihi_1"] : null,
        isset($data["islem_tarihi_2"]) && is_scalar($data["islem_tarihi_2"]) ? (string) $data["islem_tarihi_2"] : null,
        isset($data["islem_tarihi_3"]) && is_scalar($data["islem_tarihi_3"]) ? (string) $data["islem_tarihi_3"] : null,
        isset($data["provizyonNo1"]) && is_scalar($data["provizyonNo1"]) ? (string) $data["provizyonNo1"] : null,
        isset($data["provizyonNo2"]) && is_scalar($data["provizyonNo2"]) ? (string) $data["provizyonNo2"] : null,
        isset($data["provizyonNo3"]) && is_scalar($data["provizyonNo3"]) ? (string) $data["provizyonNo3"] : null,
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $formNo,
        $islemTuru,
        $tesis_kodu_1,
        $tesis_kodu_2,
        $tesis_kodu_3,
        $islem_tarihi_1,
        $islem_tarihi_2,
        $islem_tarihi_3,
        $provizyonNo1,
        $provizyonNo2,
        $provizyonNo3,
        $sonucKodu,
        $sonucMesaji,
        ];
    }
}
