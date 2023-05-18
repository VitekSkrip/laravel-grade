<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Список заявок на обратный звонок') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Информация о всех активных заявках.") }}
        </p>
    </header>
    @if($callbacks->isEmpty())
        <x-panels.empty-section>
            Нет заявок
        </x-panels.empty-section>
    @else
        <div class="pt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            @include('pages.manager.callbacks.table', ['callbacks' => $callbacks])
        </div>
    @endif
</section>
