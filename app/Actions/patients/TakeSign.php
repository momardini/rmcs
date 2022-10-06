<?php

namespace App\Actions\patients;
use App\Actions\AbstractAction;
use App\Enums\AppointmentStatus;
use App\Models\Patient;

class TakeSign extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.takeSign');
    }
    public function getColor() : string{
        return 'orange';
    }
    public function getIcon(): string
    {
        return 'presentation-chart-bar';
    }
    public function getPolicy(Patient $oject) : bool
    {
        return ($oject->active_appointment && !$oject->active_sign);
    }
    public function getMethod():string
    {
        return 'take_sign';
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
