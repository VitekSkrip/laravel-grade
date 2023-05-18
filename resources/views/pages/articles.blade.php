<x-layouts.inner>
    <x-slot name="title">Все новости</x-slot>

    @section('title', 'Все новости')

    @section('inner-content')
        <div class="space-y-4">
            <x-panels.messages.flashes />

            <x-articlesPage.allArticles :allArticles="$allArticles"/>
        </div>

        <x-panels.pagination :paginator="$allArticles"/>
    @endsection
</x-layouts.inner>
