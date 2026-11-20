<?php

declare(strict_types=1);

namespace ClaimBridge\Medula\Enum;

/**
 * Tahlil Tipi (guide 3.1.1, page 229).
 *
 * @deprecated Generated artifact — do not edit by hand.
 */
enum TahlilTipi: string
{
    case Diger = "0"; // Diger
    case WBC = "HEM102"; // WBC
    case NE = "HEM103"; // NE%
    case NE_vHEM104 = "HEM104"; // NE#
    case LYM = "HEM105"; // LYM%
    case LYM_vHEM106 = "HEM106"; // LYM#
    case MONO = "HEM107"; // MONO%
    case MONO_vHEM108 = "HEM108"; // MONO#
    case EOS = "HEM109"; // EOS%
    case EOS_vHEM110 = "HEM110"; // EOS#
    case BASO = "HEM111"; // BASO%
    case BASO_vHEM112 = "HEM112"; // BASO#
    case RBC = "HEM113"; // RBC
    case HGB = "HEM114"; // HGB
    case HCT = "HEM115"; // HCT
    case MCV = "HEM116"; // MCV
    case MCH = "HEM117"; // MCH
    case MCHC = "HEM118"; // MCHC
    case RDW = "HEM119"; // RDW
    case PLT = "HEM120"; // PLT
    case MPV = "HEM121"; // MPV
    case Glukoz = "IDR102"; // Glukoz
    case Protein = "IDR103"; // Protein
    case ERYHemoglobin = "IDR104"; // (ERY) Hemoglobin
    case Lokosit = "IDR105"; // Lokosit
    case SpesifikGDansite = "IDR106"; // Spesifik G (Dansite)
    case PH = "IDR107"; // pH
    case Keton = "IDR108"; // Keton
    case Bilirubin = "IDR109"; // Bilirubin
    case Urobilinojen = "IDR110"; // Urobilinojen
    case Nitrit = "IDR111"; // Nitrit
    case IdrarAskorbikAsit = "IDR112"; // Idrar Askorbik asit
    case Eritrosit = "IDR113"; // Eritrosit
    case Lokosit_vIDR115 = "IDR115"; // Lokosit
    case Bakteri = "IDR116"; // Bakteri
    case Mantar = "IDR117"; // Mantar
    case YassiEpitel = "IDR118"; // Yassi Epitel
    case RenalEpitel = "IDR119"; // Renal Epitel
    case Sperm = "IDR120"; // Sperm
    case HiyalenSlendir = "IDR121"; // Hiyalen Slendir
    case GranulerSlendir = "IDR122"; // Granuler Slendir
    case TripleFosfatKrista = "IDR123"; // Triple Fosfat Krista
    case CaOxm = "IDR125"; // CaOxm
    case AmorfKristali = "IDR126"; // Amorf Kristali
    case UrikAsitKristali = "IDR127"; // Urik Asit Kristali
    case CaOxd = "IDR128"; // CaOxd
    case Lok = "IDR114"; // Lok
    case PH_vKGAZ01 = "KGAZ01"; // pH
    case PCO2 = "KGAZ02"; // pCO2
    case PO2 = "KGAZ03"; // pO2
    case SO2 = "KGAZ04"; // SO2
    case Na = "KGAZ05"; // Na
    case K = "KGAZ06"; // K
    case ICa = "KGAZ07"; // iCa
    case THb = "KGAZ08"; // tHb
    case Hct = "KGAZ09"; // Hct
    case BEECF = "KGAZ10"; // BEECF
    case BE = "KGAZ11"; // BE
    case BB = "KGAZ12"; // BB
    case CHCO3 = "KGAZ13"; // CHCO3
    case TcO2 = "KGAZ14"; // tcO2
    case NiCa = "KGAZ15"; // niCa
    case PAO2 = "KGAZ16"; // PAO2
    case Osm = "KGAZ17"; // Osm
    case AKS = "OGTT01"; // AKS
    case Code_30DAKIKA = "OGTT02"; // 30 DAKIKA
    case Code_1SAAT = "OGTT03"; // 1 SAAT
    case Code_90DAKIKA = "OGTT04"; // 90 DAKIKA
    case Code_2SAAT = "OGTT05"; // 2 SAAT
    case Code_3SAAT = "OGTT06"; // 3 SAAT
    case Code_4SAAT = "OGTT07"; // 4 SAAT
    case Code_5SAAT = "OGTT08"; // 5 SAAT
}
