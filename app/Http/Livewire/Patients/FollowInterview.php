<?php

namespace App\Http\Livewire\Patients;

use App\Events\AppointmentUpdated;
use App\Models\Appointment;
use App\Models\Interview;
use App\Models\Patient;
use App\Models\Sign;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use TCG\Voyager\Models\DataType;

class FollowInterview extends Component
{
    use WithFileUploads;
    public Patient $patient;
    public Appointment $editing;
    public $previous;
    public $docs = [];
    public $pdfRoute;
    public $patientDataRows;
    public $interviewRecipes;
    public $appointmentDocs = '[]';
    public $cardModal;
    public $pdfModal;
    public $activeDoc = ['type'=>'image','data'=>''];

    public function getListeners()
    {
        return [
            "AppointmentUpdatedLW:{$this->patient->active_appointment->id}" => 'AppointmentUpdatedLWfn',
            "UploadingFileProcess" ,
        ];
    }

    public function AppointmentUpdatedLWfn(Appointment $appointment){
        $this->editing = $appointment;
        $this->appointmentDocs = $appointment->docs;

    }
    public function rules()
    {
        return [
            'editing.docs.*' => 'sometimes',
        ];
    }

    public function saveDocs(){
        $docs_paths = [];
        foreach ($this->docs as $docs_file) $docs_paths[] = $docs_file->storePublicly('appointment_docs'.'/'.date('FY'),'public');
        $this->editing->update([
            'docs'=>json_encode($docs_paths),
        ]);
        $this->editing->docs = $this->patient->active_appointment->docs;
        event(new AppointmentUpdated($this->patient->active_appointment->id));
    }
    public function mount($dataType,$patient)
    {
        $this->pdfRoute= route('portal.pdf.show-default');
        $this->patientDataRows = DataType::where('slug', '=', 'patients')->first()->readRows;
        $this->editing = $patient->active_appointment;
        $this->editing->docs = $patient->active_appointment->docs;
        $this->patient = $patient;
        $this->previous = URL::previous();
        $this->appointmentDocs = $this->patient->active_appointment->docs;
    }
    public function setActiveImage($doc){
        $docType = get_headers($doc,1)["Content-Type"];
        if(str_contains($docType,'image')){
            $this->activeDoc['type'] = 'image';
        }
        elseif(str_contains($docType,'video')){
            $this->activeDoc['type'] = 'video';
        }else{
            $this->activeDoc['type'] = 'other';
        }
        $this->activeDoc['data'] = $doc;

    }
    public function showAnalyticResult(){
        $this->pdfRoute = route('portal.pdf.show-analytic-results', array('interview_id'=>$this->editing->interview->id));
    }
    public function showAnalyticRequest(){
        $this->pdfRoute = route('portal.pdf.show-analytic-request', array('interview_id'=>$this->editing->interview->id));
    }
    public function showRecipes(){
        $this->pdfRoute = route('portal.pdf.show-recipe-request', array('interview_id'=>$this->editing->interview->id));
    }
    public function showXrayRequest(){
        $this->pdfRoute = route('portal.pdf.show-xray-request', array('interview_id'=>$this->editing->interview->id));
    }
    public function showActionRequest(){
        $this->pdfRoute = route('portal.pdf.show-action-request', array('interview_id'=>$this->editing->interview->id));
    }
}
