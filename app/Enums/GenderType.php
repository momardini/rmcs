<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static NOT_DEFINED()
 * @method static static MALE()
 * @method static static FEMALE()
 */
final class GenderType extends Enum implements LocalizedEnum
{
//    const NOT_DEFINED =   0;
    const MALE =   1;
    const FEMALE = 2;
}
