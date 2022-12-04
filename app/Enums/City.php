<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static IDLIB()
 * @method static static HASAKA()
 * @method static static RAKA()
 * @method static static SWIDAA()
 * @method static static LATAKIA()
 * @method static static HALAP()
 * @method static static HAMA()
 * @method static static HOMS()
 * @method static static DARAA()
 * @method static static DAIR_ALZOR()
 * @method static static RIEF_DAMASCUS()
 * @method static static TARTOUS()
 * @method static static QONAITRA()
 * @method static static  DAMASCUS()
 */
final class City extends Enum implements LocalizedEnum
{
    const IDLIB =   1;
    const HASAKA =   2;
    const RAKA = 3;
    const SWIDAA = 4;
    const LATAKIA = 5;
    const HALAP = 6;
    const HAMA = 7;
    const HOMS = 8;
    const DARAA = 9;
    const DAIR_ALZOR = 10;
    const RIEF_DAMASCUS = 11;
    const TARTOUS = 12;
    const QONAITRA = 13;
    const  DAMASCUS = 14;
}

