<div class="container mx-auto pt-5">
    <x-card :title="__('voyager::generic.'.($is_edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular').' : ' .$patient->full_name "
            :color="'blue-800'">
        <form wire:submit.prevent="save">
            <div class="flex flex-wrap gap-1 ">
                <div class="flex-auto">

                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','systolic_blood_pressure')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="120"
                             wire:model.defer="editing.systolic_blood_pressure"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','diastolic_blood_pressure')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="80"
                             wire:model.defer="editing.diastolic_blood_pressure"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','heartbeat')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="70"
                             wire:model.defer="editing.heartbeat"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','temperature')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="36.5"
                             wire:model.defer="editing.temperature"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','weight')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="65"
                             wire:model.defer="editing.weight"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','length')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="170"
                             wire:model.defer="editing.length"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','waistline')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="94"
                             wire:model.defer="editing.waistline"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','breathing')->first()->getTranslatedAttribute('display_name')}}"

                             wire:model.defer="editing.breathing"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','oxygen')->first()->getTranslatedAttribute('display_name')}}"
                             placeholder="98"
                             wire:model.defer="editing.oxygen"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','peak_expiratory_flow')->first()->getTranslatedAttribute('display_name')}}"
                             wire:model.defer="editing.peak_expiratory_flow"/>
                </div>
                <div class="flex-auto">
                    <x-input type="number"
                             label="{{$dataType->readRows->where('field','sugar')->first()->getTranslatedAttribute('display_name')}}"

                             wire:model.defer="editing.sugar"/>
                </div>
                @if($patient->gender->is(\App\Enums\GenderType::FEMALE))
                    <div class="flex-auto">
                        <x-select
                            label="{{$dataType->readRows->where('field','female_status')->first()->getTranslatedAttribute('display_name')}}"
                            multiselect
                            wire:model.defer="editing.female_status"
                        >
                            @foreach (\App\Enums\FemaleStatus::getInstances() as  $female_status )
                                <x-select.option label="{{ $female_status->description }}" value="{{ $female_status->value }}"
                                    @selected($female_status->is(\App\Enums\FemaleStatus::NOT_DEFINED))
                                />
                            @endforeach
                        </x-select>
                    </div>
                @endif
                <div class="flex w-full space-x-4">
                    <div class="flex-auto">

                        <label for="ecg"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('ecg.*')  text-negative-600 @enderror">
                            {{$dataType->readRows->where('field','ecg')->first()->getTranslatedAttribute('display_name')}}
                        </label>
                        <x-input.filepond wire:model="ecg" multiple capture :files="$editing->ecg" imagePreviewMaxHeight="100"/>
                        @error('editing.ecg.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="flex-auto">
                        @if ($errors->first('skins'))
                            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('skins') }}</div>
                        @endif
                        <label for="skins"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('skins.*')  text-negative-600 @enderror">
                            {{$dataType->readRows->where('field','skins')->first()->getTranslatedAttribute('display_name')}}
                        </label>
                        <x-input.filepond wire:model="skins" multiple capture :files="$editing->skins"/>
                        @error('skins.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="flex-auto">
                        @if ($errors->first('docs'))
                            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('docs') }}</div>
                        @endif
                        <label for="docs"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('docs.*')  text-negative-600 @enderror">
                            {{$dataType->readRows->where('field','docs')->first()->getTranslatedAttribute('display_name')}}
                        </label>
                        <x-input.filepond wire:model="docs" multiple capture :files="$editing->docs"/>
                        @error('docs.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button outline gray label="{{__('voyager::generic.cancel')}}" wire:click="cancel()"/>
                        <x-button wire:click="save()" primary label="{{__('voyager::generic.save')}}" :disabled="$uploading"/>
                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>


