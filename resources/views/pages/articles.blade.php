@extends('layouts.inner')

@section('page-title', 'Все новости')
@section('title', 'Все новости')

@section('inner-content')
            <div class="space-y-4">
                
                <x-addArticleForm.result.result/>

                <a class="text-orange" href="{{ route('articles.create') }}"><span class="text-sm text-white italic rounded bg-black px-2">Создать новость</span></a>

                <x-articlesPage.allArticles :allArticles="$allArticles"/>
            
            </div>
@endsection
