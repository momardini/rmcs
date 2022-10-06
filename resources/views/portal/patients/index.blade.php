@extends('layouts.app')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Patients') }}
    </h2>
@stop
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
@endpush
@section('content')
                <livewire:patients.patients-table />
@stop

@push('scripts')
    <script src="https://unpkg.com/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://unpkg.com/trix@1.2.3/dist/trix.js"></script>
@endpush

