@props(['cars'])

<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6 p-5">
    @forelse($cars as $car)
        <x-catalog.catalog_item :car="$car"/>
    @empty
        <p class="p-4 italic text-xl">Модели не найдены</p>
    @endforelse
</div>
