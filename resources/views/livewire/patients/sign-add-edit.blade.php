<div class="container mx-auto pt-5">
    <x-card :title="($is_edit)?'Edit Sign for  : ': 'New Sign for  : ' .$patient->full_name ">
        <form wire:submit.prevent="save">
            <div class="flex flex-wrap items-end justify-center space-x-4 space-y-4">
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='80' max="200" label="systolic_blood_pressure"
                             placeholder="systolic_blood_pressure" wire:model.defer="editing.systolic_blood_pressure"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="diastolic_blood_pressure"
                             placeholder="diastolic_blood_pressure"
                             wire:model.defer="editing.diastolic_blood_pressure"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="heartbeat" placeholder="heartbeat"
                             wire:model.defer="editing.heartbeat"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='30' max="45" label="temperature" placeholder="temperature"
                             wire:model.defer="editing.temperature"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='0' max="300" label="weight" placeholder="weight"
                             wire:model.defer="editing.weight"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='5' max="250" label="length" placeholder="length"
                             wire:model.defer="editing.length"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="waistline" placeholder="waistline"
                             wire:model.defer="editing.waistline"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="breathing" placeholder="breathing"
                             wire:model.defer="editing.breathing"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="oxygen" placeholder="oxygen"
                             wire:model.defer="editing.oxygen"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="peak_expiratory_flow"
                             placeholder="peak_expiratory_flow" wire:model.defer="editing.peak_expiratory_flow"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-input type="number" min='40' max="200" label="sugar" placeholder="sugar"
                             wire:model.defer="editing.sugar"/>
                </div>
                <div class="flex-auto sm:w-3/12">
                    <x-select
                        placeholder="Female Status"
                        multiselect
                        wire:model.defer="editing.female_status"
                    >
                        @foreach (\App\Enums\FemaleStatus::getInstances() as  $female_status )
                            <x-select.option label="{{ $female_status->description }}" value="{{ $female_status->value }}"/>
                        @endforeach
                    </x-select>
                </div>
                <div class="flex w-full space-x-4">
                    <div class="flex-auto sm:w-3/12">

                        <label for="ecg"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('ecg.*')  text-negative-600 @enderror">
                            ecg
                        </label>
                        <x-input.filepond wire:model="ecg" multiple capture :files="$editing->ecg" imagePreviewMaxHeight="100"/>
                        @error('editing.ecg.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="flex-auto sm:w-3/12">
                        @if ($errors->first('skins'))
                            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('skins') }}</div>
                        @endif
                        <label for="skins"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('skins.*')  text-negative-600 @enderror">
                            skins
                        </label>
                        <x-input.filepond wire:model="skins" multiple capture :files="$editing->skins"/>
                        @error('skins.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="flex-auto sm:w-3/12">
                        @if ($errors->first('docs'))
                            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('docs') }}</div>
                        @endif
                        <label for="docs"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('docs.*')  text-negative-600 @enderror">
                            docs
                        </label>
                        <x-input.filepond wire:model="docs" multiple capture :files="$editing->docs"/>
                        @error('docs.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button outline gray label="Cancel" wire:click="cancel()"/>
                        <x-button wire:click="save()" spinner primary label="Save" />
                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>


