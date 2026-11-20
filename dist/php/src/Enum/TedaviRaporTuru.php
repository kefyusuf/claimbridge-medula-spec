<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Tedavi Rapor Turu (guide 3.1.1, page 262).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TedaviRaporTuru: string
{
    case Diyaliz = "1"; // Diyaliz
    case HiperbarikOksijenTedavisi = "2"; // Hiperbarik Oksijen Tedavisi
    case ESWT = "3"; // ESWT
    case TupbebekTedavisi = "4"; // Tupbebek Tedavisi
    case FizikTedaviVeRehabilitasyon = "5"; // Fizik Tedavi ve Rehabilitasyon
    case ESWL = "6"; // ESWL
    case FizikTedaviVeRehabilitasyonTrafikKazasi = "7"; // Fizik Tedavi ve Rehabilitasyon - Trafik Kazasi
    case EvHemodiyalizi = "8"; // Ev Hemodiyalizi
    case PulmonerRehabilitasyon = "9"; // Pulmoner Rehabilitasyon
}
