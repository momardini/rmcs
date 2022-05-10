<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PILLS()
 * @method static static INTRAMUSCULAR_INJECTION()
 * @method static static SUBCUTANEOUS_INJECTION()
 * @method static static INTRAVENOUS_INJECTION()
 * @method static static DRINKING_NEEDLES()
 * @method static static DROPS()
 * @method static static MIXED_SERUM()
 * @method static static DIABETES_SERUM()
 * @method static static SALINE_SERUM()
 * @method static static INTRAVENOUS()
 * @method static static DRINK()
 * @method static static SUPPOSITORIES()
 * @method static static ARAZZAZ()
 * @method static static OINTMENT()
 * @method static static CREAM()
 * @method static static POWDER()
 * @method static static NOSE_INHALE()
 * @method static static ORAL_INHALATION()
 * @method static static DISSOLVED_IN_WATER()
 * @method static static SPARKLING()
 * @method static static GREASE()
 * @method static static ANTISEPTIC_LOTION()
 * @method static static SHAMPOO()
 * @method static static RINSE_MOUTH()
 * @method static static EYE_DROPS()
 * @method static static EAR_DROP()
 */
final class PharmaceuticalForm extends Enum
{
    const PILLS = 1;
    const INTRAMUSCULAR_INJECTION = 2;
    const SUBCUTANEOUS_INJECTION = 13;
    const INTRAVENOUS_INJECTION = 19;
    const DRINKING_NEEDLES = 20;
    const DROPS = 14;
    const MIXED_SERUM = 21;
    const DIABETES_SERUM = 22;
    const SALINE_SERUM = 23;
    const INTRAVENOUS = 24;
    const DRINK = 3;
    const SUPPOSITORIES = 4;
    const ARAZZAZ = 5;
    const OINTMENT = 6;
    const CREAM = 7;
    const POWDER = 8;
    const NOSE_INHALE = 9;
    const ORAL_INHALATION = 25;
    const DISSOLVED_IN_WATER = 10;
    const SPARKLING = 11;
    const GREASE = 12;
    const ANTISEPTIC_LOTION = 26;
    const SHAMPOO = 27;
    const RINSE_MOUTH = 28;
    const EYE_DROPS = 15;
    const EAR_DROP = 16;
    const NOSE_DROP = 17;
    const RINSE_GARGLE = 18;
}