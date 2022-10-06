<?php

namespace App\Http\Livewire\Patients;


use App\Models\Interview;
use App\Models\Patient;
use Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use TCG\Voyager\Models\DataType;
use WireUi\Traits\Actions;

class AnalyticsResultAddEdit extends Component
{
    use Actions;
    public $analyticDataRows;
    public $patientDataRows;
    public Patient $patient;
    public $oldInterviews;
    public $interviewAnalytics = [] ;
    public Interview $editingInterview;
    public $previous;
    public $cardModal;
    public $addAnalyticResultModal;
    public $printAnalyticResultModal;
    public function rules()
    {
        return [
            'interviewAnalytics.*.pivot.result' => 'nullable',
        ];
    }


    public function mount($patient)
    {
        $this->analyticResultsRoute= route('portal.pdf.show-default');
        $this->analyticDataRows = DataType::where('slug', '=', 'analytics')->first()->readRows;
        $this->patientDataRows = DataType::where('slug', '=', 'patients')->first()->readRows;
        $this->patient = $patient;
//        $this->oldInterviews = $patient->interviews()->where('appointments.station_id',Auth::user()->station_id)->get();
        $this->oldInterviews  = Interview::whereHas('analytics')->whereHas('appointment', function ($query) use ($patient) {
            return $query->where('station_id', Auth::user()->station_id)->where('patient_id','=',$patient->id);
        })->orderByDesc('created_at')->get();
        $this->previous = URL::previous();
    }
    public function addAnalyticResult($interview_id)
    {
        $this->editingInterview = Interview::find($interview_id);
        $this->interviewAnalytics = $this->editingInterview->analytics->toArray();
    }
    public function printAnalyticResult($interview_id){
        $this->analyticResultsRoute = route('portal.pdf.show-analytic-results', array('interview_id'=>$interview_id));
    }
    public function save()
    {
        $updatedData = [];
        foreach ($this->interviewAnalytics as $interviewAnalytic){
            $updatedData[$interviewAnalytic['id']] = ['result'=>$interviewAnalytic['pivot']['result']];
        }
        $this->editingInterview->analytics()->sync($updatedData);
        $this->addAnalyticResultModal = false;
        $this->notification()->success(
            $title = __('portal.patient.analytic-result-added-successfully')
        );
        $this->oldInterviews = $this->patient->interviews()->where('appointments.station_id',Auth::user()->station_id)->get();
    }
    public function cancel()
    {
        $this->addAnalyticResultModal = false;
        $this->printAnalyticResultModal = false;
    }
    public function reAssignInterviews(){

    }
}
