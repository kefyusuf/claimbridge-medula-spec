<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Malzeme Turu (guide 3.1.1, page 225).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum MalzemeTuru: string
{
    case SUTKodlu = "1"; // SUT kodlu
    case EmekliSandigiProtokolKodlu = "2"; // Emekli Sandigi Protokol kodlu
    case KodsuzMalzeme = "3"; // Kodsuz malzeme
}
