<div class="container mx-auto pt-5">
    <x-card :title="($is_edit)?'Edit Appointment for  : ': 'New Appointment for  : ' .$patient->full_name ">
        <form wire:submit.prevent="save">
            <div class="flex flex-wrap items-end justify-center space-x-4 space-y-4">

                <div class="flex-auto">
                    <x-native-select
                        label="Select Clinic"
                        placeholder="Select Clinic"
                        :options="$clinics"
                        option-label="title"
                        option-value="id"
                        wire:model.defer="editing.clinic_id"
                    />
                </div>
                <div class="flex-auto">
                    <x-native-select
                        label="Select Doctor"
                        placeholder="Select Doctor"
                        :options="$doctors"
                        option-label="name"
                        option-value="id"
                        wire:model.defer="editing.doctor_id"
                    />
                </div>
                <div class="flex-auto">
                <x-input.group inline for="editing.complaint" label="Complaint" :error="$errors->first('editing.complaint')">
                    <livewire:input-autocomplete placeholder="Complaint"
                                                 model-name="editing.complaint"
                                                 field-name="complaint"
                                                 model="App\Models\Appointment"
                                                 :model-value="$editing['complaint']"
                    />
                </x-input.group>
            </div>
                <div class="flex-auto">
                    <x-time-picker
                        label="Login Time"
                        :placeholder="Carbon\Carbon::now()->format('g:i')"
                        wire:model.lazy="editing.login_time"
                    />
                </div>
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button outline gray label="Cancel" wire:click="cancel()"/>
                        <x-button wire:click="save()" spinner primary label="Save"/>
                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>


