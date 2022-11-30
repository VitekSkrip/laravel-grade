@extends('layouts.inner')

@section('page-title', 'Салоны')

@section('title', 'Салоны')

@section('inner-content')
    <x-salons.index :salons="$salons"/>
@endsection
