<?php

namespace App\Http\Livewire\Patients;

use App\Enums\AppointmentStatus;
use App\Enums\FemaleStatus;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Sign;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;

class SignAddEdit extends Component
{
    use WithFileUploads;

    public $is_edit;
    public Sign $editing;
    public Patient $patient;
    public $previous;
    public $skins = [];
    public $ecg = [];
    public $docs = [];
    public function rules()
    {
        return [
            'editing.systolic_blood_pressure' => 'nullable|integer|between:80,200',
            'editing.diastolic_blood_pressure' => 'nullable|integer|between:40,200',
            'editing.heartbeat' => 'nullable|integer|between:40,200',
            'editing.temperature' => 'nullable|integer|between:30,50',
            'editing.weight' => 'nullable|integer|between:0,300',
            'editing.length' => 'nullable|integer|between:5,250',
            'editing.waistline' => 'nullable|integer',
            'editing.breathing' => 'nullable|integer',
            'editing.oxygen' => 'nullable',
            'editing.peak_expiratory_flow' => 'nullable',
            'editing.sugar' => 'nullable',
            'editing.female_status' => 'nullable',
            'editing.skins.*' => 'sometimes',
            'editing.ecg.*' => 'sometimes',
            'editing.docs.*' => 'sometimes',
            'editing.comment' => 'nullable',
        ];
    }
    public function mount($is_edit, $sign,$patient)
    {
        $this->patient = $patient;

        $this->previous = URL::previous();
        if ($is_edit) {
            $this->editing = $sign;
            $this->editing->ecg = json_decode($sign->ecg);
            $this->editing->skins = json_decode($sign->skins);
            $this->editing->docs = json_decode($sign->docs);
        } else {
            $this->editing = $this->makeBlankSign();
        }
    }
    public function makeBlankSign()
    {
        return Sign::make([
            'systolic_blood_pressure' => null,
            'diastolic_blood_pressure'  => null,
            'heartbeat'  => null,
            'temperature'  => null,
            'weight'  => null,
            'length'  => null,
            'waistline'  => null,
            'breathing'  => null,
            'oxygen'  => null,
            'peak_expiratory_flow'  => null,
            'sugar'  => null,
            'comment'  => null,
        ]);
    }
    public function updated($name, $value)
    {
        if ( $value == '' ) data_set($this, $name, null);
    }
    public function save()
    {
        $this->validate();
        $notify_message = ['notify' => 'success', 'title' => 'Sign Edit Successfully'];
        if (!$this->is_edit) {
            $this->editing->appointment_id = $this->patient->active_appointment->id;
            $this->editing->nurse_id  = Auth::user()->id;
            $this->editing->patient_id = $this->patient->id;
            $this->editing = Sign::updateOrCreate($this->editing->getAttributes());
            $this->editing->appointment()->update(['status' => AppointmentStatus::SIGN_DONE]);
            $notify_message = ['notify' => 'success', 'title' => 'Sign Created Successfully'];
        }
        if ($this->editing->save()) {
            $ecg_paths = $skins_paths = $docs_paths = [];
            foreach ($this->ecg as $ecg_file) $ecg_paths[] = $ecg_file->storePublicly('ecg'.'/'.date('FY'),'public');
            foreach ($this->skins as $skins_file) $skins_paths[] = $skins_file->storePublicly('skins'.'/'.date('FY'),'public');
            foreach ($this->docs as $docs_file) $docs_paths[] = $docs_file->storePublicly('docs'.'/'.date('FY'),'public');

            $this->editing->update([
                'ecg'=>json_encode($ecg_paths),
                'skins'=>json_encode($skins_paths),
                'docs'=>json_encode($docs_paths),
            ]);
            $this->editing = $this->makeBlankSign();
            return redirect($this->previous)->with($notify_message);
        } else {
            return redirect($this->previous)->with(['notify' => 'error', 'title' => 'Error in Sign Editing']);
        }


    }
    public function cancel()
    {
        return redirect($this->previous);
    }
}
