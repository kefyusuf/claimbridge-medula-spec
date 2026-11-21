<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Dto\HizmetKayit;


/**
 * GenBilgisiDVO — guideVersion 3.1.1, page 231 (Tablo 4.2.1.j.2 - GenBilgisiDVO).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
final class GenBilgisiDVO
{
    public function __construct(
    /** Gene code; the table closes at s.232 with TaniBilgisiDVO following (s.231) */
    public readonly ?string $genKodu = null,
    ) {}

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
        isset($data["genKodu"]) && is_scalar($data["genKodu"]) ? (string) $data["genKodu"] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
        "genKodu" => $this->genKodu,
        ];
    }
}
