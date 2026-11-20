<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Kullanim Periyot Birimi (guide 3.1.1, page 278).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum PeriyotBirimi: string
{
    case Dakika = "1"; // Dakika
    case Saat = "2"; // Saat
    case Gun = "3"; // Gun
    case Hafta = "4"; // Hafta
    case Ay = "5"; // Ay
    case Yil = "6"; // Yil
    case OmurBoyu = "7"; // Omur Boyu
}
