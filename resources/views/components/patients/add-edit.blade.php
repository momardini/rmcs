
<form wire:submit.prevent="save">
    <x-modal.dialog wire:model.defer="showEditModal" max-width="7xl" >
        <x-slot name="title">Edit Patient</x-slot>

        <x-slot name="content">
            <div class="bg-cool-gray-100 p-4 rounded shadow-inner flex flex-wrap justify-between">
                    <x-input.group  for="full_name" label="Full Name" :error="$errors->first('editing.full_name')">
                        <x-input.text wire:model="editing.full_name" id="full_name" placeholder="Full Name"/>
                    </x-input.group>
                    <x-input.group  for="gender" label="Gender" :error="$errors->first('editing.gender')">
                        <x-input.select wire:model="editing.gender" id="gender">
                            @foreach (\App\Enums\GenderType::asArray() as $label => $value  )
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group  for="marital" label="Marital" :error="$errors->first('editing.marital')">
                        <x-input.select wire:model="editing.marital" id="marital">
                            @foreach (\App\Enums\MaritalType::asArray() as $label => $value  )
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group  for="children" label="Children" :error="$errors->first('editing.children')">
                        <x-input.text type="number" wire:model="editing.children" id="title"
                                      placeholder="Children"/>
                    </x-input.group>
                    <x-input.group  for="work" label="Work" :error="$errors->first('editing.work')">
                        <x-input.text type="number" wire:model="editing.work" id="title" placeholder="Work"/>
                    </x-input.group>
                    <x-input.group  for="birth" label="Birth" :error="$errors->first('editing.birth')">
                        <x-input.date wire:model="editing.birth" id="birth"/>
                    </x-input.group>
                    <x-input.group  for="city" label="City" :error="$errors->first('editing.city')">
                        <x-input.select wire:model="editing.city" id="city">
                            @foreach (\App\Enums\City::asArray() as $label => $value  )
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group  for="address" label="Address" :error="$errors->first('editing.address')">
                        <x-input.text wire:model="editing.address" id="address" placeholder="Address"/>
                    </x-input.group>
                    <x-input.group  for="blood_group" label="Blood Group"
                                    :error="$errors->first('editing.blood_group')">
                        <x-input.select wire:model="editing.blood_group" id="blood_group">
                            @foreach (\App\Enums\BloodType::asArray() as $label => $value  )
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group  for="phone" label="Phone" :error="$errors->first('editing.phone')">
                        <x-input.text wire:model="editing.phone" id="phone" placeholder="Phone"/>
                    </x-input.group>
                    <x-input.group  for="birth_place" label="Birth Place"
                                    :error="$errors->first('editing.birth_place')">
                        <x-input.text wire:model="editing.birth_place" id="birth_place" placeholder="Birth Place"/>
                    </x-input.group>
                    <x-input.group  for="allergies" label="Allergies" :error="$errors->first('editing.allergies')">
                        <x-input.text wire:model="editing.allergies" id="allergies" placeholder="Allergies"/>
                    </x-input.group>
                    <x-input.group  for="disabilities" label="Disabilities"
                                    :error="$errors->first('editing.disabilities')">
                        <x-input.text wire:model="editing.disabilities" id="disabilities"
                                      placeholder="Disabilities"/>
                    </x-input.group>
                    <x-input.group  for="previous_surgery" label="Previous Surgery"
                                    :error="$errors->first('editing.previous_surgery')">
                        <x-input.text wire:model="editing.previous_surgery" id="previous_surgery"
                                      placeholder="Previous Surgery"/>
                    </x-input.group>
                    <x-input.group  for="previous_accidents" label="Previous Accidents"
                                    :error="$errors->first('editing.previous_accidents')">
                        <x-input.text wire:model="editing.previous_accidents" id="previous_accidents"
                                      placeholder="Previous Accidents"/>
                    </x-input.group>
                    <x-input.group  for="family_diseases" label="Family Diseases"
                                    :error="$errors->first('editing.family_diseases')">
                        <x-input.multi-select  wire:model="editing.family_diseases" id="family_diseases" placeholder="Select Family Diseases" >
                            @foreach (\App\Enums\DiseaseType::asArray() as $label => $value  )
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.multi-select>
                    </x-input.group>
                    <x-input.group  for="previous_diseases" label="Previous Diseases"
                                    :error="$errors->first('editing.previous_diseases')">
                        <x-input.multi-select wire:model="editing.previous_diseases" id="previous_diseases"
                                              placeholder="select Previous Diseases" >
                            @foreach (\App\Enums\DiseaseType::asArray() as $label => $value  )
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.multi-select>
                    </x-input.group>
                </div>
        </x-slot>
        <x-slot name="footer">
            <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

            <x-button.primary type="submit">Save</x-button.primary>
        </x-slot>
    </x-modal.dialog>
</form>
