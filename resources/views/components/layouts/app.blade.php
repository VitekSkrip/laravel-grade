@props([
    'header',
    'footer',
    'title'
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-layouts.parts.head :title="isset($title) ? 'Диллерский центр - ' . $title : 'Диллерский центр'"/>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <x-layouts.navigation/>

    <!-- Page Heading -->
    @isset($header)
        {{ $header }}
    @else
        <x-layouts.parts.header/>
    @endisset

    <!-- Page Content -->
    <main>
        <div class="container mx-auto px-4">
            {{ $slot ?? ''}}
        </div>
    </main>

    @isset ($footer)
        {{ $footer }}
    @else
        <x-layouts.parts.footer/>
    @endisset
</div>
</body>
</html>
