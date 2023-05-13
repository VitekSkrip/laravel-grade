<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('about') " :active=" request()->routeIs('about') ">
        {{ __('О компании') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('catalog') " :active=" request()->routeIs('catalog') ">
        {{ __('Каталог') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('articles.index') " :active=" request()->routeIs('articles.index') ">
        {{ __('Новости') }}
    </x-panels.nav-link>
</div>
