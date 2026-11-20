<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\YardimciIslemler;


/**
 * KurumSevkTalepNoSorguGirisDVO — guideVersion 3.1.1, page 299 (4.5 Yardimci Web Servis Metotlari).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class KurumSevkTalepNoSorguGirisDVO
{
    public function __construct(
    /** Citizen ID of the queried person; the guide types it long (s.308). */
    public readonly ?int $tcKimlikNo = null,
    /** Facility code — typed String here unlike the Integer elsewhere (s.308). */
    public readonly ?string $saglikTesisKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["tcKimlikNo"]) && is_numeric($data["tcKimlikNo"]) ? (int) $data["tcKimlikNo"] : null,
        isset($data["saglikTesisKodu"]) && is_scalar($data["saglikTesisKodu"]) ? (string) $data["saglikTesisKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        $tcKimlikNo,
        $saglikTesisKodu,
        ];
    }
}
