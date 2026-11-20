<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Yatis Devam Durumu (guide 3.1.1, page 256).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum YatisDevamDurumu: string
{
    case YatisYok = "1"; // Yatis Yok
    case YatisDevamEdiyor = "2"; // Yatis Devam Ediyor
    case YatisVarTaburcuOlmus = "3"; // Yatis Var, Taburcu Olmus
    case Karma = "4"; // Karma
}
