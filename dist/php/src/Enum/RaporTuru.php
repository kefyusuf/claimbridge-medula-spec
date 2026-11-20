<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Rapor Turu (guide 3.1.1, page 280).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum RaporTuru: string
{
    case Tedavi = "1"; // Tedavi
    case IsKazasi = "2"; // Is Kazasi
    case MeslekHastaligi = "3"; // Meslek Hastaligi
    case Hastalik = "4"; // Hastalik
    case DogumOncesiCalisabilir = "5"; // Dogum Oncesi Calisabilir
    case Analik = "6"; // Analik
    case Dogum = "7"; // Dogum
    case Protez = "8"; // Protez
    case Maluliyet = "9"; // Maluliyet
    case IlacKullanim = "10"; // Ilac Kullanim
    case IlacMuafiyet = "11"; // Ilac Muafiyet
}
