<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static NOT_DEFINED()
 * @method static static DIABETES_MELLITUS()
 * @method static static HYPERTENSION()
 * @method static static HYPERCHOLESTEROLEMIA()
 */
final class DiseaseType extends Enum implements LocalizedEnum
{
    const NOT_DEFINED =    0;
    const DIABETES_MELLITUS =   1;
    const HYPERTENSION = 2;
    const HYPERCHOLESTEROLEMIA = 3;
}
