@extends('layouts.inner')

@section('page-title', 'Все новости')
@section('title', 'Все новости')

@section('inner-content')
            <div class="space-y-4">

                <x-articlesPage.allArticles :allArticles="$allArticles"/>
            
            </div>
@endsection
