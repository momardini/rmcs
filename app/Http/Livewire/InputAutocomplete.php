<?php

namespace App\Http\Livewire;

use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class InputAutocomplete extends Component
{
    public $placeholder='';
    public $modelName='';
    public $modelValue='';
    public $query= '';
    public array $items = [];
    public int $selectedItem = 0;
    public int $highlightIndex = 0;
    public bool $showDropdown;
    public string $fieldName;
    public $model;

    public function mount($model,$fieldName)
    {
        $this->reset();
        $this->query = $this->modelValue;
        $this->showDropdown = !!empty($this->modelValue);
        $this->fieldName = $fieldName;
        $this->model = new  $model();

    }

    public function reset(...$properties)
    {
        $this->items = [];
        $this->highlightIndex = 0;
        $this->query = '';
        $this->selectedItem = 0;
        $this->showDropdown = true;
    }

    public function hideDropdown()
    {
        $this->showDropdown = false;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->items) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->items) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectItem($id = null)
    {
        $id = $id ?: $this->highlightIndex;

        $item = $this->items[$id] ?? null;

        if ($item) {
            $this->showDropdown = true;
            $this->query = $item[$this->fieldName];
            $this->emitUp('queryToParent',['fieldName'=>$this->fieldName,'fieldValue'=>$item[$this->fieldName]]);
            $this->selectedItem = $item['id'];
        }
    }

    public function updatedQuery()
    {
        $this->items = $this->model::where($this->fieldName, 'like', '%' . $this->query. '%')
            ->get(['id',$this->fieldName])->unique($this->fieldName)->take(5)
            ->toArray();
        if (empty($this->items)){
            $this->emitUp('queryToParent',['fieldName'=>$this->fieldName,'fieldValue'=>$this->query]);
            $this->items = [["id" => 1,"complaint" => $this->query]];
        }
    }

    public function render()
    {
        return view('vendor.wireui.components.inputautocomplete');
    }
}
