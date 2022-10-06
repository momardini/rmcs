<div class="py-1 bg-gradient-to-br from-green-50 to-cyan-100">
        <div class="flex items-center justify-between md:w-full px-2 text-center py-1">
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','id')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-blue-600 truncate dark:text-white">
                    {{$patient->id}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','full_name')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-red-500 truncate dark:text-white">
                    {{$patient->full_name}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','gender')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->gender->description}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{ __('portal.patient.age') }}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->age}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','marital')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->marital->description}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','children')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->children}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','work')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->work}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','allergies')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->allergies}}
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','previous_diseases')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-xs font-medium text-gray-900 truncate dark:text-white">
                    @foreach($patient->previous_diseases as $previous_disease)
                        <span>{{ \App\Enums\DiseaseType::fromValue(json_decode($previous_disease))->description }},</span>
                    @endforeach
                </p>
            </div>
            <div class="flex-shrink min-w-0">
                <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                    {{$patientDataRows->where('field','previous_surgery')->first()->getTranslatedAttribute('display_name')}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    {{$patient->previous_surgery}}
                </p>
            </div>
        </div>
    <div
        class="bg-white w-full flex flex-col space-y-2 md:flex-row md:space-x-2 md:space-y-0 items-baseline ">
        <x-interview-card :color="'positive'" :title="__('portal.patient.signs_title')"
                          :cardClasses="'pt-2 md:w-2/12 border-0'">
            @if($sign->female_status)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-pink-300">
                    <div class="flex w-full items-center justify-between">
                                <span class="rounded-lg p-1 bg-pink-300">
                                    <x-icon.signs.female_status
                                        :pregnant="in_array(\App\Enums\FemaleStatus::PREGNANT,json_decode($sign->female_status))"
                                        :breastfeeding="in_array(\App\Enums\FemaleStatus::BREASTFEEDING,json_decode($sign->female_status))"/>
                                </span>
                        <p class="text-center text-xs">{{ $signDataRows->where('field','female_status')->first()->getTranslatedAttribute('display_name') }}</p>
                        <span class="border-r-2 p-1 bg-pink-300"><x-icon.signs.female/></span>
                    </div>
                </div>
            @endif
            @if($sign->blood_pressure)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-red-300">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->blood_pressure }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','sign_hasone_sign_relationship')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-red-300"><x-icon.signs.blood-pressure/></span>
                    </div>
                </div>
            @endif
            @if($sign->heartbeat)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-yellow-200">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->heartbeat }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','heartbeat')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-yellow-200"><x-icon.signs.heartbeat/></span>
                    </div>
                </div>
            @endif
            @if($sign->temperature)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-red-300">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->temperature }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','temperature')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-red-300"><x-icon.signs.temperature/></span>
                    </div>
                </div>
            @endif
            @if($sign->weight)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-blue-300">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->weight }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','weight')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-blue-300"><x-icon.signs.weight/></span>
                    </div>
                </div>
            @endif
            @if($sign->length)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-purple-300">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->length }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','length')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-purple-300"><x-icon.signs.length/></span>
                    </div>
                </div>
            @endif
            @if($sign->bmi)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-teal-300">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->bmi }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','sign_hasone_sign_relationship_1')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-teal-300"><x-icon.signs.bmi/></span>
                    </div>
                </div>
            @endif
            @if($sign->waistline)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-yellow-200">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->waistline }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','waistline')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-yellow-200"><x-icon.signs.waistline/></span>
                    </div>
                </div>
            @endif
            @if($sign->breathing)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-blue-200">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->breathing }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','breathing')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-blue-200"><x-icon.signs.breathing/></span>
                    </div>
                </div>
            @endif
            @if($sign->oxygen)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-orange-400">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->oxygen }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','oxygen')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-orange-400"><x-icon.signs.oxygen/></span>
                    </div>
                </div>
            @endif
            @if($sign->peak_expiratory_flow)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-green-500">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->peak_expiratory_flow }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','peak_expiratory_flow')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-green-500"><x-icon.signs.peak_expiratory_flow/></span>
                    </div>
                </div>
            @endif
            @if($sign->sugar)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-gray-300">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->sugar }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','sugar')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="border-r-2 p-1 bg-gray-300"><x-icon.signs.sugar/></span>
                    </div>
                </div>
            @endif
            @if(count(json_decode($sign->ecg)))
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-orange-500">
                    <div class="flex w-full items-center justify-between">
                        <div class="flex flex-wrap">
                            @php
                                $imageMimeTypes = ['jpg','gif','png','bmp','jpeg'];
                            @endphp
                            @foreach(json_decode($sign->ecg) as $ecg)
                                @if(str_contains(get_headers(url('/storage/'.$ecg),1)["Content-Type"],'image'))
                                    <a wire:click="setActiveImage('{{url("/storage/$ecg")}}')">
                                        <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                             src="{{ url("/storage/$ecg")}}"/>
                                    </a>
                                @else
                                    <a wire:click="setActiveImage('{{url("/storage/$ecg")}}')">
                                        <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                             src="{{ url("/storage/resource/video.png")}}"/>
                                    </a>
                                @endif

                            @endforeach
                        </div>
                        <span class="border-r-2 p-1 bg-orange-500"><x-icon.signs.ecg/></span>
                    </div>
                </div>
            @endif
            @if(count(json_decode($sign->skins)))
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-orange-500">
                    <div class="flex w-full items-center justify-between">
                        <div class="flex flex-wrap">
                            @php
                                $imageMimeTypes = ['jpg','gif','png','bmp','jpeg'];
                            @endphp
                            @foreach(json_decode($sign->skins) as $skins)
                                @if(str_contains(get_headers(url('/storage/'.$skins),1)["Content-Type"],'image'))
                                    <a wire:click="setActiveImage('{{url("/storage/$skins")}}')">
                                        <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                             src="{{ url("/storage/$skins")}}"/>
                                    </a>
                                @else
                                    <a wire:click="setActiveImage('{{url("/storage/$skins")}}')">
                                        <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                             src="{{ url("/storage/resource/video.png")}}"/>
                                    </a>
                                @endif

                            @endforeach
                        </div>
                        <span class="border-r-2 p-1 bg-orange-500"><x-icon.signs.skins/></span>
                    </div>
                </div>
            @endif
            @if(count(json_decode($sign->docs)))
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-orange-500">
                    <div class="flex w-full items-center justify-between">
                        <div class="flex flex-wrap">
                            @foreach(json_decode($sign->docs) as $docs)
                                @if(str_contains(get_headers(url('/storage/'.$docs),1)["Content-Type"],'image'))
                                    <a wire:click="setActiveImage('{{url("/storage/$docs")}}')">
                                        <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                             src="{{ url("/storage/$docs")}}"/>
                                    </a>
                                @else
                                    <a wire:click="setActiveImage('{{url("/storage/$docs")}}')">
                                        <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                             src="{{ url("/storage/resource/video.png")}}"/>
                                    </a>
                                @endif

                            @endforeach
                        </div>
                        <span class="border-r-2 p-1 bg-orange-500"><x-icon.signs.docs/></span>
                    </div>
                </div>
            @endif
            @if($sign->comment)
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-yellow-100">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm mr-1 rounded whitespace-nowrap p-1">{{ $sign->comment }}</p>
                        <p class="text-center text-xs">
                            {{ $signDataRows->where('field','comment')->first()->getTranslatedAttribute('display_name') }}
                        </p>
                        <span class="rounded-lg p-1 bg-green-100"><x-icon.signs.comment/></span>
                    </div>
                </div>
            @endif
        </x-interview-card>
        <x-interview-card :color="'sky'"
                          :title="($is_edit)?'Edit Interview': 'New Interview'"
                          :cardClasses="'md:w-7/12 border-0 pr-1'">
            <x-slot name="action">
                <x-button wire:click="save()" xs icon="check" pink label="{{__('voyager::generic.save')}}"/>
            </x-slot>
            @if(isset($appointmentDocs))
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <div class="flex w-full items-center justify-between">
                        <span class="border-l-2 p-1 text-white">{{ __('portal.patient.docs-from-assistants') }}</span>
                        <div class="flex flex-wrap">
                            @foreach($appointmentDocs as $appointmentDoc)
                                <div class="flex px-1">
                                            @if(str_contains(get_headers(url('/storage/'.$appointmentDoc),1)["Content-Type"],'image'))
                                                <a wire:click="setActiveImage('{{url("/storage/$appointmentDoc")}}')">
                                                    <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                                         src="{{ url("/storage/$appointmentDoc")}}"/>
                                                </a>
                                            @elseif(str_contains(get_headers(url('/storage/'.$appointmentDoc),1)["Content-Type"],'video'))
                                                <a wire:click="setActiveImage('{{url("/storage/$appointmentDoc")}}')">
                                                    <img onclick="$openModal('cardModal')" class="w-10 h-10 rounded-full"
                                                         src="{{ url("/storage/resource/video.png")}}"/>
                                                </a>
                                            @else
                                                <a wire:click="setActiveImage('{{url("/storage/$appointmentDoc")}}')">
                                                    <img class="w-10 h-10 " onclick="$openModal('cardModal')" src="{{ url("/storage/resource/doc.png")}}"/>
                                                </a>
                                            @endif
                                            @if($loop->last)
                                                <div class="animate-ping inline-flex absolute -top- -right-2 justify-center items-center w-3 h-3  bg-white rounded-full ">

                                                </div>
                                            @endif
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif
            <form wire:submit.prevent="save">
                <div class="flex flex-wrap items-end justify-center space-x-4 space-y-4">
                    <div class="flex-auto sm:w-full pl-4">
                        <x-textarea
                            rows="2"
                            label="{{$interviewDataRows->where('field','clinical_examination')->first()->getTranslatedAttribute('display_name')}}"
                            wire:model.defer="editing.clinical_examination" />
                    </div>
                    <div class="flex-auto sm:w-full">
                        <x-input type="text" label="{{$interviewDataRows->where('field','impression')->first()->getTranslatedAttribute('display_name')}}"
                                 :placeholder="$interviewDataRows->where('field','impression')->first()->getTranslatedAttribute('display_name')"
                                 wire:model.defer="editing.impression"/>
                    </div>
                    <div class="flex-auto sm:w-1/4">
                        <x-input type="text" label="{{$interviewDataRows->where('field','action_request')->first()->getTranslatedAttribute('display_name')}}"
                                 :placeholder="$interviewDataRows->where('field','action_request')->first()->getTranslatedAttribute('display_name')"
                                 wire:model.defer="editing.action_request"/>
                    </div>
                    <div class="flex-auto">
                        <x-input type="text" label="{{$interviewDataRows->where('field','xray_request')->first()->getTranslatedAttribute('display_name')}}"
                                 :placeholder="$interviewDataRows->where('field','xray_request')->first()->getTranslatedAttribute('display_name')"
                                 wire:model.defer="editing.xray_request"/>
                    </div>

                    {{--                    analytics card--}}
                    <div class="flex-auto sm:w-full">
                        <x-card :title="__('portal.patient.analytics')" :color="'red-200'" card-classes="py-1">
                            <x-slot name="action">
                                <x-button rounded sm negative label="{{ __('portal.patient.add_analytics') }}" onclick="$openModal('analyticModal')" />
                                @if($editing->analytic_results->count())
                                    <a onclick="$openModal('analyticResultModal')">
                                        <x-button rounded sm primary label="{{ __('portal.patient.show_analytic_results') }}" wire:click.prevent="showAnalyticResult()" />
                                    </a>
                                @endif

                            </x-slot>
                            @foreach($selectedAnalytics as $selectedAnalytic)
                                @if(json_decode($selectedAnalytic))
                                    <x-button wire:click.prevent="removeAnalytic({{$loop->index}})" xs icon="x" dark label="{{json_decode($selectedAnalytic)?->title}}" />
                                @endif
                            @endforeach
                        </x-card>
                    </div>
{{--                    recipe card--}}
                    <div class="flex-auto sm:w-full">
                        <x-card :title="__('portal.patient.recipe')" :color="'blue-200'" card-classes="py-1">
                            <x-slot name="action">
                                <x-button rounded sm info label="{{ __('portal.patient.add_medicine') }}" wire:click.prevent="addRecipe()"/>
                            </x-slot>
                            @foreach ($interviewRecipes as $index => $interviewRecipe)
                                <div class="flex flex-wrap items-end justify-center space-x-1 space-y-1">
                                    <div class="flex-auto sm:w-3/12">
                                        <x-input
                                            :label="$recipeDataRows->where('field','medicine_title')->first()->getTranslatedAttribute('display_name')"
                                            :placeholder="$recipeDataRows->where('field','medicine_title')->first()->getTranslatedAttribute('display_name')"
                                            type="text" wire:model.defer="interviewRecipes.{{$index}}.medicine_title"/>
                                    </div>
                                    <x-native-select
                                        :label="$recipeDataRows->where('field','repeats')->first()->getTranslatedAttribute('display_name')"
                                        :placeholder="$recipeDataRows->where('field','repeats')->first()->getTranslatedAttribute('display_name')"
                                        wire:model.defer="interviewRecipes.{{$index}}.repeats"
                                        :options="$repeats"
                                        option-label="name"
                                        option-value="id"
                                        additional-class="flex-auto sm:w-2/12"
                                    >
                                    </x-native-select>
                                    <x-native-select
                                        :label="$recipeDataRows->where('field','pharmaceutical_form')->first()->getTranslatedAttribute('display_name')"
                                        :placeholder="$recipeDataRows->where('field','pharmaceutical_form')->first()->getTranslatedAttribute('display_name')"
                                        wire:model.defer="interviewRecipes.{{$index}}.pharmaceutical_form"
                                        :options="$pharmaceutical_form"
                                        option-label="name"
                                        option-value="id"
                                        additional-class="flex-auto sm:w-2/12"
                                    >
                                    </x-native-select>
                                    <div class="flex-auto sm:w-1/12">
                                        <x-input type="number"
                                                 :label="$recipeDataRows->where('field','count')->first()->getTranslatedAttribute('display_name')"
                                                 :placeholder="$recipeDataRows->where('field','count')->first()->getTranslatedAttribute('display_name')"
                                                 wire:model.defer="interviewRecipes.{{$index}}.count"/>
                                    </div>
                                    <div class="flex-auto sm:w-3/12">
                                        <x-input type="text"
                                                 :label="$recipeDataRows->where('field','note')->first()->getTranslatedAttribute('display_name')"
                                                 :placeholder="$recipeDataRows->where('field','note')->first()->getTranslatedAttribute('display_name')"
                                                 wire:model.defer="interviewRecipes.{{$index}}.note"/>
                                    </div>
                                    <div class="flex-auto">
                                        <x-button.circle negative icon="x" wire:click.prevent="removeRecipe({{$index}})"/>
                                    </div>
                                </div>
                            @endforeach
                        </x-card>
                    </div>
{{--                    docs card--}}
                    <div class="flex-auto sm:w-full">
                        @if ($errors->first('docs'))
                            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('docs') }}</div>
                        @endif
                        <label for="{{$interviewDataRows->where('field','docs')->first()->getTranslatedAttribute('display_name')}}"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('docs.*')  text-negative-600 @enderror">
                            {{$interviewDataRows->where('field','docs')->first()->getTranslatedAttribute('display_name')}}
                        </label>
                        <x-input.filepond wire:model="docs" multiple capture :files="$editing->docs"/>
                        @error('docs.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="flex-auto sm:w-6/12">
                        <x-input type="text" label="{{$interviewDataRows->where('field','note')->first()->getTranslatedAttribute('display_name')}}"
                                 :placeholder="$interviewDataRows->where('field','note')->first()->getTranslatedAttribute('display_name')"
                                 wire:model.defer="editing.note"/>
                    </div>
                    <div class="flex-auto ">
                        <x-input type="text" label="{{$interviewDataRows->where('field','discovered')->first()->getTranslatedAttribute('display_name')}}"
                                 :placeholder="$interviewDataRows->where('field','discovered')->first()->getTranslatedAttribute('display_name')"
                                 wire:model.defer="editing.discovered"/>
                    </div>
                    <x-slot name="footer">
                        <div class="flex justify-between items-center">
                            <x-button outline gray label="{{__('voyager::generic.cancel')}}" wire:click="cancel()"/>
                            <x-button wire:click="save()"  primary label="{{__('voyager::generic.save')}}" :disabled="$uploading"/>
                        </div>
                    </x-slot>

                </div>
            </form>
        </x-interview-card>
        <x-interview-card :color="'amber'" :title="__('portal.patient.oldInterviews')"
                          :cardClasses="'md:w-3/12 border-0'">

            @foreach($oldInterviews as $oldInterview)
                <div class="mb-2" x-data="{ expanded: false }" @click="expanded = ! expanded">
                    <x-card>
                        <x-slot name="header">
                            <div class="flex justify-between items-center">
                                <x-button xs icon="calendar" flat negative
                                          :label="$oldInterview->created_at->translatedFormat('M d - Y')"/>
                                <x-button xs right-icon="user-circle" flat primary
                                          :label="$oldInterview->appointment->doctor->name"/>
                            </div>
                        </x-slot>
                        <p x-show="!expanded" class="text-center text-xs w-full">{{ __('portal.patient.show-details') }}</p>
                        <ul class="list-outside list-disc  text-xs text-right" x-show="expanded" x-collapse>
                            @if($oldInterview->clinical_examination)
                                <li class="text-justify"><span class="text-red-800">{{$interviewDataRows->where('field','clinical_examination')->first()->getTranslatedAttribute('display_name')}} : </span>{{$oldInterview->clinical_examination}}
                                </li>
                            @endif
                            @if($oldInterview->action_request)
                                <li class="text-justify"><span class="text-red-800">{{$interviewDataRows->where('field','action_request')->first()->getTranslatedAttribute('display_name')}} : </span>{{$oldInterview->action_request}}
                                </li>
                            @endif
                            @if($oldInterview->xray_request)
                                <li class="text-justify"><span class="text-red-800">{{$interviewDataRows->where('field','xray_request')->first()->getTranslatedAttribute('display_name')}} : </span>{{$oldInterview->xray_request}}
                                </li>
                            @endif
                            @if(count($oldInterview->analytic_results))
                                <li class="text-justify"><span class="text-red-800">{{ __('portal.patient.analytic_result') }} : </span>
                                </li>
                                <table class="px-5">
                                    <tbody>
                                    @foreach($oldInterview->analytic_results as $analytic_result)
                                        <tr>
                                            <td class="border-2 text-center"><span class="text-green-700">{{$analytic_result->title}} : </span>
                                            </td>
                                            <td class="border-2">{{$analytic_result->pivot->result}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @endif
                            @if(count($oldInterview->recipes))
                                <li class="text-justify"><span
                                        class="text-red-800">{{ __('portal.patient.recipes') }} : </span></li>
                                <ul class="list-disc text-xs text-right px-5">
                                    @foreach($oldInterview->recipes as $recipe)
                                        <li class="text-justify"><span
                                                class="text-blue-700">{{$recipe->medicine_title}}</span></li>
                                    @endforeach
                                </ul>

                            @endif
                        </ul>
                        <x-slot name="footer">
                            <div class="flex justify-between items-center">
                                <x-button xs icon="map" flat green :label="$oldInterview->appointment->station->title"/>
                                @if($oldInterview->impression)
                                    <x-button xs right-icon="document-text" flat warning
                                              :label="$oldInterview->impression"/>
                                @endif
                            </div>
                        </x-slot>
                    </x-card>
                </div>
            @endforeach

        </x-interview-card>


    </div>
    <x-modal.card blur wire:model.defer="analyticModal" fullscreen  :title="__('portal.patient.analytics')">
        <div class="overflow-y-auto">
            <table class="w-full text-left border-collapse">

                <tbody class="align-baseline " style="direction: ltr;">
                    @foreach(array_chunk($analytics->toArray(), 7) as $i=>$set)
                        <tr>
                            @foreach($set as $j=>$analytic)
                                <td class="p-2.5 font-mono text-xs text-blue-600 whitespace-nowrap">
                                    <x-checkbox wire:model.debounce="selectedAnalytics.{{$analytic['id']}}" value="{{json_encode($analytic)}}"
                                                :id="'selectedAnalytics'.$analytic['id']"
                                                :name="'selectedAnalytics'.$analytic['id']"
                                    >
                                        <x-slot name="label" for="selectedAnalytics{{$analytic['id']}}"><span class="@if($analytic['available']) text-green-700 @else text-red-800 @endif">{{$analytic['title']}}</span></x-slot>
                                    </x-checkbox>
                                </td>
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <x-slot name="footer">
            <div class="flex justify-center">
                <x-button  negative label="Close" x-on:click="close" />
            </div>
        </x-slot>
    </x-modal.card>
    <x-modal.card blur wire:model.defer="cardModal" blur
                  x-on:close="if (typeof(document.getElementById('videoPlayer')) != 'undefined' && document.getElementById('videoPlayer') != null){document.getElementById('videoPlayer').pause();}">
        @if($activeDoc['type'] == 'image')
            <div class="flex justify-center">
                <img
                    src="{{$activeDoc['data']}}"
                    class="block h-full"
                    alt="Wild Landscape"
                />
            </div>
        @elseif($activeDoc['type'] == 'video')
            <div class="flex justify-center">
                <video src="{{$activeDoc['data']}}" autoplay height="100%" controls id="videoPlayer"/>
            </div>
        @else
            <div class="flex justify-center">
{{--                <iframe src="{{$activeDoc['data']}}#view=fitH"  height="100%" width="100%">--}}
{{--                </iframe>--}}
                <embed src="{{$activeDoc['data']}}" type="application/pdf" style="min-height:122vh;width:100%" />
            </div>
        @endif
            <div wire:loading>
                Processing Payment...
            </div>
    </x-modal.card>
    <x-modal.card blur wire:model.defer="analyticResultModal"   :title="__('portal.patient.analytics')">
        <div class="overflow-y-auto" >
            <iframe width="100%" height="100%" class="w-full aspect-auto" src="{{$analyticResultsRoute}}"  style="min-height:125vh;width:100%" ></iframe>
{{--            <embed src="{{$analyticResults}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" style="min-height:122vh;width:100%" />--}}
        </div>
        <x-slot name="footer">
            <div class="flex justify-center ">
                <x-button  negative label="Close" x-on:click="close" />
            </div>
        </x-slot>
    </x-modal.card>
</div>
