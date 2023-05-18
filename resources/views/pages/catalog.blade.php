<x-layouts.app
    page-title="Каталог"
    title="Каталог"
>
    @if ($catalogData->currentCategory)
        {{ Breadcrumbs::setCurrentRoute('category', $catalogData->currentCategory) }}
    @else
        {{ Breadcrumbs::setCurrentRoute('catalog') }}
    @endif

    <x-panels.category-menu />

    <x-catalog.filter class="my-4" method="get" :currentCategory="$catalogData->currentCategory" :filter-values="$catalogData->filter"/>

    <x-catalog.catalog :cars="$catalogData->cars" />

    <x-panels.pagination :paginator="$catalogData->cars" />

</x-layouts.app>
