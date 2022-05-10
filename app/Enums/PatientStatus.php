<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static READY()
 * @method static static IN_APPOINTMENT()
 * @method static static BLOCKED()
 */
final class PatientStatus extends Enum implements LocalizedEnum
{
    const READY =   1;
    const IN_APPOINTMENT = 2;
    const BLOCKED = 3;
}
