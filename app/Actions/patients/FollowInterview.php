<?php

namespace App\Actions\patients;

use App\Actions\AbstractAction;
use App\Models\Patient;

class FollowInterview extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.follow-interview');
    }
    public function getColor() : string{
        return 'pink';
    }
    public function getIcon(): string
    {
        return 'refresh';
    }

    public function getPolicy(Patient $oject) : bool
    {
        return isset($oject->active_appointment);
    }
    public function getMethod()
    {
        return 'follow_interview';
    }
    public function getRoute($model='',$method='',$params){
        if (($model == '') || ($method == '')){
            return $this->getDefaultRoute();
        }else{
            return route('portal.'.$model.'.'.$method,['patient_id'=>$params]);
        }
    }
}
