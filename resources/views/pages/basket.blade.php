<x-layouts.app>
    <x-slot name="title">Корзина</x-slot>

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Корзина</h1>

        @if($basketProducts->isEmpty())
            <x-panels.empty-section>
                В вашей корзине нет товаров
            </x-panels.empty-section>
        @else
            <x-basket.table :basketProducts="$basketProducts" :totalCost="$totalCost" :totalQuantity="$totalQuantity" />
        @endif

        <x-panels.messages.flashes />
    </div>
</x-layouts.app>
