<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Imzali Rapor Turu (guide 3.1.1, page 340).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum ImzaliRaporTuru: string
{
    case TedaviRaporu = "1"; // Tedavi Raporu
    case IsGoremezlik = "2"; // Is Goremezlik
    case Maluliyet = "3"; // Maluliyet
    case Engellilik = "4"; // Engellilik
    case TibbiGereklilik = "5"; // Tibbi Gereklilik
    case Ilac = "10"; // Ilac
}
