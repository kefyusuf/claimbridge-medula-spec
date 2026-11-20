<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Isgoremezlik Rapor Turu (guide 3.1.1, page 254).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum IsgoremezlikRaporTuru: string
{
    case IsKazasi = "1"; // Is Kazasi
    case MeslekHastaligi = "2"; // Meslek Hastaligi
    case Hastalik = "3"; // Hastalik
    case Analik = "4"; // Analik
    case Emzirme = "5"; // Emzirme
}
