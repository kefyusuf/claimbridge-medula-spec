<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Odeme Sorgu Durumu (guide 3.1.1, page 238).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum OdemeSorguDurum: string
{
    case IlkKayit = "0"; // Ilk Kayit
    case Hatasiz = "1"; // Hatasiz
    case Hatali = "2"; // Hatali
    case Faturalandi = "3"; // Faturalandi
    case DonemSonlandirildi = "4"; // Donem Sonlandirildi
    case Incelendi = "5"; // Incelendi
    case ItirazIncelendi = "6"; // Itiraz Incelendi
    case OnlineDigerIslemTalep = "X"; // Online diger islem talep
}
