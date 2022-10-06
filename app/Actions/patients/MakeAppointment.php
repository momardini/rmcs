<?php

namespace App\Actions\patients;
use App\Actions\AbstractAction;
use App\Enums\PatientStatus;
use App\Models\Patient;

class MakeAppointment extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.make_appointment');
    }
    public function getColor() : string{
        return 'violet';
    }
    public function getIcon(): string
    {
        return 'clock';
    }

    public function getPolicy(Patient $oject) : bool
    {
        return !isset($oject->editable_appointment) ;
    }
    public function getMethod():string
    {
        return 'make_appointment';
    }
    public function getRoute($model='',$method='',$params):string
    {
        if (($model == '') || ($method == '')){
            return $this->getDefaultRoute();
        }else{
            return route('portal.'.$model.'.'.$method,['patient_id'=>$params]);
        }
    }
}
