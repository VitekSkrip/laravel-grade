@extends('layouts.app')

@push('styles')
<link href="/assets/css/main_page_template_styles.css" rel="stylesheet">
@endpush

@section('page-title')

@section('header-logo')
    <span class="inline-block sm:inline">
        <img src="/assets/images/logo.png" width="222" height="30" alt="">
    </span>
@endsection

@section('content')

    <x-bannersSection.banners :banners="$banners"/> 
    
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
            @if ($cars)
                <x-carsCatalog.catalog :cars="$cars"/>
            @endif
    </section>
    <section class="news-block-inverse px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="{{ route('articles.index') }}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>

        <x-homeArticles.homeNews :homeNews="$homeNews"/>
        
    </section>

@endsection