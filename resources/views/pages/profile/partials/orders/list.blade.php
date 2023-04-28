<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Список заказов') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Информация о всех ваших активных заказах.") }}
        </p>
    </header>
    @if($orders->isEmpty())
        <x-panels.empty-section>
            У Вас нет заказов
        </x-panels.empty-section>
    @else
        <div class="pt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            @include('pages.profile.partials.orders.table', ['orders' => $orders])
        </div>
    @endif
</section>
