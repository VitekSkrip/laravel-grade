@extends('layouts.inner')

@section('page-title', 'Условия продаж')

@section('title', 'Условия продаж')

@section('breadcrumbs')
    <x-panels.breadcrumbs/>
    {{ Breadcrumbs::render('sales') }}
@endsection

@section('inner-content')
    <x-panels.example-content/>
@endsection