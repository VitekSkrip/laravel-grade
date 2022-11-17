@extends('layouts.inner')

@section('page-title', 'О компании')
@section('title', 'О компании')

@section('breadcrumbs')
    <x-panels.breadcrumbs/>
    {{ Breadcrumbs::render('about') }}
@endsection

@section('inner-content')
    <x-panels.example-content/>
@endsection
