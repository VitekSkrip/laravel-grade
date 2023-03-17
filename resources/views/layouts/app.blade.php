<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')

    <title>Рога и Сила - @section('page-title')Главная страница@show</title>
    <link href="/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">

<div id="app">
    <div class="wrapper flex flex-1 flex-col">

        <x-panels.header/>

        {{ Breadcrumbs::render() }}

        <main class="flex-1 container mx-auto bg-white">
            @yield('content')
        </main>

        <x-panels.footer/>

    </div>
</div>

</body>
</html>
