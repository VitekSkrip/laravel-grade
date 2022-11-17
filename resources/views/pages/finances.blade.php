@extends('layouts.inner')

@section('page-title', 'Финансовый отдел')

@section('title', 'Финансовый отдел')

@section('breadcrumbs')
    <x-panels.breadcrumbs/>
    {{ Breadcrumbs::render('finances') }}
@endsection

@section('inner-content')
    <x-panels.example-content/>
@endsection