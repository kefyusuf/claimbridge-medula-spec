<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Preparat Turu (guide 3.1.1, page 199).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum PreparatTuru: string
{
    case Tozlar = "1"; // Tozlar
    case Likid = "2"; // Likid
    case BolunmusTozlar = "3"; // Bolunmus tozlar
    case SertKapsulVePastiller = "4"; // Sert kapsul ve pastiller
    case SoguktaHazirlananCozeltiler = "5"; // Sogukta hazirlanan cozeltiler
    case SicaktaHazirlananCozeltiler = "6"; // Sicakta hazirlanan cozeltiler
    case FarmasotikFormuller = "7"; // Farmasotik formuller
    case Granuller = "8"; // Granuller
}
