@extends('layouts.app')

@section('page_title', __('voyager::generic.add').' '.$dataType->getTranslatedAttribute('display_name_singular'))
@push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush
@section('content')
    <livewire:patients.analytics-result-add-edit :patient="$patient" :dataType="$dataType"/>
@stop


@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush
