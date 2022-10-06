<?php

namespace App\Actions\patients;
use App\Actions\AbstractAction;
use App\Enums\PatientStatus;
use App\Models\Patient;

class EditInterview extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.editInterview') ;
    }
    public function getColor() : string{
        return 'rose';
    }
    public function getIcon(): string
    {
        return 'video-camera';
    }

    public function getPolicy(Patient $oject) : bool
    {
        return (isset($oject->active_appointment) && $oject->status->is(PatientStatus::READY) );//&& $oject->active_appointment->doctor_id == \Auth::user()->id
    }
    public function getMethod():string
    {
        return 'edit_interview';
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
