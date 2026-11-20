<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Doktor Tipi (guide 3.1.1, page 272).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum DoktorTipi: string
{
    case RaporuIsteyenDoktorHekim = "1"; // Raporu Isteyen Doktor Hekim
    case RaporuDuzenleyenDoktorDisHekimi = "2"; // Raporu Duzenleyen Doktor Dis Hekimi
}
