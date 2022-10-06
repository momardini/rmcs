<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static NOT_DEFINED()
 * @method static static PREGNANT()
 * @method static static BREASTFEEDING()
 */
final class FemaleStatus extends Enum implements LocalizedEnum
{
    const NOT_DEFINED =   0;
    const PREGNANT =   1;
    const BREASTFEEDING = 2;
}
