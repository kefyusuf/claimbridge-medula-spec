<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Egzersiz Durumu (guide 3.1.1, page 311).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum EgzersizDurumu: string
{
    case OnerilmisDuzenliYapiyor = "1"; // Onerilmis -> duzenli yapiyor
    case OnerilmisDuzensizYapiyor = "2"; // Onerilmis -> duzensiz yapiyor
    case OnerilmisYapmiyor = "3"; // Onerilmis -> yapmiyor
    case OnerilmisUygunHastaDegil = "4"; // Onerilmis -> uygun hasta degil
    case OnerilmisBilinmiyor = "5"; // Onerilmis -> Bilinmiyor
    case Onerilmemis = "6"; // Onerilmemis
    case Bilinmiyor = "7"; // Bilinmiyor
}
