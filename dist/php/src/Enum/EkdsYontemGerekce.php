<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * EKDS Yontem Gerekce (guide 3.1.1, page 167).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum EkdsYontemGerekce: string
{
    case KisiyeAitTCKKdaParmakIziVerisiYok = "10"; // Kisiye ait TCKKda parmak izi verisi yok
    case ParmakIziVerisiniCihazOkumuyor = "11"; // Parmak izi verisini cihaz okumuyor
    case KECCihazinaTemasEtmekIstemiyor = "12"; // KEC cihazina temas etmek istemiyor
    case BiyometrikVerisiniPaylasmakIstemiyor = "13"; // Biyometrik verisini paylasmak istemiyor
    case KECCihazinaTemasEtmekIstemiyorPin = "20"; // KEC cihazina temas etmek istemiyor (pin)
    case EDevlettenPinKodunaUlasamiyorum = "21"; // E-Devletten pin koduna ulasamiyorum
    case KisiyeAitTCKKYanindaYok = "30"; // Kisiye ait TCKK yaninda yok
    case KisiyeAitTCKKKayip = "31"; // Kisiye ait TCKK kayip
    case KisiEKDSIstemiyor = "32"; // Kisi EKDS istemiyor
    case KisiyeAitTCKKYok = "33"; // Kisiye ait TCKK yok
    case EKDSDogrulamaYontemleriUygulanamadi = "34"; // EKDS dogrulama yontemleri uygulanamadi
    case KisininFotografDogrulamasiYapilamadi = "35"; // Kisinin fotograf dogrulamasi yapilamadi
    case EKDSDenSaglikSebebiyleMuaftir = "99"; // EKDS'den saglik sebebiyle muaftir
}
