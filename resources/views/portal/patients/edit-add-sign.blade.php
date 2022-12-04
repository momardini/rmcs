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
    <livewire:patients.sign-add-edit :is_edit="$is_edit" :sign="$dataTypeContent" :patient="$patient" :dataType="$dataType"/>
@stop


@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

@endpush
