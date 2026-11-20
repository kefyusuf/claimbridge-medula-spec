<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Tibbi Beslenme Tedavisi Durumu (guide 3.1.1, page 311).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TbtDurumu: string
{
    case TBTOnerilmisTBTYeUyuyor = "1"; // TBT onerilmis -> TBT'ye uyuyor
    case TBTOnerilmisAraSiraUyuyor = "2"; // TBT onerilmis -> ara sira uyuyor
    case TBTOnerilmisHicUyuyor = "3"; // TBT onerilmis -> hic uyuyor
    case TBTOnerilmisBilinmiyor = "4"; // TBT onerilmis -> Bilinmiyor
    case TBTOnerilmemis = "5"; // TBT onerilmemis
    case Bilinmiyor = "6"; // Bilinmiyor
}
