<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static DAILY()
 * @method static static MONTHLY()
 */
final class ScheduleType extends Enum
{
    const DAILY =   1;
    const MONTHLY =   2;
}
