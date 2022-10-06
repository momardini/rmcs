<?php

namespace App\Actions\patients;

use App\Actions\AbstractAction;
use App\Enums\AppointmentStatus;
use App\Enums\PatientStatus;
use App\Models\Patient;

class EditAppointment extends AbstractAction
{
    public function getTitle($obj){
        return (isset($obj->editable_appointment))?$obj->editable_appointment->login_time:'';
    }
    public function getColor() : string{
        return 'rose';
    }
    public function getIcon(): string
    {
        return 'clock';
    }

    public function getPolicy(Patient $oject) : bool
    {
        return isset($oject->editable_appointment ) && ! $oject->status->is(PatientStatus::READY);
    }
    public function getMethod()
    {
        return 'edit_appointment';
    }
    public function getRoute($model='',$method='',$params){
        if (($model == '') || ($method == '')){
            return $this->getDefaultRoute();
        }else{
            return route('portal.'.$model.'.'.$method,['patient_id'=>$params]);
        }
    }
}
