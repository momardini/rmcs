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
        AppointmentStatus::NEW_APPOINTMENT => 'موعد جديد',
        AppointmentStatus::SIGN_DONE => 'تم اخذ العلامات الحيوية ',
        AppointmentStatus::INTERVIEW_DONE => 'تم إجراء المقابلة',
        AppointmentStatus::INTERVIEW_CANCELED => 'تم إلغاء المقابلة',
    ],
    BloodType::class =>[
        BloodType::A_POSITIVE => 'A+',
        BloodType::B_POSITIVE => 'B+',
        BloodType::AB_POSITIVE => 'AB+',
        BloodType::O_POSITIVE => 'O+',
        BloodType::A_NEGATIVE => 'A-',
        BloodType::B_NEGATIVE => 'B-',
        BloodType::AB_NEGATIVE => 'AB-',
        BloodType::O_NEGATIVE => 'O-',
        BloodType::NOT_DEFINED => 'غير معرف',
    ],
    City::class =>[
        City::IDLIB => 'إدلب',
        City::HASAKA => 'الحسكة',
        City::RAKA => 'الرقة',
        City::SWIDAA => 'السويداء',
        City::LATAKIA => 'اللاذقية',
        City::HALAP => 'حلب',
        City::HAMA => 'حماه',
        City::HOMS => 'حمص',
        City::DARAA => 'درعا',
        City::DAIR_ALZOR => 'دير الزور',
        City::RIEF_DAMASCUS => 'ريف دمشق',
        City::TARTOUS => 'طرطوس',
        City::QONAITRA => 'القنيطرة',
        City:: DAMASCUS => '  دمشق',
        ],
    DiseaseType::class =>[
//        DiseaseType::NOT_DEFINED => 'غير معرف',
        DiseaseType::DIABETES_MELLITUS => 'السكرى',
        DiseaseType::HYPERTENSION => 'ارتفاع ضغط الدم',
        DiseaseType::HYPERCHOLESTEROLEMIA => 'فرط الكوليسترول',
    ],
    FemaleStatus::class =>[
        FemaleStatus::NOT_DEFINED => 'غير معرف',
        FemaleStatus::PREGNANT => 'حامل',
        FemaleStatus::BREASTFEEDING => 'مرضع',
    ],
    GenderType::class => [
        GenderType::MALE => 'ذكر',
        GenderType::FEMALE => 'انثى',
    ],
    MaritalType::class =>[
        MaritalType::SINGLE => 'اعزب / عزباء',
        MaritalType::MARRIED => 'متزوج \ متزوجة',
        MaritalType::DIVORCED => 'مطلقة',
//        MaritalType::NOT_DEFINED => 'غير معرف',
    ],
    PatientStatus::class => [
        PatientStatus::READY => 'جاهز',
        PatientStatus::IN_APPOINTMENT => 'ضمن المعاينة',
    ],
    PharmaceuticalForm::class =>[
        PharmaceuticalForm::PILLS => 'حبوب الدواء',
        PharmaceuticalForm::INTRAMUSCULAR_INJECTION => 'الحقن العضلي',
        PharmaceuticalForm::SUBCUTANEOUS_INJECTION => 'حقن تحت الجلد',
        PharmaceuticalForm::INTRAVENOUS_INJECTION => 'حقنة وريد .. الحقن في الوريد',
        PharmaceuticalForm::DRINKING_NEEDLES => 'إبر الشرب',
        PharmaceuticalForm::DROPS => 'قطرات',
        PharmaceuticalForm::MIXED_SERUM => 'مصل مختلط',
        PharmaceuticalForm::DIABETES_SERUM => 'مصل السكري',
        PharmaceuticalForm::SALINE_SERUM => 'مصل ملحي',
        PharmaceuticalForm::INTRAVENOUS => 'مقدمة',
        PharmaceuticalForm::DRINK => 'يشرب',
        PharmaceuticalForm::SUPPOSITORIES => 'تحاميل',
        PharmaceuticalForm::ARAZZAZ => 'ارزاز',
        PharmaceuticalForm::OINTMENT => 'مرهم',
        PharmaceuticalForm::CREAM => 'كريم',
        PharmaceuticalForm::POWDER => 'مسحوق',
        PharmaceuticalForm::NOSE_INHALE => 'استنشاق الأنف',
        PharmaceuticalForm::ORAL_INHALATION => 'استنشاق الفم',
        PharmaceuticalForm::DISSOLVED_IN_WATER => 'حل في الماء',
        PharmaceuticalForm::SPARKLING => 'متألق',
        PharmaceuticalForm::GREASE => 'شحم',
        PharmaceuticalForm::ANTISEPTIC_LOTION => 'غسول مطهر',
        PharmaceuticalForm::SHAMPOO => 'شامبو',
        PharmaceuticalForm::RINSE_MOUTH => 'شطف الفم',
        PharmaceuticalForm::EYE_DROPS => 'قطرات للعين',
        PharmaceuticalForm::EAR_DROP => 'قطرة الأذن',
    ],
    RepeatType::class =>[
        RepeatType::HALF_ONCE => 'نصف وحدة مرة واحدة',
        RepeatType::HALF_TWICE => 'نصف وحدة مرتين',
        RepeatType::ONE_ONCE => 'وحدة  مرة واحدة',
        RepeatType::ONE_TWICE => 'وحدة  مرتين',
        RepeatType::ONE_THREE_TIMES => 'وحدة  ثلاث مرات',
        RepeatType::ONE_FOUR_TIMES => 'وحدة  أربع مرات',
        RepeatType::ONE_FIVE_TIMES => 'وحدة  خمس مرات',
        RepeatType::ONE_SIX_TIMES => 'وحدة ست مرات',
    ],
    ScheduleType::class =>[
        ScheduleType::DAILY => 'يومياً',
        ScheduleType::MONTHLY => 'شهرياً',
    ],
];
