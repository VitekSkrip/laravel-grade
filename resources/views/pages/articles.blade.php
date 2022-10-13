@extends('layouts.inner')

@section('page-title', 'Все новости')
@section('title', 'Все новости')

@section('inner-content')
            <div class="space-y-4">

                <x-panels.allArticles :allArticles="$allArticles"/>
            
            </div>
    </div>
@endsection
