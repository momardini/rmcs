<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NOT_DEFINED()
 * @method static static PREGNANT_1()
 * @method static static PREGNANT_2()
 * @method static static PREGNANT_3()
 * @method static static PREGNANT_4()
 * @method static static PREGNANT_5()
 * @method static static PREGNANT_6()
 * @method static static PREGNANT_7()
 * @method static static PREGNANT_8()
 * @method static static PREGNANT_9()
 * @method static static BREASTFEEDING()
 */
final class FemaleStatus extends Enum
{
    const NOT_DEFINED =   0;
    const PREGNANT_1 =   1;
    const PREGNANT_2 =   2;
    const PREGNANT_3 =   3;
    const PREGNANT_4 =   4;
    const PREGNANT_5 =   5;
    const PREGNANT_6 =   6;
    const PREGNANT_7 =   7;
    const PREGNANT_8 =   8;
    const PREGNANT_9 =   9;
    const BREASTFEEDING = 10;

}