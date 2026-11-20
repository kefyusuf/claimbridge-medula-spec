<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * AntiGAD Durumu (guide 3.1.1, page 313).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum AntiGad: string
{
    case Pozitif = "P"; // Pozitif
    case Negatif = "N"; // Negatif
    case Bilinmiyor = "B"; // Bilinmiyor
}
