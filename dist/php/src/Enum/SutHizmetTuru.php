<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * SUT Hizmet Turu (guide 3.1.1, page 298).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum SutHizmetTuru: string
{
    case MuayeneIslemi = "1"; // Muayene islemi
    case YatakIslemleri = "2"; // Yatak Islemleri
    case DisIslemi = "3"; // Dis islemi
    case Konsultasyon = "4"; // Konsultasyon
    case Malzemeler = "5"; // Malzemeler
    case AmeliyatVeGirisimler = "6"; // Ameliyat ve girisimler
    case TetkikVeRadyolojiBilgileri = "7"; // Tetkik ve radyoloji bilgileri
    case TahlilIslemleri = "8"; // Tahlil islemleri
    case DigerIslemler = "9"; // Diger islemler
    case KanIslemleri = "10"; // Kan islemleri
}
