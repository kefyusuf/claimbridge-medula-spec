<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Ayni Farkli Kesi (guide 3.1.1, page 191).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum AyniFarkliKesi: string
{
    case AyniSeansAyniKesi = "1"; // Ayni seans + ayni kesi
    case FarkliSeansFarkliKesi = "2"; // Farkli seans + farkli kesi
    case AyniSeanstaFarkliKesi = "3"; // Ayni seansta + farkli kesi
    case AyniSeanstaFarkliKesiFarkliKlinikKod = "4"; // Ayni seansta + farkli kesi + farkli klinik kod
    case AyniSeanstaAyniKesiFarkliKlinikKod = "5"; // Ayni seansta + ayni kesi + farkli klinik kod
}
