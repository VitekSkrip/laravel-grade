<x-layouts.app>
    <x-slot name="title">Главная страница</x-slot>

    @section('header-logo')
        <span class="inline-block sm:inline">
        <img src="/assets/images/logo1.png" width="222" height="30" alt="">
    </span>
    @endsection

    <section class="slider">
        <homepage-slider></homepage-slider>
    </section>

    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        @if ($cars)
            <x-catalog.catalog :cars="$cars"/>
        @endif
    </section>

    <section class="news-block-inverse px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="{{ route('articles.index') }}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>

        <x-homeArticles.homeArticles :homeNews="$homeNews"/>
    </section>

    <section class="pb-4 px-6">
        <div class="grid grid-cols-3 gap-6 mx-6 px-6 py-12">
            <div class="flex grid grid-cols-1">
                <a href="{{ route('callback.show') }}" class="inline-flex justify-center py-2 text-xl text-white hover:text-black rounded-lg group font-medium hover:bg-gray-200 bg-black">
                <span class="px-5 py-2.5 ease-in duration-75">
                    Обратный звонок
                </span>
                </a>
            </div>
            <div class="flex grid grid-cols-1">
                <a href="{{ route('test-drive.show') }}" class="inline-flex justify-center py-2 text-xl text-white hover:text-black rounded-lg group font-medium hover:bg-gray-200 bg-black">
                 <span class="px-5 py-2.5 ease-in duration-75">
                    Тест-драйв
                 </span>
                </a>
            </div>
            <div class="flex grid grid-cols-1">
                <a href="{{ route('callback.show') }}" class="inline-flex justify-center py-2 text-xl text-white hover:text-black rounded-lg group font-medium hover:bg-gray-200 bg-black">
                <span class="px-5 py-2.5 ease-in duration-75">
                    Запись в сервис
                 </span>
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>

