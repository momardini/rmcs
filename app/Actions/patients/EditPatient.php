<?php

namespace App\Actions\patients;

use App\Actions\AbstractAction;

class EditPatient extends AbstractAction
{
    public function getTitle($obj){
        return __('portal.patient.edit');
    }
    public function getIcon(): string
    {
        return 'user    ';
    }

    public function getColorClass() : string{
        return 'text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2';
    }
    public function getPolicy($oject) : bool
    {
        return true;
    }
    public function getMethod()
    {
        return 'edit';
    }
}
