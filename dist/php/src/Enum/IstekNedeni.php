<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Istek Nedeni (guide 3.1.1, page 336).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum IstekNedeni: string
{
    case IlkSevk = "1"; // Ilk Sevk
    case AraKontrol = "2"; // Ara Kontrol
    case KontrolMuayenesi = "3"; // Kontrol Muayenesi
}
