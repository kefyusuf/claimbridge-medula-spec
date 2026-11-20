<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Istisnai Hal (guide 3.1.1, page 157).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum IstisnaiHal: string
{
    case AcilHal = "1"; // Acil hal
    case IsKazasiIleMeslekHastaligi = "2"; // Is kazasi ile meslek hastaligi
    case BildirimiZorunluBulasiciHastalik = "3"; // Bildirimi zorunlu bulasici hastalik
    case KisiyeYonelikKoruyucuSaglikHizmeti = "4"; // Kisiye yonelik koruyucu saglik hizmeti
    case AnalikHali = "5"; // Analik hali
    case AfetVeSavasIleGrevVeLokavtHali = "6"; // Afet ve savas ile grev ve lokavt hali
    case Code_18YasAltiCocuklar = "7"; // 18 yas alti cocuklar
    case TibbenBaskasininBakiminaMuhtacKisiler = "8"; // Tibben baskasinin bakimina muhtac kisiler
    case BKKNaGoreBorclular = "9"; // BKK na gore Borclular
}
