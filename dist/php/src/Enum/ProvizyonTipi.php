<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Provizyon Tipi (guide 3.1.1, page 156).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum ProvizyonTipi: string
{
    case Normal = "N"; // Normal
    case IsKazasi = "I"; // Is kazasi
    case Acil = "A"; // Acil
    case TrafikKazasi = "T"; // Trafik kazasi
    case AdliVaka = "V"; // Adli Vaka
    case MeslekHastaligi = "M"; // Meslek hastaligi
    case KurumSevki = "K"; // Kurum Sevki
    case AcilHal = "C"; // Acil Hal
    case BulasiciHastalik = "H"; // Bulasici Hastalik
    case KoruyucuSaglik = "R"; // Koruyucu Saglik
    case Analik = "L"; // Analik
    case AfetSavasGrevLokavt = "G"; // Afet Savas Grev Lokavt
    case BakimaMuhtac = "U"; // Bakima Muhtac
    case DogalAfet = "D"; // Dogal Afet
    case Code_371321 = "E"; // 3713/21
    case IstisnaiHal = "S"; // Istisnai hal
}
