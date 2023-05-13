<header>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Список запросов на тест-драйв') }}
    </h2>
</header>
@if($testDrives->isEmpty())
    <x-panels.empty-section>
        Нет запросов
    </x-panels.empty-section>
@else
    <div class="pt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        @include('pages.manager.test-drives.table', ['testDrives' => $testDrives])
    </div>
@endif
