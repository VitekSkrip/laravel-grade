<x-layouts.inner>
    <x-slot name="title">{{ $article->title }}</x-slot>

    @section('title', "$article->title")

    {{ Breadcrumbs::setCurrentRoute('articles.show', $article) }}

    @section('inner-content')
        <div class="space-y-4">

            @admin()
            <a class="text-sm" href="{{ route('articles.edit', $article) }}"><span class="text-sm text-white italic rounded bg-orange px-2">Редактировать новость</span></a>
            @endadmin

            <img src="{{ $article->image->getUrl() }}" alt="" title="">

            <x-tags.tags :tags="$article->tags"/>

            <p></p>
            {!! $article->body !!}

        </div>

        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('articles.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>
    @endsection
</x-layouts.inner>
