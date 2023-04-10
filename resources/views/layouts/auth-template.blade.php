<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <title>Рога и Сила - @section('page-title')Главная страница@show</title>
    <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<header class="bg-white">
    <div class="border-b">
        <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
            <div class="flex justify-center">
                @section('header-logo')
                    <a href="{{ route('home') }}" class="inline-block sm:inline hover:opacity-75">
                        <img src="/assets/images/logo.png" width="222" height="30" alt="">
                    </a>
                @show
            </div>
            <div>
                @auth()
                    <x-panels.user_auth_menu/>
                @else
                    <x-panels.user_not_auth_menu/>
                @endauth
            </div>
        </div>
    </div>
</header>
<div class="wrapper flex flex-1 flex-col">
    <main class="flex-1 container mx-auto bg-white">
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

            @yield('inner-content')
        </div>
    </main>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')

</body>
</html>

