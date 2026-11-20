<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Adli Vaka / Trafik Kazasi (guide 3.1.1, page 268).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum AdliVakaDurumu: string
{
    case AdliVaka = "1"; // Adli Vaka
    case TrafikKazasi = "2"; // Trafik Kazasi
    case Yok = "3"; // Yok
}
