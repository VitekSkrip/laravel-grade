@extends('layouts.app')

@section('page-title', 'Редактирование новости')

@push('styles')
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>

        <x-addArticleForm.result.result/>
        
        <x-addArticleForm.form action="{{ route('articles.update', $article) }}" method="POST">
                @method('PATCH')

                <x-addArticleForm.input.all :article="$article"/>

                <div class="block">

                    <x-addArticleForm.buttons.submit>
                        Сохранить
                    </x-addArticleForm.buttons.submit>

                </div>

        </x-addArticleForm.form>

        <x-deleteArticleForm.delete action="{{ route('articles.destroy', $article)}}" method="POST">
            Удалить
        </x-deleteArticleForm.delete>
    
    </div>

@endsection
