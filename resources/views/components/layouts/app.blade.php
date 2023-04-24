@props([
    'header',
    'footer',
    'title'
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-layouts.parts.head :title="isset($title) ? 'Диллерский центр - ' . $title : 'Диллерский центр'"/>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    <!-- Page Heading -->

    <x-layouts.parts.header>
        @isset($header)
            {{ $header }}
        @else
            <x-panels.navigation />
        @endisset
    </x-layouts.parts.header>

    {{ Breadcrumbs::render() }}

    <!-- Page Content -->
    <main class="flex-1 container mx-auto bg-white">
        {{ $slot ?? ''}}
    </main>

    @isset ($footer)
        {{ $footer }}
    @else
        <x-layouts.parts.footer />
    @endisset
</div>
</body>
</html>
