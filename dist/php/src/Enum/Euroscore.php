<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Euroscore (guide 3.1.1, page 191).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum Euroscore: string
{
    case Yok = "0"; // Yok
    case DusukRisk = "1"; // Dusuk risk
    case OrtaRisk = "2"; // Orta risk
    case YuksekRisk = "3"; // Yuksek risk
}
