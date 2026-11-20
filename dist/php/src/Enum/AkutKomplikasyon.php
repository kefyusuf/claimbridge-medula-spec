<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Akut Komplikasyon (Son 3 Ay) (guide 3.1.1, page 314).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum AkutKomplikasyon: string
{
    case Yasanmadi = "1"; // Yasanmadi
    case DKA = "2"; // DKA
    case HHD = "3"; // HHD
    case Hipoglisemi = "4"; // Hipoglisemi
}
