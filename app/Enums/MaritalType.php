<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SINGLE()
 * @method static static MARRIED()
 * @method static static DIVORCED()
 * @method static static NOT_DEFINED()
 */
final class MaritalType extends Enum
{
    const SINGLE =   1;
    const MARRIED =   2;
    const DIVORCED = 3;
    const NOT_DEFINED = 4;
}
