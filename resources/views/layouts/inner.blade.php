@extends('layouts.app')

@push('styles')
    <link href="assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('breadcrumbs')
    <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
        <a class="hover:text-orange" href="index.html">Главная</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
        </svg>
        <span>Легковые</span>
    </nav>
@endsection

@section('content')
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">

        <aside class="hidden sm:block col-span-1 border-r p-4">
            <x-panels.left-menu/>
        </aside>

        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
    
                @yield('inner-content')
        </div>
    </div>
@endsection
