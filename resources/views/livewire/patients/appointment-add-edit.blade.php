<div class="container mx-auto pt-5">
    <x-card
        :title="__('voyager::generic.'.($is_edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular').' : '.$patient->full_name"
        :color="'positive-500'"
    >
        <form wire:submit.prevent="save">
            <div class="flex flex-wrap gap-1">

                <x-input.group inline for="editing.clinic_id"
                               label="{{$appointmentDataRows->where('field','appointment_belongsto_clinic_relationship')->first()->getTranslatedAttribute('display_name')}}"
                               >
                    <x-native-select
                        placeholder="{{$appointmentDataRows->where('field','appointment_belongsto_clinic_relationship')->first()->getTranslatedAttribute('display_name')}}"
                        :options="$clinics"
                        option-label="title"
                        option-value="id"
                        wire:model.defer="editing.clinic_id"
                    />
                </x-input.group>
                    <x-input.group inline for="editing.doctor_id"
                                   label="{{$appointmentDataRows->where('field','appointment_belongsto_user_relationship')->first()->getTranslatedAttribute('display_name')}}"
                                   >
                    <x-native-select
                        placeholder="{{$appointmentDataRows->where('field','appointment_belongsto_user_relationship')->first()->getTranslatedAttribute('display_name')}}"
                        :options="$doctors"
                        option-label="name"
                        option-value="id"
                        wire:model.defer="editing.doctor_id"
                    />
                    </x-input.group>
                    <x-input.group inline for="editing.complaint"
                                   label="{{$appointmentDataRows->where('field','complaint')->first()->getTranslatedAttribute('display_name')}}"
                                   :error="$errors->first('editing.complaint')">
                        <livewire:input-autocomplete
                            placeholder="{{$appointmentDataRows->where('field','complaint')->first()->getTranslatedAttribute('display_name')}}"
                            model-name="editing.complaint"
                            field-name="complaint"
                            model="App\Models\Appointment"
                            :model-value="$editing['complaint']"
                        />
                    </x-input.group>
{{--                    <x-input.group inline for="editing.login_time"--}}
{{--                                   label="{{$appointmentDataRows->where('field','login_time')->first()->getTranslatedAttribute('display_name')}}"--}}
{{--                                   :error="$errors->first('editing.login_time')">--}}
{{--                    <x-time-picker  wire:model.lazy="editing.login_time"   />--}}
{{--                    </x-input.group>--}}
                <x-slot name="footer">
                    <div class="flex justify-between items-center" x-data="{ hiding: @entangle('saving') }">
                        <x-button outline gray label="{{__('voyager::generic.cancel')}}" wire:click="cancel()"/>
                        <x-button wire:click="save()" spinner primary label="{{__('voyager::generic.save')}}" x-show="!hiding" />
                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>


