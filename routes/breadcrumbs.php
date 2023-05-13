
<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Главная', route('home'));
});

Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('О компании', route('about'));
});

Breadcrumbs::register('callback.show', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Обратный звонок', route('callback.show'));
});

Breadcrumbs::register('test-drive.show', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Запись на тест-драйв', route('test-drive.show'));
});

Breadcrumbs::register('manager.test-drive.edit', function ($breadcrumbs, $testDrive) {
    $breadcrumbs->parent('manager.manager');
    $breadcrumbs->push('Изменение заявки', route('manager.test-drive.edit', $testDrive));
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

Breadcrumbs::register('product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('category', $product->category);
    $breadcrumbs->push($product->name, route('product', $product));
});

Breadcrumbs::for('articles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Новости', route('articles.index'));
});

Breadcrumbs::for('articles.show', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('articles.index');
    $breadcrumbs->push($article->title, route('articles.show', $article->slug));
});

Breadcrumbs::for('articles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('articles.index');
    $breadcrumbs->push('Создание', route('articles.create'));
});

Breadcrumbs::for('articles.edit', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('articles.show', $article);
    $breadcrumbs->push('Редактирование', route('articles.edit', $article->slug));
});

Breadcrumbs::for('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Авторизация', route('login'));
});

Breadcrumbs::for('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Регистрация', route('register'));
});

Breadcrumbs::for('profile.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Личный кабинет', route('profile.edit'));
});

Breadcrumbs::for('basket', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Корзина', route('basket'));
});

Breadcrumbs::for('admin.admin', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Управление сайтом', route('admin.admin'));
});

Breadcrumbs::for('admin.cars.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.admin');
    $breadcrumbs->push('Управление моделями', route('admin.cars.index'));
});

Breadcrumbs::for('admin.cars.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.admin');
    $breadcrumbs->push('Управление моделями', route('admin.cars.create'));
});

Breadcrumbs::for('admin.cars.edit', function ($breadcrumbs, $car) {
    $breadcrumbs->parent('admin.admin');
    $breadcrumbs->push('Управление моделями', route('admin.cars.edit', $car));
});

Breadcrumbs::for('admin.articles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.admin');
    $breadcrumbs->push('Управление новостями', route('admin.articles.index'));
});

Breadcrumbs::for('admin.articles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.admin');
    $breadcrumbs->push('Управление новостями', route('admin.articles.create'));
});

Breadcrumbs::for('admin.articles.edit', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('admin.admin');
    $breadcrumbs->push('Управление новостями', route('admin.articles.edit', $article));
});

Breadcrumbs::for('manager.manager', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Управление заявками', route('manager.manager'));
});

Breadcrumbs::for('salons.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Салоны', route('salons.index'));
});
