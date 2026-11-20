<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Sevk Nedeni (guide 3.1.1, page 331).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum SevkNedeni: string
{
    case IlkSevk = "1"; // Ilk Sevk
    case AraKontrol = "2"; // Ara Kontrol
    case KontrolMuayenesi = "3"; // Kontrol Muayenesi
}
