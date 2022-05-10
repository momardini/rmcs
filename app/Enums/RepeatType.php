<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static HALF_ONCE()
 * @method static static HALF_TWICE()
 * @method static static ONE_ONCE()
 * @method static static ONE_TWICE()
 * @method static static ONE_THREE_TIMES()
 * @method static static ONE_FOUR_TIMES()
 * @method static static ONE_FIVE_TIMES()
 * @method static static ONE_SIX_TIME()
 * @method static static TWO_TWICE()
 */
final class RepeatType extends Enum
{
    const HALF_ONCE =   1;
    const HALF_TWICE =   2;
    const ONE_ONCE = 3;
    const ONE_TWICE = 4;
    const ONE_THREE_TIMES = 5;
    const ONE_FOUR_TIMES = 6;
    const ONE_FIVE_TIMES = 9;
    const ONE_SIX_TIMES= 7;
    const TWO_TWICE = 8;
}
