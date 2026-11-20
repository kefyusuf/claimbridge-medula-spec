<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Tedavi Turu (guide 3.1.1, page 158).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TedaviTuru: string
{
    case AyaktaTedavi = "A"; // Ayakta Tedavi
    case YatarakTedavi = "Y"; // Yatarak Tedavi
    case GunubirlikTedavi = "G"; // Gunubirlik Tedavi
}
