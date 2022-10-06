<div class="container mx-auto pt-5">
    <x-card :title="($is_edit)?'Edit Information : '.$editing->full_name : 'New Patient'">
        <form wire:submit.prevent="save">
            <div class="flex flex-wrap items-end justify-center space-x-4 space-y-4">

                <div class="flex-auto">
                    <x-input wire:model.defer="editing.full_name" label="Full Name" placeholder="Full Name"/>
                </div>
                <div class="flex-auto">
                    <x-datetime-picker
                        without-timezone
                        without-time
                        label="Birth"
                        placeholder="Birth"
                        wire:model.defer="editing.birth"
                        :min="now()->subYear(100)"
                        :max="now()->subDays(1)"
                    />
                </div>
                <div class="flex-auto">
                    <x-native-select
                        label="Select Gender"
                        placeholder="Select Gender..."
                        :options="\App\Enums\GenderType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.gender"
                    />
                </div>
                <div class="flex-auto">
                    <x-native-select
                        label="Select Marital"
                        placeholder="Select Marital..."
                        :options="\App\Enums\MaritalType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.marital"
                    />
                </div>
                <div class="flex-auto">
                    <x-input type="number" min='1' max="30" label="Children" placeholder="Children" wire:model.defer="editing.children"/>
                </div>
                <div class="flex-auto">
                    <x-native-select
                        label="Select City"
                        placeholder="Select City..."
                        :options="\App\Enums\City::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.city"
                    />
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.address" label="Address" placeholder="Address"/>
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.birth_place" label="Birth Place" placeholder="Birth Place"/>
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.work" label="work" placeholder="work"/>
                </div>
                <div class="flex-auto">
                    <x-inputs.phone label="Phone" wire:model.defer="editing.phone"/>
                </div>
                <div class="flex-auto">
                    <x-native-select
                        label="Blood Group"
                        placeholder="Blood Group"
                        :options="\App\Enums\BloodType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model.defer="editing.blood_group"
                    />
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.allergies" label="Allergies" placeholder="Allergies"/>
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.disabilities" label="Disabilities" placeholder="Disabilities"/>
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.previous_surgery" label="Previous Surgery"
                             placeholder="Previous Surgery"/>
                </div>
                <div class="flex-auto">
                    <x-input wire:model.defer="editing.previous_accidents" label="Previous Accidents"
                             placeholder="Previous Accidents"/>
                </div>
                <div class="flex-auto">
                    <x-select
                        placeholder="select Previous Diseases"
                        multiselect
                        wire:model.defer="editing.previous_diseases"
                    >
                        @foreach (\App\Enums\DiseaseType::getInstances() as  $diseaseType )
                            <x-select.option label="{{ $diseaseType->description }}" value="{{ $diseaseType->value }}"/>
                        @endforeach
                    </x-select>
                </div>
                <div class="flex-auto">
                    <x-select
                        placeholder="select Family Diseases"
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
                        <x-button outline gray label="Cancel" wire:click="cancel()"/>
                        <x-button wire:click="save()" spinner primary label="Save"/>
                    </div>
                </x-slot>

            </div>
        </form>
    </x-card>
</div>

