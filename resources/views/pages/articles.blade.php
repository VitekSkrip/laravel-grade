<x-layouts.inner>
    <x-slot name="title">Все новости</x-slot>

    @section('title', 'Все новости')

    @section('inner-content')
        <div class="space-y-4">

            <x-addArticleForm.result.result/>

            @admin()
            <a class="text-orange" href="{{ route('articles.create') }}"><span class="text-sm text-white italic rounded bg-black px-2">Создать новость</span></a>
            @endadmin

            <x-articlesPage.allArticles :allArticles="$allArticles"/>

        </div>

        <x-panels.pagination :paginator="$allArticles"/>
    @endsection
</x-layouts.inner>
