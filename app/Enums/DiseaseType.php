<?php

namespace App\Enums;

use BenSampo\Enum\FlaggedEnum;

/**
 * @method static static NOT_DEFINED()
 * @method static static DIABETES_MELLITUS()
 * @method static static HYPERTENSION()
 * @method static static HYPERCHOLESTEROLEMIA()
 */
final class DiseaseType extends FlaggedEnum
{
    const NOT_DEFINED =   1 << 0;
    const DIABETES_MELLITUS =   1 << 1;
    const HYPERTENSION = 1 << 2;
    const HYPERCHOLESTEROLEMIA = 1 << 3;
}
