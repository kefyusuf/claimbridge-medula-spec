<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Onaylanan Islem Turu (guide 3.1.1, page 348).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum OnayIslemTuru: string
{
    case Rapor = "1"; // Rapor
    case MutatDisiRaporu = "2"; // Mutat disi raporu
    case SevkBildirim = "3"; // Sevk Bildirim
    case SevkKayit = "4"; // Sevk Kayit
}
