<?php
namespace App\Http\Livewire\Patients;

use App\Enums\BloodType;
use App\Enums\City;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use App\Models\Station;
use BenSampo\Enum\Rules\EnumValue;
use Livewire\Component;
use App\Models\Patient;
use Illuminate\Support\Carbon;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use TCG\Voyager\Models\DataType;

class PatientsTable extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;
    public $showDeleteModal = false;
    public $patientDataRows;
    public $s = '';
    public $filters = [
        'search' => '',
        'gender' => null,
        'marital' => null,
        'birth' => null,
        'city' => null,
        'phone' => null,
        'birth_place' => null,
        'blood_type' => null,
        'station_id' => null,
        'children' => null,
        'created_at' => null,
    ];
    protected $queryString = ['sorts','s' => ['except' => '']];

    protected $listeners = ['refreshPatients' => '$refresh'];

    public function rules(): array
    {
        return [
            'editing.full_name' => 'required|min:3',
            'editing.gender' => 'required|' . new EnumValue(GenderType::class),
            'editing.marital' => 'required|in:' . new EnumValue(MaritalType::class),
            'editing.children' => 'required|min:0|max:20',
            'editing.work' => 'nullable',
            'editing.birth' => 'required',
            'editing.birth' => 'required',
            'editing.city' => 'required|' . new EnumValue(City::class),
            'editing.address' => 'nullable',
            'editing.blood_group' => 'nullable',
            'editing.phone' => 'nullable',
            'editing.birth_place' => 'nullable',
            'editing.previous_diseases' => 'nullable',
            'editing.family_diseases' => 'nullable',
            'editing.allergies' => 'nullable',
            'editing.previous_surgery' => 'nullable',
            'editing.previous_accidents' => 'nullable',
        ];
    }

    public function mount()
    {
        $this->patientDataRows = DataType::where('slug', '=', 'patients')->first()->readRows;
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'patient' . date('Y-m-d-s') . '.csv');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('You\'ve deleted ' . $deleteCount . ' patient');
    }



    public function resetFilters()
    {
        $this->reset('filters');
    }
    public function resetSearch()
    {
        $this->reset('s');
    }

    public function getRowsQueryProperty()
    {
        $query = Patient::query()
            ->with(['editable_appointment','active_appointment','active_sign','station'])
            ->orderBy('updated_at','DESC')
            ->when($this->filters['gender'], fn($query, $gender) => $query->where('gender', $gender))
            ->when($this->filters['marital'], fn($query, $marital) => $query->where('marital', $marital))
            ->when($this->filters['birth'], fn($query, $birth) => $query->whereDate('birth', '>=', Carbon::parse($birth)))
            ->when($this->filters['created_at'], fn($query, $created_at) => $query->whereDate('created_at', '>=', Carbon::parse($created_at)))
            ->when($this->filters['city'], fn($query, $city) => $query->where('city', $city))
            ->when($this->filters['phone'], fn($query, $phone) => $query->where('phone', 'like', '%' . $phone . '%'))
            ->when($this->filters['blood_type'], fn($query, $blood_type) => $query->where('blood_type', $blood_type))
            ->when($this->filters['station_id'], fn($query, $station_id) => $query->where('station_id', $station_id))
            ->when($this->filters['children'], fn($query, $children) => $query->where('children', $children))
            ->when($this->s, fn($query, $search) => $query->where('full_name', 'like', '%' . $search . '%')->orWhere('id', 'like', '%' . $search . '%'));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('livewire.patients.patients-table', [
            'patients' => $this->rows,
        ]);
    }
}
