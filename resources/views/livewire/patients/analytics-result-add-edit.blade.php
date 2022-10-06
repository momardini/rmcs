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
    <div class="bg-white  flex justify-center pt-2">
        <x-card :color="'amber'" :title="__('portal.patient.oldInterviews')"
                          :cardClasses="'md:w-8/12 border-0'">
            @foreach($oldInterviews as $oldInterview)
                <div class="p-3">
                    <x-card >
                        <x-slot name="header">
                            <div class="flex justify-around p-2">
                                <a onclick="$openModal('addAnalyticResultModal')">
                                    <x-button xs icon="beaker"  negative wire:click.prevent="addAnalyticResult({{$oldInterview->id}})"
                                                                                         :label="__('portal.patient.add-analytic-results')"/>
                                </a>
                                @if($oldInterview->analytic_results->count())
                                <a onclick="$openModal('printAnalyticResultModal')">
                                    <x-button xs right-icon="printer"  primary wire:click.prevent="printAnalyticResult({{$oldInterview->id}})"
                                                                                         :label="__('portal.patient.print-analytic-result')"/>
                                </a>
                                @endif
                            </div>
                        </x-slot>
                        <ul class="list-outside list-disc  text-xs text-right">
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
                        </ul>
                        <x-slot name="footer">
                            <div class="flex justify-between items-center">
                                <x-button xs icon="calendar" flat negative
                                          :label="$oldInterview->created_at->translatedFormat('d M - Y')"/>
                                <x-button xs right-icon="user-circle" flat primary
                                          :label="$oldInterview->appointment->doctor->name"/>
                            </div>
                        </x-slot>
                    </x-card>
                </div>
            @endforeach

        </x-card>


    </div>
    <x-modal.card blur wire:model.defer="addAnalyticResultModal" >
        <form wire:submit.prevent="save">
                        @foreach ($interviewAnalytics as $index=>$interviewAnalytic)
                            <div class="flex items-center space-x-1">
                                <div class="sm:w-3/12">
                                    <x-input
                                        disabled
                                        label="{{$analyticDataRows->where('field','title')->first()->getTranslatedAttribute('display_name')}}"
                                        :placeholder="$analyticDataRows->where('field','title')->first()->getTranslatedAttribute('display_name')"
                                        type="text" value="{{$interviewAnalytic['title']}}"/>
                                </div>
                                <div class="flex-auto">
                                    <x-textarea
                                        rows="6"
                                        label="{{ __('portal.patient.analytic_result') }}"
                                        wire:model.defer="interviewAnalytics.{{$index}}.pivot.result" />
                                </div>
                            </div>
                        @endforeach
                <x-slot name="footer">
                    <div class="flex justify-between items-center">
                        <x-button outline gray label="Cancel" wire:click="cancel()"/>
                        <x-button wire:click="save()"  primary label="Save"/>
                    </div>
                </x-slot>
        </form>
    </x-modal.card>
    <x-modal.card blur wire:model.defer="printAnalyticResultModal"   :title="__('portal.patient.analytics')">
        <div class="overflow-y-auto" >
            <iframe width="100%" height="100%" class="w-full aspect-auto" src="{{$analyticResultsRoute}}"  style="min-height:125vh;width:100%" ></iframe>
        </div>
        <x-slot name="footer">
            <div class="flex justify-center ">
                <x-button  negative label="Close" x-on:click="close" />
            </div>
        </x-slot>
    </x-modal.card>
</div>
