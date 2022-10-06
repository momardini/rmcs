<?php

namespace App\Http\Livewire\Patients;

use App\Enums\AppointmentStatus;
use App\Enums\PatientStatus;
use App\Enums\PharmaceuticalForm;
use App\Enums\RepeatType;
use App\Events\AppointmentUpdated;
use App\Models\Analytic;
use App\Models\Appointment;
use App\Models\Interview;
use App\Models\Patient;
use App\Models\Recipe;
use App\Models\Sign;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use TCG\Voyager\Models\DataType;

class InterviewAddEdit extends Component
{
    use WithFileUploads;
    public $is_edit;
    public $interviewDataRows;
    public $signDataRows;
    public $patientDataRows;
    public Interview $editing;
    public Patient $patient;
    public Sign $sign;
    public $oldInterviews;
    public $previous;
    public $docs = [];
    public $appointmentDocs = '[]';
    public $cardModal;
    public $analyticModal;
    public $analyticResultModal;
    public $activeDoc = ['type'=>'image','data'=>''];
    public $interviewRecipes = [];
    public $repeats = [];
    public $pharmaceutical_form = [];
    public $analytics;
    public $selectedAnalytics = [];
    public $analyticResultsRoute;

    public function getListeners()
    {
        return [
            "AppointmentUpdatedLW:{$this->patient->active_appointment->id}" => 'AppointmentUpdatedLWfn',
            "UploadingFileProcess" ,
        ];
    }
    public function AppointmentUpdatedLWfn(Appointment $appointment){
        $this->appointmentDocs = $appointment->docs;
//        \Validator::make(['docs'=>$appointment->docs],['docs'=>'array'])->validate();
    }
    public function rules()
    {
        return [
            'editing.clinical_examination' => 'nullable',
            'editing.impression' => 'nullable',
            'editing.action_request' => 'nullable',
            'editing.xray_request' => 'nullable',
            'editing.note' => 'nullable',
            'editing.discovered' => 'nullable',
            'editing.docs.*' => 'sometimes',
            'selectedAnalytics' => 'nullable',
        ];
    }
        public function updatedDocs($value)
    {
        $docs_paths = [];
        foreach ($value as $docs_file) $docs_paths[] = $docs_file->storePublicly('appointment_docs'.'/'.date('FY'),'public');
        $oldDocs = (isset($this->patient->active_appointment->docs))?$this->patient->active_appointment->docs:'[]';

        $this->patient->active_appointment->update([
            'docs'=>json_encode(array_merge(json_decode($oldDocs),$docs_paths)),
        ]);
        $this->editing->docs = json_decode($this->patient->active_appointment->docs);
        event(new AppointmentUpdated($this->patient->active_appointment->id));
    }
    public function mount($is_edit, $interview,$dataType,$patient)
    {
        $this->analyticResultsRoute= route('portal.pdf.show-default');
        $this->interviewDataRows = $dataType->readRows;
        $this->signDataRows = DataType::where('slug', '=', 'signs')->first()->readRows;
        $this->patientDataRows = DataType::where('slug', '=', 'patients')->first()->readRows;
        $this->recipeDataRows = DataType::where('slug', '=', 'recipes')->first()->readRows;
        $this->patient = $patient;
        $this->sign = $patient->active_sign;
        foreach (RepeatType::getInstances() as  $repeat ){
            array_push($this->repeats,['name'=>$repeat->description,'id'=>$repeat->value]);
        }
        foreach (PharmaceuticalForm::getInstances() as  $ph_form ){
            array_push($this->pharmaceutical_form,['name'=>$ph_form->description,'id'=>$ph_form->value]);
        }
        $this->analytics = Analytic::all();
        $this->previous = URL::previous();
        $this->appointmentDocs = $this->patient->active_appointment->docs;
        if ($is_edit) {
            $this->oldInterviews = $patient->interviews->except($interview->id);
            $this->editing = $interview;
            $this->editing->docs = json_decode($interview->docs);
//            $this->selectedAnalytics = $interview->analytics;
            foreach ($interview->analytics as $sAnalaytic){
                $this->selectedAnalytics [$sAnalaytic->id] = json_encode($sAnalaytic);
            }
            $this->interviewRecipes = $interview->recipes->toArray();

        } else {
            $this->oldInterviews = $patient->interviews;
            $this->editing = $this->makeBlankInterview();
        }
    }
    public function makeBlankInterview()
    {
        return Interview::make([]);
    }
    private function makeBlankRecipe(){
        return Recipe::make([]);
    }
    public function removeRecipe($index)
    {
        unset($this->interviewRecipes[$index]);
        $this->interviewRecipes = array_values($this->interviewRecipes);
    }
    public function removeAnalytic($index){
        unset($this->selectedAnalytics[$index]);
        $this->selectedAnalytics = array_values($this->selectedAnalytics);
    }
    public function addRecipe()
    {
        $this->interviewRecipes[] = $this->makeBlankRecipe();

    }
    public function save()
    {
        $this->validate();
        $notify_message = ['notify' => 'success', 'title' => 'Interview Edit Successfully'];
        if (!$this->is_edit) {
            $this->editing->appointment_id = $this->patient->active_appointment->id;
            $this->editing = Interview::updateOrCreate($this->editing->getAttributes());
            $this->editing->appointment()->update(['status' => AppointmentStatus::INTERVIEW_DONE]);
            $this->editing->appointment->patient()->update(['status' => PatientStatus::READY]);
            $notify_message = ['notify' => 'success', 'title' => 'Interview Created Successfully'];
        }
        if ($this->editing->save()) {
//            save or update docs
            $docs_paths = [];
            foreach ($this->docs as $docs_file) $docs_paths[] = $docs_file->storePublicly('interview_docs'.'/'.date('FY'),'public');

            $this->editing->update([
                'docs'=>json_encode($docs_paths),
            ]);

//            save or update analytics
            $selectedAnalyticIds = [];

            foreach ($this->selectedAnalytics as $analytic) {
                if(json_decode($analytic))$selectedAnalyticIds[] = json_decode($analytic)->id;
            }
            $this->editing->analytics()->sync($selectedAnalyticIds);
//            save or update recipes
            if (!$this->is_edit) {
                foreach ($this->interviewRecipes as $recipe){
                    if (isset($recipe['medicine_title'])){
                        $this->editing->recipes()->create($recipe);
                    }
                }
            }else{
                $oldRecipes = $this->editing->recipes;
                $newIds = array_column($this->interviewRecipes,'id');
                $oldIds = $oldRecipes->pluck('id')->toArray();
                $toDeleteIds = array_values(array_diff($oldIds, $newIds));
                foreach ($this->interviewRecipes as $recipe){
                    if (isset($recipe['id']) && in_array($recipe['id'],$oldIds)){
                        $oldRecipes->firstWhere('id',$recipe['id'])->update($recipe);
                    }else{
                        if (isset($recipe['medicine_title']))
                        $this->editing->recipes()->create($recipe);
                    }
                }
                foreach ($toDeleteIds as $deleteId){
                    $oldRecipes->firstWhere('id',$deleteId)->delete();
                }
            }
            $this->editing = $this->makeBlankInterview();
            event(new AppointmentUpdated($this->patient->active_appointment->id));

            return redirect($this->previous)->with($notify_message);
        } else {
            return redirect($this->previous)->with(['notify' => 'error', 'title' => 'Error in Interview Editing']);
        }


    }
    public function cancel()
    {
        $this->analyticModal = false;
        $this->analyticResultModal = false;
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
        $this->analyticResultsRoute = route('portal.pdf.show-analytic-results', array('interview_id'=>$this->editing->id));
    }
}
