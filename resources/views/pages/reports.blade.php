@extends('layouts.inner')

@section('page-title', 'Отчеты')

@section('title', 'Отчеты')

@section('inner-content')
    <a class="text-orange" href="{{ route('statistics') }}"><span class="text-sm text-white italic rounded bg-black px-2">Статистика</span></a>
@endsection
