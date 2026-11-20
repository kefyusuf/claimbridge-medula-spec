<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Ortodonti;


/**
 * OrtodontiFormuKaydetGirisDVO — guideVersion 3.1.1, page 326 (4.5 Ortodonti Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrtodontiFormuKaydetGirisDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.326). */
    public readonly ?int $saglikTesisKodu = null,
    /** Provision number issued for the procedure (s.326). */
    public readonly ?string $provizyonNo = null,
    /** SUT code of the procedure (s.326). */
    public readonly ?string $sutKodu = null,
    /** Form number of the person; the guide's required column reads 'Evet/Hayır' — a conditional requirement preserved verbatim (s.326). */
    public readonly ?int $formNo = null,
    /** Procedure date, "dd.mm.yyyy" (s.326). */
    public readonly ?string $islemTarihi = null,
    /** Citizen ID of the person receiving the orthodontic procedure; the guide types it long (s.326). */
    public readonly ?int $tcKimlikNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["provizyonNo"]) && is_scalar($data["provizyonNo"]) ? (string) $data["provizyonNo"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["formNo"]) && is_numeric($data["formNo"]) ? (int) $data["formNo"] : null,
        isset($data["islemTarihi"]) && is_scalar($data["islemTarihi"]) ? (string) $data["islemTarihi"] : null,
        isset($data["tcKimlikNo"]) && is_numeric($data["tcKimlikNo"]) ? (int) $data["tcKimlikNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $saglikTesisKodu,
        $provizyonNo,
        $sutKodu,
        $formNo,
        $islemTarihi,
        $tcKimlikNo,
        ];
    }
}
