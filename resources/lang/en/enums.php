<?php

use App\Enums\AppointmentStatus;
use App\Enums\BloodType;
use App\Enums\City;
use App\Enums\DiseaseType;
use App\Enums\FemaleStatus;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use App\Enums\PatientStatus;
use App\Enums\PharmaceuticalForm;
use App\Enums\RepeatType;
use App\Enums\ScheduleType;

return [

    AppointmentStatus::class =>[
        AppointmentStatus::NEW_APPOINTMENT => 'new Appointment',
        AppointmentStatus::SIGN_DONE => 'SIGN_DONE',
        AppointmentStatus::INTERVIEW_DONE => 'INTERVIEW_DONE',
        AppointmentStatus::INTERVIEW_CANCELED => 'INTERVIEW_CANCELED',
    ],
    BloodType::class =>[
        BloodType::A_POSITIVE => 'A_POSITIVE',
        BloodType::B_POSITIVE => 'B_POSITIVE',
        BloodType::AB_POSITIVE => 'AB_POSITIVE',
        BloodType::O_POSITIVE => 'O_POSITIVE',
        BloodType::A_NEGATIVE => 'A_NEGATIVE',
        BloodType::B_NEGATIVE => 'B_NEGATIVE',
        BloodType::AB_NEGATIVE => 'AB_NEGATIVE',
        BloodType::O_NEGATIVE => 'O_NEGATIVE',
        BloodType::NOT_DEFINED => 'NOT_DEFINED',
    ],
    City::class =>[
        City::IDLIB => 'IDLIB',
        City::HASAKA => 'HASAKA',
        City::RAKA => 'RAKA',
        City::SWIDAA => 'SWIDAA',
        City::LATAKIA => 'LATAKIA',
        City::HALAP => 'HALAP',
        City::HAMA => 'HAMA',
        City::HOMS => 'HOMS',
        City::DARAA => 'DARAA',
        City::DAIR_ALZOR => 'DAIR_ALZOR',
        City::RIEF_DAMASCUS => 'RIEF_DAMASCUS',
        City::TARTOUS => 'TARTOUS',
        City::QONAITRA => 'QONAITRA',
        City:: DAMASCUS => ' DAMASCUS',
        ],
    DiseaseType::class =>[
//        DiseaseType::NOT_DEFINED => 'NOT_DEFINED',
        DiseaseType::DIABETES_MELLITUS => 'DIABETES_MELLITUS',
        DiseaseType::HYPERTENSION => 'HYPERTENSION',
        DiseaseType::HYPERCHOLESTEROLEMIA => 'HYPERCHOLESTEROLEMIA',
    ],
    FemaleStatus::class =>[
        FemaleStatus::NOT_DEFINED => 'NOT_DEFINED',
        FemaleStatus::PREGNANT => 'PREGNANT',
        FemaleStatus::BREASTFEEDING => 'BREASTFEEDING',
    ],
    GenderType::class => [
        GenderType::MALE => 'man',
        GenderType::FEMALE => 'women',
    ],
    MaritalType::class =>[
        MaritalType::SINGLE => 'SINGLE',
        MaritalType::MARRIED => 'MARRIED',
        MaritalType::DIVORCED => 'DIVORCED',
//        MaritalType::NOT_DEFINED => 'NOT_DEFINED',
    ],
    PatientStatus::class => [
        PatientStatus::READY => 'READY',
        PatientStatus::IN_APPOINTMENT => 'In Appointment',
    ],
    PharmaceuticalForm::class =>[
        PharmaceuticalForm::PILLS => 'PILLS',
        PharmaceuticalForm::INTRAMUSCULAR_INJECTION => 'INTRAMUSCULAR_INJECTION',
        PharmaceuticalForm::SUBCUTANEOUS_INJECTION => 'SUBCUTANEOUS_INJECTION',
        PharmaceuticalForm::INTRAVENOUS_INJECTION => 'INTRAVENOUS_INJECTION',
        PharmaceuticalForm::DRINKING_NEEDLES => 'DRINKING_NEEDLES',
        PharmaceuticalForm::DROPS => 'DROPS',
        PharmaceuticalForm::MIXED_SERUM => 'MIXED_SERUM',
        PharmaceuticalForm::DIABETES_SERUM => 'DIABETES_SERUM',
        PharmaceuticalForm::SALINE_SERUM => 'SALINE_SERUM',
        PharmaceuticalForm::INTRAVENOUS => 'INTRAVENOUS',
        PharmaceuticalForm::DRINK => 'DRINK',
        PharmaceuticalForm::SUPPOSITORIES => 'SUPPOSITORIES',
        PharmaceuticalForm::ARAZZAZ => 'ARAZZAZ',
        PharmaceuticalForm::OINTMENT => 'OINTMENT',
        PharmaceuticalForm::CREAM => 'CREAM',
        PharmaceuticalForm::POWDER => 'POWDER',
        PharmaceuticalForm::NOSE_INHALE => 'NOSE_INHALE',
        PharmaceuticalForm::ORAL_INHALATION => 'ORAL_INHALATION',
        PharmaceuticalForm::DISSOLVED_IN_WATER => 'DISSOLVED_IN_WATER',
        PharmaceuticalForm::SPARKLING => 'SPARKLING',
        PharmaceuticalForm::GREASE => 'GREASE',
        PharmaceuticalForm::ANTISEPTIC_LOTION => 'ANTISEPTIC_LOTION',
        PharmaceuticalForm::SHAMPOO => 'SHAMPOO',
        PharmaceuticalForm::RINSE_MOUTH => 'RINSE_MOUTH',
        PharmaceuticalForm::EYE_DROPS => 'EYE_DROPS',
        PharmaceuticalForm::EAR_DROP => 'EAR_DROP',
    ],
    RepeatType::class =>[
        RepeatType::HALF_ONCE => 'HALF_ONCE',
        RepeatType::HALF_TWICE => 'HALF_TWICE',
        RepeatType::ONE_ONCE => 'ONE_ONCE',
        RepeatType::ONE_TWICE => 'ONE_TWICE',
        RepeatType::ONE_THREE_TIMES => 'ONE_THREE_TIMES',
        RepeatType::ONE_FOUR_TIMES => 'ONE_FOUR_TIMES',
        RepeatType::ONE_FIVE_TIMES => 'ONE_FIVE_TIMES',
        RepeatType::ONE_SIX_TIMES => 'ONE_SIX_TIMES',
    ],
    ScheduleType::class =>[
        ScheduleType::DAILY => 'DAILY',
        ScheduleType::MONTHLY => 'MONTHLY',
    ],
];
