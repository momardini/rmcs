<?php

namespace App\Http\Livewire\Patients;

use Livewire\Component;

class Recipes extends Component
{
//    public function render()
//    {
//        return view('livewire.patients.recipes');
//    }
    public $inputs = [];
    public $i = 1;
    protected $rules = [
        'user.username' => 'max:24',
        'user.about' => 'max:140',
        'user.birthday' => 'sometimes',
        'upload' => 'nullable|image|max:1000',
    ];
    public function mount() { $this->user = auth()->user(); }
    public function addRecipe($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
    public function removeRecipe($i)
    {
        unset($this->inputs[$i]);
    }
    private function resetInputFields(){
        $this->name = '';
        $this->phone = '';
    }
    public function store()
    {
        $this->validate([
            'name.0' => 'required',
            'phone.0' => 'required',
            'name.*' => 'required',
            'phone.*' => 'required',
        ],
            [
                'name.0.required' => 'name field is required',
                'phone.0.required' => 'phone field is required',
                'name.*.required' => 'name field is required',
                'phone.*.required' => 'phone field is required',
            ]
        );

        foreach ($this->name as $key => $value) {
            Contact::create(['name' => $this->name[$key], 'phone' => $this->phone[$key]]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Contact Has Been Created Successfully.');
    }
}
