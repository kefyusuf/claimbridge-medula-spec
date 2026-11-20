<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Takip Tipi (guide 3.1.1, page 157).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TakipTipi: string
{
    case Normal = "N"; // Normal
    case EslikEdenHastalik = "E"; // Eslik Eden Hastalik
    case UzayanYatis = "U"; // Uzayan Yatis
    case Komplikasyon = "K"; // Komplikasyon
    case TaniAmacliGunubirlik = "T"; // Tani Amacli Gunubirlik
    case YogunBakim = "Y"; // Yogun Bakim
    case HizmetinIptalOlmasiVeyaYarimKalmasi = "P"; // Hizmetin Iptal Olmasi veya Yarim Kalmasi
    case KurumSevkliKontrolMuayenesi = "S"; // Kurum Sevkli Kontrol Muayenesi
    case KurumSevkli = "C"; // Kurum Sevkli
    case FaturalanmisUzayanYatis = "F"; // Faturalanmis Uzayan Yatis
    case FaturalanmisUzayanYatisVeYogunBakim = "B"; // Faturalanmis Uzayan Yatis ve Yogun Bakim
}
