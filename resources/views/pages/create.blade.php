@extends('layouts.app')

@section('page-title', 'Создание новости')

@push('styles')
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>

        <x-addArticleForm.result.result/>
        
        <x-addArticleForm.form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                @method('POST')

                <x-addArticleForm.input.all :article="$article"/>

                <div class="block">

                    <x-addArticleForm.buttons.submit>
                        Создать
                    </x-addArticleForm.buttons.submit>

                    <x-addArticleForm.buttons.cancel>
                        Отменить
                    </x-addArticleForm.buttons.cancel>

                </div>

        </x-addArticleForm.form>
    
    </div>

@endsection
