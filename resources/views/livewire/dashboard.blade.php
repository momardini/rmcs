@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
@endpush
<div>
    <div class="flex justify-center ">
        <a href="#" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
        </a>
    </div>
{{--    <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>--}}

{{--    <div class="py-4 space-y-4">--}}
{{--        <!-- Top Bar -->--}}
{{--        <div class="flex flex-wrap justify-between">--}}
{{--            <div class="flex space-x-4 flex-grow">--}}
{{--                <x-input.text wire:model="filters.search" placeholder="Search Patients..."/>--}}

{{--                <x-button.pill wire:click="toggleShowFilters">--}}
{{--                    <x-icon.search/>--}}
{{--                    <span class=" hidden md:block"> @if ($showFilters)--}}
{{--                            Hide--}}
{{--                        @endif Advanced Search...</span>--}}
{{--                </x-button.pill>--}}
{{--            </div>--}}

{{--            <div class="space-x-2 flex items-center  ">--}}
{{--                <x-input.group paddingless for="perPage">--}}
{{--                    <x-input.select wire:model="perPage" id="perPage" >--}}
{{--                        <option value="10">10</option>--}}
{{--                        <option value="25">25</option>--}}
{{--                        <option value="50">50</option>--}}
{{--                    </x-input.select>--}}
{{--                </x-input.group>--}}

