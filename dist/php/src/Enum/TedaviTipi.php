<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Tedavi Tipi (guide 3.1.1, page 158).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TedaviTipi: string
{
    case NormalSorgu = "0"; // Normal Sorgu
    case Diyaliz = "1"; // Diyaliz
    case FizikselTedaviVeRehabilitasyon = "2"; // Fiziksel Tedavi ve Rehabilitasyon
    case KemikIligi = "4"; // Kemik Iligi
    case KokHucreNakli = "5"; // Kok Hucre Nakli
    case EkstrakorporealFotoferez = "6"; // Ekstrakorporeal Fotoferez
    case HiperbarikOksijen = "7"; // Hiperbarik Oksijen
    case ESWL = "8"; // ESWL
    case AgizProtez = "9"; // Agiz Protez
    case Ketem = "10"; // Ketem
    case TupBebek1 = "11"; // Tup Bebek 1
    case TupBebek2 = "12"; // Tup Bebek 2
    case DisTedavisi = "13"; // Dis Tedavisi
    case OnkolojikTedavi = "14"; // Onkolojik Tedavi
    case Plazmaferez = "15"; // Plazmaferez
    case ESWT = "16"; // ESWT
    case EvdeBakim = "17"; // Evde Bakim
    case AnalikHali = "18"; // Analik Hali
    case IsGoremezlik = "19"; // Is Goremezlik
    case OrtodontikTedavi = "20"; // Ortodontik Tedavi
    case AlkolMaddeBagimliligi = "21"; // Alkol Madde Bagimliligi
    case PulmonerRehabilitasyon = "22"; // Pulmoner Rehabilitasyon
}
