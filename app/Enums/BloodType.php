<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static  A_POSITIVE()
 * @method static static  B_POSITIVE()
 * @method static static  AB_POSITIVE()
 * @method static static  O_POSITIVE()
 * @method static static  A_NEGATIVE()
 * @method static static  B_NEGATIVE()
 * @method static static  AB_NEGATIVE()
 * @method static static  O_NEGATIVE()
 * @method static static  NOT_DEFINED()
 */
final class BloodType extends Enum
{
    const A_POSITIVE =   1;
    const B_POSITIVE =   2;
    const AB_POSITIVE = 3;
    const O_POSITIVE = 4;
    const A_NEGATIVE = 5;
    const B_NEGATIVE = 6;
    const AB_NEGATIVE = 7;
    const O_NEGATIVE = 8;
    const NOT_DEFINED = 9;
}
