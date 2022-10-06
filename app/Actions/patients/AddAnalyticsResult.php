<?php

namespace App\Actions\patients;
use App\Actions\AbstractAction;
use App\Enums\PatientStatus;
use App\Models\Patient;

class AddAnalyticsResult extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.add-analytic-results') ;
    }
    public function getColor() : string{
        return 'sky';
    }
    public function getIcon(): string
    {
        return 'beaker';
    }

    public function getPolicy(Patient $oject) : bool
    {
        return (count($oject->interviews) && count($oject->analytics) );//(isset($oject->active_appointment->interview->analytics));//&& $oject->active_appointment->doctor_id == \Auth::user()->id
    }
    public function getMethod():string
    {
        return 'add_analytics_result';
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
