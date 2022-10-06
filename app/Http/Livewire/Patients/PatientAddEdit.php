<?php

namespace App\Http\Livewire\Patients;
use App\Enums\PatientStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Enums\City;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use App\Models\Patient;
use BenSampo\Enum\Rules\EnumValue;
use Livewire\Component;
class PatientAddEdit extends Component
{
    public $is_edit;
    public Patient $editing;
    public $previous;
    public function rules() { return [
        'editing.full_name' => 'required|min:3',
        'editing.gender' => 'required|'.new EnumValue(GenderType::class),
        'editing.marital' => 'required|'.new EnumValue(GenderType::class) ,
        'editing.children' => 'numeric|min:0|max:30',
        'editing.work' => 'nullable',
        'editing.birth' => 'required',
        'editing.city' => 'required|'.new EnumValue(City::class),
        'editing.address' => 'nullable',
        'editing.blood_group' => 'nullable',
        'editing.phone' => 'nullable',
        'editing.birth_place' => 'nullable',
        'editing.previous_diseases' =>  'nullable',
        'editing.family_diseases' => 'nullable',
        'editing.allergies' => 'nullable',
        'editing.previous_surgery' => 'nullable',
        'editing.previous_accidents' => 'nullable',
    ]; }
    public function mount($is_edit,$patient) {
        $this->previous = URL::previous();
        if($is_edit){$this->editing = $patient; }
        else{$this->editing = $this->makeBlankPatient();}
    }

    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankPatient();
    }

    public function makeBlankPatient()
    {
        return Patient::make([
            'full_name' => '',
            'city' => City::IDLIB,
            'gender' => GenderType::MALE,
            'marital' => MaritalType::SINGLE,
            'children' => 0,
        ]);
    }
    public function edit(Patient $patient)
    {
        if ($this->editing->isNot($patient)) $this->editing = $patient;
    }

    public function save()
    {
        $this->validate();
        $notify_message = ['notify'=>'success','title'=>'Patient Edit Successfully'];
        if(!$this->is_edit){
            $this->editing->status = PatientStatus::READY;
            $this->editing->station_id = Auth::user()->station_id;
            $this->editing = Patient::updateOrCreate($this->editing->getAttributes());
            $notify_message = ['notify'=>'success','title'=>'Patient Created Successfully'];
        }
        if ($this->editing->save()){
            $this->editing = $this->makeBlankPatient();
            return redirect($this->previous)->with($notify_message);
        }else{
            return redirect($this->previous)->with(['notify'=>'error','title'=>'Error in Patient Editing']);
        }


    }
    public function cancel(){
        return redirect($this->previous);
    }
}
