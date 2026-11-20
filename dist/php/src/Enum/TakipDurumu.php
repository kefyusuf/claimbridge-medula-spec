<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Takip Durumu (guide 3.1.1, page 166).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TakipDurumu: string
{
    case OdemeSorgusuYapilmadi = "0"; // Odeme sorgusu yapilmadi
    case OdemeSorgusuYapildi = "1"; // Odeme sorgusu yapildi
}
