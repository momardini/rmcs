<?php

namespace App\Actions\patients;

use App\Actions\AbstractAction;
use App\Models\Patient;

class EditSign extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.edit-sign');
    }
    public function getColor() : string{
        return 'teal';
    }
    public function getIcon(): string
    {
        return 'presentation-chart-bar';
    }

    public function getPolicy(Patient $oject) : bool
    {
        return isset($oject->active_sign);
    }
    public function getMethod()
    {
        return 'edit_sign';
    }
    public function getRoute($model='',$method='',$params){
        if (($model == '') || ($method == '')){
            return $this->getDefaultRoute();
        }else{
            return route('portal.'.$model.'.'.$method,['patient_id'=>$params]);
        }
    }
}
