<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * TakipBilgisiCevapDVO — guideVersion 3.1.1, page 290 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class TakipBilgisiCevapDVO
{
    public function __construct(
    /** Result code; "0000" means success (s.295). */
    public readonly ?string $sonucKodu = null,
    /** Result description (s.295). */
    public readonly ?string $sonucMesaji = null,
    /** Takips of the given document id; the guide's TYPE column says Integer while the name is TakipBilgisiListDVO[] — extraction artifact, the array-of-DVO reading is authoritative (s.295); item shape Tablo 4.5.8.c (TakipBilgisiListDVO, this registry). */
    public readonly array $takipBilgisiListDVO = [],
    /** Document reference number (s.295). */
    public readonly ?int $evrakRefNo = null,
    /** Code of the calling facility (s.295). */
    public readonly ?int $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["sonucKodu"]) && is_scalar($data["sonucKodu"]) ? (string) $data["sonucKodu"] : null,
        isset($data["sonucMesaji"]) && is_scalar($data["sonucMesaji"]) ? (string) $data["sonucMesaji"] : null,
        isset($data["takipBilgisiListDVO"]) && is_array($data["takipBilgisiListDVO"]) ? $data["takipBilgisiListDVO"] : [],
        isset($data["evrakRefNo"]) && is_numeric($data["evrakRefNo"]) ? (int) $data["evrakRefNo"] : null,
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $sonucKodu,
        $sonucMesaji,
        $takipBilgisiListDVO,
        $evrakRefNo,
        $saglikTesisKodu,
        ];
    }
}
