<div>
    <div class="flex flex-wrap items-end justify-center space-x-4 space-y-4">
        <div class="flex-auto sm:w-3/12">
            <x-input type="text" :label="$recipeDataRows->where('field','medicine_title')->first()->getTranslatedAttribute('display_name')"
                     :placeholder="$recipeDataRows->where('field','medicine_title')->first()->getTranslatedAttribute('display_name')"
                     wire:model.defer="editing.medicine_title"/>
        </div>
        <div class="flex-auto sm:w-2/12">
            <x-select
                :placeholder="$recipeDataRows->where('field','repeats')->first()->getTranslatedAttribute('display_name')"
                wire:model.defer="editing.repeats"
            >
                @foreach (\App\Enums\RepeatType::getInstances() as  $repeat )
                    <x-select.option label="{{ $repeat->description }}" value="{{ $repeat->value }}"/>
                @endforeach
            </x-select>
        </div>
        <div class="flex-auto sm:w-2/12">
            <x-select
                :placeholder="$recipeDataRows->where('field','pharmaceutical_form')->first()->getTranslatedAttribute('display_name')"
                wire:model.defer="editing.pharmaceutical_form"
            >
                @foreach (\App\Enums\PharmaceuticalForm::getInstances() as  $pharmaceutical_form )
                    <x-select.option label="{{ $pharmaceutical_form->description }}" value="{{ $pharmaceutical_form->value }}"/>
                @endforeach
            </x-select>

        </div>
        <div class="flex-auto sm:w-1/12">
            <x-input type="number" :label="$recipeDataRows->where('field','count')->first()->getTranslatedAttribute('display_name')"
                     :placeholder="$recipeDataRows->where('field','count')->first()->getTranslatedAttribute('display_name')"
                     wire:model.defer="editing.count"/>
        </div>
        <div class="flex-auto sm:w-3/12">
            <x-input type="text" :label="$recipeDataRows->where('field','note')->first()->getTranslatedAttribute('display_name')"
                     :placeholder="$recipeDataRows->where('field','note')->first()->getTranslatedAttribute('display_name')"
                     wire:model.defer="editing.note"/>
        </div>
        <div class="flex-auto">
            <x-button.circle negative icon="x" wire:click="removeRecipe()"/>
        </div>
    </div>
        <x-slot name="footer">
            <x-button primary label="Add Recipe" wire:click="addRecipe()"/>
        </x-slot>

    </div>
</div>
