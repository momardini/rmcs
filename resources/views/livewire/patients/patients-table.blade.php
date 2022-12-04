
<div>
    <div class="py-4 space-y-4">
        <!-- Top Bar -->
        <div class="flex flex-wrap justify-center items-center">
                <x-input placeholder="{{ __('portal.patient.search-patients') }}" wire:model="s" class="flex flex-grow sm:flex-grow-0 ">
                    <x-slot name="append">
                        <div class="absolute inset-y-0 left-0 flex items-center p-0.5">
                            <x-button
                                class="h-full rounded-l-md"
                                icon="x-circle"
                                primary
                                flat
                                squared
                                wire:click="resetSearch"
                            />
                        </div>
                    </x-slot>
                </x-input>
            <div class="space-x-2 flex items-center  ">
                <x-dropdown label="Bulk Actions">
                    <x-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">
                        <x-icon.download class="text-cool-gray-400"/>
                        <span >{{ __('portal.patient.export') }}</span>
                    </x-dropdown.item>

                    <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')"
                                     class="flex items-center space-x-2">
                        <x-icon.trash class="text-cool-gray-400"/>
                        <span>{{__('voyager::generic.delete')}}</span>
                    </x-dropdown.item>
                </x-dropdown>

                <livewire:import-patients />
                <x-button icon="plus" color="green" label="{{ __('voyager::generic.add_new') }}" :href="route('portal.patients.create')"/>

            </div>
        </div>

        <!-- Advanced Search -->
        <div class="mb-2" x-data="{ expanded: false }" >
        <p x-show="!expanded" class="text-center text-xs w-full" @click="expanded = ! expanded">{{ __('portal.patient.advanced-search') }}</p>
        <div class="bg-cool-gray-200 p-4 rounded shadow-inner flex relative flex-wrap justify-start items-end" x-show="expanded" >
                    <div class="flex-auto sm:flex-1 px-3">
                    <x-native-select
                        label="{{ $patientDataRows->where('field','gender')->first()->getTranslatedAttribute('display_name') }}"
                        placeholder="{{ $patientDataRows->where('field','gender')->first()->getTranslatedAttribute('display_name') }}"
                        :options="\App\Enums\GenderType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model="filters.gender"
                    />
                    </div>
                    <div class="flex-auto sm:flex-1 px-3">
                    <x-native-select
                        label="{{ $patientDataRows->where('field','marital')->first()->getTranslatedAttribute('display_name') }}"
                        placeholder="{{ $patientDataRows->where('field','marital')->first()->getTranslatedAttribute('display_name') }}"
                        :options="\App\Enums\MaritalType::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model="filters.marital"
                    />
                    </div>
                    <div class="flex-auto sm:flex-1 px-3">
                    <x-native-select
                        label="{{ $patientDataRows->where('field','city')->first()->getTranslatedAttribute('display_name') }}"
                        placeholder="{{ $patientDataRows->where('field','city')->first()->getTranslatedAttribute('display_name') }}"
                        :options="\App\Enums\City::getInstances()"
                        option-label="key"
                        option-value="value"
                        wire:model="filters.city"
                    />
                    </div>
                    <div class="flex-auto sm:flex-1 px-3">
                    <x-native-select
                        label="{{ $patientDataRows->where('field','station_id')->first()->getTranslatedAttribute('display_name') }}"
                        placeholder="{{ $patientDataRows->where('field','station_id')->first()->getTranslatedAttribute('display_name') }}"
                        :options="\App\Models\Station::whereActive(1)->get()"
                        option-label="title"
                        option-value="id"
                        wire:model="filters.station_id"
                    />
                    </div>
                    <div class="flex-auto sm:flex-1 px-3">
                    <x-datetime-picker
                        without-timezone
                        without-time
                        label="{{$patientDataRows->where('field','created_at')->first()->getTranslatedAttribute('display_name') }}"
                        placeholder="{{$patientDataRows->where('field','created_at')->first()->getTranslatedAttribute('display_name') }}"
                        wire:model="filters.created_at"
                    />
                    </div>
                    <div class="flex-auto sm:flex-1 px-3">
                    <x-button outline warning label="{{ __('portal.patient.reset-filter') }}" icon="refresh" wire:click="resetFilters" class="w-full flex-grow sm:flex-grow-0"/>
                    </div>
                </div>
        </div>
        <!-- Patients Table -->
        <div class="flex-col space-y-1 m-auto w-11/12">
                <div class="align-middle min-w-full  shadow  sm:rounded-lg">
                    <table class="min-w-full divide-y divide-cool-gray-200">
                        <thead>
                        <tr>

                                <x-table.heading class="pr-2 w-8">
                                    <x-input.checkbox wire:model="selectPage"/>
                                </x-table.heading>
                                <x-table.heading  class="py-0 px-1 text-2xs ">
                                    {{$patientDataRows->where('field','id')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading  class="py-0 px-1 text-2xs">
                                    {{$patientDataRows->where('field','full_name')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="hidden md:table-cell text-sm" sortable multi-column wire:click="sortBy('station')"
                                                 :direction="$sorts['station'] ?? null">
                                    {{$patientDataRows->where('field','patient_belongsto_station_relationship')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="hidden md:table-cell text-sm" sortable multi-column wire:click="sortBy('birth')"
                                                 :direction="$sorts['birth'] ?? null">
                                    {{$patientDataRows->where('field','patient_hasone_patient_relationship')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="hidden md:table-cell text-sm" sortable multi-column wire:click="sortBy('marital')"
                                                 :direction="$sorts['marital'] ?? null">
                                    {{$patientDataRows->where('field','marital')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="hidden md:table-cell text-sm" sortable multi-column wire:click="sortBy('children')"
                                                 :direction="$sorts['children'] ?? null">
                                    {{$patientDataRows->where('field','children')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="hidden md:table-cell text-sm" sortable multi-column wire:click="sortBy('status')"
                                                 :direction="$sorts['status'] ?? null">
                                    {{$patientDataRows->where('field','status')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="hidden md:table-cell text-sm" sortable multi-column wire:click="sortBy('created_at')"
                                                 :direction="$sorts['created_at'] ?? null">
                                    {{$patientDataRows->where('field','created_at')->first()->getTranslatedAttribute('display_name')}}
                                </x-table.heading>
                                <x-table.heading class="py-0 px-1 text-2xs">
                                    {{ __('voyager::generic.actions') }}
                                </x-table.heading>
                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-cool-gray-200">
                            @if ($selectPage)
                                <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                                    <x-table.cell colspan="6">
                                        @unless ($selectAll)
                                            <div>
                                                <span>You have selected <strong>{{ $patients->count() }}</strong> patient, do you want to select all <strong>{{ $patients->total() }}</strong>?</span>
                                                <x-button.link wire:click="selectAll" class="ml-1 text-blue-600">Select All
                                                </x-button.link>
                                            </div>
                                        @else
                                            <span>You are currently selecting all <strong>{{ $patients->total() }}</strong> patient.</span>
                                        @endif
                                    </x-table.cell>
                                </x-table.row>
                            @endif

                            @forelse ($patients as $patient)
                                <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $patient->id }}"
                                             :class="($patient->status->is(\App\Enums\PatientStatus::BLOCKED))?'opacity-50 cursor-not-allowed':'' ">
                                    <x-table.cell class="pr-2">
                                        <x-input.checkbox wire:model="selected" value="{{ $patient->id }}"/>
                                    </x-table.cell>
                                    <x-table.cell class="py-1 px-1">
                            <span class="inline-flex space-x-2 truncate text-sm leading-5 items-center">

                                <x-dynamic-component :component="'icon.'.$patient->gender_symbol" class="w-5 pl-1"/>
                                <p class="text-cool-gray-600 truncate text-2xs">
                                    {{ $patient->id }}
                                </p>
                            </span>
                                    </x-table.cell>
                                    <x-table.cell class="y-0 px-1  text-center">
                                        <p class="text-cool-gray-600 truncate text-xs">
                                            {!! $patient->hide_name !!}
                                        </p>
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell text-sm">
                                        <span class="text-cool-gray-900 font-medium">{{ $patient->station->title }} </span>
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell text-sm">
                                        <span class="text-cool-gray-900 font-medium">{{ $patient->age }} </span>
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell text-sm">
                                        <x-dynamic-component :component="'icon.'.$patient->marital_symbol"/>
                                        {{ $patient->marital->description }}
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell text-sm">
                                        {{ $patient->children }}
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell text-sm">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $patient->status_color }}-100 text-{{ $patient->status_color }}-800 capitalize">
                                {{ $patient->status->description }}
                            </span>
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell text-sm">
                                        {{ $patient->date_for_humans }}
                                    </x-table.cell>
                                    <x-table.cell class="py-0 px-1 text-xs md:hidden">
                                        <x-dropdown align="left">
                                            @forelse(Auth::user()->getActions('patients') as $key => $action_name)
                                                @php
                                                    $action = new $action_name();
                                                @endphp
                                                @if($action->getPolicy($patient))
                                                    <x-dropdown.item :label="$action->getTitle($patient)" :href="($patient->status->is(\App\Enums\PatientStatus::BLOCKED))?'':
                                                      $action->getRoute('patients',$action->getMethod(),$patient->id)" :icon="$action->getIcon()" />
                                                @endif
                                            @empty
                                            @endforelse
                                        </x-dropdown>
                                    </x-table.cell>
                                    <x-table.cell class="hidden md:table-cell">
                                        <div class="flex flex-wrap space-x-1 space-y-1 items-baseline">
                                            @forelse(Auth::user()->getActions('patients') as $key => $action_name)
                                                @php
                                                    $action = new $action_name();
                                                @endphp
                                                @if($action->getPolicy($patient))
                                                    <x-button sm rounded  :icon="$action->getIcon()" :color="$action->getColor()" :label="$action->getTitle($patient)"
                                                              :href="($patient->status->is(\App\Enums\PatientStatus::BLOCKED))?'':
                                                  $action->getRoute('patients',$action->getMethod(),$patient->id)"
                                                              class="{{($patient->status->is(\App\Enums\PatientStatus::BLOCKED)) ? ' opacity-75 cursor-not-allowed text-xs' : ''}}"
                                                    />
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan="11">
                                        <div class="flex justify-center items-center space-x-2">
                                            <x-icon.inbox class="h-8 w-8 text-cool-gray-400"/>
                                            <span class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('portal.patient.no-patient-found') }}</span>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            <div>
                {{ $patients->links() }}
            </div>
        </div>
    </div>

    <!-- Delete Patients Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">Delete Patient</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Delete</x-button.primary>
            </x-slot>
        </x-modal.confirmation>
    </form>

</div>

