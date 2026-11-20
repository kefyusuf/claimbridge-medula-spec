<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Devam Durumu (guide 3.1.1, page 256).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum DevamDurumu: string
{
    case Hayir = "-1"; // Hayir
    case GecmisteGitmedigiKontrolVarDevamMiEvet = "1"; // Gecmiste gitmedigi kontrol var, devam mi (evet)
    case DevamEdenRaporuVarDevamMiEvet = "2"; // Devam eden raporu var, devam mi (evet)
}
