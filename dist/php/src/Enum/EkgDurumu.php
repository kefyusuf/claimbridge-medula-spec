<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * EKG Durumu (guide 3.1.1, page 313).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum EkgDurumu: string
{
    case Normal = "1"; // Normal
    case Patolojik = "2"; // Patolojik
    case Bilinmiyor = "3"; // Bilinmiyor
}
