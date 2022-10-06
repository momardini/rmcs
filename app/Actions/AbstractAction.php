<?php

namespace App\Actions;

use App\Models\Patient;

abstract class AbstractAction
{

    public function getTitle($obj){
        return 'title';
    }
    public function getColor() : string{
        return 'primary';
    }
    public function getIcon(): string{
        return 'pencil';
    }
    public function getPolicy(Patient $oject)
    {
        return false;
    }
    public function getMethod()
    {
        return '';
    }
    public function getRoute($model='',$method='',$params){
        if (($model == '') || ($method == '')){
            return $this->getDefaultRoute();
        }else{
            return route('portal.'.$model.'.'.$method,['id'=>$params]);
        }
    }
    public function getDefaultRoute(){
        return route('portal.patients.index');
    }

}
