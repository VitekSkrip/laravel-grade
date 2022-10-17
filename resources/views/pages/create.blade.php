@extends('layouts.app')

@section('page-title', 'Создание новости')

@push('styles')
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>

        <x-addArticleForm.result.error/>

        <x-addArticleForm.result.success/>

        <form action="" method="post">
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <!-- <label for="field2" class="text-gray-700 font-bold">Пример поля с ошибкой валидации</label>
                    <input id="field2" type="text" class="mt-1 block w-full rounded-md border-red-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                    <span class="text-xs italic text-red-600">Поле не заполнено</span> -->

                    <x-addArticleForm.input.group for="title">
                        <x-addArticleForm.input.text id="title"/>
                    </x-addArticleForm.input.group>

                    <x-addArticleForm.input.group for="description">
                        <x-addArticleForm.input.text id="description"/>
                    </x-addArticleForm.input.group>

                    <x-addArticleForm.input.group for="body">
                        <x-addArticleForm.input.textarea id="body"/>
                    </x-addArticleForm.input.group>

                    <div class="block">
                        <x-addArticleForm.input.checkbox id="is_published"/>
                    </div>

                    <div class="block">

                        <x-addArticleForm.buttons.orange/>

                        <x-addArticleForm.buttons.grey/>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