{{--                <x-dropdown label="Bulk Actions">--}}
{{--                    <x-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">--}}
{{--                        <x-icon.download class="text-cool-gray-400"/>--}}
{{--                        <span >Export</span>--}}
{{--                    </x-dropdown.item>--}}

{{--                    <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')"--}}
{{--                                     class="flex items-center space-x-2">--}}
{{--                        <x-icon.trash class="text-cool-gray-400"/>--}}
{{--                        <span>Delete</span>--}}
{{--                    </x-dropdown.item>--}}
{{--                </x-dropdown>--}}

{{--                <livewire:import-patients />--}}

{{--                <x-button.primary wire:click="create">--}}
{{--                    <x-icon.plus/>--}}
{{--                    <span class=" hidden md:inline"> NEW </span>--}}
{{--                </x-button.primary>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Advanced Search -->--}}
{{--        <div>--}}
{{--            @if ($showFilters)--}}
{{--                <div class="bg-cool-gray-200 p-4 rounded shadow-inner flex relative">--}}
{{--                    <div class="w-1/2 pr-2 space-y-4">--}}
{{--                        <x-input.group inline for="filter-gender" label="Gender">--}}
{{--                            <x-input.select wire:model="filters.gender" id="filter-gender">--}}
{{--                                <option value="" disabled>Select Gender...</option>--}}
{{--                                @foreach (\App\Enums\GenderType::asArray() as  $label => $value)--}}
{{--                                    <option value="{{ $value }}">{{ \App\Enums\GenderType::getDescription($value) }}</option>--}}
{{--                                @endforeach--}}
{{--                            </x-input.select>--}}
{{--                        </x-input.group>--}}
{{--                        <x-input.group inline for="filter-marital" label="Marital">--}}
{{--                            <x-input.select wire:model="filters.marital" id="filter-marital">--}}
{{--                                <option value="" disabled>Select Marital...</option>--}}
{{--                                @foreach (\App\Enums\MaritalType::asArray() as  $label => $value)--}}
{{--                                    <option value="{{ $value }}">{{ \App\Enums\MaritalType::getDescription($value) }}</option>--}}
{{--                                @endforeach--}}
{{--                            </x-input.select>--}}
{{--                        </x-input.group>--}}
{{--                        <x-input.group inline for="filter-birth" label="Birth">--}}
{{--                            <x-input.date wire:model="filters.birth" id="filter-birth"/>--}}
{{--                        </x-input.group>--}}
{{--                    </div>--}}
{{--                    <div class="w-1/2 pr-2 space-y-4">--}}
{{--                        <x-input.group inline for="filter-city" label="City">--}}
{{--                            <x-input.select wire:model="filters.city" id="filter-city">--}}
{{--                                <option value="" disabled>Select City...</option>--}}
{{--                                @foreach (\App\Enums\City::asArray() as  $label => $value)--}}
{{--                                    <option value="{{ $value }}">{{ \App\Enums\City::getDescription($value) }}</option>--}}
{{--                                @endforeach--}}
{{--                            </x-input.select>--}}
{{--                        </x-input.group>--}}
{{--                        <x-input.group inline for="filter-phone" label="Phone">--}}
{{--                            <x-input.text wire:model.lazy="filters.phone" id="filter-phone"/>--}}
{{--                        </x-input.group>--}}
{{--                        <x-input.group inline for="filter-birth_place" label="Birth Place">--}}
{{--                            <x-input.text wire:model.lazy="filters.birth_place" id="filter-birth_place"/>--}}
{{--                        </x-input.group>--}}
{{--                    </div>--}}
{{--                    <div class="w-1/2 pl-2 space-y-4">--}}
{{--                        <x-input.group inline for="filter-station" label="Station">--}}
{{--                            <x-input.select wire:model="filters.station_id" id="filter-station_id">--}}
{{--                                <option value="" disabled>Select Station</option>--}}

{{--                                @foreach (\App\Models\Station::whereActive(1)->get() as $station)--}}
{{--                                    <option value="{{ $station->id }}">{{ $station->title }}</option>--}}
{{--                                @endforeach--}}
{{--                            </x-input.select>--}}
{{--                        </x-input.group>--}}
{{--                        <x-input.group inline for="filter-children" label="Children">--}}
{{--                            <x-input.text wire:model.lazy="filters.children" id="filter-children"/>--}}
{{--                        </x-input.group>--}}
{{--                        <x-input.group inline for="filter-created_at" label="Created At">--}}
{{--                            <x-input.date wire:model="filters.created_at" id="filter-created_at"/>--}}
{{--                        </x-input.group>--}}

{{--                    </div>--}}
{{--                    <div class="w-1/2 pr-2 space-y-4">--}}
{{--                        <x-input.group inline for="filter-blood_type" label="Blood">--}}
{{--                            <x-input.select wire:model="filters.blood_type" id="filter-blood_type">--}}
{{--                                <option value="" disabled>Select Blood...</option>--}}
{{--                                @foreach (\App\Enums\BloodType::asArray() as  $label => $value)--}}
{{--                                    <option value="{{ $value }}">{{ \App\Enums\BloodType::getDescription($value) }}</option>--}}
{{--                                @endforeach--}}
{{--                            </x-input.select>--}}
{{--                        </x-input.group>--}}
{{--                        <x-button.link wire:click="resetFilters" class="absolute right-0 bottom-0 p-4">Reset Filters--}}
{{--                        </x-button.link>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <!-- Patients Table -->--}}
{{--        <div class="flex-col space-y-4">--}}
{{--            <x-table>--}}
{{--                <x-slot name="head">--}}
{{--                    <x-table.heading class="pr-0 w-8">--}}
{{--                        <x-input.checkbox wire:model="selectPage"/>--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading  sortable multi-column wire:click="sortBy('id')" :direction="$sorts['id'] ?? null">--}}
{{--                        #--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading  sortable multi-column wire:click="sortBy('full_name')"--}}
{{--                                     :direction="$sorts['full_name'] ?? null">Full Name--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading class="hidden md:table-cell" sortable multi-column wire:click="sortBy('station')"--}}
{{--                                     :direction="$sorts['station'] ?? null">Station--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading class="hidden md:table-cell" sortable multi-column wire:click="sortBy('birth')"--}}
{{--                                     :direction="$sorts['birth'] ?? null">Age--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading class="hidden md:table-cell" sortable multi-column wire:click="sortBy('marital')"--}}
{{--                                     :direction="$sorts['marital'] ?? null">marital--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading class="hidden md:table-cell" sortable multi-column wire:click="sortBy('children')"--}}
{{--                                     :direction="$sorts['children'] ?? null">children--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading class="hidden md:table-cell" sortable multi-column wire:click="sortBy('status')"--}}
{{--                                     :direction="$sorts['status'] ?? null">Status--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading class="hidden md:table-cell" sortable multi-column wire:click="sortBy('created_at')"--}}
{{--                                     :direction="$sorts['created_at'] ?? null">Date Created--}}
{{--                    </x-table.heading>--}}
{{--                    <x-table.heading/>--}}
{{--                </x-slot>--}}

{{--                <x-slot name="body">--}}
{{--                    @if ($selectPage)--}}
{{--                        <x-table.row class="bg-cool-gray-200" wire:key="row-message">--}}
{{--                            <x-table.cell colspan="6">--}}
{{--                                @unless ($selectAll)--}}
{{--                                    <div>--}}
{{--                                        <span>You have selected <strong>{{ $patients->count() }}</strong> patient, do you want to select all <strong>{{ $patients->total() }}</strong>?</span>--}}
{{--                                        <x-button.link wire:click="selectAll" class="ml-1 text-blue-600">Select All--}}
{{--                                        </x-button.link>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <span>You are currently selecting all <strong>{{ $patients->total() }}</strong> patient.</span>--}}
{{--                                @endif--}}
{{--                            </x-table.cell>--}}
{{--                        </x-table.row>--}}
{{--                    @endif--}}

{{--                    @forelse ($patients as $patient)--}}
{{--                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $patient->id }}"--}}
{{--                                     :class="($patient->status->is(\App\Enums\PatientStatus::BLOCKED))?'opacity-50 cursor-not-allowed':'' ">--}}
{{--                            <x-table.cell class="pr-0">--}}
{{--                                <x-input.checkbox wire:model="selected" value="{{ $patient->id }}"/>--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell >--}}
{{--                            <span href="#" class="inline-flex space-x-2 truncate text-sm leading-5 items-center">--}}

{{--                                <x-dynamic-component :component="'icon.'.$patient->gender_symbol" class="w-5"/>--}}
{{--                                <p class="text-cool-gray-600 truncate">--}}
{{--                                    {{ $patient->id }}--}}
{{--                                </p>--}}
{{--                            </span>--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell >--}}
{{--                            <span href="#" class="inline-flex space-x-2 truncate text-sm leading-5">--}}
{{--                                <p class="text-cool-gray-600 truncate">--}}
{{--                                    {{ $patient->hide_name }}--}}
{{--                                </p>--}}
{{--                            </span>--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell class="hidden md:table-cell">--}}
{{--                                <span class="text-cool-gray-900 font-medium">{{ $patient->station->title }} </span>--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell class="hidden md:table-cell">--}}
{{--                                <span class="text-cool-gray-900 font-medium">{{ $patient->age }} </span>--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell class="hidden md:table-cell">--}}
{{--                                <x-dynamic-component :component="'icon.'.$patient->marital_symbol"/>--}}
{{--                                {{ $patient->marital->description }}--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell class="hidden md:table-cell">--}}
{{--                                {{ $patient->children }}--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell class="hidden md:table-cell">--}}
{{--                            <span--}}
{{--                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $patient->status_color }}-100 text-{{ $patient->status_color }}-800 capitalize">--}}
{{--                                {{ $patient->status->description }}--}}
{{--                            </span>--}}
{{--                            </x-table.cell>--}}
{{--                            <x-table.cell class="hidden md:table-cell">--}}
{{--                                {{ $patient->date_for_humans }}--}}
{{--                            </x-table.cell>--}}

{{--                            <x-table.cell>--}}
{{--                                <x-button.action wire:click="edit({{ $patient->id }})"--}}
{{--                                                 :disabled="($patient->status->is(\App\Enums\PatientStatus::BLOCKED))">--}}
{{--                                    <x-icon.edit />--}}
{{--                                    <span class="hidden md:block">Edit</span>--}}
{{--                                </x-button.action>--}}
{{--                                <x-button.tooltip>--}}
{{--                                    Edit--}}
{{--                                </x-button.tooltip>--}}
{{--                            </x-table.cell>--}}
{{--                        </x-table.row>--}}
{{--                    @empty--}}
{{--                        <x-table.row>--}}
{{--                            <x-table.cell colspan="10">--}}
{{--                                <div class="flex justify-center items-center space-x-2">--}}
{{--                                    <x-icon.inbox class="h-8 w-8 text-cool-gray-400"/>--}}
{{--                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No patient found...</span>--}}
{{--                                </div>--}}
{{--                            </x-table.cell>--}}
{{--                        </x-table.row>--}}
{{--                    @endforelse--}}
{{--                </x-slot>--}}
{{--            </x-table>--}}

{{--            <div>--}}
{{--                {{ $patients->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Delete Patients Modal -->--}}
{{--    <form wire:submit.prevent="deleteSelected">--}}
{{--        <x-modal.confirmation wire:model.defer="showDeleteModal">--}}
{{--            <x-slot name="title">Delete Patient</x-slot>--}}

{{--            <x-slot name="content">--}}
{{--                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>--}}
{{--            </x-slot>--}}

{{--            <x-slot name="footer">--}}
{{--                <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>--}}

{{--                <x-button.primary type="submit">Delete</x-button.primary>--}}
{{--            </x-slot>--}}
{{--        </x-modal.confirmation>--}}
{{--    </form>--}}

{{--    <!-- Save Patient Modal -->--}}
{{--    <x-patients.add-edit />--}}
</div>
@push('scripts')
    <script>
        function dropdown() {
            return {
                options: [],
                selected: [],
                show: false,
                open() {
                    this.show = true
                },
                close() {
                    this.show = false
                },
                isOpen() {
                    return this.show === true
                },
                select(index, event) {

                    if (!this.options[index].selected) {

                        this.options[index].selected = true;
                        this.options[index].element = event.target;
                        this.selected.push(index);

                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false
                    }
                },
                remove(index, option) {
                    this.options[option].selected = false;
                    this.selected.splice(index, 1);


                },
                loadOptions(id) {
                    const options = document.getElementById(id).options;
                    for (let i = 0; i < options.length; i++) {
                        this.options.push({
                            value: options[i].value,
                            text: options[i].innerText,
                            selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                        });
                    }


                },
                selectedValues() {
                    return this.selected.map((option) => {
                        return this.options[option].value;
                    })
                }
            }
        }
    </script>
@endpush

