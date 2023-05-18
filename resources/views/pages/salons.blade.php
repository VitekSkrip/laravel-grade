<x-layouts.inner>
    <x-slot name="title">О компании</x-slot>

    @section('title', 'Салоны')

    @section('inner-content')
        <x-salons.index :salons="$salons"/>
    @endsection
</x-layouts.inner>
