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
    <x-addArticleForm.form action="{{ route('generate.stat') }}" method="post" id="generateStatForm">
            @method('POST')

            <div class="block">
                <label for="selected_fields" class="text-gray-700 font-bold">Выбор вариантов</label>
                <select id="selected_fields" name="selected_fields[]" multiple="multiple" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="cars_count">Общее количество машин</option>
                    <option value="articles_count">Общее количество новостей</option>
                    <option value="mostPopularTag">Тег, у которого больше всего новостей на сайте</option>
                    <option value="longest_article">Самая длинная новость</option>
                    <option value="shortest_article">Самая короткая новость</option>
                    <option value="avgArticlesTag">Средние количество новостей у тега</option>
                    <option value="mostTaggableArticle">Самая тегированная новость</option>
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