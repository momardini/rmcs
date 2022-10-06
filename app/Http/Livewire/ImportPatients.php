<?php

namespace App\Http\Livewire;

use App\Csv;
use App\Enums\City;
use App\Enums\GenderType;
use App\Enums\MaritalType;
use Validator;
use Livewire\Component;
use App\Models\Patient;
use Livewire\WithFileUploads;

class ImportPatients extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $upload;
    public $columns;
    public $fieldColumnMap = [
        'full_name' => '',
        'status' => '',
        'birth' => '',
    ];

    protected $rules = [
        'fieldColumnMap.full_name' => 'required|min:3',
        'fieldColumnMap.birth' => 'required',
    ];

    protected $customAttributes = [
        'fieldColumnMap.full_name' => 'full_name',
        'fieldColumnMap.birth' => 'birth',
    ];

    public function updatingUpload($value)
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv'],
        )->validate();
    }

    public function updatedUpload()
    {
        $this->columns = Csv::from($this->upload)->columns();

        $this->guessWhichColumnsMapToWhichFields();
    }

    public function import()
    {
        $this->validate();

        $importCount = 0;

        Csv::from($this->upload)
            ->eachRow(function ($row) use (&$importCount) {
                Patient::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;
            });

        $this->reset();

        $this->emit('refreshPatients');

        $this->notify('Imported '.$importCount.' patient!');
    }

    public function extractFieldsFromRow($row)
    {
        $attributes = collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })
            ->toArray();

        return $attributes + ['status' => 'success', 'date_for_editing' => now()];
    }

    public function guessWhichColumnsMapToWhichFields()
    {
        $guesses = [
            'full_name' => ['full_name', 'name'],
            'birth' => ['birth', 'age'],
            'status' => ['status', 'state'],
            'date_for_editing' => ['date_for_editing', 'date', 'time'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));

            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }
}
