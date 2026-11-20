<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Rapor;


/**
 * IlacRaporDVO — guideVersion 3.1.1, page 261 (4.4 Rapor Bilgisi Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class IlacRaporDVO
{
    public function __construct(
    /** Report core; shape Tablo 4.4.1.k (RaporDVO, this registry). */
    public readonly array $raporDVO = [],
    /** Active ingredients; item shape Tablo 4.4.1.ff (RaporEtkinMaddeDVO, this registry). The required column is not visible in the text extraction (s.261). */
    public readonly array $raporEtkinMaddeler = [],
    /** Follow-up form number when the drug report is filed with a diabetes diagnosis (s.261). */
    public readonly ?string $takipFormuNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["raporDVO"]) && is_array($data["raporDVO"]) ? $data["raporDVO"] : [],
        isset($data["raporEtkinMaddeler"]) && is_array($data["raporEtkinMaddeler"]) ? $data["raporEtkinMaddeler"] : [],
        isset($data["takipFormuNo"]) && is_scalar($data["takipFormuNo"]) ? (string) $data["takipFormuNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $raporDVO,
        $raporEtkinMaddeler,
        $takipFormuNo,
        ];
    }
}
