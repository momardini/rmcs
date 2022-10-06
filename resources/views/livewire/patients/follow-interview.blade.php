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
        class="bg-white w-full flex flex-col space-y-2 md:flex-row md:space-x-2 md:space-y-0 items-baseline justify-center pt-2">
        <x-interview-card :color="'sky'"
                          :title="'Follow Interview'"
                          :cardClasses="'md:w-8/12 border-0 pr-1'">
            @if(isset($editing->interview))
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-gradient-to-r from-blue-200 via-blue-600 to-blue-800">
                    <div class="flex w-full items-center justify-between">
                        <a onclick="$openModal('pdfModal')">
                        <x-button rounded sm negative label="{{ __('portal.patient.print-analytics-request') }}" wire:click.prevent="showAnalyticRequest()" />
                        </a>
                        @if($editing->interview->analytic_results->count())
                            <a onclick="$openModal('pdfModal')">
                                <x-button rounded sm primary label="{{ __('portal.patient.show_analytic_results') }}" wire:click.prevent="showAnalyticResult()" />
                            </a>
                        @endif
                        @if($editing->interview->recipes->count())
                            <a onclick="$openModal('pdfModal')">
                                <x-button rounded sm green label="{{ __('portal.patient.print_recipe') }}" wire:click.prevent="showRecipes()" />
                            </a>
                        @endif
                        @if(isset($editing->interview->xray_request))
                            <a onclick="$openModal('pdfModal')">
                                <x-button rounded sm green label="{{ __('portal.patient.xray_request') }}" wire:click.prevent="showXrayRequest()" />
                            </a>
                        @endif
                        @if(isset($editing->interview->action_request))
                            <a onclick="$openModal('pdfModal')">
                                <x-button rounded sm green label="{{ __('portal.patient.action_request') }}" wire:click.prevent="showActionRequest()" />
                            </a>
                        @endif
                    </div>
                </div>
            @endif
            @if(isset($appointmentDocs))
                <div class="flex items-center mb-2 rounded justify-between p-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <div class="flex w-full items-center justify-between">
                        <span class="border-l-2 p-1 text-white">{{ __('portal.patient.docs-from-doctor') }}</span>
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
                <div class="flex flex-wrap items-end justify-center space-x-4 space-y-4">

                    {{--                    docs card--}}
                    <div class="flex-auto sm:w-full">
                        @if ($errors->first('docs'))
                            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('docs') }}</div>
                        @endif
                        <label for="docs"
                               class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2 @error('docs.*')  text-negative-600 @enderror">
                            {{ __('portal.patient.documents-for-appointment') }}
                        </label>
                        <x-input.filepond wire:model="docs" multiple capture :files="$editing->docs"/>
                        @error('docs.*')
                        <div class="mt-1 text-red-500 text-sm">{{ $message }} </div>
                        @enderror
                    </div>
                </div>
            <x-slot name="footer">
                <div class="flex justify-center items-center" >
                    <x-button wire:click.prevent="saveDocs()" primary label="{{__('voyager::generic.save')}}"  :disabled="$uploading" />
                </div>
            </x-slot>
        </x-interview-card>
    </div>
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
    <x-modal.card blur wire:model.defer="pdfModal"   :title="__('portal.patient.analytics')">
        <div class="overflow-y-auto" >
            <iframe width="100%" height="100%" class="w-full aspect-auto" src="{{$pdfRoute}}"  style="min-height:125vh;width:100%" ></iframe>
        </div>
        <x-slot name="footer">
            <div class="flex justify-center ">
                <x-button  negative label="Close" x-on:click="close" />
            </div>
        </x-slot>
    </x-modal.card>
</div>
