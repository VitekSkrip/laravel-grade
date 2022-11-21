@extends('layouts.app')

@section('page-title', 'Каталог машин')

@push('styles')
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
@endpush

@if ($currentCategory)
    {{ Breadcrumbs::setCurrentRoute('category', $currentCategory) }}
@else
    {{ Breadcrumbs::setCurrentRoute('catalog') }}
@endif

@section('content')
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Каталог машин</h1>

        <x-carsCatalog.catalog :cars="$cars"/>
    </div>

    <x-panels.pagination :paginator="$cars"/>
@endsection
