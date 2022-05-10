<?php

use App\Enums\DiseaseType;
use App\Enums\PatientStatus;

return [

    PatientStatus::class => [
        PatientStatus::READY => 'READY',
        PatientStatus::IN_APPOINTMENT => 'In Appointment',
    ],

];