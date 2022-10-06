@php
    $is_edit = !is_null($dataTypeContent->getKey());
@endphp
@extends('layouts.app')

@section('page_title', __('voyager::generic.'.($is_edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))
@push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush
@section('content')
    <livewire:patients.interview-add-edit :is_edit="$is_edit" :interview="$dataTypeContent" :patient="$patient" :dataType="$dataType"/>
@stop


@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded',function (){
            Echo.channel('patients')
                .listen('AppointmentUpdated', (e) => {
                    // console.log('its worked'+ e.appointmentId);
                    window.livewire.emit('AppointmentUpdatedLW:'+ e.appointmentId,e.appointmentId);
                });
        });

    </script>
@endpush
