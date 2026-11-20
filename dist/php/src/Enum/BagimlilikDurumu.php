<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Bagimlilik Degerlendirmesi (guide 3.1.1, page 334).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum BagimlilikDurumu: string
{
    case Bagimsiz = "1"; // Bagimsiz
    case KismiBagimli = "2"; // Kismi Bagimli
    case TamBagimli = "3"; // Tam Bagimli
}
