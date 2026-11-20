<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Ara Karar Durumu (guide 3.1.1, page 309).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum AraKarar: string
{
    case IlkSevk = "H"; // Ilk Sevk
    case AraKararSevk = "E"; // Ara Karar Sevk
    case KontrolMuayenesi = "K"; // Kontrol Muayenesi
    case YSKAraKarar = "Y"; // YSK Ara Karar
}
