<div class="container mx-auto pt-5">
    <x-card :title="__('voyager::generic.'.($is_edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular')" :color="'primary-500'">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-5 gap-2 w-full m-auto">

                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.full_name"
                             label="{{$dataType->readRows->where('field','full_name')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','full_name')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-datetime-picker
                        without-timezone
                        without-time
                        label="{{$dataType->readRows->where('field','birth')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','birth')->first()->getTranslatedAttribute('display_name')}}"
                        wire:model.defer="editing.birth"
                        :min="now()->subYear(100)"
                        :max="now()->subDays(1)"
                    />
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-native-select
                        label="{{$dataType->readRows->where('field','gender')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','gender')->first()->getTranslatedAttribute('display_name')}}"
                        :options="\App\Enums\GenderType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.gender"
                    />
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-native-select
                        label="{{$dataType->readRows->where('field','marital')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','marital')->first()->getTranslatedAttribute('display_name')}}"
                        :options="\App\Enums\MaritalType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.marital"
                    />
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input type="number" min='1' max="30"
                             label="{{$dataType->readRows->where('field','children')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','children')->first()->getTranslatedAttribute('display_name')}}"
                             wire:model.defer="editing.children"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-native-select
                        label="{{$dataType->readRows->where('field','city')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','city')->first()->getTranslatedAttribute('display_name')}}"
                        :options="\App\Enums\City::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.city"
                    />
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.address"
                             label="{{$dataType->readRows->where('field','address')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','address')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.birth_place"
                             label="{{$dataType->readRows->where('field','birth_place')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','birth_place')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.work"
                             label="{{$dataType->readRows->where('field','work')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','work')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-inputs.phone
                        label="{{$dataType->readRows->where('field','phone')->first()->getTranslatedAttribute('display_name')}}"

                        wire:model.defer="editing.phone"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-native-select
                        label="{{$dataType->readRows->where('field','blood_group')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','blood_group')->first()->getTranslatedAttribute('display_name')}}"
                        :options="\App\Enums\BloodType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.blood_group"
                    />
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.allergies"
                             label="{{$dataType->readRows->where('field','allergies')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','allergies')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.disabilities"
                             label="{{$dataType->readRows->where('field','disabilities')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','disabilities')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.previous_surgery"
                             label="{{$dataType->readRows->where('field','previous_surgery')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','previous_surgery')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-input wire:model.defer="editing.previous_accidents"
                             label="{{$dataType->readRows->where('field','previous_accidents')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="{{$dataType->readRows->where('field','previous_accidents')->first()->getTranslatedAttribute('display_name')}}"/>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-select
                        label="{{$dataType->readRows->where('field','previous_diseases')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','previous_diseases')->first()->getTranslatedAttribute('display_name')}}"
                        multiselect
                        wire:model.defer="editing.previous_diseases"
                    >
                        @foreach (\App\Enums\DiseaseType::getInstances() as  $diseaseType )
                            <x-select.option
                                label="{{ $diseaseType->description }}" value="{{ $diseaseType->value }}"/>
                        @endforeach
                    </x-select>
                </div>
                <div class="col-span-5 lg:col-span-1">
                    <x-select
                        label="{{$dataType->readRows->where('field','family_diseases')->first()->getTranslatedAttribute('display_name')}}"
                        placeholder="{{$dataType->readRows->where('field','family_diseases')->first()->getTranslatedAttribute('display_name')}}"
                        multiselect
                        wire:model.defer="editing.family_diseases"
                    >
                        @foreach (\App\Enums\DiseaseType::getInstances() as  $diseaseType )
                            <x-select.option label="{{ $diseaseType->description }}" value="{{ $diseaseType->value }}"/>
                        @endforeach
                    </x-select>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button outline gray label="{{__('voyager::generic.cancel')}}" wire:click="cancel()"/>
                        <x-button wire:click="save()" spinner primary label="{{__('voyager::generic.save')}}"/>
                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>

