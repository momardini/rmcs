<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static NEW_APPOINTMENT()
 * @method static static SIGN_DONE()
 * @method static static INTERVIEW_DONE()
 * @method static static INTERVIEW_CANCELED()
 * 
 */
final class AppointmentStatus extends Enum implements LocalizedEnum
{
    const NEW_APPOINTMENT = 1;
    const SIGN_DONE = 2;
    const INTERVIEW_DONE = 3;
    const INTERVIEW_CANCELED = 4;
}
