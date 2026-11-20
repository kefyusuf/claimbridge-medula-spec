<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Taburcu Kodu (guide 3.1.1, page 241).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TaburcuKodu: string
{
    case SifaIleTaburcu = "1"; // Sifa ile taburcu
    case HaliyleTaburcu = "2"; // Haliyle taburcu
    case OlumVeyaBaskaNedenleTedavidenVazgecme = "3"; // Olum veya baska nedenle tedaviden vazgecme
    case EveGonderilme = "4"; // Eve gonderilme
    case AyniKapsamliBaskaBirHastaneyeSevk = "5"; // Ayni kapsamli baska bir hastaneye sevk
    case DahaKapsamliBaskaBirHastaneyeSevk = "6"; // Daha kapsamli baska bir hastaneye sevk
    case OrtaDereceliBirBaskaBakimKurulusunaSevk = "7"; // Orta dereceli bir baska bakim kurulusuna sevk
    case AileHekimiBakimiAltindaEveGonderilme = "8"; // Aile hekimi bakimi altinda eve gonderilme
    case HastaneIcindeBaskaBirBransaSevk = "9"; // Hastane icinde baska bir bransa sevk
    case Vefat = "10"; // Vefat
    case Diger = "11"; // Diger
    case YesilKartliSevkIleTaburcu = "12"; // Yesil kartli sevk ile taburcu
    case UzayanYatis = "13"; // Uzayan Yatis
}
