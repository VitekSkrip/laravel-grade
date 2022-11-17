@extends('layouts.inner')

@section('page-title', 'Для клиентов')

@section('title', 'Для клиентов')

@section('breadcrumbs')
    <x-panels.breadcrumbs/>
    {{ Breadcrumbs::render('clients') }}
@endsection

@section('inner-content')
    <x-panels.example-content/>
@endsection
