<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('admin.admin') " :active=" request()->routeIs('admin.admin') ">
        {{ __('Админ. панель') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('admin.cars.index') " :active=" request()->routeIs('admin.cars.index') ">
        {{ __('Модели') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('admin.articles.index') " :active=" request()->routeIs('admin.articles.index') ">
        {{ __('Новости') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('home') " :active=" request()->routeIs('home') ">
        {{ __('На сайт') }}
    </x-panels.nav-link>
</div>


