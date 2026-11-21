<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\Ortodonti;


/**
 * OrtodontiFormuOkuGirisDVO — guideVersion 3.1.1, page 328 (4.5 Ortodonti Formu Kayit Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class OrtodontiFormuOkuGirisDVO
{
    public function __construct(
    /** GSS-assigned facility code (s.328). */
    public readonly ?int $saglikTesisKodu = null,
    /** SUT code of the procedure (s.328). */
    public readonly ?string $sutKodu = null,
    /** Form number (s.328). */
    public readonly ?int $formNo = null,
    /** Citizen ID of the person receiving the orthodontic procedure; the guide types it long (s.328). */
    public readonly ?int $tcKimlikNo = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["saglikTesisKodu"]) && is_numeric($data["saglikTesisKodu"]) ? (int) $data["saglikTesisKodu"] : null,
        isset($data["sutKodu"]) && is_scalar($data["sutKodu"]) ? (string) $data["sutKodu"] : null,
        isset($data["formNo"]) && is_numeric($data["formNo"]) ? (int) $data["formNo"] : null,
        isset($data["tcKimlikNo"]) && is_numeric($data["tcKimlikNo"]) ? (int) $data["tcKimlikNo"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "saglikTesisKodu" => $this->saglikTesisKodu,
        "sutKodu" => $this->sutKodu,
        "formNo" => $this->formNo,
        "tcKimlikNo" => $this->tcKimlikNo,
        ];
    }
}
