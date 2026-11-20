<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Goz Muayenesi Durumu (guide 3.1.1, page 313).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum GozMuayenesi: string
{
    case Normal = "1"; // Normal
    case NonproliferatifRP = "2"; // Nonproliferatif RP
    case ProliferatifRP = "3"; // Proliferatif RP
    case MakulaDonemi = "4"; // Makula Donemi
    case Katarakt = "5"; // Katarakt
    case Glokom = "6"; // Glokom
    case Bilinmiyor = "7"; // Bilinmiyor
}
