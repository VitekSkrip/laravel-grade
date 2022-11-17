@extends('layouts.app')

@push('styles')
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@section('breadcrumbs')
    <!-- <x-panels.breadcrumbs/> -->
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
