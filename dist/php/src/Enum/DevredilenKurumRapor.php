<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Devredilen Kurum (Rapor Grubu Varyanti) (guide 3.1.1, page 269).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum DevredilenKurumRapor: string
{
    case SSK = "1"; // SSK
    case Bagkur = "2"; // Bagkur
    case EmekliSandigi = "3"; // Emekli Sandigi
    case YesilKart = "4"; // Yesil Kart
    case VatansizVeSininmacilar = "5"; // Vatansiz ve sininmacilar
    case Code_2022SayiliKanunKapsami = "6"; // 2022 sayili kanun kapsami
    case Code_1005SayiliSerefAyligi = "7"; // 1005 sayili seref ayligi
    case Code_2828SayiliSHCEK = "10"; // 2828 sayili SHCEK
    case SGK = "12"; // S.G.K.
    case MutekabiliyetOturmaIzni = "14"; // Mutekabiliyet oturma izni
    case Code_4447IssizlikKisaCalismaOdenegi = "15"; // 4447 issizlik / kisa calisma odenegi
    case BaskaUlkedeSigortasiYokIstegeTabi = "17"; // Baska ulkede sigortasi yok / istege tabi
    case Code_18YasAltiKapsamDisi = "18"; // 18 yas alti kapsam disi
    case UniversiteYabanciUyrukluOgrenci = "19"; // Universite yabanci uyruklu ogrenci
    case StajyerAvukat = "20"; // Stajyer Avukat
    case KapsamDisi = "21"; // Kapsam Disi
    case YurtdisiSigortali = "99"; // Yurtdisi sigortali
    case AcilHal = "22"; // Acil Hal
    case TBMM = "23"; // TBMM
    case CezaInfazVeTutukeviKursiyeri = "25"; // Ceza Infaz ve Tutukevi Kursiyeri
    case AIHM = "26"; // AIHM
    case Code_60C1C3C9 = "27"; // 60/c1-c3-c9
    case Code_371321 = "28"; // 3713/21
    case Code_60F12F13F14 = "31"; // 60/f12-f13-f14
    case GeciciKoruma6458 = "98"; // Gecici Koruma 6458
    case DiyanetAkademisiOgrencileri = "32"; // Diyanet Akademisi Ogrencileri
    case GeciciKorumaV174 = "97"; // Gecici Koruma V174
    case Code_8105CKOzelDuzenleme = "100"; // 8105 CK ozel duzenleme
    case Code_6015fMilliEgitimAkademisiAdayOgretmenleri = "147"; // 60/15f Milli Egitim Akademisi Aday Ogretmenleri
    case Code_6016fYTBKapsamindakiOgrenciler = "148"; // 60/16f YTB Kapsamindaki Ogrenciler
    case Code_60C2UluslararasiKoruma = "149"; // 60/c2 Uluslararasi Koruma
}
