<x-layouts.inner>
    <x-slot name="title">Отчеты по статистике</x-slot>

    @section('title', 'Отчеты по статистике')

    @section('inner-content')
        <a class="text-orange" href="{{ route('statistics') }}"><span class="text-sm text-white italic rounded bg-black px-2">Статистика</span></a>
    @endsection
</x-layouts.inner>
