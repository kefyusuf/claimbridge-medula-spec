<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Basvuru Nedeni (guide 3.1.1, page 312).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum BasvuruNedeni: string
{
    case GenelKontrol = "1"; // Genel Kontrol
    case RutinMuayeneVeKontrol = "2"; // Rutin muayene ve kontrol
    case BaskaBranstanKonsultasyon = "3"; // Baska branstan konsultasyon
    case AkutMetabolikKomplikasyonlar = "4"; // Akut metabolik komplikasyonlar
    case AkutKronikKomplikasyon = "5"; // Akut kronik komplikasyon
    case IlacYazdirma = "6"; // Ilac Yazdirma
}
