<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Главная', route('home'));
});

Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('О компании', route('about'));
});

Breadcrumbs::register('finances', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Финансовый отдел', route('finances'));
});

Breadcrumbs::register('clients', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Для клиентов', route('clients'));
});

Breadcrumbs::register('contacts', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Контактная информация', route('contacts'));
});

Breadcrumbs::register('sales', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Условия продаж', route('sales'));
});

Breadcrumbs::register('catalog', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Каталог', route('catalog'));
});

Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('catalog');

    foreach ($category->ancestors as $ancestor) {
        $breadcrumbs->push($ancestor->name, route('catalog', ['slug' => $ancestor->slug]));
    }

    $breadcrumbs->push($category->name, route('catalog', ['slug' => $category->slug]));
});

Breadcrumbs::register('car', function ($breadcrumbs, $car) {
    // dd($car);
    $breadcrumbs->parent('category', $car->category);
    $breadcrumbs->push($car->name, route('product', $car));
});

Breadcrumbs::register('articles', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Новости', route('articles.index'));
});

Breadcrumbs::register('article', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('articles');
    $breadcrumbs->push($article->title, route('articles.show', $article->slug));
});


