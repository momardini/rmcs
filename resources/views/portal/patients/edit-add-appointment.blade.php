@php
    $is_edit = !is_null($dataTypeContent->getKey());
@endphp
@extends('layouts.app')

@section('page_title', __('voyager::generic.'.($is_edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('content')
    <livewire:patients.appointment-add-edit :is_edit="$is_edit" :appointment="$dataTypeContent" :patient="$patient" />
@stop


