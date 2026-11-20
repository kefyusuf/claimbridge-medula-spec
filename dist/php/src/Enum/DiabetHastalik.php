<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Diabet Takip Formu Hastalik Kodu (guide 3.1.1, page 319).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum DiabetHastalik: string
{
    case Hipertansiyon = "1"; // Hipertansiyon
    case KoronerArterHst = "2"; // Koroner Arter Hst.
    case Kanser = "3"; // Kanser
    case SolunumSHst = "4"; // Solunum S. Hst.
    case KalpYetmezligi = "5"; // Kalp Yetmezligi
    case KronikKCHst = "6"; // Kronik KC Hst.
    case PeriferikArterHst = "7"; // Periferik Arter Hst.
    case DiabetikAyak = "8"; // Diabetik Ayak.
    case Amputasyon = "9"; // Amputasyon
    case KBY = "10"; // KBY
    case Osteoporoz = "11"; // Osteoporoz
    case Hiperkolesterolemi = "12"; // Hiperkolesterolemi
    case Hiperlipidemi = "13"; // Hiperlipidemi
    case EkHastalikYok = "14"; // Ek hastalik yok.
    case Diger = "0"; // Diger
}
