<?php
namespace App\Http\Livewire\Patients;

use App\Enums\AppointmentStatus;
use App\Enums\PatientStatus;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\Appointment;
use Livewire\Component;

class AppointmentAddEdit extends Component
{

    public $is_edit;
    public Appointment $editing;
    public Patient $patient;
    public $previous;
    public $clinics;
    public $doctors;
    protected $listeners = [
        'queryToParent'
    ];
    public function rules()
    {
        return [
            'editing.doctor_id' => 'required|exists:users,id',
            'editing.clinic_id' => 'required|exists:clinics,id',
            'editing.login_time' => 'nullable',
            'editing.complaint' => 'required',
        ];
    }

    public function mount($is_edit, $appointment,$patient)
    {
        $this->patient = $patient;
        $this->clinics = Clinic::all();
        $this->doctors = User::todayActiveDoctor()->get();
        $this->previous = URL::previous();
        if ($is_edit) {
            $this->editing = $appointment;
        } else {
            $this->editing = $this->makeBlankAppointment();
        }
    }
    public function queryToParent($params)
    {
        $this->editing[$params['fieldName']] = $params['fieldValue'];
    }
    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankAppointment();
    }

    public function makeBlankAppointment()
    {
        return Appointment::make([
            'doctor_id' => 0,
            'clinic_id' => 0,
            'login_time' => Carbon::now()->format('g:i'),
            'complaint' => '',
        ]);
    }

    public function edit(Appointment $appointment)
    {
        if ($this->editing->isNot($appointment)) $this->editing = $appointment;
    }

    public function save()
    {
        $this->validate();
        $notify_message = ['notify' => 'success', 'title' => 'Appointment Edit Successfully'];
        if (!$this->is_edit) {
            $this->editing->patient_id = $this->patient->id;
            $this->editing->status = AppointmentStatus::NEW_APPOINTMENT;
            $this->editing->station_id = Auth::user()->station_id;
            $this->editing->reception_id  = Auth::user()->id;
            $this->editing = Appointment::updateOrCreate($this->editing->getAttributes());
            $this->editing->patient()->update(['status' => PatientStatus::IN_APPOINTMENT]);
            $notify_message = ['notify' => 'success', 'title' => 'Appointment Created Successfully'];
        }
        if ($this->editing->save()) {
            $this->editing = $this->makeBlankAppointment();
            return redirect($this->previous)->with($notify_message);
        } else {
            return redirect($this->previous)->with(['notify' => 'error', 'title' => 'Error in Appointment Editing']);
        }


    }

    public function cancel()
    {
        return redirect($this->previous);
    }
}
