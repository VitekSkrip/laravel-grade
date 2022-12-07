@extends('layouts.app')

@section('page-title', 'Подсчет статистики')

@section('header-logo')
    <span class="inline-block sm:inline">
        <img src="/assets/images/logo.png" width="222" height="30" alt="">
    </span>
@endsection

@section('content')

<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Генерация отчета по статистике</h1>
    <x-addArticleForm.form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @method('POST')

            <div class="block">
                <label for="field5" class="text-gray-700 font-bold">Выбор вариантов</label>
                <select id="field5" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option>Corporate event</option>
                    <option>Wedding</option>
                    <option>Birthday</option>
                    <option>Other</option>
                </select>
            </div>

            <div class="block">
                <x-addArticleForm.buttons.submit>
                    Сгенерировать отчет
                </x-addArticleForm.buttons.submit>
            </div>

    </x-addArticleForm.form>
    
</div>

@endsection