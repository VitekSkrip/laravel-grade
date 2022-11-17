@extends('layouts.inner')

@section('page-title', 'Контактная информация')

@section('title', 'Контактная информация')

@section('breadcrumbs')
    <x-panels.breadcrumbs/>
    {{ Breadcrumbs::render('contacts') }}
@endsection

@section('inner-content')
    <x-panels.example-content/>
@endsection